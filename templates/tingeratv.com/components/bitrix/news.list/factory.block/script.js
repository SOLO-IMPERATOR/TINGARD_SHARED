const swiperFactory = new Swiper('.factory__swiper', {
	slidesPerView: 'auto',
	enabled: false,
	spaceBetween: 10,
	breakpoints: {
		320: {
			slidesPerView: 'auto',
			enabled: true,
			spaceBetween: 10,
		},
		768: {
			slidesPerView: 'auto',
			enabled: false,
		},
	}
});