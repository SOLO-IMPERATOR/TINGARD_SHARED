<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
$this->addExternalJS('https://api-maps.yandex.ru/2.1/?apikey=677fd716-2261-4fbd-a214-9a8d31f3f7ea&lang=ru_RU');
?>

<div class="dealers-table">
	<div class="dealers-table__head">
		<div class="dealers-table__head-city">Город</div>
		<div class="dealers-table__head-company">Компания</div>
		<div class="dealers-table__head-address">Адрес</div>
	</div>
	<ul class="dealers-table__list">
		<?foreach ($arResult['ITEMS'] as $key => $item):?>
		<li class="dealers-table__item">
			<div class="dealers-table__city"><?=$item['DISPLAY_PROPERTIES']['DM_CITY']['DISPLAY_VALUE']?></div>
			<div class="dealers-table__company"><?=$item['NAME']?></div>
			<div class="dealers-table__address"><?=$item['DISPLAY_PROPERTIES']['DM_ADRES']['VALUE']?></div>
		</li>
		<?endforeach?>
	</ul>
</div>