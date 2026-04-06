<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>

<section class="model-intro">
	<div class="model-intro__img-container">
		<picture itemscope itemtype="http://schema.org/ImageObject">
			<source media="(max-width: 480px)" srcset="<?=$arResult['PREVIEW_PICTURE']['SRC']?>">
			<img class="model-intro__img" itemprop="contentUrl" src="<?=$arResult['DETAIL_PICTURE']['SRC']?>" alt="<?=$arResult['NAME']?>">
			<meta itemprop="name" content="<?=$arResult['DISPLAY_PROPERTIES']['MODEL_PROPERTIES']['M_SHORT_NAME']['VALUE']?>">
			<meta itemprop="description" content="<?=$arResult['NAME']?>">
		</picture>
	</div>
	<div class="model-intro__breadcrumb container">
		<?$APPLICATION->IncludeComponent(
			"bitrix:breadcrumb", 
			"main.breadcrumb", 
			array(
				"START_FROM" => "0",
				"PATH" => "",
				"SITE_ID" => "s2",
				"COMPONENT_TEMPLATE" => "main.breadcrumb"
			),
			false
		);?>
	</div>
	<div class="model-intro__body container">
		<h1 class="model-intro__title title margin_b_s"><?=$arResult['NAME']?></h1>
		<?if($arResult['PREVIEW_TEXT'] <> ''):?>
		<p class="model-intro__subtitle section-subtitle margin_b_m"><?=$arResult['PREVIEW_TEXT']?></p>
		<?endif?>
		<div class="model-intro__body-btn-container">
			<a class="btn btn--light" href="/configurator/">Конфигуратор</a>
			<button class="btn btn_color_white" type="button" onclick="openModal('default', {'crm-entity': 'lead', 'crm-title': 'Купить <?=$arResult['DISPLAY_PROPERTIES']['MODEL_PROPERTIES']['M_SHORT_NAME']['VALUE']?>'})">Купить</button>
		</div>
	</div>
	<div class="model-intro__footer container">
		<p class="model-intro__price section-subtitle">Цена от <?=$arResult['DISPLAY_PROPERTIES']['MODEL_PROPERTIES']['C_PRICE']['VALUE']?> руб.</p>
		<div class="model-intro__benefits">
			<p class="model-intro__benefits-item section-subtitle"><?=$arResult['DISPLAY_PROPERTIES']['MODEL_PROPERTIES']['MODEL_CHAR_1']['VALUE']?></p>
			<p class="model-intro__benefits-item section-subtitle"><?=$arResult['DISPLAY_PROPERTIES']['MODEL_PROPERTIES']['MODEL_CHAR_2']['VALUE']?></p>
			<p class="model-intro__benefits-item section-subtitle"><?=$arResult['DISPLAY_PROPERTIES']['MODEL_PROPERTIES']['MODEL_CHAR_3']['VALUE']?></p>
		</div>
	</div>
</section>

