/* cookies */
function getCookie(cname) {
	const name = cname + '=';
	const decodedCookie = decodeURIComponent(document.cookie);
	const ca = decodedCookie.split(';');
	for (let i = 0; i < ca.length; i++) {
		let c = ca[i];
		while (c.charAt(0) == ' ') {
			c = c.substring(1);
		}
		if (c.indexOf(name) == 0) {
			return c.substring(name.length, c.length);
		}
	}
	return '';
}

function checkCookie() {
	let cookieAccepted = getCookie('cookie_policy');
	if (cookieAccepted == 'accepted') {
		document.querySelector('.cookie-bar').style.display = 'none';
	} else {
		document.querySelector('.cookie-bar').style.display = 'block';
	}
}

checkCookie();

/* swiper (line slider) */
const swiper = new Swiper('.line__swiper', {
	navigation: {
		nextEl: '.swiper-button-next',
		prevEl: '.swiper-button-prev',
	},
	pagination: {
		el: '.swiper-pagination',
		clickable: true,
	},
	autoplay: {
		delay: 5000,
	},
});

/* glightbox */
const glightbox = GLightbox({
	selector: '.glightbox'
});

/* FAQ */
const
	question = document.querySelectorAll('.faq__list-question'),
	questionActiveClass = 'faq__list-question_active';

for (let i=0; i < question.length; i++) {
	question[i].addEventListener('click', (e) => {

		let currentQuestion = question[i].parentElement;

		if (currentQuestion.classList.contains(questionActiveClass)) {
			currentQuestion.classList.remove(questionActiveClass);
		} else {
			currentQuestion.classList.add(questionActiveClass);
		}

	});
}

/* youtube */
new ModalVideo('[data-action="play-modal-video"]');

/* yandex map */
function initLocation() {
	let map = new ymaps.Map('map', {
		center: [59.123095, 37.840535],
		zoom: 15,
		controls: [],
		behaviors: [],
	});
	
	let location = new ymaps.Placemark([59.123095, 37.840535], {
		balloonContentHeader: 'TINGER',
		balloonContentBody: 'г. Череповец, ул. Окружная, 18г. Череповец, ул. Окружная, д. 18, стр. 6, офис 1',
		balloonContentFooter: '<a href="tel:88003502505">8 (800) 350-25-05</a>'
	}, {
		/* preset: 'islands#blackIcon', */
		iconLayout: 'default#imageWithContent',
		iconImageHref: 'https://pt.tingerplast.ru/local/templates/pt.tingerplast.ru/img/map-point.svg',
		iconImageSize: [46, 58],
		iconImageOffset: [-23, -58],
	});
	map.geoObjects.add(location);
}

ymaps.ready(initLocation);


/* header small on scroll */
window.onscroll = function() {
	scrollFunction();
};

function scrollFunction() {
	const header = document.querySelector('.header__inner');
	const headerSmallClass = 'header__inner_sticky';
	if (document.body.scrollTop > 103 || document.documentElement.scrollTop > 50) {
		header.classList.add(headerSmallClass);
	} else {
		header.classList.remove(headerSmallClass);
	}
}

/* modal */
(function () {
	const ACTIVE_MODAL_CLASS = 'modal_active';
	const modalContainer = document.getElementById('modal-container');

	const resetInputValues = (modal) => {
		const inputs = modal.querySelectorAll('input');
		inputs.forEach((input) => {
			input.value = '';
		});
	};

	const closeModal = () => {
		const activeModal = modalContainer.querySelector(`.${ACTIVE_MODAL_CLASS}`);
		if (activeModal) {
			resetInputValues(activeModal);
			activeModal.classList.remove(ACTIVE_MODAL_CLASS);
		}
	};

	const handleCloseModal = () => {
		closeModal();
	};

	const handleKeyDown = (event) => {
		if (event.key === 'Escape') {
			closeModal();
		}
	};

	const handleModalClick = (event) => {
		if (event.target.classList.contains('modal')) {
			closeModal();
		}
	};

	const openModal = (type, params, title) => {
		const modal = modalContainer.querySelector(`[data-modal-type="${type}"]`);
		if (!modal) {
			return;
		}

		const modalTitle = modal.querySelector('[data-entity="modal-title"]');
		const modalCloseBtn = modal.querySelector('[data-entity="modal-close"]');

		if (modalTitle) {
			modalTitle.textContent = title || 'Оставьте заявку и в ближайшее время мы с вами свяжемся';
		}

		for (let key in params) {
			if (params.hasOwnProperty(key)) {
				let input = modal.querySelector(`input[name="${key}"]`);
				if (input) {
					input.value = params[key];
				}
			}
		}

		modalCloseBtn.addEventListener('click', handleCloseModal);
		modal.classList.add(ACTIVE_MODAL_CLASS);
		document.addEventListener('keydown', handleKeyDown);
		modal.addEventListener('click', handleModalClick);
	};

	window.openModal = openModal;
	window.closeModal = closeModal;
})();

