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
$items = $arResult['ITEMS'];
?>


<ul class="model-benefits__list">
	<?foreach ($items as $item) {?>
	<li class="model-benefits__item">
		<div class="model-benefits__img-container">
			<picture itemscope itemtype="http://schema.org/ImageObject">
				<img itemprop="contentUrl" class="model-benefits__img" src="<?=$item['DETAIL_PICTURE']['SRC']?>" alt="<?=$item['NAME']?>">
				<meta itemprop="description" content="<?=$item['NAME']?>">
			</picture>
			<?if ($item['PROPERTIES']['MODEL_BENEFITS_YOUTUBE_LINK']['VALUE']):?>
				<button class="play-btn" data-action="play-modal-video" data-video-id="<?=$item['PROPERTIES']['MODEL_BENEFITS_YOUTUBE_LINK']['VALUE']?>" title="Смотреть видео"></button>
			<?endif?>
		</div>
		<div class="model-benefits__desc">
			<h3 class="model-benefits__name section-subtitle"><?=$item['NAME']?></h3>
			<p class="model-benefits__text"><?=$item['DETAIL_TEXT']?></p>
		</div>
	</li>
	<?}?>
</ul>