<?php

use Bitrix\Main\Loader;
use Bitrix\Main\EventManager;
use Bitrix\Sale\Location\LocationTable;
use Bitrix\Main\ORM\Fields\Relations\Reference;
use Bitrix\Main\ORM\Query\Join;
use Bitrix\Sale\Location\Name\LocationTable as LocationNameTable;

// Используем EventManager как в твоем рабочем примере для надежности
EventManager::getInstance()->addEventHandler('main', 'OnUserTypeBuildList', ['SaleLocationRuUserType', 'GetUserTypeDescription']);

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
     * Обязательные методы для корректной регистрации в HL-блоках
     */
    public static function PrepareSettings($arUserField): array { return []; }
    public static function GetSettingsHTML($arUserField, $arHtmlControl, $bVarsFromForm): string { return ''; }

    /**
     * Обработка значения перед сохранением
     */
    public static function OnBeforeSave($arUserField, $value)
    {
        return (int)$value;
    }

    /**
     * Получить список городов и областей России.
     */
    private static function getLocations(): array
    {
        if (!Loader::includeModule('sale')) {
            return [];
        }

        // Поиск ID России для фильтрации по вхождению (LEFT/RIGHT MARGIN)
        $russiaRow = LocationTable::getList([
            'filter' => ['=TYPE.CODE' => 'COUNTRY', 'NAME.NAME' => 'Россия', 'NAME.LANGUAGE_ID' => 'ru'],
            'select' => ['LEFT_MARGIN', 'RIGHT_MARGIN'],
            'limit'  => 1,
        ])->fetch();

        // Если по имени не нашли, пробуем по ID 1 (дефолт Битрикса)
        if (!$russiaRow) {
            $russiaRow = LocationTable::getList([
                'filter' => ['=ID' => 1],
                'select' => ['LEFT_MARGIN', 'RIGHT_MARGIN'],
                'limit'  => 1,
            ])->fetch();
        }

        if (!$russiaRow) return [];

        $typeLabels = ['CITY' => 'город', 'REGION' => 'область / край'];

        $res = LocationTable::getList([
            'runtime' => [
                new Reference(
                    'NAME_RU',
                    LocationNameTable::class,
                    Join::on('this.ID', 'ref.LOCATION_ID')->where('ref.LANGUAGE_ID', '=', 'ru'),
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

    private static function getLocationName(int $id): string
    {
        if ($id <= 0 || !Loader::includeModule('sale')) return '';

        $row = LocationTable::getList([
            'runtime' => [
                new Reference(
                    'NAME_RU',
                    LocationNameTable::class,
                    Join::on('this.ID', 'ref.LOCATION_ID')->where('ref.LANGUAGE_ID', '=', 'ru'),
                    ['join_type' => 'INNER']
                ),
            ],
            'select' => ['LOC_NAME' => 'NAME_RU.NAME'],
            'filter' => ['=ID' => $id],
            'limit'  => 1,
        ])->fetch();

        return $row ? (string)$row['LOC_NAME'] : '';
    }

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
            .<?= $uid ?>-wrap .loc-dropdown li { padding: 5px 10px; cursor: pointer; font-size: 13px; border-bottom: 1px solid #f2f2f2; }
            .<?= $uid ?>-wrap .loc-dropdown li:hover, .<?= $uid ?>-wrap .loc-dropdown li.active { background: #e8f0fe; }
            .<?= $uid ?>-wrap .loc-dropdown .loc-type { color: #999; font-size: 11px; margin-left: 6px; }
            .<?= $uid ?>-wrap .loc-clear { cursor: pointer; color: #c00; font-size: 16px; margin-left: 4px; background: none; border: none; vertical-align: middle; }
        </style>

        <div class="<?= $uid ?>-wrap">
            <input type="text" id="<?= $uid ?>_search" placeholder="Поиск города..." autocomplete="off">
            <button type="button" class="loc-clear" id="<?= $uid ?>_clear" style="display:none;">&times;</button>
            <ul class="loc-dropdown" id="<?= $uid ?>_list"></ul>
            <input type="hidden" name="<?= $fieldName ?>" id="<?= $uid ?>_val" value="<?= $currentId ?: '' ?>">
        </div>

        <script>
        (function() {
            var data = <?= json_encode($locations, JSON_UNESCAPED_UNICODE) ?>;
            var elSearch = document.getElementById('<?= $uid ?>_search'),
                elList = document.getElementById('<?= $uid ?>_list'),
                elHidden = document.getElementById('<?= $uid ?>_val'),
                elClear = document.getElementById('<?= $uid ?>_clear');

            if (<?= $currentId ?>) {
                var item = data.find(x => x.id === <?= $currentId ?>);
                if (item) {
                    elSearch.value = item.name + ' (' + item.type + ')';
                    elClear.style.display = 'inline';
                }
            }

            elSearch.addEventListener('input', function() {
                var q = this.value.trim().toLowerCase();
                if (q.length < 2) { elList.style.display = 'none'; return; }
                render(q);
            });

            function render(q) {
                var matches = data.filter(x => x.name.toLowerCase().indexOf(q) !== -1).slice(0, 30);
                elList.innerHTML = matches.map(x => 
                    `<li data-id="${x.id}" data-full="${x.name} (${x.type})">${x.name} <span class="loc-type">${x.type}</span></li>`
                ).join('');
                elList.style.display = matches.length ? 'block' : 'none';
                
                elList.querySelectorAll('li').forEach(li => {
                    li.onclick = function() {
                        elSearch.value = this.dataset.full;
                        elHidden.value = this.dataset.id;
                        elClear.style.display = 'inline';
                        elList.style.display = 'none';
                    };
                });
            }

            elClear.onclick = function() {
                elSearch.value = ''; elHidden.value = ''; elClear.style.display = 'none';
            };
        })();
        </script>
        <?php
        return ob_get_clean();
    }

    public static function GetAdminListViewHTML($arUserField, $arHtmlControl): string
    {
        return self::getLocationName((int)$arUserField['VALUE']);
    }

    public static function GetPublicViewHTML($arUserField, $value, $strHTMLControlName): string
    {
        return self::getLocationName((int)$value['VALUE']);
    }

    public static function GetDBColumnType($arUserField): string
    {
        global $DB;
        return ($DB->type === 'MYSQL') ? 'int(11)' : 'NUMBER(11)';
    }
}