function getQuizData() {
	const quizData = {};

	const quizQuestions = document.querySelectorAll('[data-question]');

	quizQuestions.forEach((question) => {
		const questionNumber = question.dataset.question;
		let questionTitle = question.querySelector('.quiz__title').innerText;
		const questionInputs = question.querySelectorAll('input, select');

		if (questionNumber === '1' && questionInputs.length > 0 && questionInputs[0].type === 'radio') {
			let selectedRadioInput = question.querySelector('input[type="radio"]:checked');
			if (selectedRadioInput) {
				quizData[`${questionTitle}`] = selectedRadioInput.value;
			}
		} else {
			questionInputs.forEach((input) => {
				const inputName = input.name;
				const inputValue = input.value;

				if (inputName && (inputValue || inputValue === '') && input.type !== 'hidden' && inputName !== 'policy' && inputName !== 'action' && inputName !== 'crm-entity' && inputName !== 'name' && inputName !== 'phone') {
					let label = '';
					if (input.tagName === 'SELECT') {
						const selectedOption = input.querySelector('option:checked');
						label = selectedOption ? selectedOption.innerText : inputName;
					}
					else {
						label = input.placeholder || inputName;
					}

					quizData[`${label}`] = inputValue;
				}
			});
		}
	});

	let result = '';
	for (const field in quizData) {
		result += `<b>${field}:</b> ${quizData[field]}<br>`;
	}
	return (result);
}

/* send form */
const sendForm = () => {
	document.addEventListener('submit', event => {

		const form = event.target;
		if (form.dataset.entity !== 'form') {
			return;
		}

		event.preventDefault();

		const submitBtn = form.querySelector('[type="submit"]');
		const LOADING_BTN_CLASS = 'btn_status_loading';
		const data = new FormData(form);
		data.append('trace', b24Tracker.guest.getTrace());

		const lockButton = () => {
			submitBtn.classList.add(LOADING_BTN_CLASS);
			submitBtn.setAttribute('disabled', '');
		};

		const unlockButton = () => {
			submitBtn.classList.remove(LOADING_BTN_CLASS);
			submitBtn.removeAttribute('disabled');
		};

		lockButton();

		const formAction = data.getAll('action');

		switch (formAction[0]) {
			case 'get-quiz-data':
				data.append('comments', getQuizData());
			break;
			default:
		}

		BX.ajax({
			url: '/local/ajax/sale.tingerplast.ru.php',
			data: data,
			method: 'POST',
			dataType: 'json',
			timeout: 10,
			processData: false,
			preparePost: false,
			onsuccess: () => {
				unlockButton();
				switch (formAction[0]) {
					case 'reload-page':
						location.reload();
					break;
					default:
						location.href = '/thanks/';
						form.reset();
						closeModal();
				}
			},
			onfailure: () => {
				unlockButton();
			}
		});
	});
};

sendForm();

/* quiz */
function showQuestion(index) {
	document.querySelectorAll('[data-question]').forEach((item) => {
		item.style.display = 'none';
	})

	document.querySelectorAll(`[data-question="${index}"]`).forEach((item) => {
		item.style.display = 'grid';
	})
}

/* phone mask */
const phoneMask = () => {
	const phoneInputs = document.querySelectorAll('input[type="tel"]');

	const getInputNumbersValue = (input) => {
		// Return stripped input value — just numbers
		return input.value.replace(/\D/g, '');
	};

	const onPhonePaste = (e) => {
		const input = e.target;
		const inputNumbersValue = getInputNumbersValue(input);
		const pasted = e.clipboardData || window.clipboardData;
		if (pasted) {
			const pastedText = pasted.getData('Text');
			if (/\D/g.test(pastedText)) {
				// Attempt to paste non-numeric symbol — remove all non-numeric symbols,
				// formatting will be in onPhoneInput handler
				input.value = inputNumbersValue;
				return;
			}
		}
	};

	const onPhoneInput = (e) => {
		const input = e.target;
		const inputNumbersValue = getInputNumbersValue(input);
		const selectionStart = input.selectionStart;
		let formattedInputValue = '';

		if (!inputNumbersValue) {
			return input.value = '';
		}

		if (input.value.length !== selectionStart) {
			// Editing in the middle of input, not last symbol
			if (e.data && /\D/g.test(e.data)) {
				// Attempt to input non-numeric symbol
				input.value = inputNumbersValue;
			}
			return;
		}

		if (["7", "8", "9"].includes(inputNumbersValue[0])) {
			if (inputNumbersValue[0] === "9") inputNumbersValue = "7" + inputNumbersValue;
			const firstSymbols = (inputNumbersValue[0] === "8") ? "8" : "+7";
			formattedInputValue = input.value = `${firstSymbols} `;
			if (inputNumbersValue.length > 1) {
				formattedInputValue += `(${inputNumbersValue.substring(1, 4)}`;
			}
			if (inputNumbersValue.length >= 5) {
				formattedInputValue += `) ${inputNumbersValue.substring(4, 7)}`;
			}
			if (inputNumbersValue.length >= 8) {
				formattedInputValue += `-${inputNumbersValue.substring(7, 9)}`;
			}
			if (inputNumbersValue.length >= 10) {
				formattedInputValue += `-${inputNumbersValue.substring(9, 11)}`;
			}
		} else {
			formattedInputValue = `+${inputNumbersValue.substring(0, 16)}`;
		}
		input.value = formattedInputValue;
	};

	const onPhoneKeyDown = (e) => {
		// Clear input after remove last symbol
		const inputValue = e.target.value.replace(/\D/g, '');
		if (e.keyCode === 8 && inputValue.length === 1) {
			e.target.value = '';
		}
	};

	phoneInputs.forEach((phoneInput) => {
		phoneInput.addEventListener('keydown', onPhoneKeyDown);
		phoneInput.addEventListener('input', onPhoneInput, false);
		phoneInput.addEventListener('paste', onPhonePaste, false);
	});
};

phoneMask();