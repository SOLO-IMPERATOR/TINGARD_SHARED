<?if(!defined('B_PROLOG_INCLUDED')||B_PROLOG_INCLUDED!==true) die();
$this->__component->SetResultCacheKeys(array('CACHED_TPL'));

$arSelect = Array(
	'ID',
	'PROPERTY_FILE'
);

$arFilter = Array(
	'IBLOCK_ID' => $arResult['DISPLAY_PROPERTIES']['DOCS']['LINK_IBLOCK_ID'],
	'ID' => $arResult['DISPLAY_PROPERTIES']['FILE']['VALUE'],
	'ACTIVE_DATE' => 'Y',
	'ACTIVE' => 'Y',
);

$res = CIBlockElement::GetList(
	Array(),
	$arFilter,
	false,
	Array(
		'nPageSize' => 50
	),
	$arSelect
);

while ($ob = $res->GetNextElement()) {
	$docsItemsArr[] = $ob->GetFields();
}

foreach ($arResult['DISPLAY_PROPERTIES']['DOCS']['LINK_ELEMENT_VALUE'] as $item => $value) {
	foreach($docsItemsArr as $docsItem) {
		if($docsItem['ID'] === $value['ID']) {
			$arResult['DISPLAY_PROPERTIES']['DOCS']['LINK_ELEMENT_VALUE'][$item]['SRC'] = CFile::GetPath($docsItem['PROPERTY_FILE_VALUE']);
		}
	}
}

$resultRating = CIBlockElement::GetList(
	false,
	Array('IBLOCK_ID' => 46, 'ACTIVE' => 'Y', '=PROPERTY_PRODUCT' => $arResult['ID']),
	array('ID', 'PROPERTY_RATING'),
);
					
while ($rating = $resultRating->Fetch()) {
	$arResult['PROPERTIES']['RATING']['ITEMS'][] = $rating;
	$arResult['PROPERTIES']['RATING']['VALUE'] += $rating['PROPERTY_RATING_VALUE'];
}

if (is_countable($arResult['PROPERTIES']['RATING']['ITEMS'])) {
	$arResult['PROPERTIES']['RATING']['COUNT'] = count($arResult['PROPERTIES']['RATING']['ITEMS']);
	$arResult['PROPERTIES']['RATING']['VALUE'] = $arResult['PROPERTIES']['RATING']['VALUE'] / $arResult['PROPERTIES']['RATING']['COUNT'];
	$arResult['PROPERTIES']['RATING']['ROUNDED_VALUE'] = ceil($arResult['PROPERTIES']['RATING']['VALUE'] / 0.5) * 0.5;
} else {
	$arResult['PROPERTIES']['RATING']['COUNT'] = 0;
	$arResult['PROPERTIES']['RATING']['VALUE'] = 0;
	$arResult['PROPERTIES']['RATING']['ROUNDED_VALUE'] = 0;
}