/*  слайдер превью видео на странице tf4pro */
/* intro slider */
/* const tf4proVideoSlider = new Swiper('[data-entity="tf4pro-video-slider"]', {
	effect: 'fade',
	crossFade: true,
	autoplay: {
		delay: 3000,
	},
}); */

/* отключение зума при фокусе на input, select, textarea на iOS */
const addMaximumScaleToMetaViewport = () => {
	const el = document.querySelector('meta[name=viewport]');

	if (el !== null) {
		let content = el.getAttribute('content');
		let re = /maximum\-scale=[0-9\.]+/g;

		if (re.test(content)) {
			content = content.replace(re, 'maximum-scale=1.0');
		} else {
			content = [content, 'maximum-scale=1.0'].join(', ')
		}

		el.setAttribute('content', content);
	}
};

const disableIosTextFieldZoom = addMaximumScaleToMetaViewport;

const checkIsIOS = () =>
	/iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;

if (checkIsIOS()) {
	disableIosTextFieldZoom();
}

/* Плашка с cookies */
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


/* header-navigation */
const
	headerInner = document.querySelector('.header__inner'),
	headerNavLink = document.querySelectorAll('.header-nav__link--drop'),
	headerNavLinkActiveClass = 'header-nav__link--active',
	headerNavSublink = document.querySelectorAll('.header-nav__menu-link--drop'),
	headerNavSublinkActiveClass = 'header-nav__menu-link--active',
	burger = document.querySelector('.burger'),
	burgerActiveClass = 'burger_active',
	headerBg = document.querySelector('.header-bg');


showHeaderBg = () => {
	headerBg.classList.add('header-bg_visible');
}

hideHeaderBg = () => {
	headerBg.classList.remove('header-bg_visible');
}

burgerActive = () => {
	burger.classList.add(burgerActiveClass);
	showHeaderBg();
}

burgerInactive = () => {
	burger.classList.remove(burgerActiveClass);
	hideHeaderBg();
	headerNavLink.forEach(e => e.classList.remove(headerNavLinkActiveClass));
}

burger.addEventListener('click', (e) => {
	if (e.target.classList.contains(burgerActiveClass)) {
		burgerInactive();
	} else {
		burgerActive();
	}
});

for (let i = 0; i < headerNavLink.length; i++) {
	headerNavLink[i].addEventListener('click', (e) => {
		if (e.target.classList.contains(headerNavLinkActiveClass)) {
			e.target.classList.remove(headerNavLinkActiveClass);
			burgerInactive();
		} else {
			for (let t = 0; t < headerNavLink.length; t++) {
				headerNavLink[t].classList.remove(headerNavLinkActiveClass);
			}
			e.target.classList.add(headerNavLinkActiveClass);
			burgerActive();
		}
	});
}

for (let i = 0; i < headerNavSublink.length; i++) {
	headerNavSublink[i].addEventListener('click', (e) => {
		if (e.target.classList.contains(headerNavSublinkActiveClass)) {
			e.target.classList.remove(headerNavSublinkActiveClass);
		} else {
			for (let t = 0; t < headerNavSublink.length; t++) {
				headerNavSublink[t].classList.remove(headerNavSublinkActiveClass);
			}
			e.target.classList.add(headerNavSublinkActiveClass);
			burgerActive();
		}
	});
}

document.addEventListener('click', function (e) {
	if (!headerInner.contains(e.target)) {
		burgerInactive();
		for (let t = 0; t < headerNavLink.length; t++) {
			headerNavLink[t].classList.remove(headerNavLinkActiveClass);
		}
	}
});

// Навигация в footer
document.querySelectorAll('.footer-nav__title').forEach((btn) => {
	btn.addEventListener('click', (e) => {
		btn.classList.toggle('footer-nav__title_active');
		e.preventDefault();
	});
});

const glightbox = GLightbox();

new ModalVideo('[data-action="play-modal-video"]');

/* Вкладки */
const
	tabTitle = document.querySelectorAll('.tab-title'),
	tabContent = document.querySelectorAll('.tab-content');

