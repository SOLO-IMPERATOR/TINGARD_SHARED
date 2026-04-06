const selectionProductsSwiper = new Swiper('.selection-products', {
	slidesPerView: '4',
	spaceBetween: 10,
	navigation: {
		nextEl: '.selection-products__swiper-arrows .arrows__btn_direction_next',
		prevEl: '.selection-products__swiper-arrows .arrows__btn_direction_prev',
		disabledClass: 'arrows_disabled',
	},

	breakpoints: {
		320: {
		  slidesPerView: 1.2,
		},
		480: {
			slidesPerView: 2,
		},
		768: {
		  slidesPerView: 3,
		},
		1000: {
		  slidesPerView: 4,
		}
	}

});