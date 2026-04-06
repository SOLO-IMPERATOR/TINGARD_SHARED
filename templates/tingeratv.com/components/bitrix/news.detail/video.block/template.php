<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<div class="video">
	<picture>
		<source media="(max-width: 480px)" srcset="<?=$arResult['DETAIL_PICTURE']['PREVIEW_WEBP_SRC_480_270']?>">
		<source media="(max-width: 768px)" srcset="<?=$arResult['DETAIL_PICTURE']['PREVIEW_WEBP_SRC_768_432']?>" >
		<?if($arResult['ID'] == 2164):?>
		<source media="(max-width: 1280px)" srcset="<?=$arResult['DETAIL_PICTURE']['PREVIEW_WEBP_SRC_1280_720']?>">
		<img class="video__img" src="<?=$arResult['DETAIL_PICTURE']['PREVIEW_WEBP_SRC_1920_720']?>" alt="<?=$arResult['DETAIL_PICTURE']['ALT']?>">
		<?else:?>
		<img class="video__img" src="<?=$arResult['DETAIL_PICTURE']['PREVIEW_WEBP_SRC_1280_720']?>" alt="<?=$arResult['DETAIL_PICTURE']['ALT']?>">
		<?endif?>
	</picture>
	<button class="play-btn" data-action="play-modal-video" data-video-id="<?=$arResult['PROPERTIES']['YOUTUBE_LINK']['VALUE']?>">Смотреть видео</button>
</div>