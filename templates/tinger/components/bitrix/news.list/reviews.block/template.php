<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); 
$this->setFrameMode(true);
?>

<div class="model-reviews__swiper swiper">
	<ul class="model-reviews__list swiper-wrapper">
		<?foreach($arResult['ITEMS'] as $item):?>
		<li class="swiper-slide model-reviews__video video">
			<img class="catalog-reviews__video-img" src="<?=$item['PREVIEW_PICTURE']['SRC'] ?>" alt="<?= $item["NAME"] ?>">
			<a class="play-btn glightbox" href="<?=$item['PROPERTIES']['VIDEO_LINK']['VALUE']?>"></a>
		</li>
		<?endforeach?>
	</ul>
</div>
<div class="model-reviews__btn-container">
	<a class="btn btn_color_green" href="/reviews/">Смотреть все отзывы</a>
</div>