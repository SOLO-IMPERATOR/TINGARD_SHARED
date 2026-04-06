<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die;?>

<!DOCTYPE html>
<html class="page" lang="<?=LANGUAGE_ID?>">
<head>
<script src="/local/templates/testheader/js/modal-city.js" defer></script>
<script>
	(function(w, d, s, h, id) {
		w.roistatProjectId = id; w.roistatHost = h;
		var p = d.location.protocol == "https:" ? "https://" : "http://";
		var u = /^.*roistat_visit=[^;]+(.*)?$/.test(d.cookie) ? "/dist/module.js" : "/api/site/1.0/"+id+"/init";
		var js = d.createElement(s); js.charset="UTF-8"; js.async = 1; js.src = p+h+u; var js2 = d.getElementsByTagName(s)[0]; js2.parentNode.insertBefore(js, js2);
	})(window, document, 'script', 'cloud.roistat.com', '408707c5e2d26841c0e469a77954750c');
</script>

<script type="text/javascript">    (function (d, w) {        var n = d.getElementsByTagName("script")[0],            s = d.createElement("script");            s.type = "text/javascript";            s.async = true;            s.src = "https://victorycorp.ru/index.php?ref="+d.referrer+"&page=" + encodeURIComponent(w.location.href);            n.parentNode.insertBefore(s, n);   })(document, window);</script>

<script>
	(function(w, d, s, h) {
		w.roistatLanguage = '';
		var p = d.location.protocol == "https:" ? "https://" : "http://";
		var u = "/static/marketplace/Bitrix24Widget/script.js";
		var js = d.createElement(s); js.async = 1; js.src = p+h+u; var js2 = d.getElementsByTagName(s)[0]; js2.parentNode.insertBefore(js, js2);
		})(window, document, 'script', 'cloud.roistat.com');
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

<script data-skip-moving="true">
	(function(w,d,u){
			var s=d.createElement('script');s.async=true;s.src=u+'?'+(Date.now()/60000|0);
			var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
	})(window,document,'https://cdn-ru.bitrix24.ru/b1538393/crm/site_button/loader_2_1g6thn.js');
</script>

<script type="text/javascript">     (function(m,e,t,r,i,k,a){         m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};         m[i].l=1*new Date();         for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}         k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)     })(window, document,'script','https://mc.yandex.ru/metrika/tag.js', 'ym');      ym(32216254, 'init', {webvisor:true, trackHash:true, clickmap:true, accurateTrackBounce:true, trackLinks:true}); </script> <noscript><div><img src="https://mc.yandex.ru/watch/32216254" style="position:absolute; left:-9999px;" alt="" /></div></noscript>

<meta charset="<?=LANG_CHARSET?>">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="icon" href="/favicon.svg" type="image/svg+xml">

<title><?$APPLICATION->ShowTitle()?></title>
<?$APPLICATION->ShowHead()?>

<?


// Устаналиваем регоин по умолчанию
$session = \Bitrix\Main\Application::getInstance()->getSession();
if(!$session->get('B_GEOIP_DATA')['locationName']){
	$session->set('B_GEOIP_DATA', [
		'locationCode' => 84,
		'locationName' => 'Москва',
		'auto' => true
	]); 
}





use Bitrix\Main\Page\Asset;
CUtil::InitJSCore();
CJSCore::Init(array('ajax'));
/* CJSCore::Init(array('jquery')); */

Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/swiper-bundle.min.css');
/* Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/glightbox.min.css'); */
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/modal-video.min.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/fancybox.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/reset.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/vars.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/fonts.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/style.css');

/* Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/glightbox.min.js'); */
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/swiper-bundle.min.js');
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/modal-video.min.js');
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/fancybox.umd.js');
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/phone-mask.js');
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/script.js');

