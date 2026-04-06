<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

foreach ($arResult['ITEMS'] as $key => $value) {
	if (isset($value['DETAIL_PICTURE']['SRC'])) {
		$arResult['ITEMS'][$key]['DETAIL_PICTURE']['WEBP_SRC_480_320'] = Pict::getResizedWebpSrc($value['DETAIL_PICTURE'], 480, 320, false);
		$arResult['ITEMS'][$key]['DETAIL_PICTURE']['WEBP_SRC_1920_1080'] = Pict::getResizedWebpSrc($value['DETAIL_PICTURE'], 1920, 1080, false);
	}
	
}