<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/* echo '<pre>'; print_r($arResult['ITEMS']); echo '</pre>'; */
/* foreach($arResult as $key => $value) {
    $file = CFile::GetFileArray($value);
    if(str_contains($file['CONTENT_TYPE'], 'image')) {
        $arResult['ITEMS'][$key]['PROPERTIES']['GALLERY']['COMPRESSED'][$key]['SRC'] = Pict::getResizedWebpSrc($file, 300, 300, false);
    }
} */

foreach ($arResult['ITEMS'] as $i => $item) {
    foreach($item['PROPERTIES']['GALLERY']['VALUE'] as $key => $value) {
        $galleryFile = CFile::GetFileArray($value);
        if(str_contains($galleryFile['CONTENT_TYPE'], 'image')) {
            $arResult['ITEMS'][$i]['DISPLAY_PROPERTIES']['GALLERY']['WEBP'][$key]['SMALL'] = Pict::getResizedWebpSrc($galleryFile, 300, 300, true);
            $arResult['ITEMS'][$i]['DISPLAY_PROPERTIES']['GALLERY']['WEBP'][$key]['BIG'] = Pict::getResizedWebpSrc($galleryFile, 1000, 1000, true);
        }
    }
}