<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
$this->setFrameMode(true); ?>

<div class="model-strip">
	<div class="model-strip__inner container">
		<p class="model-strip__name section-subtitle"><?= $arResult["PROPERTIES"]["M_SHORT_NAME"]["VALUE"] ?></p>
		<nav class="model-strip__nav">
			<ul class="model-strip__list">
				<li class="model-strip__item">
					<? if (CSite::InDir('/catalog/perelomka/')): ?>
						<a class="model-strip__link glightbox"
							href="https://vk.com/video_ext.php?oid=-75469434&id=456239312&hd=2&autoplay=1">Обзор</a>
					<? else: ?>
						<a class="model-strip__link glightbox"
							href="<?= $arResult["PROPERTIES"]["C_REVIEW_YOUTUBE_INTRO"]["VALUE"] ?>">Обзор</a>
					<? endif ?>
				</li>
				<li class="model-strip__item">
					<a class="model-strip__link" href="/presentation/">Презентация</a>
				</li>
				<? if (!CSite::InDir('/catalog/tinger-rt2/')):?><li class="model-strip__item">
					<a class="model-strip__link"
						href="<?=$arResult['PROPERTIES']['CONFIGURATOR_LINK']['VALUE']?>">Конфигуратор</a>
				</li><?endif?>
			</ul>
		</nav>
		<div class="model-strip__btn-container">
			<? if (CSite::InDir('/catalog/tinger-track-2/') || CSite::InDir('/catalog/tinger-armor/')): ?><a
					class="model-strip__btn model-strip__btn_type_testdrive btn btn_color_black"
					href="/testdrive/">Тест-драйв</a><? endif ?>
			<button class="btn btn_color_black" type="button"
				onclick="openModal('default', {'crm-entity': 'lead', 'crm-title': 'Купить вездеход <?= $arResult['PROPERTIES']['M_SHORT_NAME']['VALUE'] ?>'})">Купить</button>
		</div>
	</div>
</div>


<section itemscope itemtype="http://schema.org/Product" class="model-intro">
	<div class="model-intro__img-container swiper" data-entity="intro-models-slider">
		<div class="swiper-wrapper">
			<? foreach ($arResult['INTRO_SLIDES'] as $slide): ?>
				<div class="swiper-slide">
					<picture>
						<source srcset="<?= $slide['MOBILE'] ?>" media="(max-width: 479px)">
						<img itemprop="image" class="model-intro__img" src="<?= $slide['DESKTOP'] ?>"
							alt="<?= $arResult["PROPERTIES"]["M_SHORT_NAME"]["VALUE"] ?>">
					</picture>
				</div>
			<? endforeach ?>
		</div>
	</div>
	<div class="model-intro__body container">
		<h1 class="model-intro__title title"><?= tag_replacement($arResult["DETAIL_TEXT"]) ?></h1>
		<meta itemprop="name" content="<?= $arResult["PROPERTIES"]["M_SHORT_NAME"]["VALUE"] ?>">
		<meta itemprop="description" content="<?= tag_replacement($arResult["DETAIL_TEXT"]) ?>">
		<?if (CSite::InDir('/catalog/tf4pro/')):?>
<!-- 		<div class="model-intro__deal">
			<div class="models-intro__deal-label">Акция в марте</div>
			<div class="models-intro__deal-inner">
				<div class="models-intro__deal-subtitle">Выгода на прицеп TINGER RT2*</div>
				<div class="models-intro__deal-title">245 000 <span class="models-intro__deal-title_accent">₽</span></div>
				<div class="models-intro__deal-desc">*подробности уточняйте у менеджеров</div>
			</div>
		</div> -->
		<? elseif (CSite::InDir('/catalog/tinger-rt2/')):?>
		<div class="model-intro__skidka model-intro__skidka_page_rt2">
			<picture>
				<source srcset="<?=SITE_TEMPLATE_PATH?>/img/tinger-tf4pro-skidka-1-mobile.svg?v=3" media="(max-width: 479px)">
				<img class="model-intro__skidka-img" src="<?=SITE_TEMPLATE_PATH?>/img/tinger-tf4pro-skidka-1-desktop.svg?v=2" alt="Скидка">
			</picture>
			<picture>
				<source srcset="<?=SITE_TEMPLATE_PATH?>/img/tinger-tf4pro-skidka-2-mobile.svg?v=3" media="(max-width: 479px)">
				<img class="model-intro__skidka-additional-img" src="<?=SITE_TEMPLATE_PATH?>/img/tinger-tf4pro-skidka-2-desktop.svg?v=3" alt="Скидка">
			</picture>
		</div>
		<? else: ?>
			<p class="model-intro__subtitle section-subtitle"><?= $arResult['PROPERTIES']['SUBTITLE']['VALUE'] ?></p>
		<? endif ?>
		<div class="model-intro__body-btn-container">
			<? if (!CSite::InDir('/catalog/tinger-rt2/')):?><a class="btn btn_color_transparent-white"
				href="<?= $arResult['PROPERTIES']['CONFIGURATOR_LINK']['VALUE'] ?>">Конфигуратор</a><?endif?>
			<button class="btn btn_color_white" type="button"
				onclick="openModal('default', {'crm-entity': 'lead', 'crm-title': 'Купить вездеход <?= $arResult['PROPERTIES']['M_SHORT_NAME']['VALUE'] ?>'})">Купить</button>
		</div>
	</div>
	<div class="model-intro__footer-container container" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
		<? if (count($arResult['INTRO_SLIDES']) > 1): ?>
			<div class="slider-pagination" data-entity="intro-models-slider-pagination"></div><? endif ?>
		<div class="model-intro__footer">
			<p class="model-intro__price section-subtitle">Цена от <?= $arResult["PROPERTIES"]["C_PRICE"]["VALUE"] ?>
				руб.
			</p>
			<div class="model-intro__benefits">
				<p class="model-intro__benefits-item section-subtitle">
					<?= $arResult["PROPERTIES"]["MODEL_CHAR_1"]["VALUE"] ?>
				</p>
				<p class="model-intro__benefits-item section-subtitle">
					<?= $arResult["PROPERTIES"]["MODEL_CHAR_2"]["VALUE"] ?>
				</p>
				<p class="model-intro__benefits-item section-subtitle">
					<?= $arResult["PROPERTIES"]["MODEL_CHAR_3"]["VALUE"] ?>
				</p>
			</div>
			<meta itemprop="price" content="<?= str_replace(' ', '', $arResult["PROPERTIES"]["C_PRICE"]["VALUE"]) ?>">
			<meta itemprop="priceCurrency" content="RUB">
			<link itemprop="availability" href="http://schema.org/InStock">
			<meta itemprop="priceValidUntil" content="<?= date('Y-m-d', strtotime("+365 day")); ?>">
		</div>
	</div>
</section>