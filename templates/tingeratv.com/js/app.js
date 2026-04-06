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

for (let i=0; i < headerNavLink.length; i++) {
	headerNavLink[i].addEventListener('click', (e) => {
		if (e.target.classList.contains(headerNavLinkActiveClass)) {
			e.target.classList.remove(headerNavLinkActiveClass);
			burgerInactive();
		} else {
			for (let t=0; t < headerNavLink.length; t++) {
				headerNavLink[t].classList.remove(headerNavLinkActiveClass);
			}
			e.target.classList.add(headerNavLinkActiveClass);
			burgerActive();
		}
	});
}

for (let i=0; i < headerNavSublink.length; i++) {
	headerNavSublink[i].addEventListener('click', (e) => {
		if (e.target.classList.contains(headerNavSublinkActiveClass)) {
			e.target.classList.remove(headerNavSublinkActiveClass);
		} else {
			for (let t=0; t < headerNavSublink.length; t++) {
				headerNavSublink[t].classList.remove(headerNavSublinkActiveClass);
			}
			e.target.classList.add(headerNavSublinkActiveClass);
			burgerActive();
		}
	});
}

document.addEventListener('click', function(e) {
    if (!headerInner.contains(e.target)) {
        burgerInactive();
		for (let t=0; t < headerNavLink.length; t++) {
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

for (let i=0; i < tabTitle.length; i++) {
	tabTitle[i].addEventListener('click', (event) => {

		let tabsCurrent = event.target.parentElement.children;
		for (let t=0; t < tabsCurrent.length; t++) {
			tabTitle[t].classList.remove('tab-title_active');
		}
		event.target.classList.add('tab-title_active');

		let contentsCurrent = event.target.parentElement.nextElementSibling.children;
		for (let c=0; c < contentsCurrent.length; c++) {
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
	comments += `<b>Выбранные опции:</b><br>`;
	document.querySelectorAll('.conf-total__list-item').forEach(optionEl => {
		const optionName = optionEl.textContent;
		comments += `— ${optionName}<br>`;
	});
	comments += `<b>Базовая стоимость модели:</b> ${document.querySelector('#base-price-end span').textContent} руб.<br>`;
	comments += `<b>Стоимость дополнительного оборудования:</b> ${document.querySelector('#modul-price-end span').textContent} руб.<br>`;
	comments += `<b>Итого:</b> ${document.querySelector('#total-price-end span').textContent} руб.`;

	return comments;
}

/* сбор данных с конфигуратора на странице модели при отправке формы */
const getAtvData = () => {

	const confSelector = document.getElementById('conditions');

	let comments = `<b>Выбранная модель:</b> ${confSelector.querySelector('#conditions__short-name').textContent}<br><b>Выбранная модификация:</b> ${confSelector.dataset.modsName}<br>`;

	if (confSelector.querySelector('input[name="package"]:checked')) {
		const confPackage = confSelector.querySelector('input[name="package"]:checked');

		const packageName = confPackage.closest('.conf-widget__package').querySelector('.conf-widget__package-name').textContent;
		const packageBenefit = confPackage.closest('.conf-widget__package').querySelector('.conf-widget__package-benefit').textContent;
		comments += `<b>Выбранный пакет:</b> ${packageName} (${packageBenefit})<br>`;
	}

	comments += `<b>Выбранный цвет:</b> ${confSelector.querySelector('input[name="confColor"]:checked').value}<br>`;

	comments += `<b>Выбранные опции:</b><br>`;
	confSelector.querySelectorAll('.conf-widget__options .checkbox__input:checked').forEach(optionEl => {
		const optionName = optionEl.getAttribute('name');
		comments += `— ${optionName}<br>`;
	});

	const additionalEquipmentPrice = confSelector.querySelector('.conf-numbers__price').textContent;
	comments += `<b>Стоимость дополнительного оборудования:</b> ${additionalEquipmentPrice}<br>`;
	comments += `${confSelector.querySelector('.conf-widget__total-price').textContent}`;

	console.log(comments);

	return comments;
};

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
		comments += ` (${testdriveSelector.querySelector('.select').value})<br>`;
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

		modalTitle.textContent = title || 'Leave a request and we will contact you shortly';

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
			case 'atv-conf-model-page':
				data.append('comments', getAtvData());
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

		BX.ajax({
			url: '/local/ajax/tinger.ru.php',
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
					case 'create-vacancies-deal':
						ym(35231225,'reachGoal','create-vacancies-deal');
						closeModal();
						openModal('thanks', {}, 'Заявка отправлена');
						form.reset();
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

/* квиз по пневмодискам */
const rimQuizSelector = document.querySelector('[data-modal-type="rim-quiz"]');
if(rimQuizSelector) {
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
if(atvQuizSelector) {
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

/* видеообзоры на странице TINGER Proto */
const videoReviews = document.querySelector('.video-reviews');
if(videoReviews) {
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

// applications tabs
document.addEventListener('DOMContentLoaded', function() {
    var items = document.querySelectorAll('.applications__item');
    
    items.forEach(function(item) {
        item.addEventListener('click', function() {
            var applicationsActive = this.getAttribute('data-index');
            
            items.forEach(function(item) {
                item.classList.remove('applications__item_active');
            });
            
            this.classList.add('applications__item_active');
            
            var tabs = document.querySelectorAll('.applications__tab');
            tabs.forEach(function(tab) {
                tab.style.display = 'none';
            });
            
            var activeTab = document.querySelector('.applications__tab[data-index="' + applicationsActive + '"]');
            activeTab.style.display = 'block';
            
            var isTouchDevice = 'ontouchstart' in window || navigator.MaxTouchPoints > 0 || navigator.msMaxTouchPoints > 0;
            
            if (isTouchDevice) {
                window.scrollTo({
                    top: document.getElementById('applications__tabs').offsetTop - 300,
                    behavior: 'smooth'
                });
            }
        });
    });
});