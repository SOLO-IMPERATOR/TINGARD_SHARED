<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;


$this->setFrameMode(true);

$customDescription = strip_tags($arResult['META_TAGS']['TITLE']);
$customDescription = preg_replace('/\s\s+/', ' ', $customDescription);
$customDescription = html_entity_decode($customDescription);



?>
<section class="section section_padding_bottom_big container">
	<div class="product" id="<?=$arResult['ID']?>" itemscope itemtype="http://schema.org/Product">

		<h1 class="product__title page-title margin_b_m" itemprop="name"><?= $arResult['NAME'] ?></h1>

		<div class="product__container">

			<div class="product__img-container">
				<?if($arResult['DETAIL_PICTURE']['SRC']):?>
				<a href="<?=$arResult['DETAIL_PICTURE']['SRC']?>" class="glightbox">
					<img class="product__img" src="<?=$arResult['DETAIL_PICTURE']['SRC']?>" alt="Buy <?=$actualItem['NAME'] ?>" itemprop="image">
				</a>
				<?else:?>
					<img class="product__img" src="<?=SITE_TEMPLATE_PATH . '/img/no-photo.svg'?>" alt="Buy <?=$actualItem['NAME'] ?>">
				<?endif?>
			</div>

			<div class="product__descrition">

				<div class="product__descrition-item margin_b_m">
					<div class="section-title margin_b_s">Characteristics</div>
					<ul class="product__properties-list">
						<?foreach($arResult['DISPLAY_PROPERTIES'] as $arItem):?>
						<?if($arItem['NAME'] !== 'Number on the diagram'):?>
						<li class="product__properties-item">
							<div class="product__properties-name"<?if($arItem['CODE'] === 'CML2_ARTICLE'):?> itemprop="model"<?endif?>><?=$arItem['NAME']?></div>
							<?if(is_array($arItem['VALUE'])):?>
							<div class="product__properties-value"><?=implode('<br>', $arItem['VALUE'])?></div>
							<?else:?>
							<div class="product__properties-value"><?=$arItem['VALUE']?></div>
							<?endif?>
						</li>
						<?endif?>
						<?endforeach?>
					</ul>
				</div>

				<?if ($arResult['DETAIL_TEXT']):?>
				<div class="product__descrition-item margin_b_m">
					<div class="section-title margin_b_s">Description</div>
					<div class="product__comment" itemprop="description"><?=$arResult['DETAIL_TEXT']?></div>
				</div>
				<?else:?>
					<meta itemprop="description" content="<?=$arResult['META_TAGS']['DESCRIPTION']?>">
				<?endif?>

				<div class="product__descrition-item margin_b_m">
					<div class="section-title margin_b_s">Availability</div>
					<?if(($arResult['PROPERTIES']['PRODUCTION_POSITION_LONG']['VALUE'] == "Y") && ($arResult['PRODUCT']['AVAILABLE'] == 'Y')):?>
						<div class="product_availability product_availability_status_long-waiting margin_b_s">we will produce within 14-28 days*</div>
						<div class="product_availability-desc">* production item, usually manufactured within the specified period from the moment of payment of the order</div>
					<?elseif(($arResult['PROPERTIES']['PRODUCTION_POSITION']['VALUE'] == "Y") && ($arResult['PRODUCT']['AVAILABLE'] == 'Y')):?>
						<div class="product_availability product_availability_status_waiting margin_b_s">we will produce within 7-14 days*</div>
						<div class="product_availability-desc">* production item, usually manufactured within the specified period from the moment of payment of the order</div>
					<?elseif($arResult['PRODUCT']['AVAILABLE'] == 'N'):?>
						<div class="product_availability product_availability_status_not-available margin_b_s">not available*</div>
						<div class="product_availability-desc">* this item is out of stock. Please contact the manager to confirm delivery time.</div>
					<?else:?>
						<div class="product_availability product_availability_status_available">in stock</div>
					<?endif?>
				</div>


				<?if($arResult['DISPLAY_PROPERTIES']['PRICE']['VALUE']):?><div class="product__descrition-item margin_b_m">
					<div class="product__buy" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
						<meta itemprop="price" content="<?=$arResult['DISPLAY_PROPERTIES']['PRICE']['VALUE']?>">
						<meta itemprop="priceCurrency" content="USD">
						<?if(($arResult['PROPERTIES']['PRODUCTION_POSITION']['VALUE'] == "Y") && ($arResult['PRODUCT']['AVAILABLE'] == 'Y')):?>
							<link itemprop="availability" href="http://schema.org/BackOrder">
						<?elseif($arResult['PRODUCT']['AVAILABLE'] == 'N'):?>
							<link itemprop="availability" href="http://schema.org/OutOfStock">
						<?else:?>
							<link itemprop="availability" href="http://schema.org/InStock">
						<?endif?>
						<meta itemprop="priceValidUntil" content="<?=ConvertDateTime($arResult['TIMESTAMP_X'], 'YYYY-MM-DD', 'ru')?>">
						<div class="product__price section-subtitle">$<?=$arResult['DISPLAY_PROPERTIES']['PRICE']['VALUE']?></div>
					</div>
				</div><?endif?>

				<div class="product__descrition-item">
					<div class="section-title margin_b_s">Found in categories</div>
					<ul class="poduct__categories">
						<?foreach ($arResult['SECTIONS'] as $arSection):?>
						<li class="poduct__categories-item">
							<a href="<?=$arSection['SECTION_PAGE_URL']?>"><?=$arSection['SECTION_NAME']?> — <?=$arSection['SUBSECTION_NAME']?></a>
						</li>
						<?endforeach?>
					</ul>
				</div>
			</div>

		</div>
	</div>

</section>

