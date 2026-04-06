document.querySelectorAll('.about-sections__slider-container').forEach(item => {
	console.log(item);
	new Swiper(item.querySelector('.about-sections__slider'), {
		slidesPerView: 2,
		spaceBetween: 10,
		breakpoints: {
			320: {
				slidesPerView: 1.5,
			},
			768: {
				slidesPerView: 3,
			},
			1000: {
				slidesPerView: 4,
			}
		}
	})
})