<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/* global $USER; if ($USER->IsAdmin()) {
    echo '<pre>'; print_r($arResult['ITEMS']); echo '</pre>';
} */

foreach ($arResult['ITEMS'] as $key => $value) {
    if(isset($value['DETAIL_PICTURE']['SRC']) && $value['DETAIL_PICTURE']['CONTENT_TYPE'] !== 'image/webp') {
        $arResult['ITEMS'][$key]['DETAIL_PICTURE']['SRC'] = Pict::getResizedWebpSrc($value['DETAIL_PICTURE'], 768, 432, false);
    }    
}