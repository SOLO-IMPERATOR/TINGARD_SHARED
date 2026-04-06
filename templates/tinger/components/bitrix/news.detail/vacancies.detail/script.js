const catalogDetailThumbsSwiper = new Swiper('.vacancy__thumbs-slider', {
	freeMode: true,
	watchSlidesProgress: true,
	breakpoints: {
		0: {
			slidesPerView: 3,
			spaceBetween: 5,
		},
		360: {
			slidesPerView: 4,
			spaceBetween: 5,
		},
		480: {
			slidesPerView: 4,
			spaceBetween: 10,
		},
		768: {
			slidesPerView: 5,
			spaceBetween: 10,
		}
	}
});

const catalogDetailSwiper = new Swiper('.vacancy__slider', {
	thumbs: {
		swiper: catalogDetailThumbsSwiper,
		slideThumbActiveClass: 'vacancy__thumbs-item_active'
	},
	navigation: {
		nextEl: '.vacancy__thumbs-arrows .arrows__btn_direction_next',
		prevEl: '.vacancy__thumbs-arrows .arrows__btn_direction_prev',
		disabledClass: 'arrows_disabled',
	},
	loop: true,
});

