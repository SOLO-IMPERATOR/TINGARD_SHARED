const swiperModelReviews = new Swiper('.model-reviews__swiper', {
	spaceBetween: 10,
	breakpoints: {
		320: {
			slidesPerView: 1,
		},
		768: {
			slidesPerView: 2,
		},
		1000: {
			slidesPerView: 3,
		},
	}
});