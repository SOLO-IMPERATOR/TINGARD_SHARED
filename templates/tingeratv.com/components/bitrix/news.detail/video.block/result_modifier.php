<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

if (isset($arResult['DETAIL_PICTURE']['SRC'])) {
	$arResult['DETAIL_PICTURE']['PREVIEW_WEBP_SRC_1920_720'] = Pict::getResizedWebpSrc($arResult['DETAIL_PICTURE'], 1920, 720, false);
	$arResult['DETAIL_PICTURE']['PREVIEW_WEBP_SRC_1280_720'] = Pict::getResizedWebpSrc($arResult['DETAIL_PICTURE'], 1280, 720, false);
	$arResult['DETAIL_PICTURE']['PREVIEW_WEBP_SRC_768_432'] = Pict::getResizedWebpSrc($arResult['DETAIL_PICTURE'], 768, 432, false);
	$arResult['DETAIL_PICTURE']['PREVIEW_WEBP_SRC_480_270'] = Pict::getResizedWebpSrc($arResult['DETAIL_PICTURE'], 480, 270, false);
}