let modelCharsSwiperThumbs;

if(document.querySelector('.model-chars__swiper-thumbs')) {
	modelCharsSwiperThumbs = new Swiper('.model-chars__swiper-thumbs', {
		freeMode: true,
		watchSlidesProgress: true,
		slidesPerView: 'auto',
		spaceBetween: 20,
	});
}

const modelCharsSwiper = new Swiper('.model-chars__swiper', {
    simulateTouch: false,
	allowTouchMove: false,
	thumbs: {
		swiper: modelCharsSwiperThumbs,
		slideThumbActiveClass: 'model-chars__swiper-thumbs-item_active'
	},
});

