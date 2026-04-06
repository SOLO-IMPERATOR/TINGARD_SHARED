<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

use Bitrix\Main\Loader;
use Bitrix\Iblock;
use Bitrix\Highloadblock\HighloadBlockTable;

Loader::includeModule("iblock");
Loader::includeModule("highloadblock");

// ------------------------------------------
// 1. Тип конфигуратора
// ------------------------------------------
$arComponentParameters = [
    "GROUPS" => [
        "SETTINGS" => [
            "NAME" => "Настройки",
            "SORT" => "100"
        ]
    ],
    "PARAMETERS" => [
        "CONFIG_TYPE" => [
            "PARENT" => "BASE",
            "NAME" => "Тип конфигуратора",
            "TYPE" => "LIST",
            "VALUES" => [
                "PRIVATE" => "Частный",
                "COMMON" => "Общий"
            ],
            'DEFAULT' => "COMMON",
            'REFRESH' => "Y",
        ]
    ]

];

// ------------------------------------------
// 2. Если выбран "Частный" → показываем инфоблоки
// ------------------------------------------
if ($arCurrentValues["CONFIG_TYPE"] === "PRIVATE") {

    $arElements = [];
    $rsElements = CIBlockElement::GetList(
        ["SORT" => "ASC"],
        [
            "ACTIVE" => "Y",
            "IBLOCK_ID" => 11,
        ],
        false,
        false,
        ["ID", "NAME"]
    );

    while ($el = $rsElements->Fetch()) {
        $arElements[$el["ID"]] = "[" . $el["ID"] . "] " . $el["NAME"];
    }

    $arComponentParameters["PARAMETERS"]["ELEMENT_ID"] = [
        "PARENT" => "BASE",
        "NAME" => "Выберите тип вездехода",
        "TYPE" => "LIST",
        "VALUES" => $arElements,
        "DEFAULT" => "",
        "REFRESH" => "Y",
    ];
}

// ------------------------------------------
// 3. Если выбран элемент → показываем модели HL
// ------------------------------------------
if (!empty($arCurrentValues["ELEMENT_ID"]) && Loader::includeModule("highloadblock")) {

    $hlblock = HighloadBlockTable::getByID(31)->fetch();
    if ($hlblock) {

        $entity = HighloadBlockTable::compileEntity($hlblock);
        $dataClass = $entity->getDataClass();
        $arModels = [];

        $rsData = $dataClass::getList([
            "select" => ["ID", "UF_VEHICLE_MODEL_NAME"],
            "filter" => ["UF_VEHICLE" => $arCurrentValues["ELEMENT_ID"]],
        ]);

        while ($row = $rsData->fetch()) {
            $arModels[$row["ID"]] = "[" . $row["ID"] . "] " . $row["UF_VEHICLE_MODEL_NAME"];
        }

        $arComponentParameters["PARAMETERS"]["MODEL_ID"] = [
            "PARENT" => "BASE",
            "NAME" => "Выберите модель вездехода",
            "TYPE" => "LIST",
            "VALUES" => $arModels,
            "DEFAULT" => "",
        ];
    }
}
