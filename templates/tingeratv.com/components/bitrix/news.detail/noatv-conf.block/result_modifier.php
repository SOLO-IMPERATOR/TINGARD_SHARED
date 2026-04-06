<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use Bitrix\Highloadblock as HL;

// Характеристики
if (\Bitrix\Main\Loader::includeModule('highloadblock')) {

    // Модификации
    $hlblock_modifications = HL\HighloadBlockTable::getById(25)->fetch();
    $entity_modifications = HL\HighloadBlockTable::compileEntity($hlblock_modifications);
    $entity_data_class_modifications = $entity_modifications->getDataClass();
    $rsData_modifications = $entity_data_class_modifications::getList(array(
        "select" => array("*"),
        "order" => array("UF_SORT" => "ASC"),
        "filter" => array()
    ));

    while($arData = $rsData_modifications->Fetch()) {
        // print_r($arData);
        foreach ($arResult["PROPERTIES"]["HL_MODS"]["VALUE"] as $get_modifications) {
            if ($get_modifications == $arData["UF_XML_ID"]) {
                $arResult["MODIFICATIONS"][] = [$arData["UF_NAME"], $arData["UF_PRICE"], $arData["ID"], CFile::GetPath($arData["UF_IMG"]), $arData["UF_NCREASEL"], $arData['UF_MODIFICATION_CHARS']];
            }
        }
    }

}