<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
/* echo '<pre>'; print_r($arResult['ITEMS']); echo '</pre>'; */
?>

<div class="model-gallery__slider swiper" data-entity="model-gallery-slider">
		<div class="swiper-wrapper">
			<?foreach ($arResult['ITEMS'] as $item):?>
			<div class="model-gallery__img-container swiper-slide">
				<a class="glightbox" href="<?=$item['DETAIL_PICTURE']['WEBP_SRC_1280_720']?>">
					<picture itemscope itemtype="http://schema.org/ImageObject">
						<source media="(max-width: 480px)" srcset="<?=$item['DETAIL_PICTURE']['WEBP_SRC_480_270']?>">
						<img  itemprop="contentUrl" class="model-gallery__img" src="<?=$item['DETAIL_PICTURE']['WEBP_SRC_1280_720']?>" alt="<?=$arResult['NAME']?>">
						<meta itemprop="description" content="<?=$item['NAME']?>">
						<meta itemprop="name" content="<?=$item['NAME']?>">
					</picture>
				</a>
			</div>
			<?endforeach?>
		</div>
	</div>
	<div class="model-gallery__thumbs-slider swiper" data-entity="model-gallery-slider-thumbs">
		<div class="swiper-wrapper">
			<?foreach ($arResult['ITEMS'] as $item):?>
			<div class="model-gallery__thumbs-item swiper-slide">
				<img class="model-gallery__thumbs-img" src="<?=$item['DETAIL_PICTURE']['WEBP_SRC_480_270']?>" alt="<?=$arResult['NAME']?>">
			</div>
			<?endforeach?>
		</div>
	</div>
	<div class="model-gallery__thumbs-arrows arrows">
		<button class="arrows__btn arrows__btn_direction_prev" title="Назад"><img class="arrows__img" src="<?=SITE_TEMPLATE_PATH?>/img/arrow-prev.svg" alt="Стрелка вперёд"></button>
		<button class="arrows__btn arrows__btn_direction_next" title="Вперёд"><img class="arrows__img" src="<?=SITE_TEMPLATE_PATH?>/img/arrow-next.svg" alt="Стрелка назад"></button>
	</div>
</div>