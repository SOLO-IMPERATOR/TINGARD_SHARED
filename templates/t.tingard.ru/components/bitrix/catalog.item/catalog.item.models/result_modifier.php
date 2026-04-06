<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$arResult['ITEM']['DISPLAY_PROPERTIES']['LENGTH']['VALUE'] = number_format((int)$arResult['ITEM']['DISPLAY_PROPERTIES']['LENGTH']['VALUE'] / 1000, 1, ',', '');
$arResult['ITEM']['DISPLAY_PROPERTIES']['WIDTH']['VALUE'] = number_format((int)$arResult['ITEM']['DISPLAY_PROPERTIES']['WIDTH']['VALUE'] / 1000, 1, ',', '');
$arResult['ITEM']['DISPLAY_PROPERTIES']['HEIGHT']['VALUE'] = number_format((int)$arResult['ITEM']['DISPLAY_PROPERTIES']['HEIGHT']['VALUE'] / 1000, 1, ',', '');
$arResult['ITEM']['ITEM_PRICES'][0]['PRICE'] = number_format((int)$arResult['ITEM']['ITEM_PRICES'][0]['PRICE'], 0, '', ' ');