<section class="section section_padding_top_big">
	<div class="container">
		<div class="model-chars__head">
			<div class="model-chars__title-container">
				<h2 class="section-title"><?=$arResult['PROPERTIES']['MODELS_NAME']['VALUE']?></h2>
			</div>
			<div class="model-chars__arrows arrows">
				<button class="model-chars__arrows-prev arrows__btn"><img class="arrows__img" src="/local/templates/tinger/img/arrow-prev.svg" alt="Стрелка назад"></button>
				<button class="model-chars__arrows-next arrows__btn"><img class="arrows__img" src="/local/templates/tinger/img/arrow-next.svg" alt="Стрелка вперёд"></button>
			</div>
		</div>

		<?global $arrfilter;
		$arrfilter = ['ID' => $arResult['PROPERTIES']['MODELS']['VALUE']];?>

		<?$APPLICATION->IncludeComponent(
			"bitrix:news.list",
			"model-chars.block",
			Array(
				"ACTIVE_DATE_FORMAT" => "d-m-Y",
				"ADD_SECTIONS_CHAIN" => "N",
				"AJAX_MODE" => "N",
				"AJAX_OPTION_ADDITIONAL" => "",
				"AJAX_OPTION_HISTORY" => "N",
				"AJAX_OPTION_JUMP" => "N",
				"AJAX_OPTION_STYLE" => "N",
				"CACHE_FILTER" => "N",
				"CACHE_GROUPS" => "Y",
				"CACHE_TIME" => "36000000",
				"CACHE_TYPE" => "A",
				"CHECK_DATES" => "Y",
				"DETAIL_URL" => "",
				"DISPLAY_BOTTOM_PAGER" => "N",
				"DISPLAY_DATE" => "Y",
				"DISPLAY_NAME" => "Y",
				"DISPLAY_PICTURE" => "Y",
				"DISPLAY_PREVIEW_TEXT" => "Y",
				"DISPLAY_TOP_PAGER" => "N",
				"FIELD_CODE" => array(
					"PREVIEW_PICTURE"
				),
				"FILTER_NAME" => "arrfilter",
				"HIDE_LINK_WHEN_NO_DETAIL" => "N",
				"IBLOCK_ID" => "11",
				"IBLOCK_TYPE" => "catalog",
				"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
				"INCLUDE_SUBSECTIONS" => "N",
				"MESSAGE_404" => "",
				"NEWS_COUNT" => "20",
				"PAGER_BASE_LINK_ENABLE" => "N",
				"PAGER_DESC_NUMBERING" => "N",
				"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
				"PAGER_SHOW_ALL" => "N",
				"PAGER_SHOW_ALWAYS" => "N",
				"PAGER_TEMPLATE" => "",
				"PAGER_TITLE" => "Новости",
				"PARENT_SECTION" => "",
				"PARENT_SECTION_CODE" => "",
				"PREVIEW_TRUNCATE_LEN" => "",
				"PROPERTY_CODE" => array(
					"GENERAL_CHARS", 
					"CROSS_COUNTRY_CHARS",
					"C_SPECIFICATIONS",
					"C_PRICE",
					"C_ALL_CHAR_PDF",
					"C_PREVIEW_PICTURE",
					""
				),
				"SET_BROWSER_TITLE" => "N",
				"SET_LAST_MODIFIED" => "Y",
				"SET_META_DESCRIPTION" => "N",
				"SET_META_KEYWORDS" => "N",
				"SET_STATUS_404" => "N",
				"SET_TITLE" => "N",
				"SHOW_404" => "N",
				"SORT_BY1" => "SORT",
				"SORT_BY2" => "SORT",
				"SORT_ORDER1" => "ASC",
				"SORT_ORDER2" => "ASC",
				"STRICT_SECTION_CHECK" => "N"
			)
		);?>

	</div>
</section>

<?if($arResult['DETAIL_TEXT'] <> ''):?>
<?=$arResult['DETAIL_TEXT']?>
<?endif?>

