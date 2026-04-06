const modelCharsSwiper = new Swiper('.model-chars__swiper', {
	navigation: {
		nextEl: '.model-chars__arrows-next',
		prevEl: '.model-chars__arrows-prev',
		disabledClass: 'arrows_disabled',
        lockClass: 'arrows_hidden',
	},
    simulateTouch: false,
	allowTouchMove: false
});