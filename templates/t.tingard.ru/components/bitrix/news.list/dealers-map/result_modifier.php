<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$cities = array();

foreach ($arResult['ITEMS'] as $item) {
	if (!empty($item['DISPLAY_PROPERTIES']['DM_CITY']['DISPLAY_VALUE'])) {
		array_push($cities, $item['DISPLAY_PROPERTIES']['DM_CITY']['DISPLAY_VALUE']);
	}
}

// Удаляем дубликаты
$cities = array_unique($cities);

// Функция сравнения, которая сначала сортирует кириллические символы, а затем латиницу
usort($cities, function ($a, $b) {
    // Определяем, начинается ли строка с кириллического символа
    $isCyrillicA = preg_match('/^[\p{Cyrillic}]/u', $a);
    $isCyrillicB = preg_match('/^[\p{Cyrillic}]/u', $b);

    if ($isCyrillicA && !$isCyrillicB) {
        return -1; // Кириллица должна быть выше в списке
    } elseif (!$isCyrillicA && $isCyrillicB) {
        return 1;  // Латиница должна быть ниже в списке
    } else {
        // Сравнение по алфавиту с учётом регистра
        return strcoll($a, $b);
    }
});

$arResult['CITY_ACTIVE'] = $cities;

unset($cities);