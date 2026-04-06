<?php if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die;?>

<!DOCTYPE html>
<html class="page" lang="<?=LANGUAGE_ID?>">
<head>
<meta charset="<?=LANG_CHARSET?>">
<meta name="robots" content="noindex, nofollow">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="icon" href="/favicon.svg" type="image/svg+xml">

<title><?$APPLICATION->ShowTitle()?></title>
<?$APPLICATION->ShowHead()?>

<?php
use Bitrix\Main\Page\Asset;
CUtil::InitJSCore();
CJSCore::Init(array('ajax'));

Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/swiper-bundle.min.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/glightbox.min.css');
/* Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/modal-video.min.css'); */
/* Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/fancybox.css'); */
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/reset.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/vars.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/fonts.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/style.css');

Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/glightbox.min.js');
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/swiper-bundle.min.js');
/* Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/modal-video.min.js'); */
/* Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/fancybox.umd.js'); */
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/phone-mask.js');
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/script.js');

?>
<script>
(function(w, d, s, h, id) {
    w.roistatProjectId = id; w.roistatHost = h;
   var p = d.location.protocol == "https:" ? "https://" : "http://";
   var u = /^.*roistat_visit=[^;]+(.*)?$/.test(d.cookie) ? "/dist/module.js" : "/api/site/1.0/"+id+"/init?referrer="+encodeURIComponent(d.location.href);
   var js = d.createElement(s); js.charset="UTF-8"; js.async = 1; js.src = p+h+u; var js2 = d.getElementsByTagName(s)[0]; js2.parentNode.insertBefore(js, js2);
})(window, document, 'script', 'cloud.roistat.com', '408707c5e2d26841c0e469a77954750c');
</script>
<script type="text/javascript">!function(){var t=document.createElement("script");t.type="text/javascript",t.async=!0,t.src="https://vk.com/js/api/openapi.js?168",t.onload=function(){VK.Retargeting.Init("VK-RTRG-827373-exaFg"),VK.Retargeting.Hit()},document.head.appendChild(t)}();</script><noscript><img src="https://vk.com/rtrg?p=VK-RTRG-827373-exaFg" style="position:fixed; left:-999px;" alt=""/></noscript>
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
        })(window,document,'https://cdn-ru.bitrix24.ru/b1538393/crm/site_button/loader_24_185rbk.js');
</script>
<!-- BEGIN BITRIX24 WIDGET INTEGRATION WITH ROISTAT -->
<script>
(function(w, d, s, h) {
    w.roistatLanguage = '';
    var p = d.location.protocol == "https:" ? "https://" : "http://";
    var u = "/static/marketplace/Bitrix24Widget/script.js";
    var js = d.createElement(s); js.async = 1; js.src = p+h+u; var js2 = d.getElementsByTagName(s)[0]; js2.parentNode.insertBefore(js, js2);
    })(window, document, 'script', 'cloud.roistat.com');
</script>
<!-- END BITRIX24 WIDGET INTEGRATION WITH ROISTAT -->
 <!-- Yandex.Metrika counter --> <script type="text/javascript" > (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)}; m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)}) (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym"); ym(72921445, "init", { clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true, trackHash:true }); </script> <noscript><div><img src="https://mc.yandex.ru/watch/72921445" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->

</head>
<body class="page__body">
<?php if ($USER->IsAdmin()) $APPLICATION->ShowPanel();?>
<header class="header container">
	<div class="header__inner">
		<div class="header__logo">
			<div class="header__logo-img-container">
				<a class="header__logo-link" href="/"><img class="header__logo-img" src="<?=SITE_TEMPLATE_PATH?>/img/header-logo.svg" alt="Логотип TINGERPLAST"></a>
			</div>
		</div>
		<button class="burger" type="button" onclick="toggleNav(event)">Показать меню</button>
		<div class="header__nav">
			<nav class="nav">
				<ul class="nav__list">
					<li class="nav__item">
						<a class="nav__link" href="#advantages" onclick="goToSection(event)">Преимущества работы</a>
					</li>
					<li class="nav__item">
						<a class="nav__link" href="#models" onclick="goToSection(event)">Модельный ряд</a>
					</li>
					<li class="nav__item">
						<a class="nav__link" href="#equipment" onclick="goToSection(event)">Комплектация</a>
					</li>
					<li class="nav__item">
						<a class="nav__link" href="#manufacture" onclick="goToSection(event)">Производство</a>
					</li>
					<li class="nav__item">
						<a class="nav__link" href="#reviews" onclick="goToSection(event)">Отзывы</a>
					</li>
				</ul>
			</nav>
		</div>
		<div class="header__phone-container">
			<div class="header__phone">
				<a class="header__phone-link" href="tel:88001003532">8 (800) 100-35-32</a>
				<div class="header__phone-desc">звонок по РФ бесплатный</div>
			</div>
		</div>
	</div>
</header>