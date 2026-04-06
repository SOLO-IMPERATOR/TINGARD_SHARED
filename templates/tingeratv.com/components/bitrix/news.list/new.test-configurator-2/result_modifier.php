<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Highloadblock as HL;

if (\Bitrix\Main\Loader::includeModule('highloadblock')) {

    $hlblock_modifications = HL\HighloadBlockTable::getById(23)->fetch();
    $entity_modifications = HL\HighloadBlockTable::compileEntity($hlblock_modifications);
    $entity_data_class_modifications = $entity_modifications->getDataClass();
    $rsData_modifications = $entity_data_class_modifications::getList(array(
        "select" => array("*"),
        "order" => array("ID" => "ASC"),
        "filter" => array()
    ));

    while($arData = $rsData_modifications->Fetch()) {
        $arResult["COLORS"][] = $arData;
    }

}

?>