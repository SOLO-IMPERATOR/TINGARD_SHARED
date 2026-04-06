<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
?>

<?foreach ($arResult['ITEMS'] as $arItem):?>
<div class="seo-block__item">
	<h2 class="section-title section-title_margin_bottom"><?=$arItem['NAME']?></h2>
	<div class="seo-block__content">
		<div class="seo-block__img-container">
			<picture itemscope="" itemtype="http://schema.org/ImageObject">
				<source srcset="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" media="(max-width: 479px)">
				<img class="seo-block__img" itemprop="contentUrl" src="<?=$arItem['DETAIL_PICTURE']['SRC']?>" alt="<?=$arItem['NAME']?>">
				<meta itemprop="name" content="<?=$arItem['NAME']?>">
				<meta itemprop="description" content="<?=$arItem['NAME']?>">
			</picture>
		</div>
		<div class="seo-block__text">
			<?=$arItem['DETAIL_TEXT']?>
		</div>
	</div>
</div>
<?endforeach?>


