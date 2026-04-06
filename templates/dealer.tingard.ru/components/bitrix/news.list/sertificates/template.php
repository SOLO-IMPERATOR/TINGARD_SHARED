<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>
<div class="about__sert-slider swiper" data-entity="sert-slider">
	<div class="about__sert-wrapper swiper-wrapper">
		<?foreach($arResult['ITEMS'] as $item):?>
		<div class="about__sert-item swiper-slide">
			<a class="about__sert-link glightbox" href="<?=$item['DISPLAY_PROPERTIES']['FILE']['FILE_VALUE']['SRC']?>">
				<img class="about__sert-img" src="<?=$item['PREVIEW_PICTURE']['SRC']?>" alt="<?=$item['NAME']?>">
			</a>
		</div>
		<?endforeach?>
	</div>
</div>
