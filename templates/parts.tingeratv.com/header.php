<!DOCTYPE html>
<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

if ($sectionTitle = $APPLICATION->GetFileRecursive('.section.php')) { 
	@include($_SERVER['DOCUMENT_ROOT'] . $sectionTitle);
}

?>

<html lang="<?=LANGUAGE_ID?>">
<head itemscope itemtype="http://schema.org/WPHeader">

<meta charset="<?=LANG_CHARSET?>">

<meta name="viewport" content="width=device-width,initial-scale=1">
<meta content="true" name="HandheldFriendly">
<meta content="width" name="MobileOptimized">
<meta content="yes" name="apple-mobile-web-app-capable">
<meta http-equiv="X-UA-Compatible" content="IE=edge">


<link href="<?=SITE_TEMPLATE_PATH?>/css/libraries/swiper-bundle.min.css" type="text/css"  rel="stylesheet">
<link href="<?=SITE_TEMPLATE_PATH?>/css/libraries/glightbox.min.css" type="text/css"  rel="stylesheet">

<link href="<?=SITE_TEMPLATE_PATH?>/css/reset.css" type="text/css"  rel="stylesheet">
<link href="<?=SITE_TEMPLATE_PATH?>/css/vars.css?v=12" type="text/css"  rel="stylesheet">
<link href="<?=SITE_TEMPLATE_PATH?>/css/fonts.css?v=11" type="text/css"  rel="stylesheet">
<link href="<?=SITE_TEMPLATE_PATH?>/css/style.css?v=41" type="text/css"  rel="stylesheet">

<link href="<?=SITE_TEMPLATE_PATH?>/css/components/general.css?v=34" type="text/css"  rel="stylesheet">
<link href="<?=SITE_TEMPLATE_PATH?>/css/components/links.css" type="text/css"  rel="stylesheet">
<link href="<?=SITE_TEMPLATE_PATH?>/css/components/container.css?v=31" type="text/css"  rel="stylesheet">
<link href="<?=SITE_TEMPLATE_PATH?>/css/components/titles.css?v=32" type="text/css"  rel="stylesheet">

<title itemprop="headline"><?$APPLICATION->ShowTitle()?></title>
<?$APPLICATION->ShowHead()?>

<link rel="icon" type="image/png" sizes="160x160" href="<?=SITE_TEMPLATE_PATH?>/img/favicon-160.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?=SITE_TEMPLATE_PATH?>/img/favicon-32.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?=SITE_TEMPLATE_PATH?>/img/favicon-16.png">
<link rel="icon" type="image/svg+xml" sizes="any" href="<?=SITE_TEMPLATE_PATH?>/img/favicon-any.svg">
<link rel="apple-touch-icon" href="<?=SITE_TEMPLATE_PATH?>/img/favicon-160.png">
<link rel="manifest" href="/manifest.json">

<!--<style>
* {
outline: 1px solid red;
}
</style>-->

<?
use Bitrix\Main\Page\Asset;

/* CSS compontents */
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/components/header.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/components/footer.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/components/form.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/components/form-policy.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/components/section.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/components/cookie-bar.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/components/text.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/components/popup.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/components/btn.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/components/inputs.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/components/logo.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/components/contacts.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/components/news-small.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/components/swiper.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/components/arrows.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/components/arrow-link.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/components/slider-pagination.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/components/modifiers.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/components/popup-feedback.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/components/note.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/components/tooltip.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/components/iframe-video.css');

Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/libraries/modal-video.min.css');

/* JS libraries */
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/libraries/swiper-bundle.min.js');
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/libraries/glightbox.min.js');
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/libraries/modal-video.min.js');
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/app.js');

?>

