const sertificatesSelector = document.querySelector('.certificates');

if (sertificatesSelector) {
	sertificatesSelector.querySelectorAll('.certificates__swiper').forEach((swiperItem) => {

		new Swiper(swiperItem, {
			navigation: {
				nextEl: swiperItem.querySelector('.arrows__next'),
				prevEl: swiperItem.querySelector('.arrows__prev'),
				disabledClass: 'arrows--disabled',
			},
			slidesPerView: 4,
			spaceBetween: 20,
			simulateTouch: false,
			mousewheel: {
				forceToAxis: true,
			},
			breakpoints: {
				320: {
					slidesPerView: 'auto',
				},
				768: {
					slidesPerView: 4,
				}
			}
		});
		
	});
}