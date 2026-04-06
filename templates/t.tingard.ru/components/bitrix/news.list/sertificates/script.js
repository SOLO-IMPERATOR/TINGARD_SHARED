/* sert slider */
const swieprSert = new Swiper('[data-entity="sert-slider"]', {
	breakpoints: {
		320: {
			slidesPerView: 'auto',
			spaceBetween: 20,
		},
		1000: {
			slidesPerView: 5,
			spaceBetween: 20,
		},
	}
});