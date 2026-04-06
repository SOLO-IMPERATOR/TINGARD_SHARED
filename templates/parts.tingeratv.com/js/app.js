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
/* function getCookie(cname) {
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

checkCookie(); */


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

const glightbox = GLightbox();

new ModalVideo('[data-action="play-modal-video"]');

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


		if (form.dataset.entity !== 'form') {
			return;
		}

		event.preventDefault();


		const data = new FormData(form);
		data.append('trace', b24Tracker.guest.getTrace());




		const formAction = data.getAll('action');


		BX.ajax({
			url: '/local/ajax/part.tingeratv.com.php',
			data: data,
			method: 'POST',
			dataType: 'json',
			timeout: 10,
			processData: false,
			preparePost: false,
			onsuccess: (data) => {
				unlockButton();
				form.reset();
				closeModal();
			},
			onfailure: () => {
				unlockButton();
			}
		});
	});
}

sendForm();