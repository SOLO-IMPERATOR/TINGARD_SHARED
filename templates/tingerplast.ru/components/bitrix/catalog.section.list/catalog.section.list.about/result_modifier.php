<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$sectionLinc = array();
$arResult['ROOT'] = array();
$sectionLinc[0] = &$arResult['ROOT'];

foreach ($arResult['SECTIONS'] as $key => $arSection) {

	$sectionLinc[intval($arSection['IBLOCK_SECTION_ID'])]['SECTIONS'][$arSection['ID']] = $arSection;
	$sectionLinc[$arSection['ID']] = &$sectionLinc[intval($arSection['IBLOCK_SECTION_ID'])]['SECTIONS'][$arSection['ID']];
}

unset($sectionLinc);