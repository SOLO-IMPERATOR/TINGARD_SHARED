const rimCatalogSwiper = new Swiper('.rim-catalog__swiper', {
    simulateTouch: false,
    navigation: {
		nextEl: '.rim-catalog__arrows-next',
		prevEl: '.rim-catalog__arrows-prev',
		disabledClass: 'arrows--disabled',
	},
    breakpoints: {
        320: {
          slidesPerView: 'auto',
          spaceBetween: 10,
        },
        1280: {
          slidesPerView: 4,
          spaceBetween: 20,
        }
      }
});