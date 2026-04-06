<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/* echo '<pre>'; print_r($arResult['ITEM']); echo '</pre>'; */

use \Bitrix\Main;

$this->setFrameMode(true);

?>

<div class="additional-equipment__item swiper-slide" itemscope itemprop="itemListElement" itemtype="http://schema.org/Product">
	<meta itemprop="description" content="<?=$arResult['ITEM']['PREVIEW_TEXT']?>">
	<meta itemprop="name" content="<?=$arResult['ITEM']['NAME']?>">
	<?if($arResult['ITEM']['PROPERTIES']['RATING']['VALUE'] <> 0):?>
		<meta itemprop="bestRating" content="5">
		<meta itemprop="ratingValue" content="<?=$arResult['ITEM']['PROPERTIES']['RATING']['VALUE']?>">
		<meta itemprop="ratingCount" content="<?=$arResult['ITEM']['PROPERTIES']['RATING']['COUNT']?>">
	<?endif?>
	<div class="additional-equipment__img-container">
		<div class="additional-equipment__labels product-labels">
			<?if($arResult['ITEM']['ITEM_PRICES'][0]['PERCENT'] <> 0):?>
			<div class="product-labels__item product-labels__item_background_red">скидка <?=$arResult['ITEM']['ITEM_PRICES'][0]['PERCENT']?>%</div>
			<?endif?>
			<?if($arResult['ITEM']['PROPERTIES']['GREEN_LABEL']['VALUE'] <> null):?>
			<div class="product-labels__item product-labels__item_background_yellow"><?=$arResult['ITEM']['PROPERTIES']['GREEN_LABEL']['VALUE']?></div>
			<?endif?>
		</div>
		<img class="additional-equipment__img" src="<?=$arResult['ITEM']['PREVIEW_PICTURE']['SRC']?>" alt="<?=$arResult['ITEM']['NAME']?>" itemprop="image">
	</div>

	<h3 class="additional-equipment__name"><?=$arResult['ITEM']['NAME']?></h3>
	<div class="additional-equipment__desc"><?=$arResult['ITEM']['PREVIEW_TEXT']?></div>
	<div class="additional-equipment__price-container" itemscope itemprop="offers" itemtype="http://schema.org/Offer">
		<meta itemprop="price" content="<?=$arResult['ITEM']['ITEM_PRICES'][0]['PRICE']?>">
		<meta itemprop="priceCurrency" content="RUB">
		<meta itemprop="availability" content="http://schema.org/InStock">
		<meta itemprop="priceValidUntil" content="<?=date('Y-m-d', strtotime('+365 day'))?>">
		<?if($arResult['ITEM']['ITEM_PRICES'][0]['BASE_PRICE'] !== $arResult['ITEM']['ITEM_PRICES'][0]['PRICE']):?>
		<div class="additional-equipment__price-old"><?if($arResult['ITEM']['PROPERTIES']['PRICE_FROM']['VALUE'] === 'Y'):?>от <?endif?><?=$arResult['ITEM']['ITEM_PRICES'][0]['PRINT_BASE_PRICE']?></div>
		<?endif?>
		<div class="additional-equipment__price"><?if($arResult['ITEM']['PROPERTIES']['PRICE_FROM']['VALUE'] === 'Y'):?>от <?endif?><?=$arResult['ITEM']['ITEM_PRICES'][0]['PRINT_PRICE']?></div>
	</div>
	<div class="additional-equipment__btn-container">
		<button class="btn btn_color_yellow" type="button" onclick="openModal('default', {'crm-entity': 'lead', 'crm-title': 'Заказать «<?=$arResult['ITEM']['NAME']?>»'})">Заказать</button>
	</div>
</div>