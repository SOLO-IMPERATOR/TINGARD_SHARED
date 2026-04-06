function initLocation() {
	let map = new ymaps.Map('location', {
		center: [43.889737, 77.095525],
		zoom: 15,
		controls: [],
		behaviors: [],
	});
	let location = new ymaps.Placemark([43.889737, 77.095525], {
		balloonContentHeader: 'TINGER KAZAKHSTAN LLC',
		balloonContentBody: 'Kazakhstan, Almaty region, city of Konaev, Microdistrict Rauan, Rechnikov street, house 5, postal index 040803',
		balloonContentFooter: '<a href="tel:+19299992156">+1 (929) 999-21-56</a>'
	}, {
		preset: 'islands#blackIcon',
	});
	map.geoObjects.add(location);
}

ymaps.ready(initLocation);