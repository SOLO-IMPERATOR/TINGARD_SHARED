document.addEventListener('DOMContentLoaded', () => {

	const addToCartBtn = document.querySelector('.product__basket-button');

	addToCartBtn.addEventListener('click', async() => {

			addToCartBtn.setAttribute('disabled', true);
			const itemTooltip = addToCartBtn.querySelector('.tooltip');
			addToCartBtn.classList.add('parts-category__item-button_status_loading');

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
				addToCartBtn.classList.remove('parts-category__item-button_status_loading');

			if (responeJson.STATUS == 'OK') {
				BX.onCustomEvent('OnBasketChange');
			};

			setTimeout(() => {
				itemTooltip.classList.remove('tooltip_visible');
				itemTooltip.textContent = null;
			}, 2000);
	});
});

/* document.addEventListener('DOMContentLoaded', () => {

	const addToCartBtn = document.querySelector('.product__basket-button');
	const cartInputControl = document.querySelector('.product__basket-control');
	const cartInput = cartInputControl.querySelector('.product__basket-control-input');
	const cartInputErrorClass = 'product__basket-control-input_status_error';
	const cartMinusBtn = cartInputControl.querySelector('.product__basket-control-btn_type_minus');
	const cartPlusBtn = cartInputControl.querySelector('.product__basket-control-btn_type_plus');
	const tooltip = cartInputControl.querySelector('.tooltip');
	const tooltipVisibleClass = 'tooltip_visible';

	// Валидация input на ввод количества товара
	const cartInputValidationShowError = (errorText) => {
		tooltip.classList.add(tooltipVisibleClass);
		tooltip.textContent = errorText;
		cartInput.classList.add(cartInputErrorClass);
		addToCartBtn.setAttribute('disabled', true);
	}

	const cartInputValidationHideError = () => {
		tooltip.classList.remove(tooltipVisibleClass);
		tooltip.textContent = null;
		cartInput.classList.remove(cartInputErrorClass);
		addToCartBtn.removeAttribute('disabled');
	}

	const cartInputValidation = (input, event) => {

		if (!input.validity.valid || input.value === '' ) {

			let tooltipText;
			let invalidPropery;

			for (const property in input.validity) {
				if (input.validity[property]) {
					invalidPropery = property;
				};
			}

			switch (invalidPropery) {
				case 'rangeOverflow':
					tooltipText = 'Значение не может быть больше 1000';
					break;
					
				case 'rangeUnderflow':
					tooltipText = 'Значение не может быть меньше 1';
					break;
				default:
					tooltipText = 'Поле не может быть пустым';
					if (event && event.target.classList.contains('product__basket-control-btn')) {
						cartInput.value = parseInt(1, 10);
						cartInputValidationHideError();
						return true;
					}
			}

			cartInputValidationShowError(tooltipText);
			return false;

		} else {
			
			cartInputValidationHideError();
			return true;

		}
	}

	// Слушатель события на кнопку "+1"
	cartPlusBtn.addEventListener('click', (event) => {
		cartInput.value = parseInt(cartInput.value, 10) + 1;
		cartInputValidation(cartInput, event);
	});

	// Слушатель события на кнопку "-1"
	cartMinusBtn.addEventListener('click', (event) => {
		cartInput.value = parseInt(cartInput.value, 10) - 1;
		cartInputValidation(cartInput, event);
	});

	//Слушатель события на ввод в input
	cartInput.addEventListener('input', () => {
		cartInput.value = parseInt(cartInput.value, 10);
		cartInputValidation(cartInput);
	});

	//Слушатель события на кнопку "Добавить в корзину"
	addToCartBtn.addEventListener('click', async() => {

        if (cartInputValidation(cartInput)) {

            addToCartBtn.setAttribute('disabled', true);
            const itemTooltip = addToCartBtn.querySelector('.tooltip');
            addToCartBtn.classList.add('btn_status_loading');

            const response = await fetch('?action=ADD2BASKET&ajax_basket=Y&id='+ addToCartBtn.dataset.id + '&quantity=1');
            const responeJson = await response.json();

            itemTooltip.textContent = responeJson.MESSAGE;
                itemTooltip.classList.add('tooltip_visible');
                addToCartBtn.removeAttribute('disabled');
                addToCartBtn.classList.remove('btn_status_loading');

            if (responeJson.STATUS == 'OK') {
                BX.onCustomEvent('OnBasketChange');
            };

            setTimeout(() => {
                itemTooltip.classList.remove('tooltip_visible');
                itemTooltip.textContent = null;
            }, 2000);

        }

	});
}); */