const swiperNewsWidget = new Swiper('.news-widget__swiper', {
	navigation: {
		nextEl: '.news-widget__arrows-next',
		prevEl: '.news-widget__arrows-prev',
		disabledClass: 'arrows--disabled',
	},
	simulateTouch: false,
	mousewheel: {
		forceToAxis: true,
	},
	spaceBetween: 10,
	breakpoints: {
		320: {
			slidesPerView: 'auto',
		},
		1280: {
			slidesPerView: 4,
		}
	  }
});