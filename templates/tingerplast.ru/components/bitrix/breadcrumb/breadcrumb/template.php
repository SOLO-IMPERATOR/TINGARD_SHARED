<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

global $APPLICATION;

if(empty($arResult)) {
	return '';
}

$strReturn = '';

$strReturn .= '<nav aria-label="breadcrumb">';
$strReturn .= '<ol class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">';

$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++) {
	$title = htmlspecialcharsex($arResult[$index]['TITLE']);

	if($arResult[$index]['LINK'] <> "" && $index != $itemSize-1)
	{
		$strReturn .= '
			<li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
				<a class="breadcrumb__link" href="'.$arResult[$index]['LINK'].'" title="'.$title.'" itemprop="item"><span itemprop="name">' . $title . '</span></a>
				<meta itemprop="position" content="' . ($index + 1) . '">
			</li>';
	} else {
		$strReturn .= '
			<li aria-current="page" class="breadcrumb__item breadcrumb__item_active"><span itemprop="name">' . $title . '</span></li>';
	}
}

$strReturn .= '</ol>';
$strReturn .= '</nav>';

return $strReturn;
