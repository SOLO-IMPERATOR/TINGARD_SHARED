<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

use Bitrix\Main\Loader;
use Bitrix\Sale\Location\LocationTable;

Loader::includeModule("sale");


$res = LocationTable::getList([
    'filter' => ['=PARENTS.ID' => 1, '=TYPE_ID' => [5,3]],
    'select' => [
        'ID', 
        'LOCATION_NAME' => 'NAME.NAME',
 
    ],
    'order' => [
        'NAME.NAME' => 'ASC', 
    ]
]);

$locations = [];

while ($item = $res->fetch()) {
    $locations[$item['ID']] = $item['LOCATION_NAME'];
}

$arComponentParameters = [
    "GROUPS" => [
        "SETTINGS" => [
            "NAME" => "Настройки",
            "SORT" => "100"
        ]
    ],
    "PARAMETERS" => [
        "regionsIds" => [
            "PARENT" => "BASE",
            "NAME" => "Список регионов",
            "TYPE" => "LIST",
            "VALUES" =>  $locations,
            'DEFAULT' => "COMMON",
            "MULTIPLE" => "Y",
            "SIZE" => "20"
        ]
    ]
];
