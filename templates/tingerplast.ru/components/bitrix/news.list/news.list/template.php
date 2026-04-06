<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>

<h1 class="page-title page-title_margin_bottom"><?=$APPLICATION->GetPageProperty('h1');?></h1>

<?$res = CIBlock::GetList(
	Array('SORT' => 'ASC'),
	Array(
		'TYPE' => 'news_tingerplast',
		'SITE_ID' => SITE_ID,
		'ACTIVE' => 'Y',
		'CNT_ACTIVE' => 'Y',
		'!CODE' => 'reviews',
	), true
);?>
<nav class="news-nav">
	<ul class="news-nav__list">
		<?while($ar_res = $res->Fetch()):?>
		<li class="news-nav__item">
			<a class="news-nav__link section-subtitle<?if($arParams['SECTION_URL'] === '/' . $ar_res['CODE'] . '/'):?> news-nav__link_active<?endif?>" href="/<?=$ar_res['CODE']?>/"><?=$ar_res['NAME']?></a>
		</li>
		<?endwhile?>
	</ul>
</nav>

<div class="ajax">
<div class="news-preview ajax-container" itemscope itemtype="http://schema.org/Blog">
	<?if((count($arResult['ITEMS'])) == 0):?>
	<p class="news-preview__nothing">Здесь пока ничего нет</p>
	<?else:?>
	<?foreach ($arResult['ITEMS'] as $arItem):?>
	<article class="ajax-item" itemprop="blogPosts" itemscope itemtype="http://schema.org/BlogPosting">
		<div class="news-preview__item" >
			<div class="news-preview__img-container">
				<?if(isset($arItem['DETAIL_PICTURE']['PREVIEW_WEBP_SRC_140_140'])):?>
					<a href="<?=$arItem['DETAIL_PAGE_URL']?>"><img class="news-preview__img" src="<?=$arItem['DETAIL_PICTURE']['PREVIEW_WEBP_SRC_140_140']?>" alt="<?=$arItem['NAME']?>"></a>
				<?endif?>
			</div>
			<div class="news-preview__info">
				<h2 class="news-preview__title"><a class="news-preview__link" itemprop="headline" href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=$arItem['NAME']?></a></h2>
				<div class="news-preview__caption">
					<time class="news-preview__date" itemprop="datePublished" datetime="<?=$arItem['DISPLAY_ACTIVE_FROM']?>"><?=$arItem['DISPLAY_ACTIVE_FROM']?></time>
					<a class="news-preview__arrow" href="<?=$arItem['DETAIL_PAGE_URL']?>"></a>
				</div>
			</div>
		</div>
		<meta itemprop="description" content="<?=$arItem['NAME']?>">
		<meta itemprop="dateModified" content="<?=$arItem['TIMESTAMP_X']?>">
		<meta itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" itemid="<?=$arItem['DETAIL_PAGE_URL']?>" />
	</article>
	<?endforeach?>
	<?endif?>
</div>
<?=$arResult['NAV_STRING']?>
</div>

<?=$arResult['SEO_TEXT']?>