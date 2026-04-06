function initLocation() {
	let map = new ymaps.Map('location', {
		center: [59.123095, 37.840535],
		zoom: 15,
		controls: [],
		behaviors: [],
	});
	let location = new ymaps.Placemark([59.123095, 37.840535], {
		balloonContentHeader: 'TINGER',
		balloonContentBody: 'г. Череповец, ул. Окружная, 18',
		balloonContentFooter: '<a href="tel:88003502505">8 (800) 350-25-05</a>'
	}, {
		preset: 'islands#blackIcon',
	});
	map.geoObjects.add(location);
}

ymaps.ready(initLocation);