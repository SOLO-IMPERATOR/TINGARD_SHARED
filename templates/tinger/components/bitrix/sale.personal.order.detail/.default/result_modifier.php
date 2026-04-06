<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

//получение артикула
foreach ($arResult['BASKET'] as $key => $value) {
    $rs = CIBlockElement::GetByID($value['PRODUCT_XML_ID']);
    if ($rsElement = $rs->GetNextElement()) {
        $prop = $rsElement->GetProperty('CML2_ARTICLE');
        $arResult['BASKET'][$key]['CML2_ARTICLE'] = $prop['VALUE'];
    }
}