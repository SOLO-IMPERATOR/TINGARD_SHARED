const equipmentSlider = new Swiper('[data-entity="additional-equipment-slider"]', {
    navigation: {
		nextEl: '[data-entity="additional-equipment-arrow-next"]',
		prevEl: '[data-entity="additional-equipment-arrow-prev"]',
		disabledClass: 'slider-arrow_disabled'
	},
	breakpoints: {
		320: {
			slidesPerView: 'auto',
			spaceBetween: 20,
		},
		1279: {
			slidesPerView: 4,
			spaceBetween: 25,
		},
	}
});