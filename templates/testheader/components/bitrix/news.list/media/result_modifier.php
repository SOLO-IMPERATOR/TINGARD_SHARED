<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

foreach ($arResult['ITEMS'] as $key => $value) {
    $arResult['ITEMS'][$key]['PREVIEW_PICTURE']['WEBP'] = Pict::getResizedWebpSrc($value['PREVIEW_PICTURE'], 625, 352, false);
}