for (let i = 0; i < tabTitle.length; i++) {
	tabTitle[i].addEventListener('click', (event) => {

		let tabsCurrent = event.target.parentElement.children;
		for (let t = 0; t < tabsCurrent.length; t++) {
			tabTitle[t].classList.remove('tab-title_active');
		}
		event.target.classList.add('tab-title_active');

		let contentsCurrent = event.target.parentElement.nextElementSibling.children;
		for (let c = 0; c < contentsCurrent.length; c++) {
			tabContent[c].classList.remove('tab-content_active');
		}
		tabContent[i].classList.add('tab-content_active');

	});
}

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

/* tabs */
function tabs2() {
	const tabs = document.querySelectorAll('.tabs2');

	tabs.forEach((item) => {
		const tabsHeadItems = item.querySelectorAll('.tabs2__head-item');
		const tabsBodyItems = item.querySelectorAll('.tabs2__body-item');

		const tabsHeadActiveClass = 'tabs2__head-item_active';
		const tabsBodyActiveClass = 'tabs2__body-item_active';

		tabsHeadItems.forEach(element => element.addEventListener('click', () => {

			tabsHeadItems.forEach(element => element.classList.remove(tabsHeadActiveClass));
			tabsBodyItems.forEach(element => element.classList.remove(tabsBodyActiveClass));

			currentIndex = Array.from(tabsHeadItems).indexOf(element);
			tabsHeadItems[currentIndex].classList.add(tabsHeadActiveClass);
			tabsBodyItems[currentIndex].classList.add(tabsBodyActiveClass);

		}));
	})


}

if (document.querySelector('.tabs2')) {
	tabs2();
}

/* сбор данных с конфигуратора */
const getConfData = () => {


	let comments = '';

	comments += `<b>Выбранная модель: </b> ${document.getElementById('facilities__header-name').textContent}<br>`;
	comments += `<b>Выбранные модификация и двигатель:</b> ${document.getElementById('active-modification').textContent}<br>`;
	comments += `<b>Выбранный пакет:</b> ${document.getElementById('active-pack').textContent}<br>`;
	comments += `<b>Выгода от пакета:</b> ${document.querySelector('#profit-price-end span').textContent} руб.<br>`;
	comments += `<b>Выбранный цвет:</b> ${document.getElementById('active-color').textContent}<br>`;
	comments += `<b>Базовые опции:</b><br>`;
	optionsbase = "";
	document.querySelectorAll('.conf-total__list-item').forEach(optionEl => {
		const optionName = optionEl.textContent.replace(/<\/?[a-zA-Z]+>/gi, '');
		optionsbase += `— ${optionName}<br>`;
	});
	optionsbase = optionsbase.replace('<b>', '');
	optionsbase = optionsbase.replace('</b>', '');
	comments += optionsbase;
	comments += `<b>Стоимость базовой комплектации:</b> ${document.querySelector('#base-price-end span').textContent} руб.<br>`;
	comments += `<h2 style="padding: 0;margin-top: 25px;margin-bottom:2px;"><b>Дополнительное оборудование:</b></h2>`;
	code_product = $('.conf-models__item .radio__input:checked').attr('data-code-production');
	$('section[data-page="conditions"][data-simbol-code="' + code_product + '"] .conf-widget__visual .conf-widget__options label').each(function () {
		if ($(this).attr('data-default') != 'default' && $(this).css('display') == 'block' && $(this).attr('data-group') === undefined) {
			if ($(this).find('input').is(':checked')) {
				mod_name = $(this).attr('data-name');
				mod_price = $(this).attr('data-price');
				comments += `— ` + mod_name + `<i>( ${mod_price} руб. )</i><br>`;
			}
		}
	});
	comments += `<b>Стоимость дополнительного оборудования:</b> ${document.querySelector('#modul-price-end span').textContent} руб.<br>`;
	return comments;
}

/* сбор данных с конфигуратора на странице модели при отправке формы */

function requestCommentFromIframe() {
	return new Promise((resolve) => {
		function handleMessage(event) {
			if (event.data.type === 'commentReady') {
				window.removeEventListener('message', handleMessage);
				resolve(event.data.comment);
			}
		}
		window.addEventListener('message', handleMessage);
		const iframe = document.getElementById('configuratorContainer');
		if (iframe) {
			console.log('frame has')
			iframe.contentWindow.postMessage({ type: 'getComment' }, '*');
		} else {
			console.log('frame not found');
		}
	});
}

