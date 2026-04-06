<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

foreach($arResult['ITEMS'] as $arItemKey => $arItem) {
	$arResult['ITEMS'][$arItemKey]['DISPLAY_PROPERTIES']['PRICE']['VALUE'] = number_format(intval(CPrice::GetBasePrice($arItem['ID'])['PRICE']), 0, ',', ' ');
}