<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

global $USER;

if ($USER->IsAdmin()) {
	//echo '<pre>'; print_r($arResult); echo '</pre>';
}

//delayed function must return a string
if(empty($arResult))
	return '';

$strReturn = '';

//we can't use $APPLICATION->SetAdditionalCSS() here because we are inside the buffered function GetNavChain()
// $css = $APPLICATION->GetCSSArray();

$strReturn .= '<ol class="breadcrumb margin_b_m" itemscope itemtype="https://schema.org/BreadcrumbList">';

$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++) {

	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	$arrow = ($index > 0? ' / ' : '');

	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1) {
		$strReturn .= '<li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a class="breadcrumb__link" href="'.$arResult[$index]["LINK"].'" itemprop="item" title="' . $title . '"><span itemprop="name">' . $title . '</span><meta itemprop="position" content="' . $index . '"></a></li>';
	} else {
		$strReturn .= '<li class="breadcrumb__item" itemscope itemprop="itemListElement" itemtype="http://schema.org/ListItem">' . $title . '<meta itemprop="name" content="' . $title . '"><link itemprop="item" href="' . $APPLICATION->GetCurPage() . '"><meta itemprop="position" content="' . $index . '"></li>';
	}
}

$strReturn .= '</ol>';

return $strReturn;