</head>
	<body class="page">

		<? if ($USER->IsAdmin()) $APPLICATION->ShowPanel(); ?>
	

		<header class="header <?$APPLICATION->ShowProperty('header-class', 'default')?>">
			<div class="container">
				<div class="header__inner">
					<div class="logo">
						<a class="logo__link" href="/"><img class="logo__img" src="<?=SITE_TEMPLATE_PATH?>/img/logo-header.svg" alt="TINGER logo"></a>
						<p class="logo__tagline">ATV <br>manufacturing</p>
					</div>
					<nav class="header-nav">
						<button class="burger" type="button">Show menu</button>
						<ul itemscope itemtype="http://schema.org/SiteNavigationElement" class="header-nav__list">
							<li class="header-nav__item">
								<a itemprop="url" class="header-nav__link" href="/">Main page</a>
							</li>
							<li class="header-nav__item">
								<a itemprop="url" class="header-nav__link" href="/contacts/">Contacts</a>
							</li>
						</ul>
					</nav>
					<div class="header-nav__services">
						<a class="header-nav__phone-link" href="tel:+19299992156" title="Call us">
							<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M14.6571 20.0001C13.8789 19.9943 13.1042 19.8967 12.3489 19.7091C9.74068 19.0798 7.05487 17.4834 4.78742 15.214C2.51997 12.9446 0.921613 10.2582 0.292319 7.65252C-0.370305 4.91149 0.102287 2.56644 1.62155 1.04718L2.05534 0.613386C2.44891 0.220599 2.98224 0 3.53828 0C4.09432 0 4.62765 0.220599 5.02123 0.613386L7.51403 3.10569C7.90706 3.49913 8.12782 4.03251 8.12782 4.58863C8.12782 5.14475 7.90706 5.67813 7.51403 6.07158L6.04153 7.54358C6.74743 8.78227 7.70754 10.022 8.84226 11.1567C9.97698 12.2914 11.2177 13.252 12.4558 13.9579L13.9278 12.4854C14.1226 12.2906 14.3538 12.1361 14.6082 12.0307C14.8626 11.9252 15.1354 11.871 15.4108 11.871C15.6862 11.871 15.9589 11.9252 16.2134 12.0307C16.4678 12.1361 16.699 12.2906 16.8937 12.4854L19.386 14.9777C19.7792 15.371 20 15.9043 20 16.4604C20 17.0165 19.7792 17.5498 19.386 17.9431L18.9518 18.3769C17.8807 19.4499 16.3983 20.0001 14.6571 20.0001ZM3.53828 1.49141C3.45885 1.49102 3.38015 1.50648 3.30677 1.53689C3.23339 1.5673 3.16682 1.61205 3.11096 1.66851L2.67667 2.1023C1.53897 3.24 1.20666 5.08709 1.74094 7.30032C2.30656 9.64487 3.76264 12.081 5.84055 14.1584C7.91847 16.2358 10.3541 17.6904 12.6991 18.258C14.9128 18.7923 16.7589 18.46 17.8966 17.3223L18.3304 16.8885C18.4438 16.775 18.5074 16.6212 18.5074 16.4609C18.5074 16.3005 18.4438 16.1468 18.3304 16.0333L15.8386 13.541C15.7252 13.4277 15.5714 13.364 15.411 13.364C15.2507 13.364 15.0969 13.4277 14.9835 13.541L13.1175 15.407C13.0055 15.519 12.8608 15.5925 12.7043 15.6169C12.5478 15.6412 12.3876 15.6151 12.2469 15.5423C10.7172 14.7514 9.17506 13.5997 7.78714 12.2118C6.39921 10.8239 5.25006 9.28272 4.4571 7.75301C4.38428 7.61237 4.35809 7.45222 4.38233 7.29571C4.40657 7.13921 4.47997 6.99447 4.59191 6.88245L6.4584 5.01645C6.57174 4.90302 6.63541 4.74923 6.63541 4.58888C6.63541 4.42853 6.57174 4.27474 6.4584 4.16131L3.9661 1.66851C3.91006 1.61214 3.84339 1.56746 3.76995 1.53706C3.69651 1.50666 3.61776 1.49115 3.53828 1.49141V1.49141Z" fill="white"></path>
								<path d="M15.4542 11.03C15.2563 11.03 15.0665 10.9513 14.9265 10.8114C14.7866 10.6715 14.708 10.4817 14.708 10.2838C14.7065 8.97469 14.1859 7.71964 13.2603 6.79395C12.3347 5.86825 11.0797 5.34749 9.77061 5.34591C9.57271 5.34591 9.38291 5.26729 9.24297 5.12736C9.10303 4.98742 9.02441 4.79762 9.02441 4.59971C9.02441 4.40181 9.10303 4.21201 9.24297 4.07207C9.38291 3.93213 9.57271 3.85352 9.77061 3.85352C13.316 3.85352 16.2004 6.73882 16.2004 10.2838C16.2004 10.4817 16.1217 10.6715 15.9818 10.8114C15.8419 10.9513 15.6521 11.03 15.4542 11.03Z" fill="white"></path>
								<path d="M18.6081 11.0296C18.4102 11.0296 18.2204 10.951 18.0804 10.811C17.9405 10.6711 17.8619 10.4813 17.8619 10.2834C17.8619 5.82162 14.2304 2.19162 9.77061 2.19162C9.57271 2.19162 9.38291 2.113 9.24297 1.97306C9.10303 1.83312 9.02441 1.64332 9.02441 1.44542C9.02441 1.24751 9.10303 1.05771 9.24297 0.917775C9.38291 0.777836 9.57271 0.699219 9.77061 0.699219C15.0552 0.699219 19.3543 4.99881 19.3543 10.2834C19.3543 10.4813 19.2757 10.6711 19.1357 10.811C18.9958 10.951 18.806 11.0296 18.6081 11.0296Z" fill="white"></path>
							</svg>
							<span class="header-nav__phone-link-text">+1 (929) 999-21-56</span>
						</a>
					</div>
				</div>
			</div>
		</header>
		<div class="panel__search-form">
			<div class="container">
				<?$APPLICATION->IncludeComponent(
					"bitrix:search.title",
					"search.title.parts",
					Array(
						"CATEGORY_0" => array("iblock_catalog"),
						"CATEGORY_0_TITLE" => "Parts catalog",
						"CATEGORY_0_iblock_catalog" => array("73"),
						"CATEGORY_1" => array(),
						"CATEGORY_1_TITLE" => "",
						"CATEGORY_2" => array("iblock_catalog_en"),
						"CATEGORY_2_TITLE" => "",
						"CATEGORY_2_iblock_catalog" => array("73"),
						"CATEGORY_OTHERS_TITLE" => "",
						"CHECK_DATES" => "Y",
						"CONTAINER_ID" => "title-search",
						"CONVERT_CURRENCY" => "Y",
						"CURRENCY_ID" => "RUB",
						"INPUT_ID" => "title-search-input",
						"NUM_CATEGORIES" => "1",
						"ORDER" => "rank",
						"PAGE" => "#SITE_DIR#/index.php",
						"PREVIEW_HEIGHT" => "75",
						"PREVIEW_TRUNCATE_LEN" => "150",
						"PREVIEW_WIDTH" => "75",
						"PRICE_CODE" => "",
						"PRICE_VAT_INCLUDE" => "",
						"SHOW_INPUT" => "Y",
						"SHOW_OTHERS" => "N",
						"SHOW_PREVIEW" => "Y",
						"TOP_COUNT" => "10",
						"USE_LANGUAGE_GUESS" => "N"
					)
				);?>
			</div>
		</div>