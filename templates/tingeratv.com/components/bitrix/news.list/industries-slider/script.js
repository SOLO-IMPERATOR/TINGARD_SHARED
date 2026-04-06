//Просто слайдер
const swiperSlider = new Swiper('.slider-long__swiper', {
	pagination: {
		el: '.slider-pagination',
		type: 'bullets',
		bulletClass: 'slider-pagination__bullet',
		bulletActiveClass: 'slider-pagination__bullet_active',
		clickable: true,
	},
	simulateTouch: false,
	effect: 'fade',
	crossFade: true,
	autoplay: {
		delay: 5000,
	},
	initialSlide: 0,
	navigation: {
		nextEl: '.arrows__next--slider-long',
		prevEl: '.arrows__prev--slider-long',
		disabledClass: 'arrows--disabled',
	},
});


const swiperIndustries = new Swiper('.industries__swiper', {
	simulateTouch: false,
	autoplay: {
		delay: 5000,
	},
	navigation: {
		nextEl: '.industries__swiper .swiper-arrow_next',
		prevEl: '.industries__swiper .swiper-arrow_prev',
		disabledClass: 'swiper-arrow_disabled',
	},
});