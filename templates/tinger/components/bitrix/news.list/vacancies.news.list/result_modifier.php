<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

foreach ($arResult['ITEMS'] as $key => $value) {
    if (isset($value['DETAIL_PICTURE']['SRC'])) {
        $arResult['ITEMS'][$key]['DETAIL_PICTURE']['PREVIEW_WEBP_SRC_250_250'] = Pict::getResizedWebpSrc($value['DETAIL_PICTURE'], 250, 250, false);
        $arResult['ITEMS'][$key]['DETAIL_PICTURE']['PREVIEW_WEBP_SRC_768_432'] = Pict::getResizedWebpSrc($value['DETAIL_PICTURE'], 768, 432, false);
        $arResult['ITEMS'][$key]['DETAIL_PICTURE']['PREVIEW_WEBP_SRC_480_270'] = Pict::getResizedWebpSrc($value['DETAIL_PICTURE'], 480, 270, false);
    }
    
}

