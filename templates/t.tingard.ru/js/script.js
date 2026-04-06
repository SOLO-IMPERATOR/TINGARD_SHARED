/* уменьшение header при скролле */
/* window.onscroll = function () {
  scrollFunction();
  wheelAppearance();
}; */

function scrollFunction() {
  const header = document.querySelector(".header__inner");
  const headerSmallClass = "header__inner_small";
  if (document.body.scrollTop > 30 || document.documentElement.scrollTop > 50) {
    header.classList.add(headerSmallClass);
  } else {
    header.classList.remove(headerSmallClass);
  }
}

/* function wheelAppearance() {
  const wheel = document.querySelector(".wheel-button");
  if(wheel) {
    const wheelVisibleClass = "wheel-button_visible";
    if (document.body.scrollTop > 700 || document.documentElement.scrollTop > 700) {
      wheel.classList.add(wheelVisibleClass);
    } else {
      wheel.classList.remove(wheelVisibleClass);
    }
  }

} */

/* modal video */
new ModalVideo('[data-action="play-modal-video"]');

/* отключение зума при фокусе на input, select, textarea на iOS */
const addMaximumScaleToMetaViewport = () => {
  const el = document.querySelector("meta[name=viewport]");

  if (el !== null) {
    let content = el.getAttribute("content");
    let re = /maximum\-scale=[0-9\.]+/g;

    if (re.test(content)) {
      content = content.replace(re, "maximum-scale=1.0");
    } else {
      content = [content, "maximum-scale=1.0"].join(", ");
    }

    el.setAttribute("content", content);
  }
};

const disableIosTextFieldZoom = addMaximumScaleToMetaViewport;

const checkIsIOS = () => /iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;

if (checkIsIOS()) {
  disableIosTextFieldZoom();
}

