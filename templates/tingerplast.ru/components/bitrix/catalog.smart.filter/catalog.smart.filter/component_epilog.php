<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if(str_contains($APPLICATION->GetCurPage(), '/filter/')) {
    $APPLICATION->SetPageProperty('canonical', strstr($APPLICATION->GetCurPage(), 'filter/', true));
}