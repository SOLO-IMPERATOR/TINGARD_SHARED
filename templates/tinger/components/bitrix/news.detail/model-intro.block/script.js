const
	modelIntro = document.querySelector('.model-intro'),
	modelStrip = document.querySelector('.model-strip'),
	modelStripeActiveClass = 'model-strip_visible';

const observeIntro = new IntersectionObserver(function(items) {
	if (items[0].intersectionRatio <= 0) {
		modelStrip.classList.add(modelStripeActiveClass);
	} else {
		modelStrip.classList.remove(modelStripeActiveClass);
	};
});

observeIntro.observe(modelIntro);

/* intro slider */
const swiperIntro = new Swiper('[data-entity="intro-models-slider"]', {
	pagination: {
		clickable: true,
		type: 'bullets',
		el: '[data-entity="intro-models-slider-pagination"]',
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