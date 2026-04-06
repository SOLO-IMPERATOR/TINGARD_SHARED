<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);?>

<!-- <div class="model-strip">
	<div class="model-strip__inner container">
		<p class="model-strip__name section-subtitle"><?=$arResult["PROPERTIES"]["M_SHORT_NAME"]["VALUE"] ?></p>
		<nav class="model-strip__nav">
			<ul class="model-strip__list">
				<li class="model-strip__item">
					<a class="model-strip__link glightbox" href="<?=$arResult["PROPERTIES"]["C_REVIEW_YOUTUBE_INTRO"]["VALUE"]?>">Review</a>
				</li>
				<li class="model-strip__item">
					<a class="model-strip__link" href="/presentation/">Presentation</a>
				</li>
				<li class="model-strip__item">
					<a class="model-strip__link" href="/configurator/">Configurator</a>
				</li>
			</ul>
		</nav>
		<div class="model-strip__btn-container">
			<button class="btn btn_color_black" type="button" onclick="openModal('default', {'crm-entity': 'lead', 'crm-title': 'Buy ATV <?=$arResult['PROPERTIES']['M_SHORT_NAME']['VALUE']?>'})">Buy</button>
		</div>
	</div>
</div> -->

<section itemscope itemtype="http://schema.org/Product" class="model-intro">
	<div class="model-intro__img-container">
		<picture>
			<source srcset="<?=CFile::GetPath($arResult["PROPERTIES"]["DETAIL_PICTURE_MOBILE"]["VALUE"])?>" media="(max-width: 767px)">
			<img itemprop="image" class="model-intro__img" src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt="<?=$arResult["PROPERTIES"]["M_SHORT_NAME"]["VALUE"] ?>">
		</picture>
	</div>
	<div class="model-intro__body container">
		<h1 class="model-intro__title title"><?=tag_replacement($arResult["DETAIL_TEXT"])?></h1>
		<meta itemprop="name" content="<?=$arResult["PROPERTIES"]["M_SHORT_NAME"]["VALUE"]?>">
		<meta itemprop="description" content="<?=tag_replacement($arResult["DETAIL_TEXT"])?>">
		<div class="model-intro__body-btn-container">
			<a class="btn btn_color_transparent-white" href="/configurator/">Configurator</a>
			<button class="btn btn_color_white" type="button" onclick="openModal('default', {'crm-entity': 'lead', 'crm-title': 'Buy ATV <?=$arResult['PROPERTIES']['M_SHORT_NAME']['VALUE']?>'})">Buy</button>
		</div>
	</div>
	<div class="model-intro__footer-container container">
		<div class="model-intro__footer">
			<button class="btn btn_color_transparent-white" type="button" onclick="openModal('default', {'crm-entity': 'lead', 'crm-title': 'Find out the price <?=$arResult['PROPERTIES']['M_SHORT_NAME']['VALUE']?>'})">Find out the price</button>
			<div class="model-intro__benefits">
				<p class="model-intro__benefits-item section-subtitle"><?=$arResult["PROPERTIES"]["MODEL_CHAR_1"]["VALUE"]?></p>
				<p class="model-intro__benefits-item section-subtitle"><?=$arResult["PROPERTIES"]["MODEL_CHAR_2"]["VALUE"]?></p>
				<p class="model-intro__benefits-item section-subtitle"><?=$arResult["PROPERTIES"]["MODEL_CHAR_3"]["VALUE"]?></p>
			</div>
		</div>
	</div>
</section>