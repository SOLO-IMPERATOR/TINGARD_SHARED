
const newsOtherSwiper = new Swiper('.news-other__swiper', {
	slidesPerView: 2,
	spaceBetween: 10,
	navigation: {
		nextEl: '.news-other__swiper-arrows .arrows__btn_direction_next',
		prevEl: '.news-other__swiper-arrows .arrows__btn_direction_prev',
		disabledClass: 'arrows_disabled',
	},
	breakpoints: {
		768: {
			slidesPerView: 2,
		},
		320: {
			slidesPerView: 1,
		},

	},
});