<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>

<div class="ajax">
<ul class="reviews-list ajax-container">
	<?if(count($arResult['ITEMS']) > 0):?>
	<?foreach ($arResult['ITEMS'] as $item):?>
	<li class="reviews-list__item ajax-item" itemprop="review" itemscope itemtype="http://schema.org/Review">
		<meta itemprop="itemReviewed" content="">
		<meta itemprop="datePublished" content="<?=ConvertDateTime($item['ACTIVE_FROM'], 'YYYY-MM-DD', 'ru')?>">
		<div class="reviews-list__head">
			<div class="reviews-item__img-container">
				<img class="reviews-item__img" src="<?=SITE_TEMPLATE_PATH?>/img/person-icon.svg" alt="Иконка автора отзыва">
			</div>
			<div class="reviews-list__info">
				<div class="reviews-item__author" itemprop="author" itemscope itemtype="https://schema.org/Person"><span itemprop="name"><?=$item['PROPERTIES']['AUTHOR']['VALUE']?></span></div>
				<div class="reviews-item__date">от <?=$item['DISPLAY_ACTIVE_FROM']?></div>
				<div class="reviews__rating rating">
					<div class="rating__inner" itemprop="reviewRating" itemscope itemtype="https://schema.org/Rating">
						<meta itemprop="worstRating" content="1">
						<meta itemprop="ratingValue" content="<?=$item['PROPERTIES']['RATING']['VALUE']?>">
						<meta itemprop="bestRating" content="5">
						<?if($item['PROPERTIES']['RATING']['VALUE'] <> 0):?>
						<div class="rating__overlay rating__overlay_value_<?=$item['PROPERTIES']['RATING']['VALUE']?>"></div>
						<?endif?>
					</div>
				</div>
				<div class="reviews-list__link-container">
					<a class="reviews-list__link" href="<?=$item['DETAIL_PAGE_URL']?>" itemprop="url">Читать весь отзыв</a>
				</div>
			</div>
		</div>
		<div class="reviews-item__body">
			<div class="reviews-item__name-container">
				<a class="reviews-item__name" href="<?=$item['DETAIL_PAGE_URL']?>" itemprop="name"><?=$item['NAME']?></a>
			</div>
			<blockquote class="blockquote" cite="<?=$item['DETAIL_PAGE_URL']?>" itemprop="reviewBody"><?=$item['PREVIEW_TEXT']?></blockquote>
		</div>
	</li>
	<?endforeach?>
	<?else:?>
		<a class="btn btn_type_default" href="/reviews/">Смотреть все</a>
	<?endif?>
</ul>

<?=$arResult['NAV_STRING']?>
</div>