/* yandex map */
function initLocation() {
	let map = new ymaps.Map('map', {
		center: [59.123095, 37.840535],
		zoom: 15,
		controls: [],
		behaviors: [],
	});
	let location = new ymaps.Placemark([59.123095, 37.840535], {
		balloonContentHeader: 'TINGERPLAST',
		balloonContentBody: 'г. Череповец, ул. Окружная, д. 18, стр. 6, офис 1',
		balloonContentFooter: '<a href="tel:8 (800) 350-98-05">8 (800) 350-98-05</a>'
	}, {
		iconLayout: 'default#imageWithContent',
		iconImageHref: '/local/templates/tingerplast.ru/img/map-point.svg',
		iconImageSize: [46, 58],
		iconImageOffset: [-23, -58],
	});
	map.geoObjects.add(location);
}

ymaps.ready(initLocation);