const getModificationData = () => {

	const confSelector = document.getElementById('equipment');
	const confPackage = confSelector.querySelector('.conf-widget__package-input:checked');

	const packageBenefit = confPackage.closest('.conf-widget__package').querySelector('.conf-widget__package-benefit').textContent;

	let comments = `<b>Выбранная модификация:</b> ${confPackage.dataset.model} (стоимость ${packageBenefit})`;

	return comments;
}

const getDiskData = () => {
	let comments = 'Параметры диска:<br>';
	const rimSelector = document.querySelector('[data-entity="rim-choice"]');


	const inputElements = rimSelector.querySelectorAll('input');
	const selectElements = rimSelector.querySelectorAll('select');

	inputElements.forEach((input) => {
		const value = input.value;
		const fieldName = input.getAttribute('data-name');
		comments += `<b>${fieldName}:</b> ${value}<br>`;
	});

	selectElements.forEach((select) => {
		const value = select.value;
		const fieldName = select.getAttribute('data-name');
		comments += `<b>${fieldName}:</b> ${value}<br>`;
	});

	return comments;
}

const getAtvQuizData = () => {
	let comments = '';

	const atvSelector = document.querySelector('[data-modal-type="atv-quiz"]');

	comments += `<b>Выбранный вездеход:</b> ${atvSelector.querySelector('input[name="quiz-atv-model"]:checked').value}<br>`;
	comments += `<b>Цель использования вездехода:</b> ${atvSelector.querySelector('input[name="quiz-atv-purpose"]:checked').value}<br>`;
	comments += `<b>Выбранный цвет:</b> ${atvSelector.querySelector('input[name="quiz-atv-color"]:checked').value}<br>`;
	comments += `<b>Основная местность для передвижения:</b> ${atvSelector.querySelector('input[name="quiz-atv-terrain"]:checked').value}<br>`;

	return comments;
}

const getRimQuizData = () => {
	let comments = 'Параметры диска:<br>';
	const rimSelector = document.querySelector('.rim-quiz');


	const questions = rimSelector.querySelectorAll('.rim-quiz__item');

	questions.forEach((item) => {
		const value = item.querySelector('input').value;
		const name = item.querySelector('.form-input-name').textContent;
		comments += `<b>${name}</b> ${value}<br>`;
	});

	return comments;
}

const getTestdriveData = () => {
	let comments = '';
	const testdriveSelector = document.querySelector('.testdrive__form');

	comments += `<b>Выбранный вездеход:</b> ${testdriveSelector.querySelector('input[name="models"]:checked').value}<br>`;
	comments += `<b>Выбранное место проведения тест-драйва:</b> ${testdriveSelector.querySelector('input[name="place"]:checked').value}`;
	if (testdriveSelector.querySelector('input[name="place"]:checked')) {
		comments += ` (${testdriveSelector.querySelector('input[name="city"]').value})<br>`;
	} else {
		comments += '<br>';
	}

	comments += `<b>Выбранная дата:</b> ${testdriveSelector.querySelector('input[name="date"]').value}`;

	return comments;
}

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

		modalTitle.textContent = title || 'Оставьте заявку и в ближайшее время мы с вами свяжемся';

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

