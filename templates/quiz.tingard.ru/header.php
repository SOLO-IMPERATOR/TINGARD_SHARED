<!DOCTYPE html>
<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$APPLICATION->SetPageProperty('robots', 'noindex, nofollow');
use Bitrix\Main\Page\Asset;
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

<title itemprop="headline"><?$APPLICATION->ShowTitle()?></title>

<?$APPLICATION->ShowHead()?>

<!-- <link rel="icon" type="image/png" sizes="160x160" href="/local/templates/tinger/img/favicon-160.png">
<link rel="icon" type="image/png" sizes="32x32" href="/local/templates/tinger/img/favicon-32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/local/templates/tinger/img/favicon-16.png">
<link rel="icon" type="image/svg+xml" sizes="any" href="/local/templates/tinger/img/favicon-any.svg">
<link rel="apple-touch-icon" href="/local/templates/tinger/img/favicon-160.png">
<link rel="manifest" href="/manifest.json"> -->

<?
CUtil::InitJSCore();
CJSCore::Init(array("fx"));
CJSCore::Init(array('ajax'));

Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/reset.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/style.css');
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/script.js');
?>
<!-- Pixel -->
<script type="text/javascript">
    (function (d, w) {
        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script");
            s.type = "text/javascript";
            s.async = true;
            s.src = "https://qoopler.ru/index.php?ref="+d.referrer+"&page=" + encodeURIComponent(w.location.href);
            n.parentNode.insertBefore(s, n);
    })(document, window);
</script>
<!-- /Pixel -->
<!-- Yandex.Metrika counter --> <script type="text/javascript" > (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)}; m[i].l=1*new Date(); for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }} k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)}) (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym"); ym(93888072, "init", { clickmap:true, trackLinks:true, accurateTrackBounce:true, trackHash:true }); </script> <noscript><div><img src="https://mc.yandex.ru/watch/93888072" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->
</head>
	<body class="page">
		<header class="header">
			<div class="header__inner container">
				<div class="header__logo">
					<a href="/"><img class="header__logo-img" src="<?=SITE_TEMPLATE_PATH?>/img/logo.svg" alt="Логотип TINGARD"></a>
					<span class="header__logo-text">бесшовные пластиковые погреба</span>
				</div>
				<div class="header__btn-container">
					<button class="header__btn" type="button" data-entity="open-quiz">Подобрать погреб</button>
				</div>
			</div>
		</header>