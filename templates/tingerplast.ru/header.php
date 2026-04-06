<!DOCTYPE html>
<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); 
	use Bitrix\Main\Page\Asset;
	global $USER;
?>
<html lang="<?=LANGUAGE_ID?>">

	<head itemscope itemtype="http://schema.org/WPHeader">
		
		<script>
			(function(w, d, s, h, id) {
				w.roistatProjectId = id; w.roistatHost = h;
				var p = d.location.protocol == "https:" ? "https://" : "http://";
				var u = /^.*roistat_visit=[^;]+(.*)?$/.test(d.cookie) ? "/dist/module.js" : "/api/site/1.0/"+id+"/init";
				var js = d.createElement(s); js.charset="UTF-8"; js.async = 1; js.src = p+h+u; var js2 = d.getElementsByTagName(s)[0]; js2.parentNode.insertBefore(js, js2);
			})(window, document, 'script', 'cloud.roistat.com', '408707c5e2d26841c0e469a77954750c');
		</script>

		<script>
			window.addEventListener('b24:form:init', function(event) {
			function getCookie(name) {
				var match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
				return match ? match[2] : null;
			}

			var roistatVisitId = getCookie('roistat_visit') || 'nocookie';
			var form = event.detail.object;
			form.setProperty('roistatId', roistatVisitId);
			});
		</script>

		<script>
			(function(w,d,u){
					var s=d.createElement('script');s.async=true;s.src=u+'?'+(Date.now()/60000|0);
					var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
			})(window,document,'https://cdn-ru.bitrix24.ru/b1538393/crm/site_button/loader_48_exjrdd.js');
		</script>

		<title itemprop="headline"><?$APPLICATION->ShowTitle()?></title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="initial-scale=1.0, width=device-width">
		<link rel="shortcut icon" type="image/x-icon" href="<?=SITE_DIR?>favicon.ico">

		<?
		
		$APPLICATION->ShowHead();

		CUtil::InitJSCore();
		CJSCore::Init(array("fx"));
		CJSCore::Init(array('ajax'));

		Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/css/swiper-bundle.min.css");
		Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/css/glightbox.min.css");
		Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/css/fonts.css");
		Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/css/tabs.css");
		Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/css/style.css");

		Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/js/swiper-bundle.min.js");
		Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/js/glightbox.min.js");
		Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/js/phone-mask.js");
		Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/js/tabs.js");
		Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/js/main.js");

		?>
	</head>

	<body class="page">

		<header class="header" itemscope itemtype="https://schema.org/WPHeader">
			<div class="header__top container">
				<div class="header__logo-container">
					<div class="header__logo">
						<a class="header__logo-link" href="/">
							<img class="header__logo-img" src="<?=SITE_TEMPLATE_PATH?>/img/logo-black.svg" alt="Логотип компании TINGERPLAST">
						</a>
					</div>
					<div class="header__logo-desc">производим изделия из пластика</div>
				</div>
				<div class="header__search-container">
					<div class="header__search">
						<?$APPLICATION->IncludeComponent(
							"bitrix:search.title",
							"search.title",
							Array(
								"CATEGORY_0" => array("iblock_catalog_tingerplast"),
								"CATEGORY_0_TITLE" => "Каталог",
								"CATEGORY_0_iblock_catalog_tingerplast" => array("41"),
								"CATEGORY_1" => array(),
								"CATEGORY_1_TITLE" => "",
								"CATEGORY_2" => array("iblock_catalog_tingerplast"),
								"CATEGORY_2_TITLE" => "",
								"CATEGORY_2_iblock_catalog_tingerplast" => array("41"),
								"CATEGORY_OTHERS_TITLE" => "",
								"CHECK_DATES" => "Y",
								"CONTAINER_ID" => "title-search",
								"CONVERT_CURRENCY" => "Y",
								"CURRENCY_ID" => "RUB",
								"INPUT_ID" => "title-search-input",
								"NUM_CATEGORIES" => "1",
								"ORDER" => "rank",
								"PAGE" => "#SITE_DIR#index.php",
								"PREVIEW_HEIGHT" => "50",
								"PREVIEW_TRUNCATE_LEN" => "150",
								"PREVIEW_WIDTH" => "50",
								"PRICE_CODE" => array("PRICE"),
								"PRICE_VAT_INCLUDE" => "Y",
								"SHOW_INPUT" => "Y",
								"SHOW_OTHERS" => "N",
								"SHOW_PREVIEW" => "Y",
								"TOP_COUNT" => "10",
								"USE_LANGUAGE_GUESS" => "N"
							)
						);?>
					</div>
				</div>
				<div class="header__phone-container">
					<div class="header__phone">
						<a class="header__phone-link" href="tel:88003509805">8 (800) 350-98-05</a>
						<span>по всем вопросам</span>
						<a class="header__phone-link" href="tel:88003509845">8 (800) 350-98-45</a>
						<span>погреба и емкости</span>
					</div>
					<div class="header__phone-worktime">пн-пт c 9:00 до 18:00</div>
				</div>
			</div>
			<div class="header__bottom">
				<nav class="header__bottom-inner container" itemscope itemtype="https://schema.org/SiteNavigationElement">
					<div class="header__catalog-btn-container">
						<a class="header__catalog-link" href="/">Каталог</a>
						<button class="header__catalog-btn">Каталог</button>
					</div>
					<button class="burger" type="button">Показать меню</button>
					<ul class="header__nav-list">
						<li class="header__nav-item" itemprop="name">
							<a class="header__nav-link" href="/delivery/" itemprop="url">Доставка и оплата</a>
						</li>
						<li class="header__nav-item" itemprop="name">
							<a class="header__nav-link" href="/warranty/" itemprop="url">Гарантия и возврат</a>
						</li>
						<li class="header__nav-item" itemprop="name">
							<a class="header__nav-link" href="/faq/" itemprop="url">Вопросы и ответы</a>
						</li>
						<li class="header__nav-item" itemprop="name">
							<a class="header__nav-link" href="/reviews/" itemprop="url">Отзывы</a>
						</li>
						<li class="header__nav-item header__nav-item_type_submenu">
							<span class="header__nav-link header__nav-link_type_submenu">О компании</span>
							<ul class="header__nav-sublist">
								<li class="header__nav-subitem" itemprop="name">
									<a class="header__nav-sublink" href="/news/" itemprop="url">Новости</a>
								</li>
								<li class="header__nav-subitem" itemprop="name">
									<a class="header__nav-sublink" href="/articles/" itemprop="url">Статьи</a>
								</li>
								<li class="header__nav-subitem" itemprop="name">
									<a class="header__nav-sublink" href="/media/" itemprop="url">СМИ о нас</a>
								</li>
								<li class="header__nav-subitem" itemprop="name">
									<a class="header__nav-sublink" href="/about/" itemprop="url">О компании</a>
								</li>
							</ul>
						</li>
						<li class="header__nav-item" itemprop="name">
							<a class="header__nav-link" href="/account/auth/" itemprop="url">Дилерам</a>
						</li>
						<li class="header__nav-item" itemprop="name">
							<a class="header__nav-link" href="/contacts/" itemprop="url">Контакты</a>
						</li>
					</ul>
					<div class="header__call-btn-container">
						<!-- <button class="header__call-btn" type="button" data-action="modal" data-modal-type="default" data-crm-title="Позвоните мне">Позвоните мне</button> -->
						<?/* global $USER; if ($USER->IsAdmin()): */?>
							<?$APPLICATION->IncludeComponent(
							"bitrix:sale.basket.basket.line",
							"sale.basket.basket.line",
							Array(
								"HIDE_ON_BASKET_PAGES" => "N",
								"PATH_TO_AUTHORIZE" => "",
								"PATH_TO_BASKET" => SITE_DIR."cart/",
								"PATH_TO_ORDER" => "",
								"PATH_TO_PERSONAL" => "",
								"PATH_TO_PROFILE" => "",
								"PATH_TO_REGISTER" => "",
								"POSITION_FIXED" => "N",
								"SHOW_AUTHOR" => "Y",
								"SHOW_EMPTY_VALUES" => "Y",
								"SHOW_NUM_PRODUCTS" => "Y",
								"SHOW_PERSONAL_LINK" => "Y",
								"SHOW_PRODUCTS" => "N",
								"SHOW_REGISTRATION" => "Y",
								"SHOW_TOTAL_PRICE" => "Y"
							)
						);?>
						<?/* endif */?>
					</div>
				</nav>
			</div>
		</header>
		<div class="wrapper container">
			<aside class="sidebar" itemscope itemtype="https://schema.org/WPSideBar">
				<nav class="sidebar__nav">
					<?$APPLICATION->IncludeComponent(
						"bitrix:catalog.section.list", 
						"catalog.section.list.sidebar", 
						array(
							"VIEW_MODE" => "LIST",
							"SHOW_PARENT_NAME" => "Y",
							"IBLOCK_TYPE" => "catalog",
							"IBLOCK_ID" => "41",
							"SECTION_ID" => "",
							"SECTION_CODE" => "",
							"SECTION_URL" => "",
							"COUNT_ELEMENTS" => "N",
							"TOP_DEPTH" => "2",
							"SECTION_FIELDS" => array(
								0 => "",
								1 => "",
							),
							"SECTION_USER_FIELDS" => array(
								0 => "UF_SECTION_ICON",
								1 => "UF_GENERAL_SECTION",
								2 => "",
							),
							"ADD_SECTIONS_CHAIN" => "N",
							"CACHE_TYPE" => "A",
							"CACHE_TIME" => "36000000",
							"CACHE_NOTES" => "",
							"CACHE_GROUPS" => "Y",
							"COMPONENT_TEMPLATE" => "catalog.section.list.sidebar",
							"COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
							"ADDITIONAL_COUNT_ELEMENTS_FILTER" => "additionalCountFilter",
							"HIDE_SECTIONS_WITH_ZERO_COUNT_ELEMENTS" => "N",
							"FILTER_NAME" => "sectionsFilter",
							"CACHE_FILTER" => "N"
						),
						false
					);?>
				</nav>
				<div class="sidebar-news">
					<div class="sidebar-news__tabs tabs">
						<div class="tabs__head-container">
							<div class="tabs__head">
								<div class="tabs__caption" data-tab="news">Новости</div>
								<div class="tabs__caption" data-tab="articles">Статьи</div>
							</div>
						</div>
						<div class="tabs__body">
							<div class="tabs__content" data-tab="news">
								<?$APPLICATION->IncludeComponent(
									"bitrix:news.list", 
									"sidebar-news", 
									array(
										"COMPONENT_TEMPLATE" => "sidebar-news",
										"IBLOCK_TYPE" => "news_tingerplast",
										"IBLOCK_ID" => "44",
										"NEWS_COUNT" => "4",
										"SORT_BY1" => "ACTIVE_FROM",
										"SORT_ORDER1" => "DESC",
										"SORT_BY2" => "SORT",
										"SORT_ORDER2" => "ASC",
										"FILTER_NAME" => "",
										"FIELD_CODE" => array(
											"DETAIL_PICTURE",
										),
										"PROPERTY_CODE" => array(),
										"CHECK_DATES" => "Y",
										"DETAIL_URL" => "/news/#ELEMENT_CODE#/",
										"AJAX_MODE" => "N",
										"AJAX_OPTION_JUMP" => "N",
										"AJAX_OPTION_STYLE" => "Y",
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
										"SET_LAST_MODIFIED" => "N",
										"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
										"ADD_SECTIONS_CHAIN" => "N",
										"HIDE_LINK_WHEN_NO_DETAIL" => "N",
										"PARENT_SECTION" => "",
										"PARENT_SECTION_CODE" => "",
										"INCLUDE_SUBSECTIONS" => "N",
										"STRICT_SECTION_CHECK" => "N",
										"PAGER_TEMPLATE" => "",
										"DISPLAY_TOP_PAGER" => "N",
										"DISPLAY_BOTTOM_PAGER" => "N",
										"PAGER_TITLE" => "Новости",
										"PAGER_SHOW_ALWAYS" => "N",
										"PAGER_DESC_NUMBERING" => "N",
										"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
										"PAGER_SHOW_ALL" => "N",
										"PAGER_BASE_LINK_ENABLE" => "N",
										"SET_STATUS_404" => "N",
										"SHOW_404" => "N",
										"MESSAGE_404" => "",
									),
									false
								);?>
							</div>
							<div class="tabs__content" data-tab="articles">
								<?$APPLICATION->IncludeComponent(
									"bitrix:news.list", 
									"sidebar-news", 
									array(
										"COMPONENT_TEMPLATE" => "sidebar-news",
										"IBLOCK_TYPE" => "news_tingerplast",
										"IBLOCK_ID" => "47",
										"NEWS_COUNT" => "4",
										"SORT_BY1" => "ACTIVE_FROM",
										"SORT_ORDER1" => "DESC",
										"SORT_BY2" => "SORT",
										"SORT_ORDER2" => "ASC",
										"FILTER_NAME" => "",
										"FIELD_CODE" => array(
											"DETAIL_PICTURE",
										),
										"PROPERTY_CODE" => array(),
										"CHECK_DATES" => "Y",
										"DETAIL_URL" => "/articles/#ELEMENT_CODE#/",
										"AJAX_MODE" => "N",
										"AJAX_OPTION_JUMP" => "N",
										"AJAX_OPTION_STYLE" => "Y",
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
										"SET_LAST_MODIFIED" => "N",
										"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
										"ADD_SECTIONS_CHAIN" => "N",
										"HIDE_LINK_WHEN_NO_DETAIL" => "N",
										"PARENT_SECTION" => "",
										"PARENT_SECTION_CODE" => "",
										"INCLUDE_SUBSECTIONS" => "N",
										"STRICT_SECTION_CHECK" => "N",
										"PAGER_TEMPLATE" => "",
										"DISPLAY_TOP_PAGER" => "N",
										"DISPLAY_BOTTOM_PAGER" => "N",
										"PAGER_TITLE" => "Новости",
										"PAGER_SHOW_ALWAYS" => "N",
										"PAGER_DESC_NUMBERING" => "N",
										"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
										"PAGER_SHOW_ALL" => "N",
										"PAGER_BASE_LINK_ENABLE" => "N",
										"SET_STATUS_404" => "N",
										"SHOW_404" => "N",
										"MESSAGE_404" => "",
									),
									false
								);?>
							</div>
						</div>
					</div>
				</div>
			</aside>
			<main>
				<?
				if(!CSite::InDir('/index.php')) {					
					$APPLICATION->IncludeComponent(
	"bitrix:breadcrumb", 
	"breadcrumb", 
	array(
		"START_FROM" => "0",
		"PATH" => "",
		"SITE_ID" => "s3",
		"COMPONENT_TEMPLATE" => "breadcrumb",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO"
	),
	false
);
				}
				?>