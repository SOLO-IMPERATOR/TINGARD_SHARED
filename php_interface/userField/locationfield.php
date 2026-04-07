<?php
AddEventHandler('main', 'OnUserTypeBuildList', ['SaleLocationRuUserType', 'GetUserTypeDescription']);

use Bitrix\Main\Loader;

class SaleLocationRuUserType
{
    const USER_TYPE_ID = 'sale_location_ru';

    public static function GetUserTypeDescription()
    {
        return [
            'USER_TYPE_ID' => self::USER_TYPE_ID,
            'CLASS_NAME' => __CLASS__,
            'DESCRIPTION' => 'Местоположение России (города и области)',
            'BASE_TYPE' => 'string',
        ];
    }

    private static function getLocations()
    {
        if (!Loader::includeModule('sale')) {
            return [];
        }

        $russiaRow = \Bitrix\Sale\Location\LocationTable::getList([
            'filter' => ['=ID' => 1],
            'select' => ['LEFT_MARGIN', 'RIGHT_MARGIN'],
            'limit'  => 1,
        ])->fetch();

        if (!$russiaRow) {
            return [];
        }

        $typeLabels = ['CITY' => 'город', 'REGION' => 'область / край'];

        $res = \Bitrix\Sale\Location\LocationTable::getList([
            'runtime' => [
                new \Bitrix\Main\ORM\Fields\Relations\Reference(
                    'NAME_RU',
                    \Bitrix\Sale\Location\Name\LocationTable::class,
                    \Bitrix\Main\ORM\Query\Join::on('this.ID', 'ref.LOCATION_ID')
                        ->where('ref.LANGUAGE_ID', '=', 'ru'),
                    ['join_type' => 'INNER']
                ),
            ],
            'select' => ['ID', 'LOC_NAME' => 'NAME_RU.NAME', 'TYPE_CODE' => 'TYPE.CODE'],
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

    private static function getLocationName($id)
    {
        $id = (int)$id;
        if ($id <= 0 || !Loader::includeModule('sale')) {
            return '';
        }

        $row = \Bitrix\Sale\Location\LocationTable::getList([
            'runtime' => [
                new \Bitrix\Main\ORM\Fields\Relations\Reference(
                    'NAME_RU',
                    \Bitrix\Sale\Location\Name\LocationTable::class,
                    \Bitrix\Main\ORM\Query\Join::on('this.ID', 'ref.LOCATION_ID')
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

    public static function GetEditFormHTML($arUserField, $arHtmlControl)
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
            .<?= $uid ?>-wrap .loc-dropdown li { padding: 5px 10px; cursor: pointer; font-size: 13px; border-bottom: 1px solid #f2f2f2; }
            .<?= $uid ?>-wrap .loc-dropdown li:hover { background: #e8f0fe; }
            .<?= $uid ?>-wrap .loc-dropdown .loc-type { color: #999; font-size: 11px; margin-left: 6px; }
            .<?= $uid ?>-wrap .loc-clear { cursor: pointer; color: #c00; font-size: 16px; margin-left: 4px; background: none; border: none; vertical-align: middle; }
        </style>

        <div class="<?= $uid ?>-wrap">
            <input type="text" id="<?= $uid ?>_search" placeholder="Поиск города или области..." autocomplete="off">
            <button type="button" class="loc-clear" id="<?= $uid ?>_clear" style="display:none;">&times;</button>
            <ul class="loc-dropdown" id="<?= $uid ?>_list"></ul>
            <input type="hidden" name="<?= $fieldName ?>" id="<?= $uid ?>_val" value="<?= $currentId ?: '' ?>">
        </div>

        <script>
        (function() {
            var data = <?= json_encode($locations, JSON_UNESCAPED_UNICODE) ?>;
            var elSearch = document.getElementById('<?= $uid ?>_search');
            var elList = document.getElementById('<?= $uid ?>_list');
            var elHidden = document.getElementById('<?= $uid ?>_val');
            var elClear = document.getElementById('<?= $uid ?>_clear');
            var currentId = <?= $currentId ?: 0 ?>;

            if (currentId) {
                for (var i = 0; i < data.length; i++) {
                    if (data[i].id === currentId) {
                        elSearch.value = data[i].name + ' (' + data[i].type + ')';
                        elClear.style.display = 'inline';
                        break;
                    }
                }
            }

            var timer = null;
            elSearch.addEventListener('input', function() {
                clearTimeout(timer);
                var q = this.value.trim().toLowerCase();
                if (q.length < 2) { elList.style.display = 'none'; return; }
                timer = setTimeout(function() { render(q); }, 150);
            });

            elSearch.addEventListener('focus', function() {
                var q = this.value.trim().toLowerCase();
                if (q.length >= 2) render(q);
            });

            document.addEventListener('click', function(e) {
                if (!elSearch.parentNode.contains(e.target)) elList.style.display = 'none';
            });

            elClear.addEventListener('click', function() {
                elSearch.value = '';
                elHidden.value = '';
                elClear.style.display = 'none';
                elList.style.display = 'none';
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
                    elList.innerHTML = '<li style="color:#999;cursor:default">Ничего не найдено</li>';
                } else {
                    for (var j = 0; j < matches.length; j++) {
                        var li = document.createElement('li');
                        li.setAttribute('data-id', matches[j].id);
                        li.setAttribute('data-full', matches[j].name + ' (' + matches[j].type + ')');
                        li.innerHTML = esc(matches[j].name) + '<span class="loc-type">' + esc(matches[j].type) + '</span>';
                        li.addEventListener('mousedown', (function(m) {
                            return function(e) {
                                e.preventDefault();
                                elSearch.value = m.name + ' (' + m.type + ')';
                                elHidden.value = m.id;
                                elClear.style.display = 'inline';
                                elList.style.display = 'none';
                            };
                        })(matches[j]));
                        elList.appendChild(li);
                    }
                }
                elList.style.display = 'block';
            }

            function esc(s) {
                return String(s).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');
            }
        })();
        </script>
        <?php
        return ob_get_clean();
    }

    public static function GetAdminListViewHTML($arUserField, $arHtmlControl)
    {
        return htmlspecialchars(self::getLocationName($arUserField['VALUE']));
    }

    public static function GetDBColumnType($arUserField)
    {
        global $DB;
        return $DB->type === 'MYSQL' ? 'int(11)' : 'NUMBER(11)';
    }
}
