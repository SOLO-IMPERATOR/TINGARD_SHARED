<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); 
$arItems = $arResult['ITEMS'];
?>

<div class="news-other__swiper swiper">
	<div class="swiper-wrapper">
	<?foreach ($arItems as $arItem):?>
		<article class="swiper-slide" itemprop="blogPosts" itemscope itemtype="http://schema.org/BlogPosting">
			<a class="news-other__item" href="<?=$arItem['DETAIL_PAGE_URL']?>">
				<div class="news-other__img-container">
					<img class="news-other__img" itemprop="image" src="<?=$arItem['DETAIL_PICTURE']['PREVIEW_WEBP_SRC_140_140']?>" alt="<?=$arItem['DETAIL_PICTURE']['ALT']?>">
				</div>
				<div class="news-other__info">
					<div class="news-other__title" itemprop="headline"><?=$arItem['NAME']?></div>
					<div class="news-other__caption">
						<time class="news-other__date" itemprop="datePublished" datetime="<?=$arItem['DISPLAY_ACTIVE_FROM']?>"><?=$arItem['DISPLAY_ACTIVE_FROM']?></time>
						<div class="news-other__arrow"></div>
					</div>
				</div>
			</a>
			<meta itemprop="description" content="<?=$arItem['PREVIEW_TEXT']?>" />
			<meta itemprop="dateModified" content="<?=$arItem['TIMESTAMP_X']?>" />
			<meta itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" itemid="<?=$arItem['DETAIL_PAGE_URL']?>" />
		</article>
		<?endforeach?>
	</div>
</div>
<div class="news-other__swiper-arrows arrows">
	<button class="arrows__btn arrows__btn_direction_prev">Назад</button>
	<button class="arrows__btn arrows__btn_direction_next">Вперёд</button>
</div>