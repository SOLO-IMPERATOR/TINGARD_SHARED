<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

foreach ($arResult['ITEMS'] as $key => $value) {
	$arResult['ITEMS'][$key]['DETAIL_PICTURE']['WEBP_SRC_1280_720'] = Pict::getResizedWebpSrc($value['DETAIL_PICTURE'], 1280, 720, false);
	$arResult['ITEMS'][$key]['DETAIL_PICTURE']['WEBP_SRC_480_270'] = Pict::getResizedWebpSrc($value['DETAIL_PICTURE'], 480, 270, false);
}