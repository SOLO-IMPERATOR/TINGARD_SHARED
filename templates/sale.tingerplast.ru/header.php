<!DOCTYPE html>
<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
global $USER;
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
	})(window, document, 'script', 'cloud.roistat.com', 'ef4864d63cc302eaaaa9c7feef377d0a');
</script>

<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(71181028, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/71181028" style="position:absolute; left:-9999px;" alt="" /></div></noscript>

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
	})(window,document,'https://cdn-ru.bitrix24.ru/b1538393/crm/site_button/loader_20_hq680s.js');
</script>

<script src="https://api-maps.yandex.ru/2.1/?apikey=677fd716-2261-4fbd-a214-9a8d31f3f7ea&lang=ru_RU"></script>

<title itemprop="headline"><?$APPLICATION->ShowTitle()?></title>
<?$APPLICATION->ShowHead()?>
<?$APPLICATION->SetPageProperty('canonical', 'https://sale.tingerplast.ru' . $APPLICATION->GetCurPage())?>

<?
use Bitrix\Main\Page\Asset;
CUtil::InitJSCore();
CJSCore::Init(array("fx"));
CJSCore::Init(array('ajax'));

Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/swiper-bundle.min.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/glightbox.min.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/modal-video.min.css');

Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/reset.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/fonts.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/style.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/vars.css');

Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/swiper-bundle.min.js');
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/glightbox.min.js');
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/phone-mask.js');
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/modal-video.min.js');
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/app.js');
?>

</head>
	<body class="page">

		<?if ($USER->IsAdmin()) $APPLICATION->ShowPanel();?>
		
		<header class="header">
			<div class="header__inner container">
				<div class="header__logo">
					<a class="header__logo-link" href="/"><img class="header__logo-img" src="<?=SITE_TEMPLATE_PATH?>/images/logo.svg" alt="Логотип компании TINGERPLAST"></a>
					<p class="header__logo-text">Завод листовых пластиков</p>
				</div>
				<div class="header__contacts">
					<div class="header__phone"><a class="header__phone-link" href="tel:+8 (800) 350-25-67">8 (800) 350-25-67</a></div>
					<div class="header__email"><a class="header__email-link" href="mailto:sales@tingerplast.ru">sales@tingerplast.ru</a></div>
				</div>
			</div>
		</header>