const sendForm = () => {

	document.addEventListener('submit', async event => {
		const checkForm = event.target;
		// обрабатываем только формы с data-entity="form"
		if (!checkForm.matches('[data-entity="form"]')) return;

		const submitBtn = event.target.querySelector('[type="submit"]');
		const LOADING_BTN_CLASS = 'btn_status_loading';
		const lockButton = () => {
			submitBtn.classList.add(LOADING_BTN_CLASS);
			submitBtn.setAttribute('disabled', '');
		};

		const unlockButton = () => {
			submitBtn.classList.remove(LOADING_BTN_CLASS);
			submitBtn.removeAttribute('disabled');
		};

		lockButton();
		const form = event.target;

		// Проверяем наличие и заполненность phone / email
		const phoneField = form.querySelector('[name="phone"]');
		const emailField = form.querySelector('[name="email"]');

		if ((phoneField && !phoneField.value.trim()) || (emailField && !emailField.value.trim())) {
			return;
		}
		//ONLY MY FORM

		if (form.dataset.sendPdf == "true") {
			event.preventDefault();
			console.log('Попал в новую')
			const userData = {
				name: document.querySelector('#name_configurator').value,
				phone: document.querySelector('#pnohe_configurator').value,
				email: document.querySelector('#email_configurator').value
			}
			let metrika = 0;
			ym(35231225, 'getClientID', function (clientID) {
				metrika = clientID;
			});
			const response = await fetch("/local/api/vehicles/generate_pdf.php", {
				method: "POST",
				headers: {
					"Content-Type": "application/json",
				},
				body: JSON.stringify({
					htmlpdf: window.vehiclePDf,
					modelName: window.vehicleModelName,
					userData: userData,
					trace: b24Tracker.guest.getTrace(),
					metrikaid: metrika,
					action: "send"
				}),
			});
			(async () => {
				try {
					const data = await response.json();
					console.log(data);
				} catch (error) {
					console.error('Error:', error);
				}
			})();
			unlockButton();
			closeModal();
			location.href = '/thanks/';
			return;
		}

		//ONLY MY FORM



		if (form.dataset.entity !== 'form') {
			return;
		}

		event.preventDefault();


		const data = new FormData(form);
		data.append('trace', b24Tracker.guest.getTrace());
		ym(35231225, 'getClientID', function (clientID) {
			data.append('metrikaclientid', clientID);
		});





		const formAction = data.getAll('action');
		switch (formAction[0]) {
			case 'atv-conf-model-page':
				const comment = await requestCommentFromIframe();
				data.append('comments', comment);
				break;
			case 'package-conf-model-page':
				data.append('comments', getModificationData());
				break;
			case 'rim-choice':
				data.append('comments', getDiskData());
				break;
			case 'get-testdrive-data':
				data.append('comments', getTestdriveData());
				break;
			case 'get-conf-data':
				data.append('comments', getConfData());
				break;
			case 'get-rim-quiz-data':
				data.append('comments', getRimQuizData());
				break;
			case 'get-atv-quiz-data':
				data.append('comments', getAtvQuizData());
				break;
			default:
		}

		// Проверка существования cookie promo
		function checkPromoCookie() {
			const cookiesString = document.cookie;
			const cookiesArray = cookiesString.split('; ');
			for (const cookie of cookiesArray) {
				const [name, value] = cookie.split('=');
				const cookieName = name.trim();

				if (cookieName === 'promo' && value === 'true') {
					return true;
				}
			}

			return false;
		}

		if (checkPromoCookie()) {
			data.append('promo', true);
		}



/* 		grecaptcha.ready(() => {
			grecaptcha.execute('6LdzNJ0qAAAAALvYUvlv443zazo3Wm25FgubmjO8', { action: 'submit' }).then((token) => {
				data.append('token', token); */
				BX.ajax({
					url: '/local/ajax/tinger.ru.php',
					data: data,
					method: 'POST',
					dataType: 'json',
					timeout: 10,
					processData: false,
					preparePost: false,
					onsuccess: (data) => {
						unlockButton();
						switch (formAction[0]) {
							case 'reload-page':
								location.reload();
								break;
							case 'create-vacancies-deal':
								ym(35231225, 'reachGoal', 'create-vacancies-deal');
								closeModal();
								openModal('thanks', {}, 'Заявка отправлена');
								form.reset();
								break;
							case 'open-feedback':
								closeModal();
								openModal('thanks', {}, 'Спасибо за обратную связь');
								form.reset();
								break;
							default:
								ym(35231225, 'reachGoal', 'form-success');
								location.href = '/thanks/';
								form.reset();
								closeModal();
						}
					},
					onfailure: () => {
						unlockButton();
					}
				});
/* 			});
		}); */
	});
};

sendForm();

/* квиз по пневмодискам */
const rimQuizSelector = document.querySelector('[data-modal-type="rim-quiz"]');
if (rimQuizSelector) {
	rimQuizSelector.querySelectorAll('.rim-quiz__item').forEach((item) => {
		const input = item.querySelector('input');
		const nextBtn = item.querySelector('[data-action="next-question"]');
		input.addEventListener('input', () => {
			if (input.value !== '') {
				nextBtn.removeAttribute('disabled');
			} else {
				nextBtn.setAttribute('disabled', true);
			}
		});
	});
}


function rimNextQuestion(index) {
	rimQuizSelector.querySelector(`[data-question-index="${index}"]`).style.display = 'none';
	rimQuizSelector.querySelector(`[data-question-index="${index + 1}"]`).style.display = 'grid';
	if (index >= 3) {
		rimQuizSelector.querySelector('[data-entity="modal-title"]').textContent = 'Оставьте заявку и в ближайшее время мы с вами свяжемся';
	}
}

