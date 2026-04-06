<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();



$result = CIBlockElement::GetElementGroups($arResult['ID'], false, ['IBLOCK_SECTION_ID', 'ID', 'NAME']);
$i = 0;

while ($item = $result->Fetch()) {
    
    $arResult['SECTIONS'][$i]['SECTION_NAME'] = CIBlockSection::GetByID($item['IBLOCK_SECTION_ID'])->GetNext()['NAME'];
    $arResult['SECTIONS'][$i]['SUBSECTION_NAME'] = $item['NAME'];
    $arResult['SECTIONS'][$i]['SECTION_PAGE_URL'] = CIBlockSection::GetByID($item['ID'])->GetNext()['SECTION_PAGE_URL'];

    $i++;
}

foreach($arResult['DISPLAY_PROPERTIES']['AMOUNT']['VALUE'] as $key => $item) {
    $arResult['DISPLAY_PROPERTIES']['AMOUNT']['VALUE'][$key] = CIBlockSection::GetByID($item)->GetNext()['NAME'] . ' — '. $arResult['DISPLAY_PROPERTIES']['AMOUNT']['DESCRIPTION'][$key] . ' шт.';
/*     print_r(CIBlockSection::GetByID($item)->GetNext()['NAME']); */
}

/* echo '<pre>'; print_r($arResult); echo '</pre>'; */