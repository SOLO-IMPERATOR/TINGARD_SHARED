<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/*global $USER;
if ($USER->IsAdmin()) {
	echo '<pre>'; print_r($arResult); echo '</pre>';
}*/

ob_start();
$this->setFrameMode(true);
?>

<section class="catalog-detail section section_padding-bottom_small" itemscope itemtype="http://schema.org/Product">
	<div class="catalog-detail__head">
		<div class="catalog-detail__img-container">

			<h1 class="page-title page-title_margin_bottom"><?=$arResult['META_TAGS']['TITLE']?></h1>
			<meta itemprop="name" content="<?=$arResult['META_TAGS']['TITLE']?>">
			<?if($arResult['DISPLAY_PROPERTIES']['GALLERY'] && $arResult['DETAIL_PICTURE']['SRC']):?>
			<div class="catalog-detail__slider swiper">
				<div class="swiper-wrapper">
					<div class="catalog-detail__img-container swiper-slide">
						<a class="glightbox" href="<?=$arResult['DETAIL_PICTURE']['SRC']?>" alt="<?=$arResult['NAME']?>" data-alt="<?=$arResult['NAME']?>">
							<img class="catalog-detail__img" src="<?=CFile::ResizeImageGet($arResult['DETAIL_PICTURE']['ID'], array('width' => '768', 'height' => '432'), BX_RESIZE_IMAGE_PROPORTIONAL)['src']?>" alt="<?=$arResult['NAME']?>" itemprop="image">
						</a>
					</div>
					<?foreach($arResult['DISPLAY_PROPERTIES']['GALLERY']['FILE_VALUE'] as $img):?>
					<div class="catalog-detail__img-container swiper-slide">
						<a class="glightbox" href="<?=$img['SRC']?>" alt="<?=$arResult['NAME']?>" data-alt="<?=$arResult['NAME']?>">
							<img class="catalog-detail__img" src="<?=CFile::ResizeImageGet($img['ID'], array('width' => '768', 'height' => '432'), BX_RESIZE_IMAGE_PROPORTIONAL)['src']?>" alt="<?=$arResult['NAME']?>">
						</a>
					</div>
					<?endforeach?>
				</div>
			</div>
			
			<div class="catalog-detail__thumbs-slider swiper">
				<div class="swiper-wrapper">
					<div class="catalog-detail__thumbs-slider-item swiper-slide">
						<img class="catalog-detail__thumbs-slider-img" src="<?=CFile::ResizeImageGet($arResult['DETAIL_PICTURE']['ID'], array('width' => '150', 'height' => '150'), BX_RESIZE_IMAGE_PROPORTIONAL)['src']?>" alt="<?=$arResult['NAME']?>">
					</div>
					<?foreach($arResult['DISPLAY_PROPERTIES']['GALLERY']['FILE_VALUE'] as $img):?>
					<div class="catalog-detail__thumbs-slider-item swiper-slide">
						<img class="catalog-detail__thumbs-slider-img" src="<?=CFile::ResizeImageGet($img['ID'], array('width' => '150', 'height' => '150'), BX_RESIZE_IMAGE_PROPORTIONAL)['src']?>" alt="<?=$arResult['NAME']?>">
					</div>
					<?endforeach?>
				</div>
			</div>

			<div class="catalog-detail__bar">
				<div class="catalog-detail__thumbs-swiper-arrows arrows">
					<button class="arrows__btn arrows__btn_direction_prev">Назад</button>
					<button class="arrows__btn arrows__btn_direction_next">Вперёд</button>
				</div>
				<?if(isset($arResult['DISPLAY_PROPERTIES']['REVIEW_LINK']['VALUE'])):?>
				<div class="catalog-detail__review-btn-container">
					<a class="btn btn_type_default glightbox" href="<?=$arResult['DISPLAY_PROPERTIES']['REVIEW_LINK']['VALUE']?>">Видеообзор</a>
				</div>
				<?endif?>
			</div>
			<?elseif($arResult['DETAIL_PICTURE']['SRC']):?>
			<div class="catalog-detail__img-container">
				<a class="glightbox" href="<?=$arResult['DETAIL_PICTURE']['SRC']?>" alt="<?=$arResult['NAME']?>" data-alt="<?=$arResult['NAME']?>">
					<img class="catalog-detail__img" src="<?=CFile::ResizeImageGet($arResult['DETAIL_PICTURE']['ID'], array('width' => '768', 'height' => '432'), BX_RESIZE_IMAGE_PROPORTIONAL)['src']?>" alt="<?=$arResult['NAME']?>" itemprop="image">
				</a>
			</div>
			<?else:?>
			<?endif?>
		</div>
		<div class="catalog-detail__info">

			<div class="catalog-detail__buy">
				<div class="catalog-detail__rating rating"<?if($arResult['PROPERTIES']['RATING']['VALUE'] <> 0):?> itemprop="aggregateRating" itemscope itemtype="https://schema.org/AggregateRating"<?endif?>>
					<div class="rating__inner">
						<?if($arResult['PROPERTIES']['RATING']['VALUE'] <> 0):?>
						<meta itemprop="bestRating" content="5">
						<meta itemprop="ratingValue" content="<?=$arResult['PROPERTIES']['RATING']['VALUE']?>">
						<meta itemprop="ratingCount" content="<?=$arResult['PROPERTIES']['RATING']['COUNT']?>">
						<?endif?>
						<div class="rating__overlay rating__overlay_value_<?=str_replace('.', '_', $arResult['PROPERTIES']['RATING']['ROUNDED_VALUE'])?>"></div>
					</div>
					<div class="rating__count">(<?=$arResult['PROPERTIES']['RATING']['COUNT']?>)</div>
				</div>
				<?if($arResult['PRODUCT']['QUANTITY'] > 0):?>
					<div class="catalog-detail__stock">в наличии</div>
				<?endif?>

				<div class="catalog-detail__buy-container" itemprop="offers" itemscope itemtype="http://schema.org/Offer">

					<meta itemprop="price" content="<?=$arResult['ITEM_PRICES'][0]['PRICE']?>">
					<meta itemprop="priceCurrency" content="RUB">
					<link itemprop="availability" href="http://schema.org/InStock">
					<meta itemprop="priceValidUntil" content="<?=date('Y-m-d', strtotime('+365 day'))?>">
					<?if($arResult['ITEM_PRICES'][0]['PERCENT'] <> 0 || $arResult['PROPERTIES']['GREEN_LABEL']['VALUE'] <> null):?>
					<div class="catalog-detail__labels product-labels">
						<?if($arResult['ITEM_PRICES'][0]['PERCENT'] <> 0):?>
						<div class="product-labels__item product-labels__item_background_red">скидка <?=$arResult['ITEM_PRICES'][0]['PERCENT']?>%</div>
						<?endif?>
						<?if($arResult['PROPERTIES']['GREEN_LABEL']['VALUE'] <> null):?>
						<div class="product-labels__item product-labels__item_background_green"><?=$arResult['PROPERTIES']['GREEN_LABEL']['VALUE']?></div>
						<?endif?>
					</div>
					<?endif?>

					<div class="catalog__price-container">
						<?if($arResult['ITEM_PRICES'][0]['BASE_PRICE'] !== $arResult['ITEM_PRICES'][0]['PRICE']):?>
						<div class="catalog__price-old"><?if($arResult['PROPERTIES']['PRICE_FROM']['VALUE'] === 'Y'):?>от <?endif?><?=$arResult['ITEM_PRICES'][0]['PRINT_BASE_PRICE']?></div>
						<?endif?>
						<div class="catalog__price page-title"><?if($arResult['PROPERTIES']['PRICE_FROM']['VALUE'] === 'Y'):?>от <?endif?><?=$arResult['ITEM_PRICES'][0]['PRINT_PRICE']?></div>
					</div>
					<div class="catalog-detail__btn-container">
					<button class="catalog-detail__cart-btn btn btn_type_turquoise-green" type="button" data-id="<?=$arResult['ID']?>"<?if($arResult['PRODUCT']['AVAILABLE'] == "N"):?> disabled<?endif?>">Добавить в корзину<span class="tooltip tooltip_position_top"></span></button>
						<button class="catalog-detail__btn btn btn_type_default" type="button" data-action="modal" data-modal-type="default" data-modal-title="Купить в 1 клик «<?=$arResult['NAME']?>»" data-crm-title="Купить в 1 клик <?=$arResult['NAME']?>" data-crm-direction="<?=$arResult['PROPERTIES']['B24_SALES_DIRECTION']['VALUE']?>">Купить в 1 клик</button>
					</div>
				</div>
			</div>

			<?$mainBlockProperties = array_intersect_key($arResult['DISPLAY_PROPERTIES'], array_flip($arParams['MAIN_BLOCK_PROPERTY_CODE']));?>
			<?if(count($mainBlockProperties) > 0):?>
			<div class="catalog-detail__chars">
				<div class="section-title section-title_margin_bottom">Характеристики</div>
				<ul class="catalog-detail__chars-list">
					<?foreach ($mainBlockProperties as $property):?>
					<li class="catalog-detail__chars-item">
						<div class="catalog-detail__chars-name"><?=$property['NAME']?></div>
						<div class="catalog-detail__chars-separator"></div>
						<div class="catalog-detail__chars-value"><?=$property['VALUE']?></div>
					</li>
					<?endforeach?>
				</ul>
				<?$cellarIds = [1486, 1487, 1491, 1688, 4717, 1488, 1492, 1708, 6252, 1489, 1490];
				if (in_array($arResult['ID'], $cellarIds)):?>
					<span class="catalog-detail__note">Указаны габаритные размеры погреба</span>
				<?endif?>
			</div>
			<?endif?>
			<?unset($mainBlockProperties);?>
		</div>
	</div>



	<div class="catalog-detail__tabs tabs text">
		<div class="tabs__head-container">
			<div class="tabs__head">
				<?if($arResult['DETAIL_TEXT']):?>
				<div class="tabs__caption" data-tab="description">Описание</div>
				<?endif?>
				<?if($arResult['DISPLAY_PROPERTIES']['EQUIPMENT']):?>
				<div class="tabs__caption" data-tab="equipment">Комплектация</div>
				<?endif?>
				<?if($arResult['DISPLAY_PROPERTIES']['DELIVERY']):?>
				<div class="tabs__caption" data-tab="delivery">Доставка</div>
				<?endif?>
				<?if($arResult['DISPLAY_PROPERTIES']['MOUNTING']):?>
				<div class="tabs__caption" data-tab="mounting">Монтаж</div>
				<?endif?>
				<div class="tabs__caption" data-tab="docs">Документы <?if(is_countable($arResult['PROPERTIES']['DOCS']['VALUE'])):?>(<?=count($arResult['PROPERTIES']['DOCS']['VALUE'])?>)<?endif?></div>
				<div class="tabs__caption" data-tab="reviews">Отзывы <?if($arResult['PROPERTIES']['RATING']['COUNT'] <> 0):?>(<?=$arResult['PROPERTIES']['RATING']['COUNT']?>)<?endif?></div>
			</div>
		</div>
		<div class="tabs__body">
			<?if($arResult['DETAIL_TEXT']):?>
			<div class="tabs__content" data-tab="description" itemprop="description"><?=$arResult['DETAIL_TEXT']?></div>
			<?endif?>
			<?if($arResult['DISPLAY_PROPERTIES']['EQUIPMENT']):?>
			<div class="tabs__content" data-tab="equipment"><?=$arResult['DISPLAY_PROPERTIES']['EQUIPMENT']['~VALUE']['TEXT']?></div>
			<?endif?>
			<?if($arResult['DISPLAY_PROPERTIES']['DELIVERY']):?>
			<div class="tabs__content" data-tab="delivery"><?=$arResult['DISPLAY_PROPERTIES']['DELIVERY']['~VALUE']['TEXT']?></div>
			<?endif?>
			<?if($arResult['DISPLAY_PROPERTIES']['MOUNTING']):?>
			<div class="tabs__content" data-tab="mounting"><?=$arResult['DISPLAY_PROPERTIES']['MOUNTING']['~VALUE']['TEXT']?></div>
			<?endif?>
			<div class="tabs__content" data-tab="docs">
				<?if(is_countable($arResult['PROPERTIES']['DOCS']['VALUE'])):?>
				<ul class="catalog-detail__docs">
					<?foreach ($arResult['DISPLAY_PROPERTIES']['DOCS']['LINK_ELEMENT_VALUE'] as $file):?>
					<li class="catalog-detail__docs-item">
						<a class="catalog-detail__docs-link" href="<?=$file['SRC']?>" download><?=$file['NAME']?></a>
					</li>
					<?endforeach?>
				</ul>
				<?else:?>
					Здесь ничего нет
				<?endif?>
			</div>
			<div class="tabs__content" data-tab="reviews">
				#REVIEWS#
			</div>
		</div>
	</div>
</section>

<?
$this->__component->arResult['CACHED_TPL'] = @ob_get_contents();
ob_get_clean();
?>