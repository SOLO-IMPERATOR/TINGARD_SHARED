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

/* слайдер моделей */
document.querySelectorAll('.models__item').forEach(item => {
    const tabs = item.querySelectorAll('.models__tabs-item');
    const swiper = new Swiper(item.querySelector('.models__body'), {
        allowTouchMove: false,
        effect: 'fade',
        fadeEffect: { crossFade: true },
        speed: 250,
        on: {
            slideChange() {
                tabs.forEach((t, i) =>
                    t.classList.toggle('models__tabs-item_active', i === this.activeIndex)
                );
            }
        }
    });

    tabs.forEach((tab, index) => {
        tab.addEventListener('click', () => swiper.slideTo(index));
    });
});

/* слайдер заработка */
const earnSwiper = new Swiper('.earn', {
    slidesPerView: 'auto',
    freeMode: true,
    enabled: false,
    breakpoints: {
        0: {
            enabled: true,
        },
        768: {
            enabled: false,
        }
    }
});

/* слайдер базовой комплектации */
const baseEquipmentSwiper = new Swiper('.base-equipment__inner.swiper', {
    navigation: {
        prevEl: '.base-equipment__arrow_action_prev',
        nextEl: '.base-equipment__arrow_action_next',
        disabledClass: 'slider-arrow_disabled',
    },
    slidesOffsetBefore: 20,
    slidesOffsetAfter: 20,
    observer: true,
    observeParents: true,
    watchOverflow: true,
    updateOnWindowResize: true,
    breakpoints: {
        0: {
            slidesPerView: 'auto',
            spaceBetween: 20,
            lidesOffsetBefore: 20,
            slidesOffsetAfter: 20,
        },
        768: {
            slidesPerView: 'auto',
            spaceBetween: 20,
            slidesOffsetBefore: 20,
            slidesOffsetAfter: 20,
        },
        1280: {
            slidesPerView: 3,
            spaceBetween: 30,
            slidesOffsetBefore: 0,
            slidesOffsetAfter: 0,
        },
    }
});

window.addEventListener('load', () => {
  baseEquipmentSwiper.update();
});

/* слайдер с документами */
const docsSwiper = new Swiper('.docs__container', {
    slidesPerView: 5,
    spaceBetween: 30,
    slidesOffsetBefore: 20,
    slidesOffsetAfter: 20,
    navigation: {
        prevEl: '.docs__arrow_action_prev',
        nextEl: '.docs__arrow_action_next',
        disabledClass: 'slider-arrow_disabled',
    },
    breakpoints: {
        0: {
            slidesPerView: 2.5,
            spaceBetween: 20,
        },
        480: {
            slidesPerView: 3.5,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 5,
            spaceBetween: 30,
            slidesOffsetBefore: 0,
            slidesOffsetAfter: 0,
        },
    },
});

/* слайдер с партнёрами */
const feedbackSwiper = new Swiper('.feedback__container', {
    navigation: {
        prevEl: '.feedback__arrow_action_prev',
        nextEl: '.feedback__arrow_action_next',
        disabledClass: 'slider-arrow_disabled',
    },
    slidesOffsetBefore: 20,
    slidesOffsetAfter: 20,
    breakpoints: {
        0: {
            slidesPerView: 2.5,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 3,
            spaceBetween: 30,
            slidesOffsetBefore: 0,
            slidesOffsetAfter: 0,
        },
    },
});

const lightbox = GLightbox();

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

/* toogle nav */
function toggleNav(event) {
  event.target.classList.toggle("burger_active");
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
    let ObjectData = {};
    let formDataArray = Array.from(new FormData(form), ([name, value]) => ({ name, value }));

    ObjectData.formdataaaz = formDataArray;
    try {
      const trace = b24Tracker?.guest?.getTrace?.();
      if (trace) {
          data.append("trace", trace);
          ObjectData.trace = trace;
      }
      } catch (e) {
          // b24Tracker отсутствует — пропускаем
    }

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

        BX.ajax({
          url: "/local/ajax/dealer.tingard.ru.php",
          data: ObjectData,
          method: "POST",
          dataType: "html",
          onsuccess: () => {
              unlockButton();
              form.reset();
              closeModal();

/*               try {
                  ym?.(32216254, "reachGoal", "lead__success");
              } catch(e) {} */

              location.href = "/thanks/";
          },
          onfailure: () => {
              unlockButton();
          },
    });
  });
};

sendForm();