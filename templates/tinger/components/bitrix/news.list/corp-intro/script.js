/* intro slider */
const swiperCorpIntro = new Swiper('[data-entity="intro-corp-slider"]', {
	pagination: {
		clickable: true,
		type: 'bullets',
		el: '[data-entity="intro-corp-slider-pagination"]',
		bulletClass: 'slider-pagination__item',
		bulletActiveClass: 'slider-pagination__item_active',
		clickableClass: 'slider-pagination__item_clickable',
		currentClass: 'slider-pagination_current',
		
	},
	simulateTouch: false,
	effect: 'fade',
	crossFade: true,
	autoplay: {
		delay: 5000,
	},
});