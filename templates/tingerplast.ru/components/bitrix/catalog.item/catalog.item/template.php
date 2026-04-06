<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/* global $USER;
if ($USER->IsAdmin()) {
echo '<pre>'; print_r($arResult['ITEM']); echo '</pre>';
} */




use \Bitrix\Main;

$this->setFrameMode(true);

?>

<div class="preview-product<?if($arParams['SELECTION_PRODUCTS'] === 'Y'):?> swiper-slide<?else:?> ajax-item<?endif?>" itemscope itemprop="itemListElement" itemtype="http://schema.org/Product">
	<meta itemprop="description" content="<?=$arResult['ITEM']['PREVIEW_TEXT']?>">
	<meta itemprop="name" content="<?=$arResult['ITEM']['NAME']?>">
	<!-- <meta itemprop="position" content="<?=$arResult['ITEM']['INDEX']?>"> -->
	<div class="preview-product__rating rating"<?if($arResult['ITEM']['PROPERTIES']['RATING']['VALUE'] <> 0):?> itemprop="aggregateRating" itemscope itemtype="https://schema.org/AggregateRating"<?endif?>>
		<div class="rating__inner">
			<?if($arResult['ITEM']['PROPERTIES']['RATING']['VALUE'] <> 0):?>
			<meta itemprop="bestRating" content="5">
			<meta itemprop="ratingValue" content="<?=$arResult['ITEM']['PROPERTIES']['RATING']['VALUE']?>">
			<meta itemprop="ratingCount" content="<?=$arResult['ITEM']['PROPERTIES']['RATING']['COUNT']?>">
			<?endif?>
			<div class="rating__overlay rating__overlay_value_<?=str_replace('.', '_', $arResult['ITEM']['PROPERTIES']['RATING']['ROUNDED_VALUE'])?>"></div>
		</div>
		<div class="rating__count">(<?=$arResult['ITEM']['PROPERTIES']['RATING']['COUNT']?>)</div>
	</div>
	<?if($arResult['ITEM']['PRODUCT']['QUANTITY'] > 0):?>
	<div class="preview-product__stock">в наличии</div>
	<?endif?>
	<div class="preview-product__img-container">
		<div class="preview-product__labels product-labels">
			<?if($arResult['ITEM']['ITEM_PRICES'][0]['PERCENT'] <> 0):?>
			<div class="product-labels__item product-labels__item_background_red">скидка <?=$arResult['ITEM']['ITEM_PRICES'][0]['PERCENT']?>%</div>
			<?endif?>
			<?if($arResult['ITEM']['PROPERTIES']['GREEN_LABEL']['VALUE'] <> null):?>
			<div class="product-labels__item product-labels__item_background_green"><?=$arResult['ITEM']['PROPERTIES']['GREEN_LABEL']['VALUE']?></div>
			<?endif?>
		</div>
		<a href="<?=$arResult['ITEM']['DETAIL_PAGE_URL']?>" title="<?=$arResult['ITEM']['NAME']?>" itemprop="url"><img class="preview-product__img" src="<?=$arResult['ITEM']['PREVIEW_PICTURE']['SRC']?>" alt="<?=$arResult['ITEM']['NAME']?>" itemprop="image"></a>
	</div>
	<div class="preview-product__name">
		<a class="preview-product__link" href="<?=$arResult['ITEM']['DETAIL_PAGE_URL']?>"><?=$arResult['ITEM']['NAME']?></a>
	</div>
	<div class="preview-product__chars-list">
		<?foreach($arResult['ITEM']['DISPLAY_PROPERTIES'] as $property):?>
		<?if($property['HINT'] !== 'HIDDEN' && $property['DESCRIPTION'] !== 'HIDDEN'):?>
		<div class="preview-product__chars-item">
			<div class="preview-product__chars-name"><?=$property['NAME']?></div>
			<div class="preview-product__chars-separator"></div>
			<div class="preview-product__chars-value"><?=$property['VALUE']?></div>
		</div>
		<?endif?>
		<?endforeach?>
		<?$cellarIds = [1486, 1487, 1491, 1688, 4717, 1488, 1492, 1708, 6252, 1489, 1490];
		if (in_array($arResult['ITEM']['ID'], $cellarIds)):?>
			<span class="preview-product__note">Указаны габаритные размеры погреба</span>
		<?endif?>
	</div>
	<div class="preview-product__offer" itemscope itemprop="offers" itemtype="http://schema.org/Offer">
		<meta itemprop="price" content="<?=$arResult['ITEM']['ITEM_PRICES'][0]['PRICE']?>">
		<meta itemprop="priceCurrency" content="RUB">
		<meta itemprop="availability" content="http://schema.org/InStock">
		<meta itemprop="priceValidUntil" content="<?=date('Y-m-d', strtotime('+365 day'))?>">
		<div class="preview-product__price-container">
			<?if($arResult['ITEM']['ITEM_PRICES'][0]['BASE_PRICE'] !== $arResult['ITEM']['ITEM_PRICES'][0]['PRICE']):?>
			<div class="preview-product__price-old"><?if($arResult['ITEM']['PROPERTIES']['PRICE_FROM']['VALUE'] === 'Y'):?>от <?endif?><?=$arResult['ITEM']['ITEM_PRICES'][0]['PRINT_BASE_PRICE']?></div>
			<?endif?>
			<div class="preview-product__price"><?if($arResult['ITEM']['PROPERTIES']['PRICE_FROM']['VALUE'] === 'Y'):?>от <?endif?><?=$arResult['ITEM']['ITEM_PRICES'][0]['PRINT_PRICE']?></div>
		</div>
		<div class="preview-product__actions">
			<!-- <button class="preview-product__cart-btn" type="button" title="Купить <?=$arResult['ITEM']['NAME']?>" data-action="modal" data-modal-type="default" data-modal-title="Купить «<?=$arResult['ITEM']['NAME']?>»" data-crm-title="Купить <?=$arResult['ITEM']['NAME']?>" data-crm-direction="<?=$arResult['ITEM']['PROPERTIES']['B24_SALES_DIRECTION']['VALUE']?>">
				<svg width="30" height="31" viewBox="0 0 30 31" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M2.5 7.51924H6.09418L11.1991 19.5029H21.4538L25 10.454H6.65761" stroke-width="2"></path>
					<circle cx="11.5625" cy="22.8779" r="1.1875"></circle>
					<circle cx="21.0625" cy="22.8779" r="1.1875"></circle>
				</svg>
			</button>
			<a class="preview-product__arrow" href="<?=$arResult['ITEM']['DETAIL_PAGE_URL']?>" title="Подробное описание">
				<svg width="30" height="31" viewBox="0 0 30 31" fill="none" xmlns="http://www.w3.org/2000/svg">
					<line x1="6.75" y1="15.2529" x2="23.75" y2="15.2529" stroke-width="2"></line>
					<path d="M17.2599 7.74307L24.7697 15.2529L17.2599 22.7628" stroke-width="2"></path>
				</svg>
			</a> -->
			<?/* global $USER;if ($USER->IsAdmin()): */?>
			<button class="btn btn btn_type_turquoise-green preview-product__cart-btn add-to-cart-btn" type="button" data-id="<?=$arResult['ITEM']['ID']?>" data-url="<?=$arResult['ITEM']['DETAIL_PAGE_URL']?>"<?if($arResult['ITEM']['PRODUCT']['AVAILABLE'] =="N"):?> disabled<?endif?>>В корзину<span class="tooltip tooltip_position_bottom"></span></button>
			<?/* endif */?>
		</div>
	</div>
</div>