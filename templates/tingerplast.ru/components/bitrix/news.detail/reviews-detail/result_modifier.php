<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

foreach($arResult['PROPERTIES']['GALLERY']['VALUE'] as $key => $value) {
    $galleryFile = CFile::GetFileArray($value);
    if(str_contains($galleryFile['CONTENT_TYPE'], 'image')) {
        $arResult['DISPLAY_PROPERTIES']['GALLERY']['WEBP'][$key]['SMALL'] = Pict::getResizedWebpSrc($galleryFile, 300, 300, true);
        $arResult['DISPLAY_PROPERTIES']['GALLERY']['WEBP'][$key]['BIG'] = Pict::getResizedWebpSrc($galleryFile, 1000, 1000, true);
    }
}