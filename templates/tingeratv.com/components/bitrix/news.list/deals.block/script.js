const swiperDeals = new Swiper('.deals__swiper', {
	breakpoints: {
		320: {
			slidesPerView: 'auto',
			spaceBetween: 10,
		},
		1000: {
			slidesPerView: 3,
			spaceBetween: 20,
		}
	},
	navigation: {
		nextEl: '.deals__arrows-next',
		prevEl: '.deals__arrows-prev',
		disabledClass: 'arrows--disabled',
	},
});

const dealBtn = document.querySelectorAll('.deals__btn');
const dealPopup = document.querySelector('#popup-form');

dealBtn.forEach((item) => {
	item.addEventListener('click', () => {
		const currentDeal = item.parentElement.parentElement.querySelector('.deals__name').textContent + ' (' + item.textContent + ')';
		dealPopup.setAttribute('data-form-binding', currentDeal);
	});
	
});