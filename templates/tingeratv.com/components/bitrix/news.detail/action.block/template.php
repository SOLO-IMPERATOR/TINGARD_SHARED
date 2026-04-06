<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>



<div class="action__img-container">
	<picture itemscope itemtype="http://schema.org/ImageObject">
		<source srcset="<?=$arResult['PREVIEW_PICTURE']['SRC']?>" media="(max-width: 479px)">
		<img class="action__img" itemprop="contentUrl" src="<?=$arResult['DETAIL_PICTURE']['SRC']?>" alt="<?=$arResult['NAME']?>">
		<meta itemprop="name" content="<?=$arResult['NAME']?>">
		<meta itemprop="description" content="<?=$arResult['NAME']?>">
	</picture>
</div>
<div class="action__inner container">
	<p class="action__title section-title"><?=$arResult['PREVIEW_TEXT']?></p>
	<?if($arResult['DETAIL_TEXT']):?>
	<p class="action__text"><?=$arResult['DETAIL_TEXT']?></p>
	<?endif?>
	<div class="action__btn-container">
		<a class="btn btn_color_green" href="<?=$arResult['PROPERTIES']['BTN_LINK']['VALUE']?>"><?=$arResult['PROPERTIES']['BTN_TEXT']['VALUE']?></a>
	</div>
</div>