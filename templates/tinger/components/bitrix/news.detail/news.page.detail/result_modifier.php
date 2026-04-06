<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$arUserResult = CUser::GetByID($arResult['PROPERTIES']['AUTHOR']['VALUE']); 
$arUser = $arUserResult->Fetch(); 

$arResult['PROPERTIES']['AUTHOR']['AUTHOR_NAME'] = $arUser['NAME'];
$arResult['PROPERTIES']['AUTHOR']['AUTHOR_LASTNAME'] = $arUser['LAST_NAME'];
$arResult['PROPERTIES']['AUTHOR']['AUTHOR_PHOTO'] = CFile::GetPath($arUser['PERSONAL_PHOTO']);