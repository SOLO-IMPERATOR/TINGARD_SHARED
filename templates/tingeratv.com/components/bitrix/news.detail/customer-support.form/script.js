const form = document.querySelector('.form');
const submitBtn = form.querySelector('.submit-btn');

form.addEventListener('submit', submitForm);

function submitForm(event) {

	event.preventDefault();

	const formDataObj = {
		form: 'Клиентская поддержка',
		name: form.querySelector('input[name="name"]').value,
		phone: form.querySelector('input[name="phone"]').value,
		email: form.querySelector('input[name="email"]').value,
		question: form.querySelector('textarea[name="question"]').value,
		direction: 4788,
	}

	const formData = new FormData();

	formData.append('form', formDataObj.form);
	formData.append('direction', formDataObj.direction);
	formData.append('name', formDataObj.name);
	formData.append('phone', formDataObj.phone);
	formData.append('email', formDataObj.email);
	formData.append('comment', '<b>Вопрос: </b>' + formDataObj.question);

	//submitBtn.classList.add('btn_waiting');

	fetch('https://tinger.ru/local/templates/tinger/scripts/b24-new/lead_send.php', {
		method: 'POST',
		body: formData,
	})
	
	.then(response => {
		//console.log(response);
		window.location.href = '/thanks/';
	})
	.catch(error => {
		//console.log(error);
	})
}