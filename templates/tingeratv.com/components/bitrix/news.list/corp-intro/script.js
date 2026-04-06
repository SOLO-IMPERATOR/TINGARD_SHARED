/* intro slider */
const swiperIntro = new Swiper('.intro-swiper', {
	pagination: {
		el: '.intro__swiper-pagination',
		type: 'bullets',
		clickable: true,
	},
	simulateTouch: false,
	effect: 'fade',
	crossFade: true,
	autoplay: {
		delay: 5000,
	},
});