<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$arResult['INTRO_SLIDES'] = [];

$desktopGallery = $arResult['PROPERTIES']['INTRO_GALLERY']['VALUE'] ?? [];
$mobileGallery  = $arResult['PROPERTIES']['INTRO_GALLERY_MOBILE']['VALUE'] ?? [];

foreach ($desktopGallery as $key => $desktopId) {
    $desktopFile = CFile::GetFileArray($desktopId);
    $mobileId    = $mobileGallery[$key] ?? null;
    $mobileFile  = $mobileId ? CFile::GetFileArray($mobileId) : null;

    $arResult['INTRO_SLIDES'][$key] = [
        'DESKTOP' => $desktopFile ? Pict::getResizedWebpSrc($desktopFile, 1920, 900, true) : null,
        'MOBILE'  => $mobileFile  ? Pict::getResizedWebpSrc($mobileFile, 1080, 1575, true)   : null,
    ];
}
