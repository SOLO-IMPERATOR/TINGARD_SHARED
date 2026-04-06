<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$this->addExternalJs('https://yastatic.net/share2/share.js');


?>

<article class="news-detailed" itemscope itemtype="http://schema.org/Article">
	<div class="news-detailed__info">
		<div class="news-detailed__img-container">
			<?if ($arResult['PROPERTIES']['VIDEO_LINK']['VALUE']):?>
			<div class="video" itemprop="video" itemscope itemtype="http://schema.org/VideoObject">
				<img itemprop="image" class="news-detailed__img" src="<?=$arResult['DETAIL_PICTURE']['SRC']?>" alt="<?=$arResult['NAME']?>">
				<a class="video__btn glightbox" href="<?=$arResult['PROPERTIES']['VIDEO_LINK']['VALUE']?>"></a>
				<link itemprop="url" href="<?=$arResult['PROPERTIES']['VIDEO_LINK']['VALUE']?>" />
				<link itemprop="thumbnail" href="<?=$arResult['DETAIL_PICTURE']['SRC']?>" />
				<link itemprop="thumbnailUrl" href="<?=$arResult['DETAIL_PICTURE']['SRC']?>" />
				<meta itemprop="name" content="<?=$arResult['PROPERTIES']['VIDEO_NAME']['VALUE']?>" />
              	<meta itemprop="description" content="<?=$arResult['PROPERTIES']['VIDEO_DESC']['VALUE']?>">
              	<meta itemprop="duration" content="<?=$arResult['PROPERTIES']['VIDEO_TIME']['VALUE']?>" />
              	<meta itemprop="uploadDate" content="<?=$arResult['DISPLAY_ACTIVE_FROM']?>" />
              	<meta itemprop="inLanguage" content="ru" />
              	<meta itemprop="isFamilyFriendly" content="true" />
			</div>
			<?else:?>
			<a class="glightbox" href="<?=$arResult['DETAIL_PICTURE']['WEBP_SRC_1280_720']?>" alt="<?=$arResult['NAME']?>" data-alt="<?=$arResult['NAME']?>">
				<picture>
					<source media="(max-width: 480px)" srcset="<?=$arResult['DETAIL_PICTURE']['WEBP_SRC_480_270']?>">
					<img itemprop="image" class="news-detailed__img" src="<?=$arResult['DETAIL_PICTURE']['WEBP_SRC_1280_720']?>" alt="<?=$arResult['NAME']?>">
				</picture>
			</a>
			<?endif?>
		</div>
		<div class="news-detailed__author">
			<?if ($arResult['IBLOCK']['CODE'] === 'reviews'):?>
			<div class="news-detailed__author-img-container">
				<img class="news-detailed__author-img" src="<?=SITE_TEMPLATE_PATH . '/img/profile-icon.svg'?>" alt="<?=$arResult['DISPLAY_PROPERTIES']['AUTHOR']['VALUE']?>">
			</div>
			<div class="news-detailed__author-name" itemprop="author"><?=$arResult['PROPERTIES']['AUTHOR']['VALUE']?></div>
			<?else:?>
			<div class="news-detailed__author-img-container">
				<img class="news-detailed__author-img" src="<?echo (!empty($arResult["PROPERTIES"]["AUTHOR"]["AUTHOR_PHOTO"])) ? $arResult["PROPERTIES"]["AUTHOR"]["AUTHOR_PHOTO"] : SITE_TEMPLATE_PATH . '/img/profile-icon.svg'?>" alt="<?=$arResult["PROPERTIES"]["AUTHOR"]["AUTHOR_NAME"]?>">
			</div>
			<div class="news-detailed__author-name" itemprop="author"><?=$arResult['PROPERTIES']['AUTHOR']['AUTHOR_NAME']?> <?=$arResult['PROPERTIES']['AUTHOR']['AUTHOR_LASTNAME']?></div>
			<?endif?>
		</div>
	</div>
	<h1 class="news-detailed__title page-title page-title_margin_bottom" itemprop="headline"><?=$arResult['NAME']?></h1>
	<div class="news-detailed__text pure-html" itemprop="articleBody"><?=$arResult['DETAIL_TEXT']?></div>
	<div class="news-detailed__bar">
		<div class="news-detailed__date"><?=$arResult['DISPLAY_ACTIVE_FROM']?></div>
		<div class="news-detailed__share">
			<div class="ya-share2" data-services="vkontakte,odnoklassniki,whatsapp,telegram" data-copy="extraItem" data-color-scheme="whiteblack"></div>
		</div>
	</div>
	<meta itemprop="dateModified" content="<?=$arResult['TIMESTAMP_X']?>" />
	<meta itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" itemid="https://tingerplast.ru<?=$arResult['DETAIL_PAGE_URL']?>" />
</article>