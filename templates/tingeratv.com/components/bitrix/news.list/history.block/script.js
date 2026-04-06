// Слайдер историей (кубками)
const swiperHistory = new Swiper('.history__swiper', {
	navigation: {
		nextEl: '.arrows__next--history',
		prevEl: '.arrows__prev--history',
		disabledClass: 'arrows--disabled',
	},
	slidesPerView: 1,
	simulateTouch: false,
	mousewheel: {
		forceToAxis: true,
	},
	on: {
        slideChangeTransitionStart: function() {
            $('.history__interval').removeClass('history__interval--active');
            let historyPoint = '.history__interval[data-id="' + this.realIndex + '"]';
            $(historyPoint).addClass('history__interval--active');
        }
    },
});

$('.history__point').each(function() {
	$(this).click(function() {
		swiperHistory.slideTo(($(this).parent().data('id')));
	});
});

// Слайдер историей (кубками)
const swiperHistoryItem = new Swiper('.history__item-swiper', {
	slidesPerView: 1,
	simulateTouch: true,
	mousewheel: {
		forceToAxis: true,
	},
});