
document.addEventListener('DOMContentLoaded', () => {

	/* отображение полей для выбранного плательщика */
	const orderSelector = document.querySelector('.order');
	const orderPersonTypeInputs1 = orderSelector.querySelectorAll('[data-person-id="1"] input, [data-person-id="1"] textarea');
	const orderPersonTypeInputs2 = orderSelector.querySelectorAll('[data-person-id="2"] input, [data-person-id="2"] textarea');

	orderSelector.querySelector('.order__payer').addEventListener('change', function(event) {

		if (event.target.value == 1) {
			orderSelector.classList.remove('order_person-type_2');
			orderSelector.classList.add('order_person-type_1');
			[...orderPersonTypeInputs2].forEach(element => element.disabled = true);
			[...orderPersonTypeInputs1].forEach(element => element.disabled = false);
		}

		if (event.target.value == 2) {
			orderSelector.classList.remove('order_person-type_1');
			orderSelector.classList.add('order_person-type_2');
			[...orderPersonTypeInputs1].forEach(element => element.disabled = true);
			[...orderPersonTypeInputs2].forEach(element => element.disabled = false);
		}
		
	});

	/* перезагрузка страницы при выборе типа плательщика */
	const personSelector = orderSelector.querySelectorAll('input[name="person_type_id"]');
	const orderForm = orderSelector.querySelector('form[name="os-order-form"]');
	const orderFormBtn = orderForm.querySelector('.order__total-btn');
	const orderFormSaveInput = orderSelector.querySelector('input[name="save"]');
	personSelector.forEach(item => {
		item.addEventListener('change', () => {
			orderFormSaveInput.value = '';
			orderForm.submit();
		});
	});

	/* автоматическое заполнение полей получателя */
	const inputFieldPayerName1 = orderSelector.querySelector('label[data-person-id="1"] input[name="properties[COMPANY]"]');
	const inputFieldRecipientName1 = orderSelector.querySelector('label[data-person-id="1"] input[name="properties[RECIPIENT]"]');

	const inputFieldPayerName2 = orderSelector.querySelector('label[data-person-id="2"] input[name="properties[NAME]"]');
	const inputFieldRecipientName2 = orderSelector.querySelector('label[data-person-id="2"] input[name="properties[RECIPIENT]"]');

	const inputFieldPayerPhone1 = orderSelector.querySelector('label[data-person-id="1"] input[name="properties[PHONE]"]');
	const inputFieldRecipientPhone1 = orderSelector.querySelector('label[data-person-id="1"] input[name="properties[RECIPIENT_PHONE]"]');

	const inputFieldPayerPhone2 = orderSelector.querySelector('label[data-person-id="2"] input[name="properties[PHONE]"]');
	const inputFieldRecipientPhone2 = orderSelector.querySelector('label[data-person-id="2"] input[name="properties[RECIPIENT_PHONE]"]');


	inputFieldPayerName1.addEventListener('change', () => {
		inputFieldRecipientName1.value = inputFieldPayerName1.value;
	});

	inputFieldPayerName2.addEventListener('change', () => {
		inputFieldRecipientName2.value = inputFieldPayerName2.value;
	});

	inputFieldPayerPhone1.addEventListener('change', () => {
		inputFieldRecipientPhone1.value = inputFieldPayerPhone1.value;
	});

	inputFieldPayerPhone2.addEventListener('change', () => {
		inputFieldRecipientPhone2.value = inputFieldPayerPhone2.value;
	});

	orderForm.addEventListener('submit', () => {
		orderFormBtn.setAttribute('disabled', true);
		orderFormBtn.classList.add('btn_status_loading');
	})
});