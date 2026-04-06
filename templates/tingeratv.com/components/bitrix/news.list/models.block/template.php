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
?>

<div class="models">
	<div class="models__swiper swiper">
		<div class="swiper-wrapper">
			<ul class="models__list swiper-slide">
				<?foreach ($items as $item):?>
				<li class="model-card models__item">
					<a href="<?=$item["DETAIL_PAGE_URL"]?>">
						<picture itemscope itemtype="http://schema.org/ImageObject">
							<img class="models-card__img" itemprop="contentUrl" src="<?=$item["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$item["NAME"]?>">
							<meta itemprop="name" content="<?=$item["NAME"]?>">
							<meta itemprop="description" content="<?=$item["PROPERTIES"]["CATEGORY_NAME"]["VALUE"]?>">
						</picture>
					</a>
					<a class="model-card__name section-subtitle" href="<?=$item["DETAIL_PAGE_URL"]?>"><?=$item["PROPERTIES"]["M_SHORT_NAME"]["VALUE"]?></a>
					<a class="link-arrow" href="<?=$item["DETAIL_PAGE_URL"]?>"><?=$item["PROPERTIES"]["CATEGORY_NAME"]["VALUE"]?></a>
				</li>
				<?endforeach?>
			</ul>
		</div>
	</div>
</div>