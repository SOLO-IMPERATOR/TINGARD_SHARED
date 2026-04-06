const catalogDetailThumbsSwiper = new Swiper('.catalog-detail__thumbs-slider', {
	freeMode: true,
	watchSlidesProgress: true,
	breakpoints: {
		0: {
			slidesPerView: 3,
			spaceBetween: 5,
		},
		360: {
			slidesPerView: 4,
			spaceBetween: 5,
		},
		480: {
			slidesPerView: 4,
			spaceBetween: 10,
		},
		768: {
			slidesPerView: 5,
			spaceBetween: 10,
		}
	}
});

const catalogDetailSwiper = new Swiper('.catalog-detail__slider', {
	thumbs: {
		swiper: catalogDetailThumbsSwiper,
		slideThumbActiveClass: 'catalog-detail__thumbs-slider-item_active'
	},
	navigation: {
		nextEl: '.catalog-detail__thumbs-swiper-arrows .arrows__btn_direction_next',
		prevEl: '.catalog-detail__thumbs-swiper-arrows .arrows__btn_direction_prev',
		disabledClass: 'arrows_disabled',
	},
	loop: true,
});


document.addEventListener('DOMContentLoaded', () => {

	const addToCartBtn = document.querySelector('.catalog-detail__cart-btn');

	addToCartBtn.addEventListener('click', async() => {

			addToCartBtn.setAttribute('disabled', true);
			const itemTooltip = addToCartBtn.querySelector('.tooltip');

			const formData = new FormData();

			formData.append('quantity', 1);
			formData.append('id', addToCartBtn.dataset.id);

			const response = await fetch('?action=ADD2BASKET&ajax_basket=Y', {
				method: 'POST',
				body: formData,
			});

			const responeJson = await response.json();

			itemTooltip.textContent = responeJson.MESSAGE;
				itemTooltip.classList.add('tooltip_visible');
				addToCartBtn.removeAttribute('disabled');

			if (responeJson.STATUS == 'OK') {
				BX.onCustomEvent('OnBasketChange');
			};

			setTimeout(() => {
				itemTooltip.classList.remove('tooltip_visible');
				itemTooltip.textContent = null;
			}, 2000);
	});
});