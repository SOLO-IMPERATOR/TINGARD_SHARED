const modelGalleryThumbsSwiper = new Swiper('[data-entity="model-gallery-slider-thumbs"]', {
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
			slidesPerView: 5,
			spaceBetween: 10,
		},
		768: {
			slidesPerView: 6,
			spaceBetween: 10,
		}
	}
});

const modelGallerySwiper = new Swiper('[data-entity="model-gallery-slider"]', {
	thumbs: {
		swiper: modelGalleryThumbsSwiper,
		slideThumbActiveClass: 'model-gallery__thumbs-item_active'
	},
	navigation: {
		nextEl: '.model-gallery__thumbs-arrows .arrows__btn_direction_next',
		prevEl: '.model-gallery__thumbs-arrows .arrows__btn_direction_prev',
		disabledClass: 'arrows_disabled',
	},
	loop: true,
});

