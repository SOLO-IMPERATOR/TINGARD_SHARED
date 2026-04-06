document.addEventListener('DOMContentLoaded', () => {

	const addToCartBtns = document.querySelectorAll('.add-to-cart-btn');

	addToCartBtns.forEach(item => {
		item.addEventListener('click', async() => {

			item.setAttribute('disabled', true);
			const itemTooltip = item.querySelector('.tooltip');
			item.classList.add('add-to-cart-btn_status_loading');

			const formData = new FormData();

			formData.append('quantity', 1);
			formData.append('id', item.dataset.id);

			const response = await fetch(item.dataset.url + '?action=ADD2BASKET&ajax_basket=Y', {
				method: 'POST',
				body: formData,
			});

			const responeJson = await response.json();

			itemTooltip.textContent = responeJson.MESSAGE;
				itemTooltip.classList.add('tooltip_visible');
				item.removeAttribute('disabled');
				item.classList.remove('add-to-cart-btn_status_loading');

			if (responeJson.STATUS == 'OK') {
				BX.onCustomEvent('OnBasketChange');
			};

			setTimeout(() => {
				itemTooltip.classList.remove('tooltip_visible');
				itemTooltip.textContent = null;
			}, 2000);

		});
	});
});

document.addEventListener('DOMContentLoaded', () => {
	const productAvailabilitySelecttors = document.querySelectorAll('.parts-category__item-availability');
	productAvailabilitySelecttors.forEach(item => {
		item.addEventListener('mouseover', event => {
			item.querySelector('.tooltip').classList.add('tooltip_visible');
		})
	})
	productAvailabilitySelecttors.forEach(item => {
		item.addEventListener('mouseleave', event => {
			item.querySelector('.tooltip').classList.remove('tooltip_visible');
		})
	})
});


