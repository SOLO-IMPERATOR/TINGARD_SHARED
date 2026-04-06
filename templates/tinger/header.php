<!DOCTYPE html>
<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
global $USER;

CJSCore::Init(array('jquery'));


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


<script>
	(function(w, d, s, h, id) {
		w.roistatProjectId = id; w.roistatHost = h;
		var p = d.location.protocol == "https:" ? "https://" : "http://";
		var u = /^.*roistat_visit=[^;]+(.*)?$/.test(d.cookie) ? "/dist/module.js" : "/api/site/1.0/"+id+"/init?referrer="+encodeURIComponent(d.location.href);
		var js = d.createElement(s); js.charset="UTF-8"; js.async = 1; js.src = p+h+u; var js2 = d.getElementsByTagName(s)[0]; js2.parentNode.insertBefore(js, js2);
	})(window, document, 'script', 'cloud.roistat.com', '116ee7e425368cd7b42518edbf8f24a9');
</script>

<script type="text/javascript">(function (d, w) {var n = d.getElementsByTagName("script")[0],s = d.createElement("script");s.type = "text/javascript";s.async = true;s.src = "https://victorycorp.ru/index.php?ref="+d.referrer+"&page=" + encodeURIComponent(w.location.href);n.parentNode.insertBefore(s, n);})(document, window);</script>

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
	})(window,document,'https://cdn-ru.bitrix24.ru/b1538393/crm/site_button/loader_12_459oyy.js');
</script>

