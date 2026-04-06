<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/* \Bitrix\Main\Loader::includeModule('sale');
\Bitrix\Main\Loader::includeModule('catalog');

$basket = \Bitrix\Sale\Basket::LoadItemsForFUser(
	\Bitrix\Sale\Fuser::getId(),
	SITE_ID
); */

/* echo '<pre>'; print_r($arResult); echo '</pre>'; */

use \Bitrix\Main;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogProductsViewedComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 * @var string $templateFolder
 */

$this->setFrameMode(true);?>

<div class="parts-category__item" itemscope itemprop="itemListElement" itemtype="http://schema.org/Product">
	<div class="parts-category__item-number"><?=isset($arResult['ITEM']['SORT']) ? $arResult['ITEM']['SORT'] : '-'?></div>
	<div class="parts-category__item-img-container">
		<img class="parts-category__item-img" src="<?=$arResult['ITEM']['PREVIEW_PICTURE']['SRC']?>" alt="<?=$arResult['ITEM']['NAME']?>" itemprop="image">
	</div>
	<div class="parts-category__item-sku" itemprop="model"><?=$arResult['ITEM']['DISPLAY_PROPERTIES']['CML2_ARTICLE']['VALUE']?></div>
	<div class="parts-category__item-name">
		<a class="parts-category__item-link" href="<?=$arResult['ITEM']['DETAIL_PAGE_URL']?>" itemprop="url">
			<?if(($arResult['ITEM']['PROPERTIES']['PRODUCTION_POSITION_LONG']['VALUE'] == "Y") && ($arResult['ITEM']['PRODUCT']['AVAILABLE'] == 'Y')):?>
				<span class="parts-category__item-availability parts-category__item-availability_status_long-waiting"><span class="tooltip tooltip_position_top">изготовим в течение 14-28 дней</span></span>
			<?elseif(($arResult['ITEM']['PROPERTIES']['PRODUCTION_POSITION']['VALUE'] == "Y") && ($arResult['ITEM']['PRODUCT']['AVAILABLE'] == 'Y')):?>
				<span class="parts-category__item-availability parts-category__item-availability_status_waiting"><span class="tooltip tooltip_position_top">изготовим в течение 7-14 дней</span></span>
			<?elseif($arResult['ITEM']['PRODUCT']['AVAILABLE'] == 'N'):?>
				<span class="parts-category__item-availability parts-category__item-availability_status_not-available"><span class="tooltip tooltip_position_top">нет в наличии</span></span>
			<?else:?>
				<span class="parts-category__item-availability parts-category__item-availability_status_available"><span class="tooltip tooltip_position_top">в наличии</span></span>
			<?endif?>
			<span itemprop="name"><?=$arResult['ITEM']['NAME']?></span>
			<meta itemprop="description" content="<?=$arResult['ITEM']['PREVIEW_TEXT']?>">
		</a>
	</div>
	<div class="parts-category__item-price" itemscope itemprop="offers" itemtype="http://schema.org/Offer">
		<?if($arResult['ITEM']['DISPLAY_PROPERTIES']['PRICE']['VALUE']):?>
		<meta itemprop="price" content="<?=$arResult['ITEM']['DISPLAY_PROPERTIES']['PRICE']['VALUE']?>">
		<meta itemprop="priceCurrency" content="USD">
		<?endif?>
		<?if(($arResult['ITEM']['PROPERTIES']['PRODUCTION_POSITION']['VALUE'] == "Y") && ($arResult['ITEM']['PRODUCT']['AVAILABLE'] == 'Y')):?>
			<link itemprop="availability" href="http://schema.org/BackOrder">
		<?elseif($arResult['ITEM']['PRODUCT']['AVAILABLE'] == 'N'):?>
			<link itemprop="availability" href="http://schema.org/OutOfStock">
		<?else:?>
			<link itemprop="availability" href="http://schema.org/InStock">
		<?endif?>
		<meta itemprop="priceValidUntil" content="<?=ConvertDateTime($arResult['ITEM']['TIMESTAMP_X'], 'YYYY-MM-DD', 'ru')?>">
		<?if($arResult['ITEM']['DISPLAY_PROPERTIES']['PRICE']['VALUE']):?>$<?endif?><?=$arResult['ITEM']['DISPLAY_PROPERTIES']['PRICE']['VALUE']?>
	</div>
</div>