<?if($arResult['PROPERTIES']['CONF_MODEL']['VALUE'] <> ''):?>
<div class="section section_padding_top_big container">
	<h2 class="section-title section-title_margin_bottom"><?=$arResult['DISPLAY_PROPERTIES']['CONF_TITLE']['VALUE']?></h2>
	<p class="margin_b_m"><?=$arResult['DISPLAY_PROPERTIES']['CONF_TEXT']['~VALUE']?></p>
	<?$APPLICATION->IncludeComponent(
		"bitrix:news.detail",
		"atv-conf.block",
		Array(
			"ACTIVE_DATE_FORMAT" => "d.m.Y",
			"ADD_ELEMENT_CHAIN" => "N",
			"ADD_SECTIONS_CHAIN" => "N",
			"AJAX_MODE" => "N",
			"AJAX_OPTION_ADDITIONAL" => "",
			"AJAX_OPTION_HISTORY" => "N",
			"AJAX_OPTION_JUMP" => "N",
			"AJAX_OPTION_STYLE" => "Y",
			"BROWSER_TITLE" => "-",
			"CACHE_GROUPS" => "Y",
			"CACHE_TIME" => "36000000",
			"CACHE_TYPE" => "N",
			"CHECK_DATES" => "Y",
			"DETAIL_URL" => "",
			"DISPLAY_BOTTOM_PAGER" => "N",
			"DISPLAY_DATE" => "Y",
			"DISPLAY_NAME" => "Y",
			"DISPLAY_PICTURE" => "Y",
			"DISPLAY_PREVIEW_TEXT" => "Y",
			"DISPLAY_TOP_PAGER" => "N",
			"ELEMENT_CODE" => "",
			"ELEMENT_ID" => $arResult['PROPERTIES']['CONF_MODEL']['VALUE'],
			"FIELD_CODE" => array(),
			"IBLOCK_ID" => "11",
			"IBLOCK_TYPE" => "catalog",
			"IBLOCK_URL" => "",
			"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
			"MESSAGE_404" => "",
			"META_DESCRIPTION" => "-",
			"META_KEYWORDS" => "-",
			"PAGER_BASE_LINK_ENABLE" => "N",
			"PAGER_SHOW_ALL" => "N",
			"PAGER_TEMPLATE" => ".default",
			"PAGER_TITLE" => "Страница",
			"PROPERTY_CODE" => array("HL_MODS","HL_CHARACTERISTICS","CONF_MODULE","CONF_COLOR_MODEL","C_ACT_PACKS","HL_PACKS","M_SHORT_NAME"),
			"SET_BROWSER_TITLE" => "N",
			"SET_CANONICAL_URL" => "N",
			"SET_LAST_MODIFIED" => "Y",
			"SET_META_DESCRIPTION" => "N",
			"SET_META_KEYWORDS" => "N",
			"SET_STATUS_404" => "N",
			"SET_TITLE" => "N",
			"SHOW_404" => "N",
			"STRICT_SECTION_CHECK" => "N",
			"USE_PERMISSIONS" => "N",
			"USE_SHARE" => "N"
		)
	);?>
</div>
<?endif?>

<?if ($arResult['PROPERTIES']['SEO']['VALUE']): ?>
<section class="section section_padding_top_big container seo-block">
	<?$APPLICATION->IncludeComponent(
		"bitrix:news.list",
		"seo.block",
		Array(
			"ACTIVE_DATE_FORMAT" => "d.m.Y",
			"ADD_SECTIONS_CHAIN" => "N",
			"AJAX_MODE" => "N",
			"AJAX_OPTION_ADDITIONAL" => "",
			"AJAX_OPTION_HISTORY" => "N",
			"AJAX_OPTION_JUMP" => "N",
			"AJAX_OPTION_STYLE" => "N",
			"CACHE_FILTER" => "N",
			"CACHE_GROUPS" => "Y",
			"CACHE_TIME" => "36000000",
			"CACHE_TYPE" => "A",
			"CHECK_DATES" => "Y",
			"DETAIL_URL" => "",
			"DISPLAY_BOTTOM_PAGER" => "N",
			"DISPLAY_DATE" => "N",
			"DISPLAY_NAME" => "Y",
			"DISPLAY_PICTURE" => "N",
			"DISPLAY_PREVIEW_TEXT" => "N",
			"DISPLAY_TOP_PAGER" => "N",
			"FIELD_CODE" => array("PREVIEW_PICTURE","DETAIL_PICTURE",""),
			"FILTER_NAME" => "",
			"HIDE_LINK_WHEN_NO_DETAIL" => "N",
			"IBLOCK_ID" => "36",
			"IBLOCK_TYPE" => "catalog",
			"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
			"INCLUDE_SUBSECTIONS" => "N",
			"MESSAGE_404" => "",
			"NEWS_COUNT" => "20",
			"PAGER_BASE_LINK_ENABLE" => "N",
			"PAGER_DESC_NUMBERING" => "N",
			"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
			"PAGER_SHOW_ALL" => "N",
			"PAGER_SHOW_ALWAYS" => "N",
			"PAGER_TEMPLATE" => "",
			"PAGER_TITLE" => "Новости",
			"PARENT_SECTION" => $arResult['PROPERTIES']['SEO']['VALUE'],
			"PARENT_SECTION_CODE" => "",
			"PREVIEW_TRUNCATE_LEN" => "",
			"PROPERTY_CODE" => array("",""),
			"SET_BROWSER_TITLE" => "N",
			"SET_LAST_MODIFIED" => "Y",
			"SET_META_DESCRIPTION" => "N",
			"SET_META_KEYWORDS" => "N",
			"SET_STATUS_404" => "N",
			"SET_TITLE" => "N",
			"SHOW_404" => "N",
			"SORT_BY1" => "SORT",
			"SORT_BY2" => "SORT",
			"SORT_ORDER1" => "ASC",
			"SORT_ORDER2" => "ASC",
			"STRICT_SECTION_CHECK" => "N"
		)
	);?>