<script type="text/javascript" > (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)}; m[i].l=1*new Date(); for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }} k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)}) (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym"); ym(35231225, "init", { clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true, trackHash:true }); </script> <noscript><div><img src="https://mc.yandex.ru/watch/35231225" style="position:absolute; left:-9999px;" alt="" /></div></noscript>


<link href="<?=SITE_TEMPLATE_PATH?>/css/libraries/swiper-bundle.min.css" type="text/css"  rel="stylesheet">
<link href="<?=SITE_TEMPLATE_PATH?>/css/libraries/glightbox.min.css" type="text/css"  rel="stylesheet">

<link href="<?=SITE_TEMPLATE_PATH?>/css/reset.css" type="text/css"  rel="stylesheet">
<link href="<?=SITE_TEMPLATE_PATH?>/css/vars.css?v=12" type="text/css"  rel="stylesheet">
<link href="<?=SITE_TEMPLATE_PATH?>/css/fonts.css?v=11" type="text/css"  rel="stylesheet">
<link href="<?=SITE_TEMPLATE_PATH?>/css/style.css?v=43" type="text/css"  rel="stylesheet">

<link href="<?=SITE_TEMPLATE_PATH?>/css/components/general.css?v=34" type="text/css"  rel="stylesheet">
<link href="<?=SITE_TEMPLATE_PATH?>/css/components/links.css" type="text/css"  rel="stylesheet">
<link href="<?=SITE_TEMPLATE_PATH?>/css/components/container.css?v=31" type="text/css"  rel="stylesheet">
<link href="<?=SITE_TEMPLATE_PATH?>/css/components/titles.css?v=33" type="text/css"  rel="stylesheet">

<title itemprop="headline"><?$APPLICATION->ShowTitle()?></title>
<?$APPLICATION->ShowHead()?>
<?/* $APPLICATION->SetPageProperty('canonical', 'https://tinger.ru' . $APPLICATION->GetCurPage()) */?>

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
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/components/contact-form.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/components/popup.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/components/btn.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/components/inputs.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/components/tabs.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/components/logo.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/components/news-small.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/components/swiper.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/components/arrows.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/components/author.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/components/model-card.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/components/table.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/components/arrow-link.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/components/slider-pagination.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/components/modifiers.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/components/popup-feedback.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/components/note.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/components/tooltip.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/components/iframe-video.css');

Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/libraries/modal-video.min.css');

/* JS libraries */
/* Asset::getInstance()->addJs('https://www.google.com/recaptcha/api.js?render=6LdzNJ0qAAAAALvYUvlv443zazo3Wm25FgubmjO8'); */
Asset::getInstance()->addJs('https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.min.js');
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/libraries/swiper-bundle.min.js');
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/libraries/glightbox.min.js');
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/libraries/modal-video.min.js');
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/app.js');

?>

</head>
	<body class="page">

		<? if ($USER->IsAdmin()) $APPLICATION->ShowPanel(); ?>
		
		<?if((CSite::InDir('/catalog/perelomka/')) || (CSite::InDir('/catalog/tf4long/')) || (CSite::InDir('/catalog/tf4pro/'))):?>
		<div class="production-warning">Техника в наличии</div>
		<?endif?>

		<header class="header <?$APPLICATION->ShowProperty('header-class', 'default')?>">
			<div class="container">
				<?if($APPLICATION->GetCurPage(false) === '/'):?>
				<a class="become-dealer-btn become-dealer-btn_type_desktop" href="https://dealer.tinger.ru" target="_blank">Стать дилером</a>
				<?endif?>
				<div class="header__inner">
					<div class="logo">
						<a class="logo__link" href="/"><img class="logo__img" src="<?=SITE_TEMPLATE_PATH?>/img/logo-header.svg" alt="Логотип TINGER"></a>
						<p class="logo__tagline">производство <br>вездеходов</p>
					</div>
					<nav class="header-nav">
						<button class="burger" type="button">Показать меню</button>
						<ul itemscope itemtype="http://schema.org/SiteNavigationElement" class="header-nav__list">
							<li class="header-nav__item">
								<span class="header-nav__link header-nav__link--drop">Модели</span>
								<ul class="header-nav__dropdown">
									<li class="header-nav__dropdown-item">
										<?$APPLICATION->IncludeComponent(
											"bitrix:news.list", 
											"catalog.list", 
											array(
												"COMPONENT_TEMPLATE" => "catalog.list",
												"IBLOCK_TYPE" => "catalog",
												"IBLOCK_ID" => "11",
												"NEWS_COUNT" => "10",
												"SORT_BY1" => "ACTIVE_FROM",
												"SORT_ORDER1" => "DESC",
												"SORT_BY2" => "SORT",
												"SORT_ORDER2" => "ASC",
												"FILTER_NAME" => "",
												"FIELD_CODE" => array(),
												"PROPERTY_CODE" => array(
													0 => "C_PRICE",
													1 => "",
												),
												"CHECK_DATES" => "Y",
												"DETAIL_URL" => "/catalog/#ELEMENT_CODE#/",
												"AJAX_MODE" => "N",
												"AJAX_OPTION_JUMP" => "N",
												"AJAX_OPTION_STYLE" => "Y",
												"AJAX_OPTION_HISTORY" => "N",
												"AJAX_OPTION_ADDITIONAL" => "",
												"CACHE_TYPE" => "N",
												"CACHE_TIME" => "36000000",
												"CACHE_FILTER" => "N",
												"CACHE_GROUPS" => "N",
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
												"PAGER_TEMPLATE" => ".default",
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
									</li>
									<li class="header-nav__dropdown-item header-nav__dropdown-item--dropdown-img">
										<img class="header-nav__dropdown-img" src="<?=SITE_TEMPLATE_PATH?>/img/navigation-models.webp" alt="Вездеходы от производителя TINGER">
									</li>
									<li class="header-nav__dropdown-item header-nav__dropdown-item--extra-menu">
										<ul class="header-nav__extra-menu">
											<li class="header-nav__extra-menu-item"><a itemprop="url" class="header-nav__extra-menu-link" href="/configurator/">Конфигуратор</a></li>
											<li class="header-nav__extra-menu-item"><a itemprop="url" class="header-nav__extra-menu-link" href="/testdrive/">Тест-драйв</a></li>
											<li class="header-nav__extra-menu-item"><a itemprop="url" class="header-nav__extra-menu-link" href="/dealers/">Дилерская сеть</a></li>
											<li class="header-nav__extra-menu-item"><a itemprop="url" class="header-nav__extra-menu-link" href="/presentation/">Онлайн-презентация</a></li>
										</ul>
									</li>
								</ul>
							</li>

							<li class="header-nav__item">
								<span class="header-nav__link header-nav__link--drop">Покупателям</span>
								<ul class="header-nav__dropdown">
									<li class="header-nav__dropdown-item">
										<ul class="header-nav__menu">
											<li class="header-nav__menu-item">
												<span class="header-nav__menu-link header-nav__menu-link--drop">Программы покупки</span>
												<ul class="header-nav__submenu">
													<li class="header-nav__submenu-item"><a class="header-nav__submenu-link" href="/leasing/">Покупка в лизинг</a></li>
													<li class="header-nav__submenu-item"><a class="header-nav__submenu-link" href="/prepayment/">Покупка по предоплате</a></li>
												</ul>
											</li>
											<li class="header-nav__menu-item">
												<a itemprop="url" class="header-nav__menu-link" href="/corp/">Корпоративные продажи</a>
											</li>
											<li class="header-nav__menu-item header-nav__menu-item_mobile">
												<a itemprop="url" class="header-nav__menu-link" href="/configurator/">Конфигуратор</a>
											</li>
											<li class="header-nav__menu-item header-nav__menu-item_mobile">
												<a itemprop="url" class="header-nav__menu-link" href="/testdrive/">Тест-драйв</a>
											</li>
											<li class="header-nav__menu-item header-nav__menu-item_mobile">
												<a itemprop="url" class="header-nav__menu-link" href="/dealers/">Дилерская сеть</a>
											</li>
											<li class="header-nav__menu-item header-nav__menu-item_mobile">
												<a itemprop="url" class="header-nav__menu-link" href="/presentation/">Онлайн-презентация</a>
											</li>
											<li class="header-nav__menu-item">
												<a itemprop="url" class="header-nav__menu-link" href="https://dealer.tinger.ru" target="_blank">Стать дилером</a>
											</li>
											<li class="header-nav__menu-item">
												<a itemprop="url" class="header-nav__menu-link" href="/delivery/">Условия доставки</a>
											</li>
										</ul>
									</li>
									<li class="header-nav__dropdown-item header-nav__dropdown-item--dropdown-img">
										<img class="header-nav__dropdown-img" src="<?=SITE_TEMPLATE_PATH?>/img/navigation-buyers.webp" alt="Вездеходы для охоты и рыбалки">
									</li>
									<li class="header-nav__dropdown-item header-nav__dropdown-item--extra-menu">
										<ul class="header-nav__extra-menu">
											<li class="header-nav__extra-menu-item"><a itemprop="url" class="header-nav__extra-menu-link" href="/configurator/">Конфигуратор</a></li>
											<li class="header-nav__extra-menu-item"><a itemprop="url" class="header-nav__extra-menu-link" href="/testdrive/">Тест-драйв</a></li>
											<li class="header-nav__extra-menu-item"><a itemprop="url" class="header-nav__extra-menu-link" href="/dealers/">Дилерская сеть</a></li>
											<li class="header-nav__extra-menu-item"><a itemprop="url" class="header-nav__extra-menu-link" href="/presentation/">Онлайн-презентация</a></li>
										</ul>
									</li>
								</ul>
							</li>

							<li class="header-nav__item">
								<span class="header-nav__link header-nav__link--drop">Владельцам</span>
								<ul class="header-nav__dropdown">
									<li class="header-nav__dropdown-item">
										<ul class="header-nav__menu">
											<li class="header-nav__menu-item">
												<a itemprop="url" class="header-nav__menu-link" href="/customer-support/">Клиентская поддержка</a>
											</li>
											<li class="header-nav__menu-item">
												<a itemprop="url" class="header-nav__menu-link" href="https://tinger.ru/maintenance/">Заявка на тех. обслуживание</a>
											</li>
											<li class="header-nav__menu-item">
												<a itemprop="url" class="header-nav__menu-link" href="https://tinger.ru/modernization/">Заявка на модернизацию</a>
											</li>
											<li class="header-nav__menu-item">
												<a itemprop="url" class="header-nav__menu-link" href="/service/">Сервис</a>
											</li>
											<li class="header-nav__menu-item">
												<a itemprop="url" class="header-nav__menu-link" href="/warranty/">Гарантия</a>
											</li>
											<li class="header-nav__menu-item">
												<a itemprop="url" class="header-nav__menu-link" href="/manual/">Руководство по эксплуатации</a>
											</li>
											<li class="header-nav__menu-item header-nav__menu-item--menu-img">
												<img class="header-nav__menu-img" src="<?=SITE_TEMPLATE_PATH?>/img/navigation-owners.webp" alt="Колёсные вездеходы на шинах низкого давления">
											</li>
										</ul>
									</li>
									<li class="header-nav__dropdown-item header-nav__dropdown-item--extra-menu">
										<ul class="header-nav__extra-menu">
											<li class="header-nav__extra-menu-item"><a itemprop="url" class="header-nav__extra-menu-link" href="/configurator/">Конфигуратор</a></li>
											<li class="header-nav__extra-menu-item"><a itemprop="url" class="header-nav__extra-menu-link" href="/testdrive/">Тест-драйв</a></li>
											<li class="header-nav__extra-menu-item"><a itemprop="url" class="header-nav__extra-menu-link" href="/dealers/">Дилерская сеть</a></li>
											<li class="header-nav__extra-menu-item"><a itemprop="url" class="header-nav__extra-menu-link" href="/presentation/">Онлайн-презентация</a></li>
										</ul>
									</li>
								</ul>
							</li>

							<li class="header-nav__item">
								<span class="header-nav__link header-nav__link--drop">О компании</span>
								<ul class="header-nav__dropdown">
									<li class="header-nav__dropdown-item">
										<ul class="header-nav__menu">
											<li class="header-nav__menu-item">
												<a itemprop="url" class="header-nav__menu-link" href="/about/">О нас</a>
											</li>
											<li class="header-nav__menu-item">
												<a itemprop="url" class="header-nav__menu-link" href="/production/">Производство</a>
											</li>
											<li class="header-nav__menu-item">
												<a itemprop="url" class="header-nav__menu-link" href="/vacancies/">Вакансии</a>
											</li>
											<li class="header-nav__menu-item">
												<a itemprop="url" class="header-nav__menu-link" href="/news/">Новости</a>
											</li>
											<li class="header-nav__menu-item">
												<a itemprop="url" class="header-nav__menu-link" href="/articles/">Статьи</a>
											</li>
											<li class="header-nav__menu-item">
												<a itemprop="url" class="header-nav__menu-link" href="/media/">СМИ о нас</a>
											</li>
											<li class="header-nav__menu-item">
												<a itemprop="url" class="header-nav__menu-link" href="/reviews/">Отзывы</a>
											</li>
											<li class="header-nav__menu-item header-nav__menu-item--menu-img">
												<img class="header-nav__menu-img" src="<?=SITE_TEMPLATE_PATH?>/img/navigation-company.webp" alt="Гусеничные плавающие вездеходы">
											</li>
										</ul>
									</li>
									<li class="header-nav__dropdown-item header-nav__dropdown-item--extra-menu">
										<ul class="header-nav__extra-menu">
											<li class="header-nav__extra-menu-item"><a itemprop="url" class="header-nav__extra-menu-link" href="/configurator/">Конфигуратор</a></li>
											<li class="header-nav__extra-menu-item"><a itemprop="url" class="header-nav__extra-menu-link" href="/testdrive/">Тест-драйв</a></li>
											<li class="header-nav__extra-menu-item"><a itemprop="url" class="header-nav__extra-menu-link" href="/dealers/">Дилерская сеть</a></li>
											<li class="header-nav__extra-menu-item"><a itemprop="url" class="header-nav__extra-menu-link" href="/presentation/">Онлайн-презентация</a></li>
										</ul>
									</li>
								</ul>
							</li>
							<li class="header-nav__item">
								<a itemprop="url" class="header-nav__link" href="/parts/">Запчасти</a>
							</li>
							<li class="header-nav__item">
								<a itemprop="url" class="header-nav__link" href="/contacts/">Контакты</a>
							</li>
							<?if($APPLICATION->GetCurPage(false) === '/'):?>
							<li class="header-nav__item">
								<a class="become-dealer-btn become-dealer-btn_type_mobile" href="https://dealer.tinger.ru" target="_blank">Стать дилером</a>
							</li>
							<?endif?>
						</ul>
					</nav>
					<div class="header-nav__services">
						<a class="header-nav__phone-link" href="tel:88003502505" title="Позвонить нам">
							<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M14.6571 20.0001C13.8789 19.9943 13.1042 19.8967 12.3489 19.7091C9.74068 19.0798 7.05487 17.4834 4.78742 15.214C2.51997 12.9446 0.921613 10.2582 0.292319 7.65252C-0.370305 4.91149 0.102287 2.56644 1.62155 1.04718L2.05534 0.613386C2.44891 0.220599 2.98224 0 3.53828 0C4.09432 0 4.62765 0.220599 5.02123 0.613386L7.51403 3.10569C7.90706 3.49913 8.12782 4.03251 8.12782 4.58863C8.12782 5.14475 7.90706 5.67813 7.51403 6.07158L6.04153 7.54358C6.74743 8.78227 7.70754 10.022 8.84226 11.1567C9.97698 12.2914 11.2177 13.252 12.4558 13.9579L13.9278 12.4854C14.1226 12.2906 14.3538 12.1361 14.6082 12.0307C14.8626 11.9252 15.1354 11.871 15.4108 11.871C15.6862 11.871 15.9589 11.9252 16.2134 12.0307C16.4678 12.1361 16.699 12.2906 16.8937 12.4854L19.386 14.9777C19.7792 15.371 20 15.9043 20 16.4604C20 17.0165 19.7792 17.5498 19.386 17.9431L18.9518 18.3769C17.8807 19.4499 16.3983 20.0001 14.6571 20.0001ZM3.53828 1.49141C3.45885 1.49102 3.38015 1.50648 3.30677 1.53689C3.23339 1.5673 3.16682 1.61205 3.11096 1.66851L2.67667 2.1023C1.53897 3.24 1.20666 5.08709 1.74094 7.30032C2.30656 9.64487 3.76264 12.081 5.84055 14.1584C7.91847 16.2358 10.3541 17.6904 12.6991 18.258C14.9128 18.7923 16.7589 18.46 17.8966 17.3223L18.3304 16.8885C18.4438 16.775 18.5074 16.6212 18.5074 16.4609C18.5074 16.3005 18.4438 16.1468 18.3304 16.0333L15.8386 13.541C15.7252 13.4277 15.5714 13.364 15.411 13.364C15.2507 13.364 15.0969 13.4277 14.9835 13.541L13.1175 15.407C13.0055 15.519 12.8608 15.5925 12.7043 15.6169C12.5478 15.6412 12.3876 15.6151 12.2469 15.5423C10.7172 14.7514 9.17506 13.5997 7.78714 12.2118C6.39921 10.8239 5.25006 9.28272 4.4571 7.75301C4.38428 7.61237 4.35809 7.45222 4.38233 7.29571C4.40657 7.13921 4.47997 6.99447 4.59191 6.88245L6.4584 5.01645C6.57174 4.90302 6.63541 4.74923 6.63541 4.58888C6.63541 4.42853 6.57174 4.27474 6.4584 4.16131L3.9661 1.66851C3.91006 1.61214 3.84339 1.56746 3.76995 1.53706C3.69651 1.50666 3.61776 1.49115 3.53828 1.49141V1.49141Z" fill="white"/>
								<path d="M15.4542 11.03C15.2563 11.03 15.0665 10.9513 14.9265 10.8114C14.7866 10.6715 14.708 10.4817 14.708 10.2838C14.7065 8.97469 14.1859 7.71964 13.2603 6.79395C12.3347 5.86825 11.0797 5.34749 9.77061 5.34591C9.57271 5.34591 9.38291 5.26729 9.24297 5.12736C9.10303 4.98742 9.02441 4.79762 9.02441 4.59971C9.02441 4.40181 9.10303 4.21201 9.24297 4.07207C9.38291 3.93213 9.57271 3.85352 9.77061 3.85352C13.316 3.85352 16.2004 6.73882 16.2004 10.2838C16.2004 10.4817 16.1217 10.6715 15.9818 10.8114C15.8419 10.9513 15.6521 11.03 15.4542 11.03Z" fill="white"/>
								<path d="M18.6081 11.0296C18.4102 11.0296 18.2204 10.951 18.0804 10.811C17.9405 10.6711 17.8619 10.4813 17.8619 10.2834C17.8619 5.82162 14.2304 2.19162 9.77061 2.19162C9.57271 2.19162 9.38291 2.113 9.24297 1.97306C9.10303 1.83312 9.02441 1.64332 9.02441 1.44542C9.02441 1.24751 9.10303 1.05771 9.24297 0.917775C9.38291 0.777836 9.57271 0.699219 9.77061 0.699219C15.0552 0.699219 19.3543 4.99881 19.3543 10.2834C19.3543 10.4813 19.2757 10.6711 19.1357 10.811C18.9958 10.951 18.806 11.0296 18.6081 11.0296Z" fill="white"/>
							</svg>
							<span class="header-nav__phone-link-text">8 (800) 350-25-05</span>
						</a>
						<ul class="header-nav__icons">
							<li class="header-nav__icons-item">
								<a class="header-nav__icons-link" href="/configurator/">
									<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M18 14L18 20" stroke="white" stroke-width="2"/><path d="M2 14L2 20" stroke="white" stroke-width="2"/><path d="M20 19H16" stroke="white"/><path d="M14 8H11" stroke="white"/><path d="M16 8H15" stroke="white"/><path d="M10 8H9" stroke="white"/><path d="M4 2L4 9" stroke="white"/><path d="M16 2L16 7" stroke="white"/><path d="M4 19H-1.19209e-07" stroke="white"/><path d="M20 17H16" stroke="white"/><path d="M4 17H-1.19209e-07" stroke="white"/><path d="M20 15H16" stroke="white"/><path d="M4 15H-1.19209e-07" stroke="white"/><path d="M19 12H14.9108L12.5 15H7.5L5.23529 12H1" stroke="white" stroke-width="2"/><path d="M4 10H16" stroke="white" stroke-width="2"/><path d="M4 2H16" stroke="white" stroke-width="2"/><path d="M3 2L17 2" stroke="white" stroke-width="2"/></svg>
								</a>
							</li>
							<li class="header-nav__icons-item">
								<a class="header-nav__icons-link" href="/dealers/">
									<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17 7.22222C17 8.46115 16.5944 9.82864 15.9262 11.2245C15.2616 12.6125 14.3657 13.9703 13.4532 15.1735C12.5428 16.374 11.6299 17.402 10.9439 18.1303C10.782 18.3023 10.633 18.4572 10.5 18.5934C10.367 18.4572 10.218 18.3023 10.0561 18.1303C9.37008 17.402 8.45723 16.374 7.54677 15.1735C6.63426 13.9703 5.73835 12.6125 5.07385 11.2245C4.40564 9.82864 4 8.46115 4 7.22222C4 3.82102 6.87424 1 10.5 1C14.1258 1 17 3.82102 17 7.22222Z" stroke="white" stroke-width="2"/><path d="M13 7.5C13 8.88071 11.8807 10 10.5 10C9.11929 10 8 8.88071 8 7.5C8 6.11929 9.11929 5 10.5 5" stroke="white"/></svg>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</header>