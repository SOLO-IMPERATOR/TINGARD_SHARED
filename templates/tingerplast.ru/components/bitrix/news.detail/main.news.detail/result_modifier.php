<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$arUserResult = CUser::GetByID($arResult['PROPERTIES']['AUTHOR']['VALUE']); 
$arUser = $arUserResult->Fetch(); 

$arResult['PROPERTIES']['AUTHOR']['AUTHOR_NAME'] = $arUser['NAME'];
$arResult['PROPERTIES']['AUTHOR']['AUTHOR_LASTNAME'] = $arUser['LAST_NAME'];
$arResult['PROPERTIES']['AUTHOR']['AUTHOR_PHOTO'] = CFile::GetPath($arUser['PERSONAL_PHOTO']);

$arResult['DETAIL_PICTURE']['WEBP_SRC_1280_720'] = Pict::getResizedWebpSrc($arResult['DETAIL_PICTURE'], 1280, 720, true);
$arResult['DETAIL_PICTURE']['WEBP_SRC_480_270'] = Pict::getResizedWebpSrc($arResult['DETAIL_PICTURE'], 480, 270, true);