<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>

<div class="gallery">
	<div class="gallery__swiper swiper margin_b_m">
		<div class="swiper-wrapper">
			<?foreach ($arResult['ITEMS'] as $item) {?>
			<div class="gallery__item swiper-slide">
				<a href="<?=$item['DETAIL_PICTURE']['SRC']?>" class="glightbox">
					<picture itemscope itemtype="http://schema.org/ImageObject">
						<img itemprop="contentUrl" class="gallery__img" src="<?=$item['PREVIEW_PICTURE']['SRC']?>" alt="<?=$item['NAME']?>">
						<meta itemprop="description" content="<?=$item['NAME']?>">
						<meta itemprop="name" content="<?=$item['NAME']?>">
					</picture>
				</a>
			</div>
			<?}?>
		</div>
	</div>
	<div class="container">
		<div class="arrows">
			<button class="arrows__prev--gallery arrows__btn"><img class="arrows__img" src="/local/templates/tinger/img/arrow-prev.svg" alt="Стрелка назад"></button>
			<button class="arrows__next--gallery arrows__btn"><img class="arrows__img" src="/local/templates/tinger/img/arrow-next.svg" alt="Стрелка вперёд"></button>
		</div>
	</div>
</div>