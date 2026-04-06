<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<section class="section section_padding_bottom_big seo-intro">
	<div class="container seo-intro__breadcrumb">
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
	<div class="container seo-intro__body">
		<h1 class="seo-intro__title title"><?=$arResult['NAME']?></h1>
		<?if($arResult['PREVIEW_TEXT']):?><p class="seo-intro__subtitle section-subtitle"><?=$arResult['PREVIEW_TEXT']?></p><?endif?>
	</div>
	<div class="seo-intro__img-container">
		<picture itemscope itemtype="http://schema.org/ImageObject">
			<source media="(max-width: 480px)" srcset="<?=$arResult['PREVIEW_PICTURE']['SRC']?>">
			<img class="seo-intro__img" itemprop="contentUrl" src="<?=$arResult['DETAIL_PICTURE']['SRC']?>" alt="<?=$arResult['NAME']?>">
			<meta itemprop="name" content="Вездеход ТИНГЕР">
			<meta itemprop="description" content="<?=$arResult['NAME']?>">
		</picture>
	</div>
</section>

<?=$arResult['DETAIL_TEXT']?>

<section class="section section_padding_bottom_big section_padding_top_small">
	<div class="container">
		<h2 class="section-title"><?=$arResult['PROPERTIES']['MODELS_NAME']['VALUE']?></h2>
		<div class="model-chars__swiper-thumbs swiper">
			<div class="swiper-wrapper">
				<div class="swiper-slide">1</div>
				<div class="swiper-slide">2</div>
				<div class="swiper-slide">3</div> 
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
					""
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

<?if ($arResult['PROPERTIES']['SEO']['VALUE']): ?>
	<section class="section section_padding_bottom_big container seo-block">
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