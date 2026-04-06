/* models tabs */
document.addEventListener('DOMContentLoaded', () => {
    const modelsList = document.querySelector('.models__list');
	const modelsItems = modelsList.querySelectorAll('.models__item');

	modelsItems.forEach(element => {
		element.addEventListener('click', (event) => {

			modelsItems.forEach(element => {
				element.classList.remove('models__item_active');
			});

			if(event.target.classList.contains('models__chars-capacity-item')) {
				modelsList.querySelector('.models__item[data-capacity="' + event.target.textContent + '"]').classList.add('models__item_active');
			} else {
				element.classList.add('models__item_active');
			}
		})
	});
	
});

/* models sliders */
document.querySelectorAll('.models__slider-container').forEach(item => {

	const catalogDetailThumbsSwiper = new Swiper(item.querySelector(' .catalog-detail__thumbs-slider'), {
		spaceBetween: 5,
		freeMode: true,
		watchSlidesProgress: true,
		breakpoints: {
			320: {
				slidesPerView: 4,
			},
			480: {
				slidesPerView: 5,
			},
			768: {
				slidesPerView: 4,
			},
			1000: {
				slidesPerView: 5,
			},
		}
	});

	new Swiper(item.querySelector('.models__slider'), {
		thumbs: {
			swiper: catalogDetailThumbsSwiper,
			slideThumbActiveClass: 'catalog-detail__thumbs-slider-item_active'
		},
		navigation: {
			nextEl: item.querySelector('.models__slider-arrows .arrows__btn_direction_next'),
			prevEl:  item.querySelector('.models__slider-arrows .arrows__btn_direction_prev'),
			disabledClass: 'arrows_disabled',
		},
	});

});

/* models calc */
document.addEventListener('DOMContentLoaded', () => {
	const modelsBuy = document.querySelectorAll('[data-action="calc"]');
	modelsBuy.forEach(item => {
		const modelsTotal = item.querySelector('[data-action="calc-total"]');

		item.querySelector('[data-action="calc-plus"]').addEventListener('click', () => {
			let modelsInputValue = item.querySelector('input');
			let modelsPrice = modelsInputValue.dataset.price;
			let modelsTotalPrice;
			if(parseInt(modelsInputValue.value) < 20) {
				modelsInputValue.value = parseInt(modelsInputValue.value) + 1;
				modelsTotalPrice = (Number(modelsPrice.replace(/ /g, '')) * modelsInputValue.value).toLocaleString();
				modelsTotal.textContent = modelsTotalPrice;
				item.querySelector('[data-crm-comments]').dataset.crmComments = modelsInputValue.value + ' шт. на сумму ' + modelsTotalPrice + ' руб.';
			}
			
		})

		item.querySelector('[data-action="calc-minus"]').addEventListener('click', () => {
			let modelsInputValue = item.querySelector('input');
			let modelsPrice = modelsInputValue.dataset.price;
			let modelsTotalPrice;
			if(parseInt(modelsInputValue.value) > 1) {
				modelsInputValue.value = parseInt(modelsInputValue.value) - 1;
				modelsTotalPrice = (Number(modelsPrice.replace(/ /g, '')) * modelsInputValue.value).toLocaleString();
				modelsTotal.textContent = modelsTotalPrice;
				item.querySelector('[data-crm-comments]').dataset.crmComments = modelsInputValue.value + ' шт. на сумму ' + modelsTotalPrice + ' руб.'
			}
		})
	})
});