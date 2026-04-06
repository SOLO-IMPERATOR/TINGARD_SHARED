import { useCellarData } from "./useCellarData.js";

import { makePdf } from "./makingPdf.js";

const { createApp, reactive, ref } = Vue;

const app = createApp({

  setup() {
    const data = useCellarData();
    const hostImageUrl = "https://tingard.ru";
    const selectDefaultSeria = ref("Оптимум");
    const state = reactive({
      selectSeria: null,
      selectSeriaSize: null,
      price: { base_price: 0 },
      nadstavka: false,
      modalClass: "",
      currentSreiaSizesPrice: null,
      currentSizePrice: 0,
      sendDataButton: false,
      userData: {
        name: "",
        phone: "",
        email: "",
      },
      userDataErrors: {
        name: false,
        phone: false,
        email: false,
      }
    });
    function getCurrenImageOption(flag = false) {
      if (!flag) {
        switch (state.nadstavka) {
          case true:
            return "nadstavka_image";
            break;
          case false:
            return "standart_image";
        }
      } else {
        switch (state.nadstavka) {
          case true:
            return "dopfile2";
            break;
          case false:
            return "dopfile1";
        }
      }
    }
    function setSizes(sizes, currentprice = null) {
      state.currentSizePrice = currentprice ? currentprice : sizes[0].UF_CELLAR_SIZE_BASE_PRICE;
      state.currentSreiaSizesPrice = sizes.map((size) => ({
        size: size.UF_CELLAR_SIZE,
        base_price: size.UF_CELLAR_SIZE_BASE_PRICE - state.currentSizePrice,
      }));
    }

    const getPriceBySize = (size) => state.currentSreiaSizesPrice.find((item) => item.size === size)?.base_price;

    function selectOption(option) {
      const checked = event.target.checked;
      if (checked) {
        option.UF_CELLAR_OPTION_OFF_OPTION.forEach((offopt) => {
          const index = selectedOptions.value.findIndex((opt) => opt.ID == offopt);
          if (index !== -1) {
            selectedOptions.value.splice(index, 1);
            const offoption = optionsMap.get(offopt);
            offoption.UF_CELLAR_OPTION_BUNDELS.forEach((bundelsOpt) => {
              const index = selectedOptions.value.findIndex((opt) => opt.ID == bundelsOpt);
              dataOptions.value.find((opt) => opt.ID == bundelsOpt).disabled = false;
              if (index !== -1) {
                selectedOptions.value.splice(index, 1);
              }
            });
          }
        });
        option.UF_CELLAR_OPTION_BUNDELS.forEach((offopt) => {
          const index = selectedOptions.value.findIndex((opt) => opt.ID == offopt);
          if (index == -1) {
            selectedOptions.value.push(optionsMap.get(offopt));
          }
          dataOptions.value.find((opt) => opt.ID == offopt).disabled = true;
        });
        if (option.dopinfo) {
          option.dopinfo.forEach((dop) => {
            const index = dataOptions.value.findIndex((opt) => opt.ID == dop.id);
            if (index !== -1) {
              dataOptions.value[index].dopzindex = dop.zindex;
              dataOptions.value[index].dopfile1 = dop.file1;
              if (dop.file2) dataOptions.value[index].dopfile2 = dop.file2;
              if (dop.file3) dataOptions.value[index].otherImage = dop.file3;
            }
          });
        }
      } else {
        option.UF_CELLAR_OPTION_BUNDELS.forEach((offopt) => {
          const index = selectedOptions.value.findIndex((opt) => opt.ID == offopt);
          dataOptions.value.find((opt) => opt.ID == offopt).disabled = false;
          if (index !== -1) {
            selectedOptions.value.splice(index, 1);
          }
        });

        option.UF_CELLAR_OPTION_OFF_OPTION.forEach((offopt) => {
          const ofoption = optionsMap.get(offopt);
          if (ofoption.UF_CELLAR_OPTION_PRICE_BASE == "1") {
            selectedOptions.value.push(ofoption);
          }
        });

        if (option.dopinfo) {
          option.dopinfo.forEach((dop) => {
            const index = dataOptions.value.findIndex((opt) => opt.ID == dop.id);
            if (index !== -1) {
              dataOptions.value[index].dopfile1 = null;
              dataOptions.value[index].dopzindex = null;
              if (dop.file2) dataOptions.value[index].dopfile2 = null;
              if (dop.file3) dataOptions.value[index].otherImage = null;
            }
          });
        }
      }
    }

    let dataOptions = Vue.ref([]);

    const selectedOptions = Vue.ref([]);

    const optionsMap = new Map();

    let dop_price = Vue.computed(() => {
      state.price.base_price = 0;
      return (selectedOptions.value || []).reduce((sum, opt) => {
        if (opt.UF_CELLAR_OPTION_PRICE_BASE == 1) {
          state.price.base_price += opt.price;
          return sum + 0;
        }
        return sum + (parseInt(opt.price) || 0);
      }, 0);
    });

    const endPrice = Vue.computed(() => {
      return parseInt(state.price.base_price) + parseInt(dop_price.value);
    });

    const setSelectSeriaSize = (selectsize) => {
      if (state.selectSeria) {
        const item = state.selectSeria;
        optionsMap.clear();
        dataOptions.value = [];
        if (item.OPTIONS.length > 0) {
          dataOptions.value = item.OPTIONS.map((opt) => ({
            ...opt,
            _base_price: parseInt(opt.UF_CELLAR_OPTION_PRICE) || 0,
          }));
          dataOptions.value.forEach((option) => {
            option.price = 0;
            optionsMap.set(option.ID, option);
            if (option.UF_CELLAR_OPTION_PRICE_BASE == 1) {
              selectedOptions.value.push(option);
            }
          });
        }
      }
      state.price.base_price = 0;
      selectedOptions.value = [];
      state.selectSeria.SIZES.forEach((size) => {
        if (size.UF_CELLAR_SIZE == selectsize) {
          setSizes(state.selectSeria.SIZES, size.UF_CELLAR_SIZE_BASE_PRICE);
          state.selectSeriaSize = size;
          if (state.selectSeriaSize.UF_CELLAR_SIZE_OPTION_PRICE && state.selectSeriaSize.UF_CELLAR_SIZE_OPTION_PRICE.length > 0) {
            state.selectSeriaSize.UF_CELLAR_SIZE_OPTION_PRICE.forEach((optionPrice) => {
              const option = optionsMap.get(optionPrice.id);
              if (option) {
                option.dopinfo = [];
                optionPrice.dopdata.forEach((dop) => {
                  option.dopinfo.push({
                    id: dop.id,
                    file1: dop.file1,
                    file2: dop.file2,
                    file3: dop.file3,
                    zindex: dop.sub_zindex,
                  });
                });
                option.price = parseInt(optionPrice.price);
                option.standart_image = optionPrice.file1;
                option.nadstavka_image = optionPrice.file2;
                option.zindex = optionPrice.zindex;
                if (option.UF_CELLAR_OPTION_PRICE_BASE == 1) {
                  selectedOptions.value.push(option);
                }
              }
            });
          }
        }
      });
    };
    const setSelectSeria = (seria) => {
      let dataArray = Object.values(data.value);

      selectedOptions.value = [];
      dataArray.forEach((item) => {
        if (item.ID == seria) {
          state.selectSeria = item;
          window.dispatchEvent(
            new CustomEvent("vue-seria-change", {
              detail: {
                title: state.selectSeria.NAME,
                sizes: state.selectSeria.SIZES,
              },
            })
          );
          if (state.selectSeria.SIZES && state.selectSeria.SIZES.length > 0) {
            const defaultSelectedSize = state.selectSeria.SIZES.find((elem) => elem.UF_CELLAR_SIZE == "M");
            setSelectSeriaSize(defaultSelectedSize.UF_CELLAR_SIZE);
            setSizes(state.selectSeria.SIZES, defaultSelectedSize.UF_CELLAR_SIZE_BASE_PRICE);
          }
        }
      });
    };

    function validateEmail(email) {
      const re = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
      return re.test(email);
    }

    function validate() {
      let valid = [];
      if (state.userData.name.length < 1) {
        state.userDataErrors.name = "Введите имя";
        valid.push(false);
      } else {
        state.userDataErrors.name = false;
      }
      if (state.userData.phone.length < 18) {
        state.userDataErrors.phone = "Введите телефон";
        valid.push(false);
      } else {
        state.userDataErrors.phone = false;
      }

      if (state.userData.email.length < 4 || !validateEmail(state.userData.email)) {
        state.userDataErrors.email = "Введите корректный Email";
        valid.push(false);
      } else {
        state.userDataErrors.email = false;
      }

      if (valid.includes(false)) {
        return false;
      }
      return true;
    }
    async function createPdf() {
      if (!validate()) {
        return;
      }
      let cellarCharacters = {
        gabarite: state.selectSeriaSize.UF_CELLAR_GABARITE,
        gabarite_door: state.selectSeriaSize.UF_CELLAR_GABARITE_DOOR,
        cellar_wall_size: state.selectSeriaSize.UF_CELLAR_WIDTH_WALL,
        wieght: state.selectSeriaSize.UF_CELLAR_WEIGHT,
        germ: state.selectSeriaSize.UF_CELLAR_GERM,
        time: state.selectSeriaSize.UF_CELLAR_USE_TIME,
        material: state.selectSeriaSize.UF_CELLAR_MATERIAL,
      };
      const allOptionForPdf = await Promise.all(
        dataOptions.value
          .filter((item) => item.UF_CELLAR_OPTION_PRICE_BASE != "1" && item.UF_CELLAR_OPTION_HIDDEN != "1" && item.price != 0)
          .map(async (item) => {
            const selected = selectedOptions.value.findIndex((opt) => opt.ID == item.ID) !== -1;
            let setImage = item.UF_CELLAR_OPTION_IMAGE;
            if (item.otherImage && item.otherImage.length > 0) {
              setImage = item.otherImage;
            }
            return {
              name: item.UF_CELLAR_OPTION_NAME,
              img: encodeURI(hostImageUrl + setImage),
              characters: item.UF_OPTION_CHARACTERS,
              price: item.price,
              select: selected,
            };
          })
      );
      if (!state.sendDataButton) {
        state.sendDataButton = true;
        const pdf = await makePdf(
          hostImageUrl + state.selectSeriaSize.UF_CELLAR_SIZE_IMAGE_BASE,
          cellarCharacters,
          allOptionForPdf,
          state.currentSizePrice,
          dop_price.value,
          state.selectSeriaSize.UF_CELLAR_SIZE,
          state.selectSeria.NAME,
          state.userData
        );
        if (pdf === true) {
          state.modalClass = "";
          state.sendDataButton = false;
          window.location.href = "/thanks";
        } else {
          alert("Произошла ошибка");
        }
      }
    }

    function formatNumber(value) {
      if (typeof value !== "number") {
        value = parseFloat(value);
      }
      return value.toLocaleString("ru-RU");
    }


    Vue.watch(
      () => data.value,
      (newData) => {
        const valuesArr = Object.values(newData);
        const urlParams = new URLSearchParams(window.location.search);
        const seria = urlParams.get("cellarModel");
        if (seria) {
          selectDefaultSeria.value = seria;
        }
        if (valuesArr && valuesArr.length > 0) {
          setSelectSeria(valuesArr.find((item) => selectDefaultSeria.value.toLowerCase() == item.NAME.toLowerCase())?.ID);
        }
      }
    );

    Vue.watch(
      selectedOptions,
      (iterOption) => {
        state.nadstavka = iterOption.some((opt) => opt.UF_CELLAR_OPTION_NEWIMAGE == "1");
      },
      { deep: true }
    );

    return {
      data,
      state,
      setSelectSeria,
      setSelectSeriaSize,
      hostImageUrl,
      endPrice,
      formatNumber,
      dop_price,
      selectedOptions,
      dataOptions,
      getCurrenImageOption,
      selectOption,
      createPdf,
      getPriceBySize,
    };
  },
  mounted() {
    $('#phone').mask('+7 (000) 000-00-00');
  },
  template: `
    <template v-if="data == false || data == null || state.selectSeria == null">
    <svg class="preload_tinger" xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.0" width="40px" height="40px" viewBox="0 0 128 128" xml:space="preserve"><g><path d="M38.52 33.37L21.36 16.2A63.6 63.6 0 0 1 59.5.16v24.3a39.5 39.5 0 0 0-20.98 8.92z" fill="#004182"/><path d="M38.52 33.37L21.36 16.2A63.6 63.6 0 0 1 59.5.16v24.3a39.5 39.5 0 0 0-20.98 8.92z" fill="#c0d0e0" transform="rotate(45 64 64)"/><path d="M38.52 33.37L21.36 16.2A63.6 63.6 0 0 1 59.5.16v24.3a39.5 39.5 0 0 0-20.98 8.92z" fill="#c0d0e0" transform="rotate(90 64 64)"/><path d="M38.52 33.37L21.36 16.2A63.6 63.6 0 0 1 59.5.16v24.3a39.5 39.5 0 0 0-20.98 8.92z" fill="#c0d0e0" transform="rotate(135 64 64)"/><path d="M38.52 33.37L21.36 16.2A63.6 63.6 0 0 1 59.5.16v24.3a39.5 39.5 0 0 0-20.98 8.92z" fill="#c0d0e0" transform="rotate(180 64 64)"/><path d="M38.52 33.37L21.36 16.2A63.6 63.6 0 0 1 59.5.16v24.3a39.5 39.5 0 0 0-20.98 8.92z" fill="#c0d0e0" transform="rotate(225 64 64)"/><path d="M38.52 33.37L21.36 16.2A63.6 63.6 0 0 1 59.5.16v24.3a39.5 39.5 0 0 0-20.98 8.92z" fill="#c0d0e0" transform="rotate(270 64 64)"/><path d="M38.52 33.37L21.36 16.2A63.6 63.6 0 0 1 59.5.16v24.3a39.5 39.5 0 0 0-20.98 8.92z" fill="#c0d0e0" transform="rotate(315 64 64)"/><animateTransform attributeName="transform" type="rotate" values="0 64 64;45 64 64;90 64 64;135 64 64;180 64 64;225 64 64;270 64 64;315 64 64" calcMode="discrete" dur="800ms" repeatCount="indefinite"></animateTransform></g></svg>
    </template>
    <template v-if="data !== false && data !== null && state.selectSeria != null">
        <div class="container">
            <h2 class="page__section-title page__section-title_text-align_center cellar-video__title">Собери свой погреб</h2>
        </div>
        <div class="conf">
            <div class="conf__choose">
                <div class="conf__subtitle conf__subtitle_type_series">Выберите серию</div>
                <div class="conf__tabs conf__tabs_type_series">
                    <ul class="conf__tabs-list">
                        <template v-for='series in data' :key="series.ID">
                            <li v-if="state.selectSeria.ID == series.ID" class="conf__tabs-list-item conf__tabs-list-item_active">{{ series.NAME }}</li>
                            <li v-else @click="setSelectSeria(series.ID)" class="conf__tabs-list-item">{{ series.NAME }}</li>
                        </template>
                        
                    </ul>
                </div>
                <div class="conf__img-container">
                    <template v-if="state.selectSeria !== null && state.selectSeriaSize !== null">
                        <div class="conf__tabs conf__tabs_type_size desktoponly">
                            <div class="conf__subtitle conf__subtitle_type_size">Выберите размер:</div>
                            <ul class="conf__tabs-list">
                                <template  v-for="size in state.selectSeria.SIZES" :key="size.ID" >
                                    <li v-if="state.selectSeriaSize.UF_CELLAR_SIZE == size.UF_CELLAR_SIZE" class="conf__tabs-list-item conf__tabs-list-item_active">
                                    {{ size.UF_CELLAR_SIZE }}
                                    </li>
                                    <li  v-else @click="setSelectSeriaSize(size.UF_CELLAR_SIZE)" class="conf__tabs-list-item">
                                        {{ size.UF_CELLAR_SIZE }}
                                        <span v-if="(price = getPriceBySize(size.UF_CELLAR_SIZE)) !== undefined">
                                        (
                                        <span v-if="price > 0">+{{ formatNumber(price) }}</span>
                                        <span v-else>{{ formatNumber(price) }}</span>
                                        р )
                                        </span>
                                    </li>
                                </template>
                            </ul>
                        </div>
                    </template>
                    <img class="conf__img" style="visibility:hidden;" :src="hostImageUrl + '/local/templates/t.tingard.ru/img/conf-layer.webp'" alt="TINGARD 1900">
                    <template v-for="option in selectedOptions">
                        <img v-if="option.dopfile1 || option.dopfile2" class="conf__img dop_image ddddd" :src="hostImageUrl+option[getCurrenImageOption(true)]" :style="{zIndex:option.dopzindex}" alt="TINGARD">
                        <img v-else-if="!(option.dopfile1 || option.dopfile2) && option[getCurrenImageOption()]" class="conf__img dop_image" :src="hostImageUrl+option[getCurrenImageOption()]" :style="{zIndex:option.zindex}" alt="TINGARD">
                    </template>
                </div>
                 <template v-if="state.selectSeria !== null && state.selectSeriaSize !== null">
                    <div class="conf__subtitle conf__subtitle_type_size mobileonly">Выберите размер серии: <span class="conf__subtitle_accent">{{state.selectSeria.NAME}}</span></div>
                    <div class="conf__tabs conf__tabs_type_size mobileonly">
                        <ul class="conf__tabs-list">
                            <template  v-for="size in state.selectSeria.SIZES" :key="size.ID" >
                                <li v-if="state.selectSeriaSize.UF_CELLAR_SIZE == size.UF_CELLAR_SIZE" class="conf__tabs-list-item conf__tabs-list-item_active">
                                {{ size.UF_CELLAR_SIZE }}
                                </li>
                                <li  v-else @click="setSelectSeriaSize(size.UF_CELLAR_SIZE)" class="conf__tabs-list-item">
                                    {{ size.UF_CELLAR_SIZE }}
                                    <span v-if="(price = getPriceBySize(size.UF_CELLAR_SIZE)) !== undefined">
                                    (
                                    <span v-if="price > 0">+{{ formatNumber(price) }}</span>
                                    <span v-else>{{ formatNumber(price) }}</span>
                                    р )
                                    </span>
                                </li>
                            </template>
                        </ul>
                    </div>
                </template>
               
            </div>
            <div class="conf__calc" v-if="state.selectSeria !== null && state.selectSeriaSize !== null">
                <div class="conf__subtitle conf__subtitle_accent conf__subtitle_type_model">{{state.selectSeria.NAME}} {{state.selectSeriaSize.UF_CELLAR_SIZE}}</div>
                <div class="conf__options" v-if="state.selectSeria.OPTIONS != null">
                    <template v-for="option in dataOptions" :key="option.ID">
                        <label v-if="option.price != 0 && option.UF_CELLAR_OPTION_HIDDEN != '1'" :for="option.ID+state.selectSeria.NAME" class="conf__options-item" :class="[option.UF_CELLAR_OPTION_HIDDEN == '1' ? 'hideoption' : '']">
                            <input v-if="option.UF_CELLAR_OPTION_PRICE_BASE == 1" v-model="selectedOptions" :value='option' checked disabled class="checkbox__input" type="checkbox">
                            <input  v-else type="checkbox" v-model='selectedOptions' :value='option' :disabled="option.disabled" @change="selectOption(option, $event)" :id="option.ID+state.selectSeria.NAME" class="checkbox__input" >
                            <span class="checkbox__container">
                                <span class="checkbox__img-container">
                                    <img v-if="option.otherImage" class="checkbox__img" :src="hostImageUrl + option.otherImage" :alt="option.UF_CELLAR_OPTION_NAME">
                                    <img v-else-if="option.UF_CELLAR_OPTION_IMAGE != null" class="checkbox__img" :src="hostImageUrl + option.UF_CELLAR_OPTION_IMAGE" :alt="option.UF_CELLAR_OPTION_NAME">
                                </span>
                                <span class="checkbox"></span>
                                <span class="checkbox__text"><span class="checkbox__text-name">{{ option.UF_CELLAR_OPTION_NAME }}</span><span class="checkbox__text-clarification">{{ option.UF_CELLAR_OPTION_DESC }}</span>
                                <a class="conf__video-btn"  v-if="option.UF_CELLAR_OPTION_VIDEO" :href="option.UF_CELLAR_OPTION_VIDEO" data-fancybox="" data-type="iframe" data-ratio="16/9">Видеообзор</a>
                                </span>
                                <span class="checkbox__price">{{formatNumber(option.price)}} руб.</span>
                            </span>
                        </label>
                    </template>
                    
                    
                </div>
                <div class="conf__final-price">
                    <div class="conf__subtitle conf__subtitle_type_final-price">Базовая цена погреба: {{formatNumber(parseInt(state.price.base_price))}} руб.</div>
                    <div class="conf__subtitle conf__subtitle_type_final-price-option">Дополнительное оборудование: <span>{{formatNumber(dop_price)}} руб.</span></div>
                </div>
                <div class="conf__btn-container">
                    <button class="conf__btn btn btn_color_yellow" type="button"  @click="state.modalClass = 'modal_active'">Сохранить и отправить комплектацию на e-mail</button>
                </div>
            </div>
        
        </div>
        <div id="modal-container">
            <div :class="'modal '+state.modalClass" data-entity="modal" data-modal-type="default">
                <div class="modal__body">
                    <button class="modal__close" @click="state.modalClass = ''" type="button" data-entity="modal-close">Закрыть</button>
                    <div class="modal__title section-title" data-entity="modal-title">Оставьте заявку и в ближайшее время мы с вами свяжемся</div>
                    <form class="modal__form" data-entity="form">
                        <input type="hidden" name="crm-entity" value="lead">
                        <input type="hidden" name="crm-title" value="Сохранить и отправить комплектацию на email">
                        <label class="form-label">
                            <span class="form-input-name">Имя: *</span>
                            <input :class="{'form-input': true, 'error': state.userDataErrors.name}" type="text" name="name" v-model="state.userData.name" :placeholder="state.userDataErrors.name || ''" required="">
                        </label>
                        <label class="form-label">
                            <span class="form-input-name">Телефон: *</span>
                            <input id="phone" :class="{'form-input': true, 'error': state.userDataErrors.phone}" type="tel" name="phone" v-model="state.userData.phone"   required="">
                        </label>
                             <label class="form-label">
                            <span class="form-input-name">Email: *</span>
                            <input :class="{'form-input': true, 'error': state.userDataErrors.email}" type="email" name="email" v-model="state.userData.email" :placeholder="state.userDataErrors.email || ''" required="">
                        </label>
                        <label class="form-policy">
                            <input class="checkbox__input" type="checkbox" name="policy" required="" value="">
                            <span class="checkbox__container">
                                <span class="checkbox"></span>
                                <span class="checkbox__text">Я даю <a href="/agreement-policy/">Согласие на обработку персональных данных</a> в соответствии с <a href="/privacy-policy/">Политикой обработки персональных данных</a></span>
                            </span>
                        </label>
                        <button class="btn btn_color_yellow" type="button" @click="createPdf();">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
    </template>
    `,
})

app.mount("#configurator");
