<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

foreach ($arResult['ITEMS'] as $key => $value) {
	if (isset($value['DETAIL_PICTURE']['SRC'])) {
		$arResult['ITEMS'][$key]['DETAIL_PICTURE']['PREVIEW_WEBP_SRC_50_50'] = Pict::getResizedWebpSrc($value['DETAIL_PICTURE'], 50, 50, false);
	}
	
}

