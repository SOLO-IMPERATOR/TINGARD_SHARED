<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
global $USER;
$this->setFrameMode(true);
?>
<main>
	<div class="news-list__title container">
		<h1 itemprop="description" class="page-title">News</h1>
	</div>
	<section itemscope itemtype="http://schema.org/Blog" class="container section section_padding_top_small section_padding_bottom_small">
		<div class="news-list__inner ajax-container">
			<?if((count($arResult['ITEMS'])) == 0):?>
			<p class="news-preview__nothing">Здесь пока ничего нет</p>
			<?else:?>
			<?foreach ($arResult['ITEMS'] as $arItem):?>
			<article itemprop="blogPosts" itemscope itemtype="http://schema.org/BlogPosting" class="ajax-item">
				<a class="news-small" href="<?=$arItem['DETAIL_PAGE_URL']?>">
					<div class="news-small__img-container">
						<?if(isset($arItem['DETAIL_PICTURE']['PREVIEW_WEBP_SRC_440_440'])):?>
						<img class="news-small__img" src="<?=$arItem['DETAIL_PICTURE']['PREVIEW_WEBP_SRC_440_440']?>" alt="<?=$arItem['NAME']?>">
						<?endif?>
					</div>
					<div class="news-small__container">
						<p itemprop="headline" class="news-small__title section-subtitle"><?=$arItem['NAME']?></p>
						<p class="news-small__date" itemprop="datePublished" datetime="<?=$arItem['DISPLAY_ACTIVE_FROM']?>"><?=$arItem['DISPLAY_ACTIVE_FROM']?></p>
						<div class="arrow-link"></div>
					</div>
				</a>
				<meta itemprop="dateModified" content="<?=$arItem['TIMESTAMP_X']?>" />
                <meta itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" itemid="<?=$arItem['DETAIL_PAGE_URL']?>"/>
				<meta itemprop="description" content="<?=$arItem['NAME']?>" />
			</article>
			<?endforeach?>
			<?endif?>
		</div>
		<?=$arResult['NAV_STRING']?>
	</section>
	<?=$arResult['SEO_TEXT']?>
</main>