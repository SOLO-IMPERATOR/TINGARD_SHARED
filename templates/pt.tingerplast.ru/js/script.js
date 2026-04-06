/* header small on scroll */
window.onscroll = function() {
	scrollFunction();
};

function scrollFunction() {
	const header = document.querySelector('.header__inner');
	const headerSmallClass = 'header__inner_small';
	if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
		header.classList.add(headerSmallClass);
	} else {
		header.classList.remove(headerSmallClass);
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




/* burger */
document.addEventListener('DOMContentLoaded', () => {
	const burger = document.querySelector('.burger');
	burger.addEventListener('click', () => {
		burger.classList.toggle('burger_active');
	});

	const headerNav = document.querySelector('.header__nav');
	headerNav.addEventListener('click', () => {
		burger.classList.remove('burger_active');
	})
});

/* itnro tabs */
document.addEventListener('DOMContentLoaded', () => {
	const introTabs = document.querySelectorAll('.benefits__item');
	const introTabActiveClass = 'benefits__item_active';

	introTabs.forEach(item => {
		item.addEventListener('click', () => {
			if (item.classList.contains(introTabActiveClass)) {
				item.classList.toggle(introTabActiveClass);
			} else {
				introTabs.forEach(item => {
					item.classList.remove(introTabActiveClass);
				})
				item.classList.add(introTabActiveClass);
			}
		});
	});
});


/* glightbox */
const lightbox = GLightbox();

/* intro slider */
const introSwiper = new Swiper('.intro__swiper', {
	autoplay: true,
	pagination: {
		el: '.intro__pagination',
		bulletClass: 'pagination__item',
		bulletActiveClass: 'pagination__item_active',
		clickableClass: 'pagination__item_clickable',
		horizontalClass: 'pagination__item_horizontal',
		clickable: true,
	},
});

/* gallery slider */
/* const gallerySwiper = new Swiper('.gallery__slider', {
	slidesPerView: 4,
	grid: {
		rows: 2,
		fill: 'row',
	},
	spaceBetween: 15,
	pagination: {
		el: '.gallery__pagination',
		bulletClass: 'pagination__item',
		bulletActiveClass: 'pagination__item_active',
		clickableClass: 'pagination__item_clickable',
		horizontalClass: 'pagination__item_horizontal',
		clickable: true,
	},
	breakpoints: {
		320: {
			slidesPerView: 2,
		},
		768: {
			slidesPerView: 3,
		},
		1000: {
			slidesPerView: 4,
		}
	}
}); */

document.addEventListener('DOMContentLoaded', () => {

	const companyText = document.querySelector('.company__text');

	/* company slider */
	new Swiper('.company__slider', {
		slidesPerView: 1,
		pagination: {
			el: '.company__pagination',
			bulletClass: 'pagination__item',
			bulletActiveClass: 'pagination__item_active',
			clickableClass: 'pagination__item_clickable',
			horizontalClass: 'pagination__item_horizontal',
			clickable: true,
		},
		navigation: {
			nextEl: '.company__slider-arrows .arrows__btn_direction_next',
			prevEl:  '.company__slider-arrows .arrows__btn_direction_prev',
			disabledClass: 'arrows_disabled',
		},
		on: {
			init: function() {
				changeText(this); 
			},
			slideChange: function() {
				changeText(this); 
			},
		}
	});

	function changeText(slider) {
		companyText.textContent = slider.slides[slider.activeIndex].dataset.caption;
	}
});

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
		iconImageHref: '/local/templates/pt.tingerplast.ru/img/map-point.svg',
		iconImageSize: [46, 58],
		iconImageOffset: [-23, -58],
	});
	map.geoObjects.add(location);
}

ymaps.ready(initLocation);


//modal
document.addEventListener('DOMContentLoaded', () => {
	const modalButtons = document.querySelectorAll('[data-action="modal"]');
	const modalActiveClass = 'modal_active';

	const closeModal = (modal) => {
		if (modal.classList.contains(modalActiveClass)) {
			modal.classList.remove(modalActiveClass);
			modal.querySelectorAll('input[type="hidden"]').forEach(item => {item.removeAttribute('value')});
		}
	}

	const showModal = (button) => {

		const modal = document.querySelector('.modal[data-modal-type='+ button.dataset.modalType +']');
		modal.reset();

		modal.querySelector('[data-modal-entity="title"]').textContent = button.dataset.modalTitle !== undefined ? button.dataset.modalTitle : 'Оставьте заявку и мы обязательно свяжемся с вами';
		
		modal.querySelector('input[name="title"]').value = button.dataset.crmTitle;
		modal.querySelector('input[name="direction"]').value = button.dataset.crmDirection;
		if(button.dataset.crmComments) {
			modal.querySelector('input[name="comments"]').value = button.dataset.crmComments;
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
});


// send form to CRM
document.addEventListener('DOMContentLoaded', () => {

	const forms = document.querySelectorAll('form');

	forms.forEach(item => {
		item.addEventListener('submit', event => {
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

			BX.ajax({
				url: '/local/ajax/pt.tingerplast.ru.php',
				data: data,
				method: 'POST',
				dataType: 'json',
				timeout: 10,
				processData: false, 
				preparePost: false,
				onsuccess: () => {
					unlockButton();
					if(item.querySelector('input[name="type"]')) {
						item.querySelector('.modal__title').textContent = 'Спасибо за обратную связь';
						item.querySelector('.modal__title').classList.remove('section-title_margin_bottom');
						item.querySelector('.modal__inner').remove();
						item.querySelector('.modal__btn-container').remove();
					} else {
						location.href = '/thanks/';
					}
				},
				onfailure: () => {
					unlockButton();
				}
			});

		});
	});


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

		let date = new Date(Date.now() + 86400e3 * 10);
		date = date.toUTCString();
		document.cookie = 'showFeedback=true; expires=' + date;

		setTimeout(function() {

			document.addEventListener('mouseleave', function() {

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
			
			}, {once : true});

		}, 15000);

	}
}

showFeedback();
/* feedback end */
