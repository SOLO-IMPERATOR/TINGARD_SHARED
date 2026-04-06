<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>
<div class="reviews-other__slider swiper">
	<ul class="reviews-other__list swiper-wrapper">
		<?if(count($arResult['ITEMS']) > 0):?>
		<?foreach ($arResult['ITEMS'] as $item):?>
		<li class="reviews-other__item swiper-slide">
			<div class="reviews-other__head">
				<div class="reviews-item__img-container">
					<img class="reviews-item__img" src="<?=SITE_TEMPLATE_PATH?>/img/person-icon.svg" alt="Иконка автора отзыва">
				</div>
				<div class="reviews-other__info">
					<div class="reviews-item__author"><?=$item['PROPERTIES']['AUTHOR']['VALUE']?></div>
					<div class="reviews-item__date">от <?=$item['DISPLAY_ACTIVE_FROM']?></div>
					<div class="reviews__rating rating">
						<div class="rating__inner">
							<?if($item['PROPERTIES']['RATING']['VALUE'] <> 0):?>
							<div class="rating__overlay rating__overlay_value_<?=$item['PROPERTIES']['RATING']['VALUE']?>"></div>
							<?endif?>
						</div>
					</div>
					<div class="reviews-other__link-container">
						<a class="reviews-other__link" href="<?=$item['DETAIL_PAGE_URL']?>">Читать весь отзыв</a>
					</div>
				</div>
			</div>
			<div class="reviews-item__body">
				<div class="reviews-item__name-container">
					<a class="reviews-item__name" href="<?=$item['DETAIL_PAGE_URL']?>"><?=$item['NAME']?></a>
				</div>
				<blockquote class="blockquote" cite="<?=$item['DETAIL_PAGE_URL']?>"><?=$item['PREVIEW_TEXT']?></blockquote>
				<div class="reviews-item__product"><span class="reviews-item__product_accent">Продукт:</span> <?foreach($item['DISPLAY_PROPERTIES']['PRODUCT']['LINK_ELEMENT_VALUE'] as $product) { $temp[] = '<a href="' . $product['DETAIL_PAGE_URL'] . '">' . $product['NAME'] . '</a>'; }?><?=implode(', ', $temp); unset($temp);?></div>
			</div>
		</li>
		<?endforeach?>
		<?else:?>
			<a class="btn btn_type_default" href="/reviews/">Смотреть все</a>
		<?endif?>
	</ul>
	<div class="reviews-other__slider-arrows arrows">
		<button class="arrows__btn arrows__btn_direction_prev">Назад</button>
		<button class="arrows__btn arrows__btn_direction_next">Вперёд</button>
	</div>
</div>