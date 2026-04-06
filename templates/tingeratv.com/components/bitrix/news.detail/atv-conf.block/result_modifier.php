<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use Bitrix\Highloadblock as HL;

/* echo '<pre>'; print_r($arResult['PROPERTIES']['HL_MODS']); echo '</pre>'; */


if (\Bitrix\Main\Loader::includeModule('highloadblock')) {

    // Цвет
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



//модули
if (\Bitrix\Main\Loader::includeModule('highloadblock')) {
	$hlblock = HL\HighloadBlockTable::getById(21)->fetch();
	$entity = HL\HighloadBlockTable::compileEntity($hlblock);
	$entity_data_class = $entity->getDataClass();
	$rsData = $entity_data_class::getList(array(
		"select" => array("*"),
		"order" => array("UF_SORT" => "ASC"),
		"filter" => array("UF_HL_LINK_MODIFICATIONS" => $arResult['PROPERTIES']['HL_MODS'])
	));

	while($arData = $rsData->Fetch()) {
		$arResult['CONF_MODULES'][] = $arData;
	}

	for ($i = 0; $i < count($arResult['CONF_MODULES']); $i++) {
		for ($j = 0; $j < count($arResult['CONF_MODULES'][$i]["UF_IMAGE"]); $j++) {
			$arResult['CONF_MODULES'][$i]["UF_IMAGE"][$j] = CFile::GetPath($arResult['CONF_MODULES'][$i]["UF_IMAGE"][$j]);
		}
		for ($j = 0; $j < count($arResult['CONF_MODULES'][$i]["UF_IMAGE_BACK"]); $j++) {
			$arResult['CONF_MODULES'][$i]["UF_IMAGE_BACK"][$j] = CFile::GetPath($arResult['CONF_MODULES'][$i]["UF_IMAGE_BACK"][$j]);
		}
	}
}

// получение пакетов

if (\Bitrix\Main\Loader::includeModule('highloadblock')) {
	$hlblock_packs = HL\HighloadBlockTable::getById(22)->fetch();
	$entity_packs = HL\HighloadBlockTable::compileEntity($hlblock_packs);
	$entity_data_class_packs = $entity_packs->getDataClass();
	$rsData_packs = $entity_data_class_packs::getList(array(
		"select" => array("*"),
		"order" => array("UF_SORT" => "ASC"),
		"filter" => array()
	));

	while($arData = $rsData_packs->Fetch()) {
		foreach ($arResult["PROPERTIES"]["HL_PACKS"]["VALUE"] as $get_hb_el_packs) {
			if ($get_hb_el_packs == $arData['UF_XML_ID']) {
				$arResult["PACKS"][$arResult["ID"]][] = $arData;
			}
		}
	}
}

// получение моделей

if (\Bitrix\Main\Loader::includeModule('highloadblock')) {
	$hlblock_model = HL\HighloadBlockTable::getById(25)->fetch();
	$entity_model = HL\HighloadBlockTable::compileEntity($hlblock_model);
	$entity_data_class_model = $entity_model->getDataClass();
	$rsData_model = $entity_data_class_model::getList(array(
		"select" => array("*"),
		"order" => array("ID" => "ASC"),
		"filter" => array()
	));

	while($arData = $rsData_model->Fetch()) {
		foreach ($arResult['PROPERTIES']['HL_MODS']["VALUE"] as $get_hb_el_model) {
			
			if ($get_hb_el_model == $arData['UF_XML_ID']) {
				$arResult["MODEL"][$arResult["ID"]][] = $arData;
			}
		}
	}
}