<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

// рейтинг
$resultRating = CIBlockElement::GetList(
	false,
	Array('IBLOCK_ID' => 46, 'ACTIVE' => 'Y', '=PROPERTY_PRODUCT' => $arResult['ITEM']['ID']),
	array('ID', 'PROPERTY_RATING'),
);
					
while ($rating = $resultRating->Fetch()) {
	$arResult['ITEM']['PROPERTIES']['RATING']['ITEMS'][] = $rating;
	$arResult['ITEM']['PROPERTIES']['RATING']['VALUE'] += $rating['PROPERTY_RATING_VALUE'];
}

if (is_countable($arResult['ITEM']['PROPERTIES']['RATING']['ITEMS'])) {
	$arResult['ITEM']['PROPERTIES']['RATING']['COUNT'] = count($arResult['ITEM']['PROPERTIES']['RATING']['ITEMS']);
	$arResult['ITEM']['PROPERTIES']['RATING']['VALUE'] = $arResult['ITEM']['PROPERTIES']['RATING']['VALUE'] / $arResult['ITEM']['PROPERTIES']['RATING']['COUNT'];
	$arResult['ITEM']['PROPERTIES']['RATING']['ROUNDED_VALUE'] = ceil($arResult['ITEM']['PROPERTIES']['RATING']['VALUE'] / 0.5) * 0.5;
} else {
	$arResult['ITEM']['PROPERTIES']['RATING']['COUNT'] = 0;
	$arResult['ITEM']['PROPERTIES']['RATING']['VALUE'] = 0;
	$arResult['ITEM']['PROPERTIES']['RATING']['ROUNDED_VALUE'] = 0;
}


// текст для анонса
$previewText;

if (strlen($arResult['ITEM']['DETAIL_TEXT']) > 300) {
	$previewText = strip_tags($arResult['ITEM']['DETAIL_TEXT']);
	$previewText = substr($previewText, 0, 300);
	$previewText = rtrim($previewText, '!,.-—"');
	$previewText = rtrim($previewText, '!,.-—"');
	$previewText = rtrim($previewText, '!,.-—"');
	$previewText = substr($previewText, 0, strrpos($previewText, ' '));
	$previewText = $previewText . '...';

} else {
	$previewText = $arResult['DETAIL_TEXT'];
}

$arResult['ITEM']['PREVIEW_TEXT'] = $previewText;

unset($previewText);