/* плашка с cookies */
function getCookie(cname) {
  const name = cname + "=";
  const decodedCookie = decodeURIComponent(document.cookie);
  const ca = decodedCookie.split(";");
  for (let i = 0; i < ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == " ") {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

function checkCookie() {
  let cookieAccepted = getCookie("cookie_policy");
  if (cookieAccepted == "accepted") {
    document.querySelector(".cookie-bar").style.display = "none";
  } else {
    document.querySelector(".cookie-bar").style.display = "block";
  }
}

checkCookie();

/* equipment slider */
const equipmentSwiperThumbs = new Swiper('[data-entity="equipment-slider-thumbs"]', {
  watchSlidesProgress: true,
  breakpoints: {
    320: {
      slidesPerView: 2.5,
      spaceBetween: 10,
    },
    480: {
      slidesPerView: 3.5,
      spaceBetween: 15,
    },
    768: {
      slidesPerView: 4.5,
      spaceBetween: 20,
    },
    1000: {
      slidesPerView: 4,
      spaceBetween: 30,
    },
  },
  navigation: {
    nextEl: '[data-entity="equipment-arrow-next"]',
    prevEl: '[data-entity="equipment-arrow-prev"]',
    disabledClass: "slider-arrow_disabled",
  },
});

const equipmentSwiperGallery = new Swiper('[data-entity="equipment-slider"]', {
  spaceBetween: 20,
  thumbs: {
    swiper: equipmentSwiperThumbs,
    slideThumbActiveClass: "equipment__thumbs-item_active",
  },
});

/* video-feedback slider */
const swiperVideoFeedback = new Swiper('[data-entity="video-feedback-slider"]', {
  breakpoints: {
    320: {
      slidesPerView: "auto",
      enabled: true,
      spaceBetween: 10,
    },
    1000: {
      enabled: false,
    },
  },
});

/* photo slider */
const photoSlider = new Swiper('[data-entity="photo-slider"]', {
  slidesPerView: "auto",
  spaceBetween: 140,
  centeredSlides: true,
  navigation: {
    nextEl: '[data-entity="photo-arrow-next"]',
    prevEl: '[data-entity="photo-arrow-prev"]',
    disabledClass: "slider-arrow_disabled",
  },
  initialSlide: 3,
  slideActiveClass: "photo__item_active",
});

/* toogle nav */
function toggleNav(event) {
  event.target.classList.toggle("header__burger_active");
}

/* go to section */
function goToSection(event) {
  event.preventDefault();

  document.getElementById(event.target.getAttribute("href").substring(1)).scrollIntoView({
    block: "center",
    behavior: "smooth",
  });

  document.querySelector(".burger").classList.remove("burger_active");
}

/* modal */
(function () {
  const ACTIVE_MODAL_CLASS = "modal_active";
  const modalContainer = document.getElementById("modal-container");
  const pageBody = document.querySelector(".page__body");
  const PAGE_OVERFLOW_HIDDEN_CLASS = "page__body_overflow_hidden";

  const resetInputValues = (modal) => {
    const inputs = modal.querySelectorAll("input");
    inputs.forEach((input) => {
      input.value = "";
    });
  };

  const closeModal = () => {
    const activeModal = modalContainer.querySelector(`.${ACTIVE_MODAL_CLASS}`);
    if (activeModal) {
      resetInputValues(activeModal);
      activeModal.classList.remove(ACTIVE_MODAL_CLASS);
      pageBody.classList.remove(PAGE_OVERFLOW_HIDDEN_CLASS);
    }
  };

  const handleCloseModal = () => {
    closeModal();
  };

  const handleKeyDown = (event) => {
    if (event.key === "Escape") {
      closeModal();
    }
  };

  const handleModalClick = (event) => {
    if (event.target.classList.contains("modal")) {
      closeModal();
    }
  };

  const openModal = (type, params, title) => {
    const modal = modalContainer.querySelector(`[data-modal-type="${type}"]`);
    if (!modal) {
      return;
    }

    pageBody.classList.add(PAGE_OVERFLOW_HIDDEN_CLASS);

    const modalTitle = modal.querySelector('[data-entity="modal-title"]');
    const modalCloseBtn = modal.querySelector('[data-entity="modal-close"]');

    modalTitle.textContent = title || "Оставьте заявку и в ближайшее время мы с вами свяжемся";

    for (let key in params) {
      if (params.hasOwnProperty(key)) {
        let input = modal.querySelector(`input[name="${key}"]`);
        if (input) {
          input.value = params[key];
        }
      }
    }

    modalCloseBtn.addEventListener("click", handleCloseModal);
    modal.classList.add(ACTIVE_MODAL_CLASS);
    document.addEventListener("keydown", handleKeyDown);
    modal.addEventListener("click", handleModalClick);
  };

  window.openModal = openModal;
  window.closeModal = closeModal;
})();

/* функция сбора овтетов в с квиза */
function getQuizData() {
  const quizQuestions = document.querySelectorAll('[data-entity="quiz-question-container"]');
  let comments = "";

  quizQuestions.forEach((question, index) => {
    if (index < 5) {
      const questionTitle = question.querySelector('[data-entity="quiz-question-title"]').textContent;
      const selectedAnswer = question.querySelector('input[type="radio"]:checked').value;

      if (selectedAnswer) {
        comments += `<b>${questionTitle}</b> ${selectedAnswer}<br>`;
      }
    }
  });

  return comments;
}

/* отправка форм */
const sendForm = () => {
  document.addEventListener("submit", (event) => {
    const form = event.target;
    if (form.dataset.entity !== "form") {
      return;
    }
    event.preventDefault();

    const submitBtn = form.querySelector('[type="submit"]');
    const LOADING_BTN_CLASS = "btn_status_loading";
    const data = new FormData(form);
    /*     let ObjectData = new Object();
        let formstring = $(form).serializeArray();

        ObjectData.formdataaaz = formstring; */

    let ObjectData = {};
    let formDataArray = Array.from(new FormData(form), ([name, value]) => ({ name, value }));

    ObjectData.formdataaaz = formDataArray;

/*  data.append("trace", b24Tracker.guest.getTrace());
    ObjectData.trace = b24Tracker.guest.getTrace(); */
    try {
    const trace = b24Tracker?.guest?.getTrace?.();
    if (trace) {
        data.append("trace", trace);
        ObjectData.trace = trace;
    }
    } catch (e) {
        // b24Tracker отсутствует — пропускаем
    }

/*  ym(32216254, "getClientID", function (clientID) {
      data.append("metrikaclientid", clientID);
      ObjectData.metrikaclientid = clientID;
    }); */

    try {
    ym(32216254, "getClientID", function (clientID) {
        data.append("metrikaclientid", clientID);
        ObjectData.metrikaclientid = clientID;
    });
    } catch(e) {
        // тоже пробросить
    }

    const lockButton = () => {
      submitBtn.classList.add(LOADING_BTN_CLASS);
      submitBtn.setAttribute("disabled", "");
    };

    const unlockButton = () => {
      submitBtn.classList.remove(LOADING_BTN_CLASS);
      submitBtn.removeAttribute("disabled");
    };

    lockButton();

    const formAction = data.getAll("action");

    switch (formAction[0]) {
      case "get-quiz-data":
        data.append("comments", getQuizData());
        ObjectData.comments = getQuizData();
        break;
      default:
    }

    // Проверка существования cookie promo
    function checkPromoCookie() {
      const cookiesString = document.cookie;
      const cookiesArray = cookiesString.split("; ");
      for (const cookie of cookiesArray) {
        const [name, value] = cookie.split("=");
        const cookieName = name.trim();

        if (cookieName === "promo" && value === "true") {
          return true;
        }
      }

      return false;
    }

    if (checkPromoCookie()) {
      data.append("promo", true);
      ObjectData.promo = true;
    }

/*     grecaptcha.ready(() => {
      grecaptcha.execute("6Lel6XUqAAAAAHrJZRZa5kJoKM-dcleotuU2nt8q", { action: "submit" }).then((token) => {
        data.append("recaptcha_token", token);
        ObjectData.token = token; */
        BX.ajax({
          url: "/local/ajax/t.tingard.ru.php",
          data: ObjectData,
          method: "POST",
          dataType: "html",
          onsuccess: () => {
              try {
                  if (formAction[0] === "get-quiz-data") {
                      ym?.(32216254, "reachGoal", "quiz-success");
                  }
              } catch(e) {}

              unlockButton();
              form.reset();
              closeModal();

              try {
                  ym?.(32216254, "reachGoal", "lead__success");
              } catch(e) {}

              location.href = "/thanks/";
          },
          onfailure: () => {
              unlockButton();
          },
/*         });
      }); */
    });
  });
};

sendForm();

/* квиз */
document.addEventListener("DOMContentLoaded", function () {
  const quizQuestions = document.querySelectorAll('[data-entity="quiz-question-container"]');
  const quizNextButtons = document.querySelectorAll('[data-entity="quiz-btn-next"]');
  const quizBackButtons = document.querySelectorAll('[data-entity="quiz-btn-prev"]');

  let currentQuestionIndex = 0;
  function showQuestion(index) {
    quizQuestions.forEach((question, i) => {
      if (i === index) {
        question.style.display = "grid";
      } else {
        question.style.display = "none";
      }
    });
  }

  function handleNextClick() {
    if (currentQuestionIndex < quizQuestions.length - 1) {
      currentQuestionIndex++;
      showQuestion(currentQuestionIndex);
    }
  }

  function handleBackClick() {
    if (currentQuestionIndex > 0) {
      currentQuestionIndex--;
      showQuestion(currentQuestionIndex);
    }
  }

  function handleRadioChange(event) {
    const nextButton = quizNextButtons[currentQuestionIndex];
    if (event.target.checked) {
      nextButton.removeAttribute("disabled");
    } else {
      nextButton.setAttribute("disabled", "disabled");
    }
  }

  quizNextButtons.forEach((button) => {
    button.addEventListener("click", handleNextClick);
  });

  quizBackButtons.forEach((button) => {
    button.addEventListener("click", handleBackClick);
  });

  const radioInputs = document.querySelectorAll(".modal__quiz-question input[type='radio']");
  radioInputs.forEach((input) => {
    input.addEventListener("change", handleRadioChange);
  });

  showQuestion(currentQuestionIndex);
  window.addEventListener("vue-seria-change", function (e) {
    const newTitle = e.detail.title;
    const newSizes = e.detail.sizes;
    const arrayVideoPreview = {
      "Оптимум": {
        preview: "/local/templates/t.tingard.ru/img/cellar-video-preview.webp?v=2",
        video: "https://vkvideo.ru/video_ext.php?oid=-147829879&id=456239443&hd=2&autoplay=1&t=0",
      },
      "Престиж": {
        preview: "/upload/images/Prestige.webp",
        video: "https://vkvideo.ru/video_ext.php?oid=-147829879&id=456239444&hd=2&autoplay=1&t=0",
      },
      "Комфорт": {
        preview: "/upload/images/Comort.webp",
        video: "https://vkvideo.ru/video_ext.php?oid=-147829879&id=456239498&hd=2&autoplay=1&t=0",
      },
    };
    const currentPreview = document.querySelector(".cellar-video__video img");
    currentPreview.src = arrayVideoPreview[newTitle].preview;
    const currentVideo = document.querySelector("a.video__btn");
    currentVideo.href = arrayVideoPreview[newTitle].video;
    const tilteModel = document.querySelectorAll(".model_name");
    tilteModel.forEach((elem) => {
      elem.innerHTML = newTitle;
    });
    let newTableHtml = "";
    newSizes.forEach((size) => {
      const priceFromated = parseInt(size.UF_CELLAR_SIZE_BASE_PRICE).toLocaleString("ru-RU", {
        style: "currency",
        currency: "RUB",
        maximumFractionDigits: 0,
      });
      const weight = size.UF_CELLAR_WEIGHT.split(" ")[0];
      newTableHtml += `
				<tr class="spec-table__line">
					<td>
						<span class="spec-table__name">
							<span class="spec-table__name-desktop">TINGARD ${size.UF_CELLAR_SIZE}</span>
							<span class="spec-table__name-mobile">${size.UF_CELLAR_SIZE}</span>
						</span>
						<div class="spec-table__img-container">
							<img class="spec-table__img" src="${size.UF_CELLAR_SIZE_IMAGE_BASE}" alt="TINGARD ${size.UF_CELLAR_SIZE}">
						</div>
					</td>
					<td class="spec-table__char-value spec-table__char-value_style_border">${size.UF_CELLAR_SIZE_GABRITES_METER}</td>
					<td class="spec-table__char-value spec-table__char-value_style_border">${size.UF_CELLAR_SIZE_M3}</td>
					<td class="spec-table__char-value spec-table__char-value_style_border">${weight}</td>
					<td class="spec-table__final-price-value">${priceFromated}</td>
				</tr>
			`;
    });
    const currentTable = document.querySelector(".spec-table__table tbody");
    currentTable.innerHTML = newTableHtml;
  });
});

// колесо фортуны
document.addEventListener('DOMContentLoaded', function() {
  // Элементы
  const wheel = document.querySelector('[data-entity="wheel"]');
  const spinBtn = document.querySelector('[data-entity="fortune-btn"]');
  const giftElement = document.querySelector('[data-entity="fortune-gift"]');
  const giftTextElement = document.querySelector('.modal__fortune-wheel-gift_accent');
  const formElement = document.querySelector('.modal__fortune-form');
  const textElement = document.querySelector('[data-entity="fortune-text"]');
  const commentsInput = formElement.querySelector('input[name="comments"]');
  const crmTitleInput = formElement.querySelector('input[name="crm-title"]');
  
  // Призы с вероятностями
  const prizes = [
    { name: 'Скидка 10% на погреб', probability: 25 },
    { name: 'Скидка 20% на 2-ой погреб ', probability: 25 },
    { name: 'Винный стеллаж', probability: 25 },
    { name: 'Монтажный комплект', probability: 25 },
    { name: 'Террасная доска-дэкинг', probability: 0 },
    { name: 'Грузоподъемник', probability: 0 }
  ];

  // Переменная для отслеживания состояния вращения
  let isSpinning = false;

  // Проверяем, вращал ли пользователь колесо
  function hasUserSpunWheel() {
    return localStorage.getItem('fortuneWheelSpun') === 'true';
  }

  function getUserPrize() {
    return localStorage.getItem('fortuneWheelPrize');
  }

  function getWheelAngle() {
    return localStorage.getItem('fortuneWheelAngle');
  }

  // Показываем соответствующие элементы при загрузке
  function initializeWheelState() {
    if (hasUserSpunWheel()) {
      // Пользователь уже вращал колесо
      const prize = getUserPrize();
      const savedAngle = getWheelAngle();

      giftTextElement.textContent = prize;

      // Функция для обновления кнопки с выигранным призом
      function updateFortuneButton(prize) {
        const fortuneButton = document.querySelector('.intro__fortune-btn');
        if (fortuneButton) {
          fortuneButton.setAttribute('onclick', 
            `openModal('fortune', {'crm-entity': 'lead', 'crm-title': 'Колесо подарков (${prize})'}, 'Крутите колесо подарков и получайте выгоду')`
          );
        }
      }

      updateFortuneButton(prize);
      
      
/*       setTimeout(() => {
          crmTitleInput.value = 'Колесо подарков (' + prize + ')';
      }, 100); */

      
      // Устанавливаем колесо в сохраненное положение
      if (savedAngle) {
        wheel.style.transition = 'none';
        wheel.style.transform = `rotate(${savedAngle}deg)`;
        // Возвращаем transition после установки положения
        setTimeout(() => {
          wheel.style.transition = 'transform 5s cubic-bezier(0.2, 0.8, 0.3, 1)';
        }, 10);
      }
      
      // Показываем форму и результат, скрываем кнопку
      formElement.classList.remove('modal__fortune-form_hidden');
      giftElement.classList.remove('modal__fortune-wheel-gift_hidden');
      textElement.classList.remove('modal__fortune-wheel-text_hidden');
      spinBtn.style.display = 'none';
    } else {
      // Пользователь еще не вращал колесо
      formElement.classList.add('modal__fortune-form_hidden');
      giftElement.classList.add('modal__fortune-wheel-gift_hidden');
      textElement.classList.add('modal__fortune-wheel-text_hidden');
      spinBtn.style.display = 'block';
      
      // Сбрасываем колесо в начальное положение
      wheel.style.transition = 'none';
      wheel.style.transform = 'rotate(0deg)';
      setTimeout(() => {
        wheel.style.transition = 'transform 5s cubic-bezier(0.2, 0.8, 0.3, 1)';
      }, 10);
    }
  }

  // Выбор приза на основе вероятностей
  function selectPrize() {
    const availablePrizes = prizes.filter(prize => prize.probability > 0);
    const totalProbability = availablePrizes.reduce((sum, prize) => sum + prize.probability, 0);
    
    // Генерируем случайное число от 0 до totalProbability
    let random = Math.random() * totalProbability;
    
    // Правильно определяем приз на основе вероятностей
    let currentProbability = 0;
    for (const prize of availablePrizes) {
        currentProbability += prize.probability;
        if (random <= currentProbability) {
            return prize;
        }
    }
    
    // Fallback - возвращаем последний доступный приз
    return availablePrizes[availablePrizes.length - 1];
  }

  function spinWheel() {
    if (isSpinning) return;
    isSpinning = true;
    
    const selectedPrize = selectPrize();
    const prizeIndex = prizes.findIndex(p => p.name === selectedPrize.name);
    
    // Блокируем кнопку на время вращения
    spinBtn.disabled = true;
    
    // ВЫЧИСЛЯЕМ УГОЛ ДЛЯ ПРАВИЛЬНОГО ПОЗИЦИОНИРОВАНИЯ
    // Учитываем, что секторы теперь созданы с помощью skewY
    const fullRotations = 5;
    const segmentAngle = 60; // 360 / 6 секторов
    
    // Правильный расчет угла для skewY геометрии
    // Центр сектора находится на (prizeIndex * segmentAngle + segmentAngle/2) градусов
    // Но из-за skewY нам нужно скорректировать позиционирование
    const baseAngle = prizeIndex * segmentAngle;
    const targetAngle = fullRotations * 360 + (360 - baseAngle + segmentAngle);
    
    // Устанавливаем конечное положение с плавной анимацией
    wheel.style.transition = 'transform 5s cubic-bezier(0.2, 0.8, 0.3, 1)';
    wheel.style.transform = `rotate(${targetAngle}deg)`;
    
    // После завершения вращения
    setTimeout(() => {
      // Сохраняем в localStorage
      localStorage.setItem('fortuneWheelSpun', 'true');
      localStorage.setItem('fortuneWheelPrize', selectedPrize.name);
      localStorage.setItem('fortuneWheelAngle', targetAngle.toString());
      
      // Показываем результат
      giftTextElement.textContent = selectedPrize.name;
      setTimeout(() => {
          crmTitleInput.value = 'Колесо подарков (' + selectedPrize.name + ')';
      }, 100);

      // Функция для обновления кнопки с выигранным призом
      function updateFortuneButton(prize) {
        const fortuneButton = document.querySelector('.intro__fortune-btn');
        if (fortuneButton) {
          fortuneButton.setAttribute('onclick', 
            `openModal('fortune', {'crm-entity': 'lead', 'crm-title': 'Колесо подарков (${prize})'}, 'Крутите колесо подарков и получайте выгоду')`
          );
        }
      }

      updateFortuneButton(selectedPrize.name);
      
      // Показываем форму и результат, скрываем кнопку
      formElement.classList.remove('modal__fortune-form_hidden');
      giftElement.classList.remove('modal__fortune-wheel-gift_hidden');
      textElement.classList.remove('modal__fortune-wheel-text_hidden');
      spinBtn.style.display = 'none';
      
      isSpinning = false;
      spinBtn.disabled = false;
    }, 5500);
  }

  // Инициализация при загрузке
  initializeWheelState();

  // Функции для работы с UTM и куками
  function setCookie(name, value, days) {
    const expires = new Date();
    expires.setTime(expires.getTime() + (days * 24 * 60 * 60 * 1000));
    document.cookie = name + '=' + value + ';expires=' + expires.toUTCString() + ';path=/';
  }

  function getCookie(name) {
    const nameEQ = name + '=';
    const ca = document.cookie.split(';');
    for (let i = 0; i < ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) === ' ') c = c.substring(1, c.length);
      if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
  }

  function getUrlParams() {
    const params = {};
    const queryString = window.location.search.substring(1);
    const pairs = queryString.split('&');
    for (let i = 0; i < pairs.length; i++) {
      const pair = pairs[i].split('=');
      if (pair[0]) {
        params[decodeURIComponent(pair[0])] = decodeURIComponent(pair[1] || '');
      }
    }
    return params;
  }

  function replacePhones() {
    const newPhoneNumber = '8 (800) 350-01-57';
    const phoneElements = document.querySelectorAll('a[href^="tel:"]');
    phoneElements.forEach(element => {
      if (element.textContent.trim()) {
        element.textContent = newPhoneNumber;
      }
      const currentHref = element.getAttribute('href');
      if (currentHref && currentHref.startsWith('tel:')) {
        const cleanPhone = newPhoneNumber.replace(/[^0-9+]/g, '');
        element.setAttribute('href', 'tel:' + cleanPhone);
      }
    });
  }

  // Проверка UTM и замена телефонов
    const params = getUrlParams();
    if (params.utm_content === 'gift') {
      setCookie('utm_content', 'gift', 30);
    }

    const hasGiftCookie = getCookie('utm_content') === 'gift';
    if (hasGiftCookie) {
      replacePhones();
    }

    if (params.utm_content === 'gift') {
      replacePhones();
    }
  
  // Обработчик клика на кнопку
  if (spinBtn) {
    spinBtn.addEventListener('click', spinWheel);
  }
});