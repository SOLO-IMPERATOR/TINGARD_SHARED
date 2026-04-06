const headerBottom = document.querySelector('.header__bottom');
const sidebar = document.querySelector('.sidebar');

document.addEventListener('DOMContentLoaded', () => {
	const burger = headerBottom.querySelector('.burger');
	burger.addEventListener('click', () => {
		burger.classList.toggle('burger_active');
	});
});

document.addEventListener('DOMContentLoaded', () => {
	const catalogBtn = headerBottom.querySelector('.header__catalog-btn');
	
	catalogBtn.addEventListener('click', (event) => {
		event.preventDefault();
		sidebar.classList.toggle('sidebar_visible');
	})
});


//sticky menu
window.onscroll = function() {fixHeader()};

const headerSticky = headerBottom.offsetTop;

function fixHeader() {
	if (window.pageYOffset > headerSticky) {
		headerBottom.classList.add('header__bottom_fixed');
		sidebar.classList.add('sidebar_fixed');
	} else {
		headerBottom.classList.remove('header__bottom_fixed');
		sidebar.classList.remove('sidebar_fixed');
	}
}

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

//glightbox
const glightbox = GLightbox();


//modal
const modalFunction = () => {
	const modalButtons = document.querySelectorAll('[data-action="modal"]');
	const modalActiveClass = 'modal_active';

	const closeModal = (modal) => {
		if (modal.classList.contains(modalActiveClass)) {
			modal.classList.remove(modalActiveClass);
			modal.querySelectorAll('input[type="hidden"]').forEach(item => {item.removeAttribute('value')});
			modal.dataset.function = '';
		}
	}

	const showModal = (button) => {

		const modal = document.querySelector('.modal[data-modal-type='+ button.dataset.modalType +']');
		modal.reset();

		modal.querySelector('[data-modal-entity="title"]').textContent = button.dataset.modalTitle !== undefined ? button.dataset.modalTitle : 'Оставьте заявку и мы обязательно свяжемся с вами';
		
		modal.querySelector('input[name="title"]').value = button.dataset.crmTitle;
		if(button.dataset.crmDirection) {
			modal.querySelector('input[name="direction"]').value = button.dataset.crmDirection;
		} else {
			modal.querySelector('input[name="direction"]').value = '';
		}

		if(button.dataset.function) {
			modal.dataset.function = button.dataset.function
		}
		
		modal.classList.add(modalActiveClass);
		modal.addEventListener('click', (event) => closeModal(event.target));
		modal.querySelector('.modal__close').addEventListener('click', () => closeModal(modal));
	}


	modalButtons.forEach(button => {
		button.addEventListener('click', () => {
			showModal(button);
		});
	});
}

document.addEventListener('DOMContentLoaded', () => {
	modalFunction();
	console.log(cartItemsData.BASKET_ITEM_RENDER_DATA);
});

// send form to CRM
document.addEventListener('DOMContentLoaded', () => {

/* 	function sayHi() {
		console.log(b24Tracker.guest.getTrace());
	}
	  
	setTimeout(sayHi, 5000);
 */
	

	const forms = document.querySelectorAll('form');

	 forms.forEach(item => {
	 	item.addEventListener('submit', event => {

	 		if(item.dataset.action === 'search' || item.getAttribute('name') == "form_auth") {
	 			return;
	 		}
		
	 		event.preventDefault();
	
	 		const submitBtn = item.querySelector('.btn[type="submit"]');
	
	 		const lockButton = () => {
	 			submitBtn.classList.add('btn_status_loading');
	 			submitBtn.setAttribute('disabled', '');
	 		}
	
	 		const unlockButton = () => {
	 			submitBtn.classList.remove('btn_status_loading');
	 			submitBtn.removeAttribute('disabled');
	 		}
	
	 		let data = new FormData(item);
	 		data.append('trace', b24Tracker.guest.getTrace());

			lockButton();

			if(item.dataset.function == 'sendCart') {
				data.append('cartItems', JSON.stringify(cartItemsData.BASKET_ITEM_RENDER_DATA));
				data.append('cartSum', cartItemsData.allSum_FORMATED);
				const basketItemList = document.getElementById("basket-item-list");
				const deleteButtons = basketItemList.querySelectorAll('[data-entity="basket-item-delete"]');
				deleteButtons.forEach(button => button.click());
			}
	
	 		BX.ajax({
	 			url: '/local/ajax/send.php',
	 			data: data,
	 			method: 'POST',
	 			dataType: 'json',
	 			timeout: 10,
	 			processData: false,
	 			preparePost: false,
	 			onsuccess: () => {
	 				switch (data.get('direction')) {
	 					case '68':
	 						ym(36650905,'reachGoal','thanks-68');
	 					break;
	 					case '66':
	 						ym(36650905,'reachGoal','thanks-66');
	 					break;
	 					case '64':
	 						ym(36650905,'reachGoal','thanks-64');
	 					break;
	 					case '9600':
	 						ym(36650905,'reachGoal','thanks-9600');
	 					break;
	 					case '14016':
	 						ym(36650905,'reachGoal','thanks-14016');
	 					break;
	 					case '16452':
	 						ym(36650905,'reachGoal','thanks-16452');
	 					break;
	 					case '17328':
	 						ym(36650905,'reachGoal','thanks-17328');
	 					break;
	 					default:
	 						ym(36650905,'reachGoal','thanks-14016');
	 				}
	 				unlockButton();
	 				location.href = '/thanks/';
	 			},
	 			onfailure: () => {
	 				unlockButton();
	 			}
	 		});
	
	 	});
	 });


});


/* about-team__slider slider */
if (document.querySelector('.about-team__slider')) {
	new Swiper('.about-team__slider', {
		watchOverflow: true,
		simulateTouch: false,
		freeMode: true,
		preloadImages: false,
		speed: 15000,
		autoplay: {
			delay: 0,
		},
		breakpoints: {
			1024: {
				slidesPerView: 0.7,
				speed: 17000,
			},
			768: {
				slidesPerView: 0.5,
				speed: 20000,
			},
			320: {
				speed: 25000,
				slidesPerView: 0.3,
			}
		}
	});
}

if (document.querySelector('.about-clients__slider')) {
	new Swiper('.about-clients__slider', {
		loop: true,
		freeMode: true,
		autoplay: {
			delay: 0,
		},
		disableOnInteraction: false,
		slidesPerView: 'auto',
		simulateTouch: false,
		speed: 5000,
	});
}

/* download files */
function readUrl(input) {
	if (input.files && input.files[0]) {
		let reader = new FileReader();
		reader.onload = e => {
			let imgData = e.target.result;
			let imgName = input.files[0].name;
			input.setAttribute("data-title", imgName);
			console.log(e.target.result);
		};
		reader.readAsDataURL(input.files[0]);
	}
}