</section>
<?endif?>

<section class="section section_padding_top_big">
	<div class="action">
	<?$APPLICATION->IncludeComponent(
		"bitrix:news.detail", 
		"action.block", 
		array(
			"IBLOCK_TYPE" => "content",
			"IBLOCK_ID" => 31,
			"ELEMENT_ID" => $arResult['PROPERTIES']['ACTION']['VALUE'],
			"ELEMENT_CODE" => "",
			"FILTER_NAME" => "",
			"FIELD_CODE" => array(
				"",
			),
			"PROPERTY_CODE" => array(
				"BTN_TEXT",
				"BTN_LINK",
				"",
			),
			"CHECK_DATES" => "N",
			"DETAIL_URL" => "N",
			"AJAX_MODE" => "N",
			"AJAX_OPTION_JUMP" => "N",
			"AJAX_OPTION_STYLE" => "N",
			"AJAX_OPTION_HISTORY" => "N",
			"AJAX_OPTION_ADDITIONAL" => "",
			"CACHE_TYPE" => "N",
			"CACHE_TIME" => "36000000",
			"CACHE_FILTER" => "N",
			"CACHE_GROUPS" => "Y",
			"PREVIEW_TRUNCATE_LEN" => "",
			"ACTIVE_DATE_FORMAT" => "d.m.Y",
			"SET_TITLE" => "N",
			"SET_BROWSER_TITLE" => "N",
			"SET_META_KEYWORDS" => "N",
			"SET_META_DESCRIPTION" => "N",
			"SET_LAST_MODIFIED" => "Y",
			"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
			"ADD_SECTIONS_CHAIN" => "N",
			"HIDE_LINK_WHEN_NO_DETAIL" => "N",
			"PARENT_SECTION" => "",
			"PARENT_SECTION_CODE" => "",
			"INCLUDE_SUBSECTIONS" => "N",
			"STRICT_SECTION_CHECK" => "N",
			"PAGER_TEMPLATE" => ".default",
			"DISPLAY_TOP_PAGER" => "N",
			"DISPLAY_BOTTOM_PAGER" => "N",
			"PAGER_TITLE" => "",
			"PAGER_SHOW_ALWAYS" => "N",
			"PAGER_DESC_NUMBERING" => "N",
			"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
			"PAGER_SHOW_ALL" => "N",
			"PAGER_BASE_LINK_ENABLE" => "N",
			"SET_STATUS_404" => "N",
			"SHOW_404" => "N",
			"MESSAGE_404" => "",
			"IBLOCK_URL" => "",
			"SET_CANONICAL_URL" => "N",
			"BROWSER_TITLE" => "-",
			"META_KEYWORDS" => "-",
			"META_DESCRIPTION" => "-",
			"ADD_ELEMENT_CHAIN" => "N",
			"USE_PERMISSIONS" => "N"
		),
		false
	);?>
	</div>
</section>





















