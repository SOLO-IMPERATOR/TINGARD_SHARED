<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
$this->addExternalJS('https://api-maps.yandex.ru/2.1/?apikey=677fd716-2261-4fbd-a214-9a8d31f3f7ea&lang=ru_RU');
?>

<div class="dealers" data-entity="dealers">
	<div class="container dealers__inner">
		<div class="dealers__panel">
			<h2 class="dealers__title page__section-title page__section-title_text-align_center">Наши склады</h2>
			<div class="dealers__list-container">
				<ul class="dealers__list" data-entity="dealers-list">
					<?foreach ($arResult['ITEMS'] as $key => $item):?>
					<?if($item['PROPERTIES']['WAREHOUSE']['VALUE'] == 'Y'):?>
					<li data-entity="dealers-item" data-dealer-city="<?=$item['DISPLAY_PROPERTIES']['DM_CITY']['DISPLAY_VALUE']?>" data-dealer-name="<?=$item['NAME']?>" data-dealer-address="<?=$item['DISPLAY_PROPERTIES']['DM_ADRES']['VALUE']?>" data-dealer-coordinates="<?=$item['DISPLAY_PROPERTIES']['DM_COORDINATES']['VALUE']?>" data-dealer-phone="8 (800) 350-98-45" class="dealers__item"<?if($key > 13):?> style="display: none;"<?endif?>>
						<div class="dealers__name"><?=$item['NAME']?></div>
						<div class="dealers__address"><?=$item['DISPLAY_PROPERTIES']['DM_ADRES']['VALUE']?></div>
						<div class="dealers__phone-container">
							<a class="dealers__phone" href="tel:8 (800) 350-98-45">8 (800) 350-98-45</a>
						</div>
					</li>
					<?endif?>
					<?endforeach?>
				</ul>
			</div>
		</div>
	</div>
	<div class="dealers__map" id="dealers"></div>
</div>