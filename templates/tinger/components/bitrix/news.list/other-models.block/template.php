<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>

<div class="other-models">
	<div class="other-models__swiper swiper">
		<div class="swiper-wrapper">
			<ul class="other-models__list swiper-slide">
				<?foreach ($arResult['ITEMS'] as $item):?>
				<?if($item['ID'] != 68 && $item['ID'] != 9435):?>
				<li class="model-card other-models__item">
					<a href="<?=$item["DETAIL_PAGE_URL"]?>">
						<picture itemscope itemtype="http://schema.org/ImageObject">
							<img class="models-card__img" itemprop="contentUrl" src="<?=$item["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$item["NAME"]?>">
							<meta itemprop="name" content="<?=$item["NAME"]?>">
							<meta itemprop="description" content="<?=$item["PROPERTIES"]["CATEGORY_NAME"]["VALUE"]?>">
						</picture>
					</a>
					<a class="model-card__name section-subtitle" href="<?=$item["DETAIL_PAGE_URL"]?>"><?=$item["PROPERTIES"]["M_SHORT_NAME"]["VALUE"]?></a>
					<p class="model-card__price"><span class="model-card__price-tagline">от</span> <?=$item["PROPERTIES"]["C_PRICE"]["VALUE"]?> руб.</p>
					<a class="link-arrow" href="<?=$item["DETAIL_PAGE_URL"]?>"><?=$item["PROPERTIES"]["CATEGORY_NAME"]["VALUE"]?></a>
				</li>
				<?endif?>
				<?endforeach?>
			</ul>
		</div>
	</div>
</div>