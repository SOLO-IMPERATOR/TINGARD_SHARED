<?php

use Bitrix\Main\Loader;
use Bitrix\Sale\Location\LocationTable;
use Bitrix\Main\ORM\Fields\Relations\Reference;
use Bitrix\Main\ORM\Query\Join;
use Bitrix\Sale\Location\Name\LocationTable as LocationNameTable;

AddEventHandler('main', 'OnUserTypeBuildList', ['SaleLocationRuUserType', 'GetUserTypeDescription']);

/**
 * Кастомное поле «Местоположение России» для HL-блоков.
 * Хранит ID локации из модуля sale (int).
 * В форме — input с поиском по городам и областям России.
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
            'BASE_TYPE'    => 'int',
        ];
    }

    /**
     * Получить список городов и областей России.
     */
    private static function getLocations(): array
    {
        if (!Loader::includeModule('sale')) {
            return [];
        }

        $russiaRow = LocationTable::getList([
            'filter' => ['=ID' => 1],
            'select' => ['LEFT_MARGIN', 'RIGHT_MARGIN'],
            'limit'  => 1,
        ])->fetch();

        if (!$russiaRow) {
            return [];
        }

        $typeLabels = [
            'CITY'   => 'город',
            'REGION' => 'область / край',
        ];

        $res = LocationTable::getList([
            'runtime' => [
                new Reference(
                    'NAME_RU',
                    LocationNameTable::class,
                    Join::on('this.ID', 'ref.LOCATION_ID')
                        ->where('ref.LANGUAGE_ID', '=', 'ru'),
                    ['join_type' => 'INNER']
                ),
            ],
            'select' => [
                'ID',
                'LOC_NAME'  => 'NAME_RU.NAME',
                'TYPE_CODE' => 'TYPE.CODE',
            ],
            'filter' => [
                '=TYPE.CODE'    => ['CITY', 'REGION'],
                '>LEFT_MARGIN'  => (int)$russiaRow['LEFT_MARGIN'],
                '<RIGHT_MARGIN' => (int)$russiaRow['RIGHT_MARGIN'],
            ],
            'order' => ['NAME_RU.NAME' => 'ASC'],
        ]);

        $items = [];
        while ($row = $res->fetch()) {
            $items[] = [
                'id'   => (int)$row['ID'],
                'name' => (string)$row['LOC_NAME'],
                'type' => $typeLabels[$row['TYPE_CODE']] ?? $row['TYPE_CODE'],
            ];
        }

        return $items;
    }

    /**
     * Получить имя локации по ID.
     */
    private static function getLocationName(int $id): string
    {
        if ($id <= 0 || !Loader::includeModule('sale')) {
            return '';
        }

        $row = LocationTable::getList([
            'runtime' => [
                new Reference(
                    'NAME_RU',
                    LocationNameTable::class,
                    Join::on('this.ID', 'ref.LOCATION_ID')
                        ->where('ref.LANGUAGE_ID', '=', 'ru'),
                    ['join_type' => 'INNER']
                ),
            ],
            'select' => ['LOC_NAME' => 'NAME_RU.NAME'],
            'filter' => ['=ID' => $id],
            'limit'  => 1,
        ])->fetch();

        return $row ? (string)$row['LOC_NAME'] : '';
    }

    /**
     * Форма редактирования — input с поиском.
     */
    public static function GetEditFormHTML($arUserField, $arHtmlControl): string
    {
        $currentId = (int)($arHtmlControl['VALUE'] ?? 0);
        $locations = self::getLocations();
        $fieldName = htmlspecialchars($arHtmlControl['NAME'], ENT_QUOTES, 'UTF-8');
        $uid = 'loc_' . substr(md5($arHtmlControl['NAME'] . mt_rand()), 0, 8);

        ob_start();
        ?>
        <style>
            .<?= $uid ?>-wrap { position: relative; display: inline-block; }
            .<?= $uid ?>-wrap input[type="text"] {
                width: 360px; padding: 5px 8px; font-size: 13px;
                border: 1px solid #c0c0c0; border-radius: 3px; box-sizing: border-box;
            }
            .<?= $uid ?>-wrap .loc-dropdown {
                display: none; position: absolute; top: 100%; left: 0;
                width: 360px; max-height: 250px; overflow-y: auto;
                background: #fff; border: 1px solid #bbb; border-top: none;
                z-index: 10000; margin: 0; padding: 0; list-style: none;
                box-shadow: 0 3px 8px rgba(0,0,0,.15);
            }
            .<?= $uid ?>-wrap .loc-dropdown li {
                padding: 5px 10px; cursor: pointer; font-size: 13px;
                border-bottom: 1px solid #f2f2f2;
            }
            .<?= $uid ?>-wrap .loc-dropdown li:hover,
            .<?= $uid ?>-wrap .loc-dropdown li.active { background: #e8f0fe; }
            .<?= $uid ?>-wrap .loc-dropdown .loc-type { color: #999; font-size: 11px; margin-left: 6px; }
            .<?= $uid ?>-wrap .loc-dropdown .loc-empty { padding: 8px 10px; color: #999; cursor: default; }
            .<?= $uid ?>-wrap .loc-clear {
                cursor: pointer; color: #c00; font-size: 16px; margin-left: 4px;
                background: none; border: none; vertical-align: middle; padding: 0 2px;
            }
        </style>

        <div class="<?= $uid ?>-wrap">
            <input type="text" id="<?= $uid ?>_search" placeholder="Начните вводить город или область..." autocomplete="off">
            <button type="button" class="loc-clear" id="<?= $uid ?>_clear" style="display:none;" title="Очистить">&times;</button>
            <ul class="loc-dropdown" id="<?= $uid ?>_list"></ul>
            <input type="hidden" name="<?= $fieldName ?>" id="<?= $uid ?>_val" value="<?= $currentId ?: '' ?>">
        </div>

        <script>
        (function() {
            var data = <?= json_encode($locations, JSON_UNESCAPED_UNICODE) ?>;
            var elSearch = document.getElementById('<?= $uid ?>_search');
            var elList   = document.getElementById('<?= $uid ?>_list');
            var elHidden = document.getElementById('<?= $uid ?>_val');
            var elClear  = document.getElementById('<?= $uid ?>_clear');
            var currentId = <?= $currentId ?>;

            if (currentId) {
                for (var i = 0; i < data.length; i++) {
                    if (data[i].id === currentId) {
                        elSearch.value = data[i].name + ' (' + data[i].type + ')';
                        elClear.style.display = 'inline';
                        break;
                    }
                }
            }

            var debounce = null;
            elSearch.addEventListener('input', function() {
                clearTimeout(debounce);
                var q = this.value.trim().toLowerCase();
                if (q.length < 2) { hide(); return; }
                debounce = setTimeout(function() { render(q); }, 150);
            });

            elSearch.addEventListener('focus', function() {
                var q = this.value.trim().toLowerCase();
                if (q.length >= 2) render(q);
            });

            elSearch.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') hide();
                if (e.key === 'ArrowDown') {
                    var first = elList.querySelector('li[data-id]');
                    if (first) first.classList.add('active');
                    e.preventDefault();
                }
                if (e.key === 'Enter') {
                    var act = elList.querySelector('li.active') || elList.querySelector('li[data-id]');
                    if (act && act.dataset.id) pick(+act.dataset.id, act.dataset.name);
                    e.preventDefault();
                }
            });

            document.addEventListener('click', function(e) {
                if (!elSearch.parentNode.contains(e.target)) hide();
            });

            elClear.addEventListener('click', function() {
                elSearch.value = '';
                elHidden.value = '';
                elClear.style.display = 'none';
                hide();
                elSearch.focus();
            });

            function render(q) {
                var matches = [];
                for (var i = 0; i < data.length; i++) {
                    if (data[i].name.toLowerCase().indexOf(q) !== -1) {
                        matches.push(data[i]);
                    }
                    if (matches.length >= 30) break;
                }
                elList.innerHTML = '';
                if (!matches.length) {
                    elList.innerHTML = '<li class="loc-empty">Ничего не найдено</li>';
                } else {
                    for (var j = 0; j < matches.length; j++) {
                        var li = document.createElement('li');
                        li.dataset.id = matches[j].id;
                        li.dataset.name = matches[j].name + ' (' + matches[j].type + ')';
                        li.innerHTML = esc(matches[j].name) + '<span class="loc-type">' + esc(matches[j].type) + '</span>';
                        li.addEventListener('mousedown', (function(m) {
                            return function(e) {
                                e.preventDefault();
                                pick(m.id, m.name + ' (' + m.type + ')');
                            };
                        })(matches[j]));
                        elList.appendChild(li);
                    }
                }
                elList.style.display = 'block';
            }

            function pick(id, name) {
                elSearch.value = name;
                elHidden.value = id;
                elClear.style.display = 'inline';
                hide();
            }

            function hide() {
                elList.style.display = 'none';
                elList.innerHTML = '';
            }

            function esc(s) {
                return String(s).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');
            }
        })();
        </script>
        <?php
        return ob_get_clean();
    }

    /**
     * Отображение в списке записей админки.
     */
    public static function GetAdminListViewHTML($arUserField, $arHtmlControl): string
    {
        $id = (int)($arUserField['VALUE'] ?? 0);
        if ($id <= 0) return '';
        $name = self::getLocationName($id);
        return htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
    }

    /**
     * Публичное отображение.
     */
    public static function GetPublicViewHTML($arUserField, $value, $strHTMLControlName): string
    {
        $id = (int)($value['VALUE'] ?? 0);
        if ($id <= 0) return '';
        $name = self::getLocationName($id);
        return htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
    }

    /**
     * Тип колонки в БД.
     */
    public static function GetDBColumnType($arUserField): string
    {
        global $DB;
        return ($DB->type === 'MYSQL') ? 'int(11)' : 'NUMBER(11)';
    }
}
