<?php
AddEventHandler('main', 'OnUserTypeBuildList', ['SaleLocationRuUserType', 'GetUserTypeDescription']);

/**
 * Кастомное поле «Местоположение России» для HL-блоков.
 * Значение хранится в виде JSON: {"id": 123, "name": "Москва"}
 *
 * USER_TYPE_ID: sale_location_ru
 * Источник данных: модуль Sale, только города и области России (COUNTRY ID = 1).
 */
class SaleLocationRuUserType
{
    const USER_TYPE_ID = 'sale_location_ru';

    public static function GetUserTypeDescription(): array
    {
        return [
            'USER_TYPE_ID' => self::USER_TYPE_ID,
            'CLASS_NAME'   => __CLASS__,
            'DESCRIPTION'  => 'Местоположение России (города и области)',
            'BASE_TYPE'    => 'string',
        ];
    }

    /**
     * Поле редактирования в форме HL-блока — поиск с автодополнением.
     */
    public static function GetEditFormHTML(array $arUserField, array $arHtmlControl): string
    {
        $storedJson  = $arHtmlControl['VALUE'] ?? '';
        $displayName = '';

        if ($storedJson !== '') {
            $decoded = json_decode($storedJson, true);
            if (is_array($decoded) && isset($decoded['name'])) {
                $displayName = $decoded['name'];
            } else {
                $displayName = $storedJson;
            }
        }

        $inputId    = 'loc_ru_' . substr(md5($arHtmlControl['NAME']), 0, 10);
        $fieldName  = htmlspecialchars($arHtmlControl['NAME'], ENT_QUOTES, 'UTF-8');
        $safeValue  = htmlspecialchars($storedJson, ENT_QUOTES, 'UTF-8');
        $safeDisplay = htmlspecialchars($displayName, ENT_QUOTES, 'UTF-8');

        ob_start();
        ?>
        <style>
            #<?= $inputId ?>_wrap {
                position: relative;
                display: inline-block;
            }
            #<?= $inputId ?>_search {
                width: 320px;
                padding: 4px 8px;
                box-sizing: border-box;
                font-size: 13px;
                border: 1px solid #ccc;
                border-radius: 3px;
            }
            #<?= $inputId ?>_list {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                min-width: 320px;
                max-height: 240px;
                overflow-y: auto;
                background: #fff;
                border: 1px solid #bbb;
                border-top: none;
                border-radius: 0 0 3px 3px;
                z-index: 10000;
                list-style: none;
                margin: 0;
                padding: 0;
                box-shadow: 0 4px 10px rgba(0,0,0,.15);
            }
            #<?= $inputId ?>_list li {
                padding: 6px 10px;
                cursor: pointer;
                border-bottom: 1px solid #f0f0f0;
                font-size: 13px;
            }
            #<?= $inputId ?>_list li:last-child {
                border-bottom: none;
            }
            #<?= $inputId ?>_list li:hover {
                background: #e8f0fe;
            }
            #<?= $inputId ?>_list li .loc-type-badge {
                font-size: 11px;
                color: #888;
                margin-left: 6px;
                font-style: italic;
            }
            #<?= $inputId ?>_list .loc-no-results {
                padding: 8px 10px;
                color: #999;
                font-size: 12px;
                cursor: default;
            }
            #<?= $inputId ?>_clear {
                margin-left: 4px;
                cursor: pointer;
                color: #c00;
                font-size: 16px;
                vertical-align: middle;
                display: <?= $storedJson !== '' ? 'inline' : 'none' ?>;
                background: none;
                border: none;
                padding: 0 2px;
                line-height: 1;
            }
        </style>

        <div id="<?= $inputId ?>_wrap">
            <input
                type="text"
                id="<?= $inputId ?>_search"
                value="<?= $safeDisplay ?>"
                placeholder="Начните вводить город или область..."
                autocomplete="off"
            >
            <button type="button" id="<?= $inputId ?>_clear" title="Очистить">×</button>
            <ul id="<?= $inputId ?>_list"></ul>
            <input
                type="hidden"
                name="<?= $fieldName ?>"
                id="<?= $inputId ?>_value"
                value="<?= $safeValue ?>"
            >
        </div>

        <script>
        (function () {
            var SEARCH_URL = '/local/ajax/location_search.php';
            var DELAY_MS   = 300;
            var MIN_CHARS  = 2;

            var elSearch = document.getElementById('<?= $inputId ?>_search');
            var elList   = document.getElementById('<?= $inputId ?>_list');
            var elHidden = document.getElementById('<?= $inputId ?>_value');
            var elClear  = document.getElementById('<?= $inputId ?>_clear');

            var debounceTimer = null;
            var currentQuery  = '';

            elSearch.addEventListener('input', function () {
                clearTimeout(debounceTimer);
                var q = this.value.trim();
                currentQuery = q;

                if (q.length < MIN_CHARS) {
                    // Если поле очищено — сбрасываем скрытое значение
                    if (q === '') {
                        elHidden.value = '';
                        elClear.style.display = 'none';
                    }
                    hideList();
                    return;
                }

                debounceTimer = setTimeout(function () {
                    doSearch(q);
                }, DELAY_MS);
            });

            elSearch.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') {
                    hideList();
                }
                if (e.key === 'Enter') {
                    var first = elList.querySelector('li[data-id]');
                    if (first) {
                        selectItem(first.dataset.id, first.dataset.name);
                    }
                    e.preventDefault();
                }
                if (e.key === 'ArrowDown') {
                    var items = elList.querySelectorAll('li[data-id]');
                    if (items.length) items[0].focus();
                    e.preventDefault();
                }
            });

            elList.addEventListener('keydown', function (e) {
                var focused = document.activeElement;
                if (e.key === 'ArrowDown') {
                    var next = focused.nextElementSibling;
                    if (next && next.dataset.id) next.focus();
                    e.preventDefault();
                }
                if (e.key === 'ArrowUp') {
                    var prev = focused.previousElementSibling;
                    if (prev && prev.dataset.id) { prev.focus(); } else { elSearch.focus(); }
                    e.preventDefault();
                }
                if (e.key === 'Enter' && focused.dataset.id) {
                    selectItem(focused.dataset.id, focused.dataset.name);
                    e.preventDefault();
                }
                if (e.key === 'Escape') {
                    hideList();
                    elSearch.focus();
                }
            });

            elSearch.addEventListener('blur', function () {
                setTimeout(function () {
                    if (!elList.contains(document.activeElement)) {
                        hideList();
                    }
                }, 200);
            });

            elClear.addEventListener('click', function () {
                elSearch.value  = '';
                elHidden.value  = '';
                elClear.style.display = 'none';
                hideList();
                elSearch.focus();
            });

            function doSearch(q) {
                fetch(SEARCH_URL + '?q=' + encodeURIComponent(q))
                    .then(function (r) {
                        if (!r.ok) throw new Error('HTTP ' + r.status);
                        return r.json();
                    })
                    .then(function (items) {
                        if (q !== currentQuery) return; // устаревший запрос
                        elList.innerHTML = '';

                        if (!items.length) {
                            var noRes = document.createElement('li');
                            noRes.className = 'loc-no-results';
                            noRes.textContent = 'Ничего не найдено';
                            elList.appendChild(noRes);
                            elList.style.display = 'block';
                            return;
                        }

                        items.forEach(function (item) {
                            var li = document.createElement('li');
                            li.setAttribute('tabindex', '0');
                            li.dataset.id   = item.id;
                            li.dataset.name = item.name;
                            li.innerHTML = esc(item.name) +
                                '<span class="loc-type-badge">' + esc(item.type) + '</span>';
                            li.addEventListener('mousedown', function (e) {
                                e.preventDefault(); // не снимаем фокус с поля
                                selectItem(item.id, item.name);
                            });
                            elList.appendChild(li);
                        });

                        elList.style.display = 'block';
                    })
                    .catch(function () {
                        hideList();
                    });
            }

            function selectItem(id, name) {
                elSearch.value = name;
                elHidden.value = JSON.stringify({ id: parseInt(id, 10), name: name });
                elClear.style.display = 'inline';
                hideList();
            }

            function hideList() {
                elList.style.display = 'none';
                elList.innerHTML = '';
            }

            function esc(str) {
                return String(str)
                    .replace(/&/g, '&amp;')
                    .replace(/</g, '&lt;')
                    .replace(/>/g, '&gt;')
                    .replace(/"/g, '&quot;');
            }
        })();
        </script>
        <?php
        return ob_get_clean();
    }

    /**
     * Отображение значения в списке записей HL-блока в админке.
     */
    public static function GetAdminListViewHTML(array $arUserField, array $arHtmlControl): string
    {
        $value = $arUserField['VALUE'] ?? '';
        if ($value !== '') {
            $decoded = json_decode($value, true);
            if (is_array($decoded) && isset($decoded['name'])) {
                return htmlspecialchars($decoded['name'], ENT_QUOTES, 'UTF-8');
            }
        }
        return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
    }

    /**
     * Публичное отображение (фронтенд).
     */
    public static function GetPublicViewHTML(
        array $arUserField,
        array $value,
        array $strHTMLControlName
    ): string {
        $val = $value['VALUE'] ?? '';
        if ($val !== '') {
            $decoded = json_decode($val, true);
            if (is_array($decoded) && isset($decoded['name'])) {
                return htmlspecialchars($decoded['name'], ENT_QUOTES, 'UTF-8');
            }
        }
        return htmlspecialchars((string)$val, ENT_QUOTES, 'UTF-8');
    }

    /**
     * Тип колонки в БД.
     */
    public static function GetDBColumnType(array $arUserField): string
    {
        global $DB;
        return ($DB->type === 'MYSQL') ? 'varchar(500)' : 'VARCHAR2(500)';
    }
}
