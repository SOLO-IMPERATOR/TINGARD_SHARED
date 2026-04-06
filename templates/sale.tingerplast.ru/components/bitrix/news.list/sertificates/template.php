<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
/* echo '<pre>'; print_r($arResult); echo '</pre>'; */
?>
<ul class="sert">
	<?foreach($arResult['ITEMS'] as $item):?>
	<li class="sert__item">
		<a class="sert__link glightbox" href="<?=$item['DISPLAY_PROPERTIES']['FILE']['FILE_VALUE']['SRC']?>">
			<img class="sert__img" src="<?=$item['PREVIEW_PICTURE']['SRC']?>" alt="<?=$item['NAME']?>">
		</a>
	</li>
	<?endforeach?>
</ul>