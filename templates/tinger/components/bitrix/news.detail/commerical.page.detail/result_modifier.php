<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$res = CIBlockElement::GetProperty($arResult['PROPERTIES']['MODELS']['LINK_IBLOCK_ID'], $arResult['PROPERTIES']['MODEL_CHARS']['VALUE'], array('sort' => 'asc'), array());

while ($ob = $res->GetNext()) {
    $arResult['DISPLAY_PROPERTIES']['MODEL_PROPERTIES'][$ob['CODE']] = $ob;
}