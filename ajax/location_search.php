<?php
/**
 * AJAX-поиск городов и областей России из модуля Sale.
 * GET-параметр: q — строка поиска (минимум 2 символа).
 * Ответ: JSON-массив [{id, name, type}, ...]
 *
 * Russia ID (LocationTable): 1
 */
define('STOP_STATISTICS', true);
require_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php');

header('Content-Type: application/json; charset=utf-8');

use Bitrix\Main\Loader;
use Bitrix\Main\ORM\Fields\Relations\Reference;
use Bitrix\Main\ORM\Query\Join;
use Bitrix\Sale\Location\LocationTable;
use Bitrix\Sale\Location\Name\LocationTable as LocationNameTable;

// Валидация ввода
$q = trim($_GET['q'] ?? '');
if (mb_strlen($q) < 2) {
    echo '[]';
    die();
}

if (!Loader::includeModule('sale')) {
    echo '[]';
    die();
}

// ID России в таблице локаций — передан пользователем как 1
$russiaId = 1;

// Получаем границы поддерева России (LEFT_MARGIN / RIGHT_MARGIN)
$russiaRow = LocationTable::getList([
    'filter' => ['=ID' => $russiaId],
    'select' => ['LEFT_MARGIN', 'RIGHT_MARGIN'],
    'limit'  => 1,
])->fetch();

if (!$russiaRow) {
    echo '[]';
    die();
}

$leftMargin  = (int)$russiaRow['LEFT_MARGIN'];
$rightMargin = (int)$russiaRow['RIGHT_MARGIN'];

// Текстовые метки типов
$typeLabels = [
    'CITY'      => 'город',
    'REGION'    => 'область / край',
];

try {
    // Один JOIN на таблицу имён с фиксацией language_id = 'ru' в условии JOIN-а,
    // чтобы избежать двойного джойна при фильтрации по языку и имени одновременно.
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
            '%NAME_RU.NAME'  => $q,          // LIKE '%q%'
            '=TYPE.CODE'     => ['CITY', 'REGION'],
            '>LEFT_MARGIN'   => $leftMargin,
            '<RIGHT_MARGIN'  => $rightMargin,
        ],
        'order'  => ['NAME_RU.NAME' => 'ASC'],
        'limit'  => 25,
    ]);

    $items = [];
    while ($row = $res->fetch()) {
        $items[] = [
            'id'   => (int)$row['ID'],
            'name' => (string)$row['LOC_NAME'],
            'type' => $typeLabels[$row['TYPE_CODE']] ?? (string)$row['TYPE_CODE'],
        ];
    }

    echo json_encode($items, JSON_UNESCAPED_UNICODE);

} catch (Exception $e) {
    echo '[]';
}

die();