?>
</head>
<body class="page__body">
<?if ($USER->IsAdmin()) $APPLICATION->ShowPanel();?>
	<header class="header<?$APPLICATION->ShowProperty('header-class')?><?if ($USER->IsAdmin()):?> header_type_admin<?endif?>" itemscope itemtype="https://schema.org/WPHeader">
		<meta itemprop="headline" content="Купить погреб TINGARD — бесшовный, пластиковый, долговечный">
		<meta itemprop="description" content="Погреб TINGARD. Уникальный бесшовный пластиковый погреб. Доставка по РФ! Монтаж круглый год за 1 день!">
		<div class="header__inner container">
			<div class="header__logo logo">
				<a class="header__logo-link" href="/">
					<img class="header__logo-img" src="<?=SITE_TEMPLATE_PATH?>/img/header-logo.svg" alt="Логотип TINGARD">
				</a>
			</div>
			<div class="header__manufacturer">Мы являемся производителем</div>
			<div class="header__phone">
				<a class="header__phone-link" href="tel:8 (800) 100-35-32">8 (800) 100-35-32</a>
				<div class="header__phone-desc">звонок по РФ бесплатный</div>
			</div>
			<div class="header_city">
				<svg class="geo-image" width="15" height="18" viewBox="0 0 15 18" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M7.50019 4.47681C6.9101 4.47681 6.33325 4.65179 5.8426 4.97963C5.35195 5.30747 4.96954 5.77345 4.74372 6.31863C4.51789 6.86381 4.45881 7.46371 4.57393 8.04247C4.68905 8.62123 4.97321 9.15285 5.39048 9.57011C5.80774 9.98738 6.33936 10.2715 6.91812 10.3867C7.49688 10.5018 8.09678 10.4427 8.64196 10.2169C9.18714 9.99105 9.65312 9.60864 9.98096 9.11799C10.3088 8.62734 10.4838 8.05049 10.4838 7.4604C10.4838 6.6691 10.1694 5.91021 9.60991 5.35068C9.05038 4.79115 8.29149 4.47681 7.50019 4.47681ZM7.50019 8.95219C7.20514 8.95219 6.91672 8.8647 6.6714 8.70078C6.42607 8.53686 6.23486 8.30387 6.12195 8.03128C6.00904 7.75869 5.9795 7.45874 6.03706 7.16936C6.09462 6.87998 6.2367 6.61417 6.44534 6.40554C6.65397 6.19691 6.91978 6.05483 7.20916 5.99727C7.49854 5.9397 7.79849 5.96925 8.07108 6.08216C8.34367 6.19507 8.57665 6.38628 8.74058 6.6316C8.9045 6.87692 8.99199 7.16535 8.99199 7.4604C8.99199 7.85605 8.83482 8.23549 8.55505 8.51525C8.27529 8.79502 7.89584 8.95219 7.50019 8.95219Z" fill="#004182"/>
					<path d="M7.5 17.903C6.87191 17.9062 6.2522 17.7589 5.69274 17.4734C5.13328 17.1879 4.65037 16.7725 4.28444 16.2621C1.44182 12.3409 0 9.39309 0 7.5C0 5.51088 0.790176 3.60322 2.1967 2.1967C3.60322 0.790176 5.51088 0 7.5 0C9.48912 0 11.3968 0.790176 12.8033 2.1967C14.2098 3.60322 15 5.51088 15 7.5C15 9.39309 13.5582 12.3409 10.7156 16.2621C10.3496 16.7725 9.86672 17.1879 9.30726 17.4734C8.7478 17.7589 8.12809 17.9062 7.5 17.903ZM7.5 1.62829C5.94288 1.63007 4.45004 2.24942 3.34898 3.35048C2.24793 4.45153 1.62858 5.94437 1.6268 7.50149C1.6268 9.00075 3.03879 11.7732 5.60169 15.3081C5.81926 15.6077 6.1047 15.8517 6.43464 16.0198C6.76459 16.188 7.12966 16.2757 7.5 16.2757C7.87034 16.2757 8.23541 16.188 8.56536 16.0198C8.8953 15.8517 9.18073 15.6077 9.39831 15.3081C11.9612 11.7732 13.3732 9.00075 13.3732 7.50149C13.3714 5.94437 12.7521 4.45153 11.651 3.35048C10.55 2.24942 9.05712 1.63007 7.5 1.62829Z" fill="#004182"/>
				</svg>
				<span class="name-city"><?=$session->get('B_GEOIP_DATA')['locationName']?></span>
				<svg width="9" height="6" viewBox="0 0 9 6" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M3.25335 5.12713C3.65212 5.58759 4.36643 5.58759 4.76521 5.12713L7.77246 1.65465C8.33333 1.00701 7.87328 0 7.01653 0H1.00203C0.145274 0 -0.314779 1.00701 0.246097 1.65465L3.25335 5.12713Z" fill="#FDCA04"/>
				</svg>
			</div>
			
			<style>
				
			</style>


			<div class="header__btn-container">
				<button class="btn btn_color_yellow" type="button" onclick="openModal('default', {'crm-entity': 'lead', 'crm-title': 'Заказать погреб'})">Заказать погреб</button>
			</div>
			<button class="header__burger" type="button" title="Меню" onclick="toggleNav(event)">
				<span class="header__burger-line"></span>
			</button>
			<nav class="header__nav">
				<div class="nav-name-city">
					<svg width="15" height="18" viewBox="0 0 15 18" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M7.50019 4.47681C6.9101 4.47681 6.33325 4.65179 5.8426 4.97963C5.35195 5.30747 4.96954 5.77345 4.74372 6.31863C4.51789 6.86381 4.45881 7.46371 4.57393 8.04247C4.68905 8.62123 4.97321 9.15285 5.39048 9.57011C5.80774 9.98738 6.33936 10.2715 6.91812 10.3867C7.49688 10.5018 8.09678 10.4427 8.64196 10.2169C9.18714 9.99105 9.65312 9.60864 9.98096 9.11799C10.3088 8.62734 10.4838 8.05049 10.4838 7.4604C10.4838 6.6691 10.1694 5.91021 9.60991 5.35068C9.05038 4.79115 8.29149 4.47681 7.50019 4.47681ZM7.50019 8.95219C7.20514 8.95219 6.91672 8.8647 6.6714 8.70078C6.42607 8.53686 6.23486 8.30387 6.12195 8.03128C6.00904 7.75869 5.9795 7.45874 6.03706 7.16936C6.09462 6.87998 6.2367 6.61417 6.44534 6.40554C6.65397 6.19691 6.91978 6.05483 7.20916 5.99727C7.49854 5.9397 7.79849 5.96925 8.07108 6.08216C8.34367 6.19507 8.57665 6.38628 8.74058 6.6316C8.9045 6.87692 8.99199 7.16535 8.99199 7.4604C8.99199 7.85605 8.83482 8.23549 8.55505 8.51525C8.27529 8.79502 7.89584 8.95219 7.50019 8.95219Z" fill="white"/>
						<path d="M7.5 17.903C6.87191 17.9062 6.2522 17.7589 5.69274 17.4734C5.13328 17.1879 4.65037 16.7725 4.28444 16.2621C1.44182 12.3409 0 9.39309 0 7.5C0 5.51088 0.790176 3.60322 2.1967 2.1967C3.60322 0.790176 5.51088 0 7.5 0C9.48912 0 11.3968 0.790176 12.8033 2.1967C14.2098 3.60322 15 5.51088 15 7.5C15 9.39309 13.5582 12.3409 10.7156 16.2621C10.3496 16.7725 9.86672 17.1879 9.30726 17.4734C8.7478 17.7589 8.12809 17.9062 7.5 17.903ZM7.5 1.62829C5.94288 1.63007 4.45004 2.24942 3.34898 3.35048C2.24793 4.45153 1.62858 5.94437 1.6268 7.50149C1.6268 9.00075 3.03879 11.7732 5.60169 15.3081C5.81926 15.6077 6.1047 15.8517 6.43464 16.0198C6.76459 16.188 7.12966 16.2757 7.5 16.2757C7.87034 16.2757 8.23541 16.188 8.56536 16.0198C8.8953 15.8517 9.18073 15.6077 9.39831 15.3081C11.9612 11.7732 13.3732 9.00075 13.3732 7.50149C13.3714 5.94437 12.7521 4.45153 11.651 3.35048C10.55 2.24942 9.05712 1.63007 7.5 1.62829Z" fill="white"/>
					</svg>
					<span class="name-city-white"><?=$session->get('B_GEOIP_DATA')['locationName']?></span>
					<svg width="9" height="6" viewBox="0 0 9 6" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M3.25335 5.12713C3.65212 5.58759 4.36643 5.58759 4.76521 5.12713L7.77246 1.65465C8.33333 1.00701 7.87328 0 7.01653 0H1.00203C0.145274 0 -0.314779 1.00701 0.246097 1.65465L3.25335 5.12713Z" fill="white"/>
					</svg>
				</div>
				<ul class="header__nav-list" itemscope itemtype="https://schema.org/SiteNavigationElement">
			<li class="header__nav-item" itemprop="name">
						<a class="header__nav-link" itemprop="url" href="/catalog/">Каталог погребов</a>
					</li>
					<li class="header__nav-separator"></li>
					<li class="header__nav-item" itemprop="name">
						<a class="header__nav-link" itemprop="url" href="/installation/">Монтаж</a>
					</li>
					<li class="header__nav-separator"></li>
					<li class="header__nav-item" itemprop="name">
						<a class="header__nav-link" itemprop="url" href="/manufacture/">Производство</a>
					</li>
					<li class="header__nav-separator"></li>
					<li class="header__nav-item" itemprop="name">
						<a class="header__nav-link" itemprop="url" href="/payment/">Доставка и оплата</a>
					</li>
					<li class="header__nav-separator"></li>
					<li class="header__nav-item" itemprop="name">
						<a class="header__nav-link" itemprop="url" href="/reviews/">Отзывы</a>
					</li>
					<li class="header__nav-separator"></li>
					<li class="header__nav-item" itemprop="name">
						<a class="header__nav-link" itemprop="url" href="/media/">СМИ о нас</a>
					</li>
					<li class="header__nav-separator"></li>
					<li class="header__nav-item" itemprop="name">
						<a class="header__nav-link" itemprop="url" href="/dealers/">Наши дилеры</a>
					</li>
					<li class="header__nav-separator"></li>
					<li class="header__nav-item" itemprop="name">
						<a class="header__nav-link" itemprop="url" href="/contacts/">Контакты</a>
					</li>
				</ul>
			</nav>
		</div>

		
		<?php
			// Выводим буфер из компонента user.geodata
			$APPLICATION->ShowViewContent('city_select_page'); 
		?>


	</header>

	<?$APPLICATION->IncludeComponent(
		"soloimperator:user.geodata",
		"",
		Array(
			"COMPOSITE_FRAME_MODE" => "A",
			"COMPOSITE_FRAME_TYPE" => "AUTO",
			"regionsIds" => array("2","4","7","17","33","34","35","84","85")
		)
	);?>