/* квиз по пневмодискам */
const atvQuizSelector = document.querySelector('[data-modal-type="atv-quiz"]');
if (atvQuizSelector) {
	atvQuizSelector.querySelectorAll('.atv-quiz__item').forEach((item) => {
		const inputs = item.querySelectorAll('input');
		const nextBtn = item.querySelector('[data-action="next-question"]');
		inputs.forEach((input) => {
			input.addEventListener('change', () => {
				nextBtn.removeAttribute('disabled');
			})
		});
	});
}


function atvNextQuestion(index) {
	atvQuizSelector.querySelector(`[data-question-index="${index}"]`).style.display = 'none';
	atvQuizSelector.querySelector(`[data-question-index="${index + 1}"]`).style.display = 'grid';
	if (index >= 4) {
		atvQuizSelector.querySelector('[data-entity="modal-title"]').textContent = 'Оставьте заявку и в ближайшее время мы с вами свяжемся';
	}
}

/* видеообзоры на странице TINGER TF4 */
const videoReviews = document.querySelector('.video-reviews');
if (videoReviews) {
	const swiper = new Swiper('.video-reviews', {
		spaceBetween: 10,
		navigation: {
			nextEl: '.video-reviews__btn-arrows__next',
			prevEl: '.video-reviews__btn-arrows__prev',
			disabledClass: 'arrows--disabled',
		},
		breakpoints: {
			320: {
				slidesPerView: 1,
			},
			480: {
				slidesPerView: 2,
			},
			768: {
				slidesPerView: 3,
			}
		}
	});
}

new ModalVideo('.modal-video-review-1', {
	youtube: {
		autoplay: 1,
		start: 1085,
	}
});

new ModalVideo('.modal-video-review-2', {
	youtube: {
		autoplay: 1,
		start: 3383,
	}
});

new ModalVideo('.modal-video-review-3', {
	youtube: {
		autoplay: 1,
		start: 1964,
	}
});

new ModalVideo('.modal-video-review-4', {
	youtube: {
		autoplay: 1,
		start: 3980,
	}
});

new ModalVideo('.modal-video-review-5', {
	youtube: {
		autoplay: 1,
		start: 1639,
	}
});

new ModalVideo('.model-strip__link_type_perelomka', {
	youtube: {
		autoplay: 1,
	}
});

/* feedback start */
function showFeedback() {

	/* 	const entryUrl = window.location.href;
		const entryUrlFilter = 'pt.tingerplast.ru/?roistat=direct'; */

	function getCookie(name) {
		let matches = document.cookie.match(new RegExp(
			"(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
		));
		return matches ? decodeURIComponent(matches[1]) : undefined;
	}

	const terms = getCookie('showFeedback') != 'true'/*  && entryUrl.includes(entryUrlFilter) */;
	const device = !('ontouchstart' in window) || !(navigator.MaxTouchPoints > 0) || !(navigator.msMaxTouchPoints > 0);

	if (terms && device) {

		let date = new Date(Date.now() + 86400e3 * 30);
		date = date.toUTCString();
		document.cookie = 'showFeedback=true; expires=' + date;

		setTimeout(function () {

			document.addEventListener('mouseleave', function () {

				if (!document.querySelector('.modal_active')) {
					document.getElementById('modal-feedback').classList.add('modal_active');
				}

				document.querySelector('.btn_hidden').click();

				const feedbackModal = document.querySelector('.modal_active');
				feedbackModal.querySelectorAll('.modal__item').forEach((item) => {
					item.addEventListener('change', () => {
						feedbackModal.querySelector('.btn').removeAttribute('disabled');
					});
				});

			}, { once: true });

		}, 30000);

	}
}

showFeedback();


function reloadIframe() {
	const iframe = document.getElementById("#configuratorContainer");
	$(iframe).attr('src', $(iframe).attr('src'));// Перезапуск
}
window.addEventListener("message", function (event) {
	if (typeof event.data == "number") {
		console.log(event.data);
		$("#configuratorContainer").css('height', event.data + 'px');
	}
});

document.addEventListener('DOMContentLoaded', function () {
	$('#pnohe_configurator').mask('+7 (999) 999-99-99');
})
