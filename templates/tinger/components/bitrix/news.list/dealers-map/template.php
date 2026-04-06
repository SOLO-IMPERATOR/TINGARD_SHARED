<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
$this->addExternalJS('https://api-maps.yandex.ru/2.1/?apikey=677fd716-2261-4fbd-a214-9a8d31f3f7ea&lang=ru_RU');
?>

<div class="dealers container__max" data-entity="dealers">
	<div class="dealers__panel">
		<div class="dealers__city">
			<select class="select" data-entity="dealers-select">
				<option selected="selected" disabled="disabled">выберите город/страну</option>
				<?foreach ($arResult['CITY_ACTIVE'] as $city):?>
					<option><?=$city?></option>
				<?endforeach?>
			</select>
		</div>
		<div class="dealers__list-container">
			<ul class="dealers__list" data-entity="dealers-list">

				<?foreach ($arResult['ITEMS'] as $key => $item):?>
					<li class="dealers__item" data-entity="dealers-item" data-dealer-city="<?=$item['DISPLAY_PROPERTIES']['DM_CITY']['DISPLAY_VALUE']?>" data-dealer-phone="<?=$item['DISPLAY_PROPERTIES']['DM_PHONE']['VALUE']?>" data-dealer-name="<?=$item['NAME']?>" data-dealer-address="<?=$item['DISPLAY_PROPERTIES']['DM_ADRES']['VALUE']?>" data-dealer-coordinates="<?=$item['DISPLAY_PROPERTIES']['DM_COORDINATES']['VALUE']?>">
						<p class="dealers__name"><?=$item['NAME']?></p>
						<?if($item['PROPERTIES']['TINGER_DOG_DEALER']['VALUE'] == 'Y'):?><div class="dealers__type">TINGER Dog dealer</div><?endif?>
						<p class="dealers__address"><?=$item['DISPLAY_PROPERTIES']['DM_ADRES']['VALUE']?></p>
						<?if (!empty($item['DISPLAY_PROPERTIES']['DM_EMAIL']['VALUE'])):?>
							<?for ($i = 0; $i < count($item['DISPLAY_PROPERTIES']['DM_EMAIL']['VALUE']); $i++):?>
								<p class="dealers__phone h6"><a href="mailto:<?=$item['DISPLAY_PROPERTIES']['DM_EMAIL']['VALUE'][$i]?>"><?=$item['DISPLAY_PROPERTIES']['DM_EMAIL']['VALUE'][$i]?></a></p>
							<?endfor?>
						<?endif?>
						<?if (!empty($item['DISPLAY_PROPERTIES']['DM_LINK']['VALUE'])):?>
							<?for ($i = 0; $i < count($item['DISPLAY_PROPERTIES']['DM_LINK']['VALUE']); $i++):?>
								<p class="dealers__phone h6"><a href="<?=$item['DISPLAY_PROPERTIES']['DM_LINK']['VALUE'][$i]?>"><?=$item['DISPLAY_PROPERTIES']['DM_LINK']['VALUE'][$i]?></a></p>
							<?endfor?>
						<?endif?>
						<?if (!empty($item['DISPLAY_PROPERTIES']['DM_PHONE']['VALUE'])):?>
							<?for ($i = 0; $i < count($item['DISPLAY_PROPERTIES']['DM_PHONE']['VALUE']); $i++):?>
								<p class="dealers__phone h6"><a href="tel:<?=$item['DISPLAY_PROPERTIES']['DM_PHONE']['VALUE'][$i]?>"><?=$item['DISPLAY_PROPERTIES']['DM_PHONE']['VALUE'][$i]?></a></p>
							<?endfor?>
						<?else:?>
							<p class="dealers__phone h6"><a href="tel:8 (800) 350-25-05">8 (800) 350-25-05</a></p>
							<p class="dealers__phone-text">* звонок по России бесплатный</p>
						<?endif?>
					</li>
				<?endforeach?>

			</ul>
		</div>
	</div>
	<div class="dealers__map-container">
		<div class="dealers__map" id="dealers"></div>
	</div>
</div>