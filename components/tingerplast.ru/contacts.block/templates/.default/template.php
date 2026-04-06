<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Page\Asset;
Asset::getInstance()->addString('<script src="https://api-maps.yandex.ru/2.1/?apikey=677fd716-2261-4fbd-a214-9a8d31f3f7ea&lang=ru_RU"></script>');

?>

<div class="contacts__inner">
	<div class="contacts__map-container">
		<div class="contacts__map" id="map"></div>
	</div>
	<ul class="contacts__list">
		<li class="contacts__item">
			<div class="contacts__name">Адрес</div>
			<div class="contacts__address">162626, Россия, Вологодская обл., г. Череповец, ул. Окружная, д. 18, стр. 6, офис 1</div>
		</li>
		<li class="contacts__item">
			<div class="contacts__name">Реквизиты</div>
			<ul class="contacts__requisites">
				<li class="contacts__requisites-item">ООО «ТехС»</li>
				<li class="contacts__requisites-item">ИНН: 3528221902</li>
				<li class="contacts__requisites-item">КПП: 352801001</li>
				<li class="contacts__requisites-item">ОГРН: 1143528013155</li>
			</ul>
		</li>
		<li class="contacts__item">
			<div class="contacts__name">Есть вопросы по продукту?</div>
			<div class="contacts__email">sales@tingerplast.ru</div>
			<div class="contacts__phone"><a class="contacts__phone-link" href="tel:8 (800) 350-98-05">8 (800) 350-98-05</a></div>
			<div class="contacts__worktime">09:00 — 18:00</div>
		</li>
		<li class="contacts__item">
			<div class="contacts__name">Ваши предложения</div>
			<div class="contacts__email">pr@tingerplast.ru</div>
			<div class="contacts__phone"><a class="contacts__phone-link" href="tel:8 (800) 350-98-05">8 (800) 350-98-05</a> (доб. 555)</div>
			<div class="contacts__worktime">09:00 — 18:00</div>
		</li>
		<li class="contacts__item">
			<div class="contacts__name">Хотите работать у нас?</div>
			<div class="contacts__email">hr@tingerplast.ru</div>
			<div class="contacts__phone"><a class="contacts__phone-link" href="tel:8 (800) 350-98-05">8 (800) 350-98-05</a> (доб. 602)</div>
			<div class="contacts__worktime">09:00 — 17:00</div>
		</li>
	</ul>
</div>