<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$cities = array();

foreach ($arResult['ITEMS'] as $item) {
	if($item['PROPERTIES']['EXPORT']['VALUE'] == 'Y') {
		if (!empty($item['DISPLAY_PROPERTIES']['DM_CITY']['DISPLAY_VALUE'])) {
			array_push($cities, $item['DISPLAY_PROPERTIES']['DM_CITY']['DISPLAY_VALUE']);
		}
	}
}

$arResult['CITY_ACTIVE'] = array_unique($cities);

unset($cities);