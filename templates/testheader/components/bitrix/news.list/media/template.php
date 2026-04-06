<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>

<ul class="media ajax-container">
	<?foreach ($arResult['ITEMS'] as $item):?>
	<li class="media__item ajax-item">
		<div class="media__video video">
			<a class="video__btn glightbox" href="<?=$item['DISPLAY_PROPERTIES']['VIDEO_LINK']['VALUE']?>">Открыть видео</a>
			<img class="media__img video__item" src="<?=$item['PREVIEW_PICTURE']['WEBP']?>" alt="Превью видео">
		</div>
		<div class="media__name"><?=$item['NAME']?></div>
	</li>
	<?endforeach?>
</ul>

<?=$arResult['NAV_STRING']?>