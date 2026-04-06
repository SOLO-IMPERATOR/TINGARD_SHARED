<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
global $USER;
$this->setFrameMode(true);
$items = $arResult["ITEMS"];
$iteration = 1;
?>

<div class="corp-intro__swiper intro-swiper" data-entity="intro-corp-slider">
	<div class="swiper-wrapper">
		<?foreach ($items as $item) {?>
		<div class="corp-intro__img-container swiper-slide">
			<picture itemscope itemtype="http://schema.org/ImageObject">
				<source srcset="<?=$item['PREVIEW_PICTURE']['SRC']?>" media="(max-width: 767px)">
				<img itemprop="contentUrl" class="corp-intro__img" src="<?=$item['DETAIL_PICTURE']['SRC']?>" alt="<?=tag_replacement($item["~NAME"])?>">
				<meta itemprop="description" content="<?=tag_replacement($item["~NAME"])?>">
			</picture>
		</div>
		<?}?>
	</div>
</div>