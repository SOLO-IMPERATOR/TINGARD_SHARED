<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use Bitrix\Highloadblock as HL;

// Характеристики
if (\Bitrix\Main\Loader::includeModule('highloadblock')) {
/*     $hlblock_modifications = HL\HighloadBlockTable::getById(10)->fetch();
    $entity_modifications = HL\HighloadBlockTable::compileEntity($hlblock_modifications);
    $entity_data_class_modifications = $entity_modifications->getDataClass();
    $rsData_modifications = $entity_data_class_modifications::getList(array(
        "select" => array("*"),
        "order" => array("UF_SORT" => "ASC"),
        "filter" => array()
    ));

    while($arData = $rsData_modifications->Fetch()) {
        foreach ($arResult["PROPERTIES"]["HL_CHARACTERISTICS"]["VALUE"] as $get_char) {
            if ($get_char == $arData["UF_XML_ID"]) {
                $arResult["CHARACTERS"][] = $arData;
            }
        }
    } */

    // Цвет
    $hlblock_modifications = HL\HighloadBlockTable::getById(3)->fetch();
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

    // Модификации
    $hlblock_modifications = HL\HighloadBlockTable::getById(9)->fetch();
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

    // Характеристики для модификаций
/*     foreach ($arResult["MODIFICATIONS"] as $get_mods) {
        for ($i = 0; $i < count($arResult["CHARACTERS"]); $i++) {
            if ($arResult["CHARACTERS"][$i]["UF_MODIFICATION"] == $get_mods[2]) {
                $arResult["CHARACTERS"][$i]["UF_MODIFICATION"] = $get_mods[0];
            }
        } 
    } */
}








if (\Bitrix\Main\Loader::includeModule('highloadblock')) {
	$hlblock   = HL\HighloadBlockTable::getById(4)->fetch();
	$entity = HL\HighloadBlockTable::compileEntity($hlblock);
	$entity_data_class = $entity->getDataClass();
	$rsData = $entity_data_class::getList(array(
		"select" => array("*"),
		"order" => array("UF_SORT" => "ASC"),
		"filter" => array()
	));

	while($arData = $rsData->Fetch()) {
		foreach ($arResult['PROPERTIES']['CONF_MODULE']['VALUE'] as $get_hb_el) {
			if ($get_hb_el == $arData['ID']) {
				$arResult['PROPERTIES']['CONF_MODULE']['PAR'][] = $arData;
			}
		}
	}

	for ($i = 0; $i < count($arResult['PROPERTIES']['CONF_MODULE']['PAR']); $i++) {
		for ($j = 0; $j < count($arResult['PROPERTIES']['CONF_MODULE']['PAR'][$i]["UF_IMAGE"]); $j++) {
			$arResult['PROPERTIES']['CONF_MODULE']['PAR'][$i]["UF_IMAGE"][$j] = CFile::GetPath($arResult['PROPERTIES']['CONF_MODULE']['PAR'][$i]["UF_IMAGE"][$j]);
		}
		for ($j = 0; $j < count($arResult['PROPERTIES']['CONF_MODULE']['PAR'][$i]["UF_IMAGE_BACK"]); $j++) {
			$arResult['PROPERTIES']['CONF_MODULE']['PAR'][$i]["UF_IMAGE_BACK"][$j] = CFile::GetPath($arResult['PROPERTIES']['CONF_MODULE']['PAR'][$i]["UF_IMAGE_BACK"][$j]);
		}
	}
}

// получение пакетов

if (\Bitrix\Main\Loader::includeModule('highloadblock')) {
	$hlblock_packs = HL\HighloadBlockTable::getById(8)->fetch();
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
	$hlblock_model = HL\HighloadBlockTable::getById(9)->fetch();
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