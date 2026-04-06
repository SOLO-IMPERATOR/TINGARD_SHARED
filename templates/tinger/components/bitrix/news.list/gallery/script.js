const swiperGallery = new Swiper('.gallery__swiper', {
	navigation: {
		nextEl: '.arrows__next--gallery',
		prevEl: '.arrows__prev--gallery',
		disabledClass: 'arrows--disabled',
	},
	freeMode: true,
	slidesPerView: 'auto',
	spaceBetween: 10,
	simulateTouch: false,
	mousewheel: {
		forceToAxis: true,
	},
});