<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
	$this->addExternalJs('https://yastatic.net/share2/share.js');
	global $USER;

	$customDescription = strip_tags($arResult['DETAIL_TEXT']);
	$customDescription = preg_replace('/\s\s+/', ' ', $customDescription);
	$customDescription = html_entity_decode($customDescription);
	/* $customDescription = filter_var($customDescription, FILTER_SANITIZE_STRING); */
	$customDescription = mb_strimwidth($customDescription, 0, 240, '');

	$customDescriptionResult = substr($customDescription, 0, strrpos($customDescription, '.'));

	if (mb_strlen($customDescriptionResult) < 80) {
		$customDescriptionResult = $customDescription . '...';
	} else {
		$customDescriptionResult = $customDescriptionResult . '.';
	}

	$APPLICATION->SetPageProperty('description', $customDescriptionResult); 
?>
<main>
	<section itemscope itemtype="http://schema.org/Article" class="news container margin_b_xl">
		<article class="news__inner">
			<div class="news__about">
				<h1 itemprop="headline" class="page-title margin_b_m"><?=$arResult['NAME']?></h1>
				<div class="author margin_b_m">
					<img class="author__img" src="<?=SITE_TEMPLATE_PATH?>/img/user.svg" alt="Medina">
					<p itemprop="author" class="author__name">Medina Kim</p>
				</div>
			</div>
			<div class="news__body">
				<? if ($arResult['DETAIL_PICTURE']['SRC']) : ?>
				<img itemprop="image" class="news__img margin_b_m" src="<?=$arResult['DETAIL_PICTURE']['SRC']?>" alt="<?=$arResult["NAME"]?>">
				<? endif ?>
				<div itemprop="articleBody" class="news__text margin_b_s pure-html">
					<?=$arResult["DETAIL_TEXT"]?>
				</div>
				<div class="news__bar">
					<div class="news__time" itemprop="datePublished" datetime="<?=$arResult['ACTIVE_FROM']?>"><?=$arResult['ACTIVE_FROM']?></div>
					<noindex><div class="ya-share2" data-services="whatsapp,telegram" data-copy="extraItem" data-color-scheme="whiteblack"></div></noindex>
				</div>
			</div>
		</article>
		<meta itemprop="dateModified" content="<?=$arResult['TIMESTAMP_X']?>">
		<meta itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" itemid="<?=$APPLICATION->GetCurPage()?>"/>
	</section>

	<section class="section section_padding_top_small section_padding_bottom_small">
		<div class="container">
			<p class="section-title section-title_margin_bottom">Other <?=mb_strtolower($arResult['IBLOCK']['ELEMENTS_NAME'])?></p>
			<?$APPLICATION->IncludeComponent(
				"bitrix:news.list", 
				"news-list.block", 
				array(
					"COMPONENT_TEMPLATE" => "news-list.block",
					"IBLOCK_TYPE" => "news",
					"IBLOCK_ID" => $arResult["IBLOCK"]["ID"],
					"NEWS_COUNT" => "20",
					"SORT_BY1" => "ACTIVE_FROM",
					"SORT_ORDER1" => "DESC",
					"SORT_BY2" => "SORT",
					"SORT_ORDER2" => "ASC",
					"FILTER_NAME" => "",
					"FIELD_CODE" => array(
						0 => "DETAIL_PICTURE",
						1 => "",
					),
					"PROPERTY_CODE" => array(
						0 => "",
						1 => "",
					),
					"CHECK_DATES" => "Y",
					"DETAIL_URL" => "/#IBLOCK_CODE#/#ELEMENT_CODE#/",
					"AJAX_MODE" => "N",
					"AJAX_OPTION_JUMP" => "N",
					"AJAX_OPTION_STYLE" => "Y",
					"AJAX_OPTION_HISTORY" => "N",
					"AJAX_OPTION_ADDITIONAL" => "",
					"CACHE_TYPE" => "A",
					"CACHE_TIME" => "36000000",
					"CACHE_FILTER" => "N",
					"CACHE_GROUPS" => "Y",
					"PREVIEW_TRUNCATE_LEN" => "",
					"ACTIVE_DATE_FORMAT" => "d.m.Y",
					"SET_TITLE" => "N",
					"SET_BROWSER_TITLE" => "N",
					"SET_META_KEYWORDS" => "N",
					"SET_META_DESCRIPTION" => "N",
					"SET_LAST_MODIFIED" => "N",
					"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
					"ADD_SECTIONS_CHAIN" => "N",
					"HIDE_LINK_WHEN_NO_DETAIL" => "N",
					"PARENT_SECTION" => "",
					"PARENT_SECTION_CODE" => "",
					"INCLUDE_SUBSECTIONS" => "Y",
					"STRICT_SECTION_CHECK" => "N",
					"PAGER_TEMPLATE" => "",
					"DISPLAY_TOP_PAGER" => "N",
					"DISPLAY_BOTTOM_PAGER" => "Y",
					"PAGER_TITLE" => "Новости",
					"PAGER_SHOW_ALWAYS" => "N",
					"PAGER_DESC_NUMBERING" => "N",
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
					"PAGER_SHOW_ALL" => "N",
					"PAGER_BASE_LINK_ENABLE" => "N",
					"SET_STATUS_404" => "N",
					"SHOW_404" => "N",
					"MESSAGE_404" => ""
				),
				false
			);?>
		</div>
	</section>

</main>