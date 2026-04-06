/* preloader (configurator) */
document.addEventListener("DOMContentLoaded", () => {
  const confPreloader = document.querySelector(".conf-preloader");
  setTimeout(() => {
    confPreloader.classList.add("conf-preloader_slow");
  }, "7000");
  window.onload = function () {
    confPreloader.classList.remove("conf-preloader_active");
  };
});

const firstPage = 'section[data-page="first-page"]';
const facilities = 'section[data-page="facilities"]';
const conditions = 'section[data-page="conditions"]';
const equipment = 'section[data-page="equipment"]';
let colorPriceData = 0;
let packageDiscount = 0;
queueSnaps = [];
// Слайдер модели в конфигураторе (вид спереди, вид сзади)
const swiperConf = new Swiper(".conf-widget__swiper", {
  navigation: {
    nextEl: ".conf-widget__arrows-next",
    prevEl: ".conf-widget__arrows-prev",
    disabledClass: "arrows--disabled",
  },
  slidesPerView: 1,
  simulateTouch: true,
  effect: "fade",
});

var get_model_name_select = "";

/**
 * Снятие активности пакета
 * @param {string} code
 */
function disablingPackages(code) {
  const packs = $(conditions + "[data-simbol-code=" + code + "] .conf-widget__package");
  const modules = $(conditions + "[data-simbol-code=" + code + "] .conf-widget__options-item");

  for (let i = 0; i < packs.length; i++) {
    if ($(packs[i]).find(".conf-widget__package-input").is(":checked")) {
      $(packs[i]).click();
      $(packs[i]).find(".conf-widget__package-input").prop("checked", false);
    }
  }
  for (let i = 0; i < modules.length; i++) {
    if ($(modules[i]).attr("data-default") != "default" && $(modules[i]).attr("data-sim-code") != "color") {
      $(modules[i]).find(".checkbox__input").prop("disabled", false);
    }
  }
}

/**
 * Снятие активности модификации
 * @param {object} modElement
 */
function uncheckedMod(modElement, getBlockID = "", getModelID = "") {
  const blockID = getBlockID;
  const modelID = getModelID;
  const modName = modElement.closest(".conf-widget__options-item").attr("data-mods-name");
  const packName = modElement.closest(".conf-widget__options-item").attr("data-pack-active");
  const checkboxMods = $('[data-page="' + blockID + '"][data-simbol-code="' + modelID + '"] .conf-widget__options-item[data-mods-name="' + modName + '"] .checkbox__input');
  const disableId = modElement.attr("data-disable-mod");
  const moddis = $('.conf-widget__options-item .checkbox__input[data-id="' + disableId + '"]');

  if (disableId.length > 0) {
    if (modElement.is(":checked")) {
      if (moddis && $(moddis).prop("checked")) {
        $(moddis).click();
      }
      checkboxMods.each(function () {
        if ($(this).hasClass(disableId) && $(this).closest(".conf-widget__options-item").attr("data-pack-active") === undefined) {
          if ($(this).is(":checked")) {
            $(this).attr("data-was-on", "Y");
            if ($(this).is(":disabled")) {
              $(this).prop("disabled", false);
              $(this).click();
              $(this).prop("disabled", true);
            }
            $(this).click();
          }
          $(this).prop("checked", false);
        }
      });
      return true;
    } else {
      checkboxMods.each(function () {
        if ($(this).hasClass(disableId) && $(this).attr("data-was-on") == "Y" && $(this).closest(".conf-widget__options-item").attr("data-mods-name") === modName) {
          $(this).attr("data-was-on", "");
          if ($(this).is(":disabled")) {
            $(this).prop("disabled", false);
            $(this).click();
            $(this).prop("disabled", true);
            return true;
          }
          $(this).click();
          return true;
        }
      });
    }
  } else {
    return false;
  }
}

function disableImagesUnsuitableModules(modID) {
  const moduleImg = $(conditions + '[data-simbol-code="' + modID + '"] .conf-layers__img');
  const modelName = $(conditions + '[data-simbol-code="' + modID + '"]').attr("data-mods-name");

  moduleImg.each((index, el) => {
    moduleId = $(el).attr("data-id-modul");
    if ($(conditions + '[data-simbol-code="' + modID + '"] .conf-widget__options-item[data-id-modul="' + moduleId + '"]').attr("data-mods-name") !== modelName && $(el).attr("data-name") !== "color") {
      $(el).css({ opacity: 0 });
    }
  });
}

$(window).load(function () {
  let code_product = "";

  let params = new URLSearchParams(document.location.search);
  let value = params.get("model");
  if (value && value.length > 0) {
    next_two(value);
  }
  // функция для перехода на вторую страницу по коду
  function next_two(get_code) {
    code_product = get_code;

    let selected_mod = $(equipment + '[data-simbol-code="' + get_code + '"] .conf-modification__choice .conf-modification__choice-item .select[name="modification"]')
      .find("option:selected")
      .attr("data-mods-name");
    let selected_mod_price = $(equipment + '[data-simbol-code="' + get_code + '"] .conf-modification__choice .conf-modification__choice-item .select[name="modification"]')
      .find("option:selected")
      .val();

    if (get_code != undefined) {
      $(conditions + '[data-simbol-code="' + get_code + '"]').attr("data-mods-name", selected_mod);
      if ($(equipment + '[data-simbol-code="' + get_code + '"] .conf-modification.margin_b_m .conf-modification__visual .conf-modification__layers.conf-layers img').length > 2) {
        $(equipment + " .conf-modification.margin_b_m .conf-modification__visual .conf-modification__layers.conf-layers .conf-layers__img").css("display", "none");
        $(
          equipment +
            '[data-simbol-code="' +
            get_code +
            '"] .conf-modification.margin_b_m .conf-modification__visual .conf-modification__layers.conf-layers .conf-layers__img[data-mods-name="' +
            $('[data-page="equipment"][data-simbol-code="' + get_code + '"] .conf-modification__choice-item .select[name="modification"] option:selected').text() +
            '"]'
        ).css("display", "block");
        $(equipment + '[data-simbol-code="' + get_code + '"] .conf-modification__chars .table.margin_b_s .table__row[data-type="mods"]').css("display", "none");
        $(
          equipment +
            '[data-simbol-code="' +
            get_code +
            '"] .conf-modification__chars .table.margin_b_s .table__row[data-type="mods"][data-mods-name="' +
            $('[data-page="equipment"][data-simbol-code="' + get_code + '"] .conf-modification__choice-item .select[name="modification"] option:selected').text() +
            '"]'
        ).css("display", "table-row");
      } else {
        $(equipment + '[data-simbol-code="' + get_code + '"] .conf-modification.margin_b_m .conf-modification__visual .conf-modification__layers.conf-layers .conf-layers__img').css(
          "display",
          "block"
        );
        $(equipment + '[data-simbol-code="' + get_code + '"] .conf-modification__chars .table.margin_b_s .table__row[data-type="mods"]').css("display", "table-row");
      }

      $(firstPage + "").css("display", "none");
      $(equipment + '[data-simbol-code="' + get_code + '"]').css("display", "block");

      $(equipment + '[data-simbol-code="' + get_code + '"] .conf-total').text("Базовая цена модели: " + Number(selected_mod_price).toLocaleString("ru-RU") + " руб.");
      base_price = Number(selected_mod_price);
    } else {
      alert("Выберите модель");
    }
  }

  /**
   * Переход на вторую страницу
   */
  $("button#continue-btn-2").click(function () {
    let get_code = $(".conf-models__item .radio__input:checked").attr("data-code-production");
    next_two(get_code);
  });
  function sendHeight(block) {
    const height = $(block).height(); // Получаем высоту страницы
    window.parent.postMessage(height, "*"); // Отправляем родителю
  }

  if ($("#selectModel").length > 0) {
    $(".conf-nav").remove();
    let code = $("#selectModel").val();
    next_two(code);
    let name = $(`section[data-simbol-code="${code}"]`).find(".conditions__short-name").text();
    $(".btn__group--configurator").html(`
            
        `);
  }
  if ($("#selectModify").length > 0) {
    // Значение из другого select (ты его используешь как источник)
    const modsName = $("#selectModify").val();

    // Находим нужный <option> по data-mods-name
    const $targetOption = $(`.select[name="modification"] option`).filter(function () {
      return $(this).data("mods-name") === modsName;
    });

    if ($targetOption.length) {
      const valueToSelect = $targetOption.val();

      // Устанавливаем значение у select
      const $select = $(`.select[name="modification"]`);
      $select.val(valueToSelect);
      setTimeout(() => {
        $('.select[name="modification"]').trigger("change");
        if ($(`section[data-page="conditions"][data-simbol-code="${$("#selectModel").val()}"]`).css("display") == "block") {
          sendHeight($(`section[data-page="conditions"][data-simbol-code="${$("#selectModel").val()}"]`));
        } else {
          sendHeight($(`section[data-simbol-code="${$("#selectModel").val()}"]`));
        }
      }, 0);
    } else {
      console.warn("Не найден <option> с data-mods-name =", modsName);
    }
  }
  $(window).on("click", function () {
    if ($(`section[data-page="conditions"][data-simbol-code="${$("#selectModel").val()}"]`).css("display") == "block") {
      sendHeight($(`section[data-page="conditions"][data-simbol-code="${$("#selectModel").val()}"]`));
    } else {
      sendHeight($(`section[data-simbol-code="${$("#selectModel").val()}"]`));
    }
  });

  if (localStorage.getItem("conf_name")) {
    $(firstPage + ' .conf-models .model-card label[data-code-production="' + localStorage.getItem("conf_name") + '"]').click();
    $("button#continue-btn-2").click();
    localStorage.removeItem("conf_name");
  }

  $(conditions + '[data-simbol-code="' + code_product + '"] .conf-widget__color-list .conf-widget__color-item')
    .first()
    .click();
  $(conditions + '[data-simbol-code="' + code_product + '"] .conf-widget__color-list .conf-widget__color-item')
    .first()
    .change();

  /**
   * Склеивание изображений
   */
  async function gluePictures() {
    let el = $(conditions + '[data-simbol-code="' + code_product + '"] div[data-side-img="layer-front"] img.conf-layers__img');
    let el_arr = [];

    // Собираем элементы и их z-index
    el.each(function () {
      if ($(this).css("opacity") != 0 && $(this).is(":visible")) {
        // Получаем z-index элемента (по умолчанию 0, если не установлен)
        const zIndex = parseInt($(this).css("z-index")) || 0;
        el_arr.push({
          element: this,
          zIndex: zIndex,
        });
      }
    });

    // Сортируем элементы по z-index (от меньшего к большему)
    el_arr.sort((a, b) => a.zIndex - b.zIndex);

    const glue = async (images) => {
      if (images.length === 0) return null;

      const width = images[0].element.naturalWidth;
      const height = images[0].element.naturalHeight;

      const $canvas = $("#conf-img");
      $canvas.attr("width", width);
      $canvas.attr("height", height);

      const ctx = $canvas[0].getContext("2d");

      // Очищаем canvas перед отрисовкой
      ctx.clearRect(0, 0, width, height);

      // Рисуем изображения в порядке z-index
      for (let i = 0; i < images.length; i++) {
        const src = $(images[i].element).attr("src");
        const image = new Image(width, height);
        image.src = src;

        await new Promise((resolve) => {
          image.onload = () => {
            ctx.drawImage(image, 0, 0, width, height, 0, 0, width, height);
            resolve(image);
          };
          image.onerror = resolve; // На случай ошибки загрузки изображения
        });
      }

      return $canvas[0].toDataURL("image/png");
    };

    const result = await glue(el_arr);
    $(facilities + " #code-canvas").text(result);
  }

  /**
   * Работа с модификациями
   */
  $('.conf-modification__choice .conf-modification__choice-item .select[name="modification"]').change(function () {
    let get_code = $(this).attr("data-simbol-code");
    let selected_mod = $(this).find("option:selected").text();
    let standart_price = $(equipment + '[data-simbol-code="' + get_code + '"] .conf-total').attr("data-total-price");
    let model_price = $(this).val();
    base_price = Number(model_price);
    let total_price = 0;
    get_model_name_select = $(this).attr("data-mods-name");

    $(conditions + "[data-simbol-code=" + get_code + "] .total-price-m").attr("data-modification-price", model_price);
    $(conditions + "[data-simbol-code=" + get_code + "]").attr("data-mods-name", selected_mod);

    $(equipment + '[data-simbol-code="' + get_code + '"] .conf-modification.margin_b_m .conf-modification__visual .conf-modification__layers.conf-layers .conf-layers__img').css("display", "none");
    $(
      equipment +
        '[data-simbol-code="' +
        get_code +
        '"] .conf-modification.margin_b_m .conf-modification__visual .conf-modification__layers.conf-layers .conf-layers__img[data-mods-name="' +
        selected_mod +
        '"]'
    ).css("display", "block");

    $(equipment + '[data-simbol-code="' + get_code + '"] .conf-modification__chars .table.margin_b_s .table__row[data-type="mods"]').css("display", "none");
    $(equipment + '[data-simbol-code="' + get_code + '"] .conf-modification__chars .table.margin_b_s .table__row[data-type="mods"][data-mods-name="' + selected_mod + '"]').css("display", "table-row");

    total_price = Number(model_price);

    $(equipment + '[data-simbol-code="' + get_code + '"] .conf-total').text("Базовая цена модели: " + Number(total_price).toLocaleString("ru-RU") + " руб.");
  });

  /**
   * Переход со второй на первую
   */
  $('[data-btn-specification="back-btn-1"]').click(function () {
    if (getAllUrlParams().id !== undefined) {
      window.location.href = "/configurator/";
    } else {
      $(equipment + "").css("display", "none");
      $(firstPage + "").css("display", "block");
    }
  });

  /**
   * Переход на третью страницу
   */

  function next_tree(get_code) {
    $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__total .conf-numbers.conf-numbers_place_conf-widget .section-subtitle').attr("data-total-price", 0);

    let selected_mod = $('[data-page="equipment"][data-simbol-code="' + get_code + '"] .conf-modification__choice-item .select[name="modification"] option:selected').attr("data-mods-name"),
      price_mod = $('[data-page="equipment"][data-simbol-code="' + get_code + '"] .conf-modification__choice-item .select[name="modification"] option:selected').val(),
      dop_price = Number(price_mod),
      total_price_mods =
        Number($(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__total .conf-numbers.conf-numbers_place_conf-widget .section-subtitle').attr("data-total-price")) + dop_price,
      mod_name = $(conditions + '[data-simbol-code="' + get_code + '"]').attr("data-mods-name");
    $(conditions + '[data-simbol-code="' + get_code + '"]').attr("data-mods-price", dop_price);
    $(conditions + '[data-simbol-code="' + get_code + '"]').attr("data-mods-name", selected_mod);
    $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__visual.margin_b_s .conf-widget__options .conf-widget__options-item').css("display", "none");
    $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__visual.margin_b_s .conf-widget__options .conf-widget__options-item').each(function () {
      if ($(this).attr("data-mods-name") == mod_name) {
        $(this).css("display", "block");
      }
    });

    $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__total .conf-numbers.conf-numbers_place_conf-widget .section-subtitle').attr("data-total-price", total_price_mods);
    if (dop_price != 0) {
      $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__total .conf-numbers.conf-numbers_place_conf-widget .section-subtitle').text(
        "Итого: " + Number(total_price_mods).toLocaleString("ru-RU") + " руб."
      );
    }

    if ($(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__color-list .conf-widget__color-item').length <= 0) {
      $(conditions + '[data-simbol-code="' + get_code + '"] .conf-layers img[data-name="color"]').css("display", "none");
      $(conditions + '[data-simbol-code="' + get_code + '"] .conf-layers img[data-name="color"][data-color-body="' + selected_mod + '"]').css("display", "block");
    }

    $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__color-list .conf-widget__color-item')
      .first()
      .click();
    $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__color-list .conf-widget__color-item')
      .first()
      .find("input")
      .change();

    $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__packages-container .conf-widget__packages .conf-widget__package').css("display", "none");
    $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__packages-container .conf-widget__packages .conf-widget__package[data-modul-name="' + selected_mod + '"]').css(
      "display",
      "block"
    );
    $(equipment + "").css("display", "none");
    console.log($(conditions + '[data-simbol-code="' + get_code + '"]'));
    $(conditions + '[data-simbol-code="' + get_code + '"]').css("display", "block");
  }
  $('[data-btn-specification="continue-btn-3"]').click(function () {
    let get_code = $(this).attr("data-simbol-code");
    next_tree(get_code);
  });

  /**
   * Переход обратно на вторую
   */
  $('button[data-btn-specification="back-btn-2"]').click(function () {
    let get_code = $(this).attr("data-simbol-code");
    window.location.href = "https://tinger.ru/configurator/?model=" + get_code;
    /* disablingPackages(get_code);
    $(conditions + "").css("display", "none");
    $(equipment + '[data-simbol-code="' + get_code + '"]').css("display", "block");
    $(conditions + ' .conf-widget__options-item[data-default!="default"] .checkbox__input').prop("checked", false);
    $(conditions + " .conf-widget__options-item .checkbox__input").change();
    $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__total .conf-numbers.conf-numbers_place_conf-widget .section-subtitle').attr("data-total-price", 0);
  
*/
  });

  /**
   * Переход на четвертую страницу
   * Перенос выбранных данных конфигурации
   */
  $('button[data-btn-specification="continue-btn-4"]').click(function () {
    let get_code = $(this).attr("data-simbol-code"),
      get_total_price = $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__total .section-subtitle')
        .text()
        .replace(/\D+/g, ""),
      get_modul_price = $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__total .conf-numbers__price')
        .text()
        .replace(/\D+/g, ""),
      get_base_price = base_price + dop_base_price + colorpriced;
    (get_pack_price = $(
      conditions + '[data-simbol-code="' + get_code + '"] .conf-widget.margin_b_m .conf-widget__packages-container .conf-widget__packages.margin_b_s .conf-widget__package-input:checked'
    ).attr("data-price-advantage")),
      (get_moduls = []),
      (get_characters = $(equipment + '[data-simbol-code="' + get_code + '"] .conf-modification.margin_b_m .conf-modification__chars .table.margin_b_s tbody').html()),
      (get_short_name = $(conditions + '[data-simbol-code="' + get_code + '"] .conditions__short-name').text()),
      (get_active_pack = ""),
      (get_active_color = ""),
      (glue_img = gluePictures());
    let get_modification = $(equipment + '[data-simbol-code="' + get_code + '"] select[name="modification"] option:selected').attr("data-mods-name");

    $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__packages-container .conf-widget__packages .conf-widget__package').each(function () {
      if ($(this).find("input").is(":checked")) {
        get_active_pack = $(this).find(".conf-widget__package-name").text();
      }
    });

    $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__color-list .conf-widget__color-item').each(function () {
      if ($(this).find("input").is(":checked")) {
        get_active_color = $(this).find("input").val();
      }
    });

    $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__options-item').each(function () {
      if ($(this).find(".checkbox__input").is(":checked") && $(this).is(":visible")) {
        get_moduls.push('<li class="conf-total__list-item">' + $(this).find(".checkbox__text>span:first-child").text() + "</li>");
      }
    });

    if (get_pack_price == undefined || get_pack_price == "" || get_pack_price == null) {
      get_pack_price = 0;
    }

    $(facilities + " #facilities__modules .conf-total__list").html(get_moduls);

    $(facilities + " #facilities__characteristics tbody").html(get_characters);
    /* Если количество модификаций больше одной добавляем имя модификации */
    if ($('.conf-modification__choice .conf-modification__choice-item .select[name="modification"][data-simbol-code="' + get_code + '"] option').length > 1) {
      let text = (get_short_name + " " + $(conditions + "[data-simbol-code=" + get_code + "]").attr("data-mods-name")).replace("TF4", "");
      $(facilities + " #facilities__header-name").text(text);
      $(facilities + " #facilities__header-name").attr("modif-name", $(conditions + "[data-simbol-code=" + get_code + "]").attr("data-mods-name"));
    } else {
      $(facilities + " #facilities__header-name").text(get_short_name);
      $(facilities + " #facilities__header-name").attr("modif-name", $(conditions + "[data-simbol-code=" + get_code + "]").attr("data-mods-name"));
    }

    $(facilities + " #active-pack").text(get_active_pack);

    $(facilities + " #active-color").text(get_active_color);

    $(facilities + " #active-modification").text(get_modification);

    $(facilities + '[data-simbol-code="end_block"] .conf-layers canvas#conf-img').html(glue_img);
    $(facilities + '[data-simbol-code="end_block"] .conf-layers').html($(conditions + '[data-simbol-code="' + get_code + '"] div[data-side-img="layer-front"]').html());

    $(facilities + '[data-simbol-code="end_block"] .conf-numbers #base-price-end span').text(Number(get_base_price).toLocaleString("ru-RU"));
    $(facilities + '[data-simbol-code="end_block"] .conf-numbers #profit-price-end span').text(Number(get_pack_price).toLocaleString("ru-RU"));
    $(facilities + '[data-simbol-code="end_block"] .conf-numbers #modul-price-end span').text(Number(get_modul_price).toLocaleString("ru-RU"));
    $(facilities + '[data-simbol-code="end_block"] .conf-numbers #total-price-end span').text(Number(get_total_price).toLocaleString("ru-RU"));

    $(conditions + "").css("display", "none");
    $(facilities + '[data-simbol-code="end_block"]').css("display", "block");

    $(facilities + " li.conf-nav__item_status_success").each(function () {
      if ($(this).attr("data-block-id") != "first-page") {
        $(this).attr("data-model-name", get_code);
      }
    });

    $(facilities + " #code-canvas").text(glue_img);
  });

  /**
   * Смена цвета
   */

  flag_was_be_up_price = false;
  $(".radio__input").change(function () {
    let get_code = $(this).attr("data-simbol-code");
    let get_mod_name = $(this)
      .closest(conditions + "")
      .attr("data-mods-name");
    let real_mod_name = get_mod_name;

    let free = $(this).attr("data-free");

    //[data-mods-name=' + get_mod_name + ']

    $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__color-selected .conf-widget__color').text($(this).val());
    $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__color-selected .conf-widget__color').css("color", $(this).attr("data-color"));

    if ($(this).attr("data-color") == "#525252") {
      $('.conf-widget__options-item[data-id-modul="157"]').attr("data-price", "0");
      $('.conf-widget__options-item[data-id-modul="157"] .checkbox__price').text("0 руб.");
    } else {
      $('.conf-widget__options-item[data-id-modul="157"]').attr("data-price", "30000");
      $('.conf-widget__options-item[data-id-modul="157"] .checkbox__price').text("30 000 руб.");
    }

    if ($(this).attr("data-color") == "#525252") {
      $('.conf-widget__options-item[data-id-modul="197"]').attr("data-price", "0");
      $('.conf-widget__options-item[data-id-modul="197"] .checkbox__price').text("0 руб.");
    } else {
      $('.conf-widget__options-item[data-id-modul="197"]').attr("data-price", "30000");
      $('.conf-widget__options-item[data-id-modul="197"] .checkbox__price').text("30 000 руб.");
    }
    if ($(this).attr("data-color") == "#525252") {
      $('.conf-widget__options-item[data-id-modul="231"]').attr("data-price", "0");
      $('.conf-widget__options-item[data-id-modul="231"] .checkbox__price').text("0 руб.");
    } else {
      $('.conf-widget__options-item[data-id-modul="231"]').attr("data-price", "30000");
      $('.conf-widget__options-item[data-id-modul="231"] .checkbox__price').text("30 000 руб.");
    }

    if ($(this).attr("data-color") == "#8a955d") {
      $('.conf-widget__options-item[data-id-modul="30"]').attr("data-price", "0");
      $('.conf-widget__options-item[data-id-modul="30"] .checkbox__price').text("0 руб.");
      $('.conf-widget__options-item[data-id-modul="86"]').attr("data-price", "0");
      $('.conf-widget__options-item[data-id-modul="86"] .checkbox__price').text("0 руб.");
    } else {
      $('.conf-widget__options-item[data-id-modul="30"]').attr("data-price", "10000");
      $('.conf-widget__options-item[data-id-modul="30"] .checkbox__price').text("10 000 руб.");
      $('.conf-widget__options-item[data-id-modul="86"]').attr("data-price", "10000");
      $('.conf-widget__options-item[data-id-modul="86"] .checkbox__price').text("10 000 руб.");
    }

    $(conditions + '[data-simbol-code="' + get_code + '"] .conf-layers__img[data-name="color"]').css("display", "none");
    $(conditions + '[data-simbol-code="' + get_code + '"] .conf-layers__img[data-name="color"][data-color-body="' + get_mod_name + " " + $(this).val() + '"]').css("display", "block");
    $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__options-item[data-sim-code="color"][data-mods-name="' + get_mod_name + '"] .checkbox__input').change();
    color = $(this).val();

    if ($(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__options-item[data-id-modul="136"] input').is(":checked")) {
      $(conditions + '[data-simbol-code="' + get_code + '"] .conf-layers [data-specification="modules-img"][data-id-modul="136"]').css("opacity", "0");
      $(conditions + '[data-simbol-code="' + get_code + '"] .conf-layers [data-specification="modules-img"][data-id-modul="136"]').attr("data-active", "");

      $(
        conditions +
          '[data-simbol-code="' +
          get_code +
          '"] .conf-layers [data-specification="modules-img"][data-id-modul="136"][data-modul-binding="' +
          get_mod_name +
          " " +
          $("input[name='confColor']:checked").val() +
          '"]'
      ).css("opacity", "1");
      $(
        conditions +
          '[data-simbol-code="' +
          get_code +
          '"] .conf-layers [data-specification="modules-img"][data-id-modul="136"][data-modul-binding="' +
          get_mod_name +
          " " +
          $("input[name='confColor']:checked").val() +
          '"]'
      ).attr("data-active", "Y");
    }

    if ($(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__options-item[data-id-modul="184"] input').is(":checked")) {
      $(conditions + '[data-simbol-code="' + get_code + '"] .conf-layers [data-specification="modules-img"][data-id-modul="184"]').css("opacity", "0");
      $(conditions + '[data-simbol-code="' + get_code + '"] .conf-layers [data-specification="modules-img"][data-id-modul="184"]').attr("data-active", "");

      $(
        conditions +
          '[data-simbol-code="' +
          get_code +
          '"] .conf-layers [data-specification="modules-img"][data-id-modul="184"][data-modul-binding="' +
          get_mod_name +
          " " +
          $("input[name='confColor']:checked").val() +
          '"]'
      ).css("opacity", "1");
      $(
        conditions +
          '[data-simbol-code="' +
          get_code +
          '"] .conf-layers [data-specification="modules-img"][data-id-modul="184"][data-modul-binding="' +
          get_mod_name +
          " " +
          $("input[name='confColor']:checked").val() +
          '"]'
      ).attr("data-active", "Y");
    }
    if ($(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__options-item[data-id-modul="218"] input').is(":checked")) {
      $(conditions + '[data-simbol-code="' + get_code + '"] .conf-layers [data-specification="modules-img"][data-id-modul="218"]').css("opacity", "0");
      $(conditions + '[data-simbol-code="' + get_code + '"] .conf-layers [data-specification="modules-img"][data-id-modul="218"]').attr("data-active", "");

      $(
        conditions +
          '[data-simbol-code="' +
          get_code +
          '"] .conf-layers [data-specification="modules-img"][data-id-modul="218"][data-modul-binding="' +
          get_mod_name +
          " " +
          $("input[name='confColor']:checked").val() +
          '"]'
      ).css("opacity", "1");
      $(
        conditions +
          '[data-simbol-code="' +
          get_code +
          '"] .conf-layers [data-specification="modules-img"][data-id-modul="218"][data-modul-binding="' +
          get_mod_name +
          " " +
          $("input[name='confColor']:checked").val() +
          '"]'
      ).attr("data-active", "Y");
    }
  });

  /**
   * Установка модулей
   */
  let active_modules = [];
  base_price = 0;
  dop_base_price = 0;

  $(".conf-widget__options-item .checkbox__input").change(function () {
    active_modules = [];
    if ($(this).prop("checked") == true && $(this).parent().attr("data-group") !== undefined) {
      let parent = $(this).parent().attr("data-group");
      $(".conf-widget__options-item").each(function (index, element) {
        if ($(element).attr("data-group") !== undefined && $(element).attr("data-group") == parent) {
          $(element).find(".checkbox__input").prop("checked", false);
        }
      });
      $(this).prop("checked", true);
    } else if ($(this).prop("checked") == false && $(this).parent().attr("data-group") !== undefined) {
      $(this).prop("checked", true);
    }
    dop_base_price = 0;
    let get_code = $(this).attr("data-simbol-code");
    const modName = $(conditions + '[data-simbol-code="' + get_code + '"]').attr("data-mods-name");

    let total_price = Number(
      $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__total .conf-numbers.conf-numbers_place_conf-widget .conf-numbers__item.margin_b_s .conf-numbers__price')
        .attr("data-mod-price")
        .replace(/\D+/g, "")
    );

    let main_total_price = Number(
      $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__total .conf-numbers.conf-numbers_place_conf-widget .section-subtitle')
        .attr("data-total-price")
        .replace(/\D+/g, "")
    );
    if (base_price == 0) {
      base_price = main_total_price;
    }
    let name = $(this).attr("data-id");
    let pack_price = Number(
      $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__total .conf-numbers.conf-numbers_place_conf-widget .section-subtitle')
        .attr("data-pack-price")
        .replace(/\D+/g, "")
    );
    let get_hidden_par = $(this).attr("data-hide");
    let get_block_name = $(this).attr("data-block-mods");
    let get_blocked_name = $(this).attr("data-blocked-mods");
    let id_block;

    uncheckedMod($(this), "conditions", get_code);

    disableImagesUnsuitableModules(get_code);

    // Изменение цены при активации пакета
    if ($(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__packages-container .conf-widget__packages.margin_b_s .conf-widget__package .conf-widget__package-input').is(":checked")) {
      main_total_price = pack_price;
    }
    const modsname = document.querySelector('section[data-page="conditions"]:not([data-mods-name=""])').dataset.modsName;
    $(conditions + '[data-simbol-code="' + get_code + '"][data-mods-name="' + modsname + '"] .conf-widget__options-item[data-mods-name="' + modsname + '"] .checkbox__input:checked').each(function () {
      const elemet = this;
      active_modules.push(elemet.dataset.id);
    });
    // Проверка на изменение изображений при включении определённых модулей и их установка
    if ($(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__options-item .checkbox__input[data-id="' + name + '"]').is(":checked")) {
      let existing_modules = [];
      $(conditions + '[data-simbol-code="' + get_code + '"] [data-side-img="layer-front"] [data-specification="modules-img"][data-id-modul="' + name + '"]').each(function () {
        const a = $(this).attr("data-modul-binding");

        if (active_modules.indexOf(a) >= 0) {
          existing_modules.push(a);
        }
      });

      $(conditions + '[data-simbol-code="' + get_code + '"] .swiper.conf-widget__swiper.margin_b_s .conf-layers .conf-layers__img[data-id-modul="' + name + '"]').css("opacity", "0");
      if (existing_modules.length != 0) {
        $.each(existing_modules, function (key, val) {
          $(conditions + '[data-simbol-code="' + get_code + '"] .conf-layers [data-specification="modules-img"][data-id-modul="' + name + '"][data-modul-binding="' + val + '"]').css("opacity", "1");
          $(conditions + '[data-simbol-code="' + get_code + '"] .conf-layers [data-specification="modules-img"][data-id-modul="' + name + '"][data-modul-binding="' + val + '"]').attr(
            "data-active",
            "Y"
          );
        });
      } else {
        val = "-";
        if ((name == 223 || name == 199) && active_modules.some((modul) => modul == 199)) {
          $(conditions + '[data-simbol-code="' + get_code + '"] .conf-layers [data-specification="modules-img"][data-id-modul="223"][data-modul-binding="+"]').css("opacity", "1");
          $(conditions + '[data-simbol-code="' + get_code + '"] .conf-layers [data-specification="modules-img"][data-id-modul="223"][data-modul-binding="+"]').attr("data-active", "Y");
          $(conditions + '[data-simbol-code="' + get_code + '"] .conf-layers [data-specification="modules-img"][data-id-modul="223"][data-modul-binding="-"]').css("opacity", "0");
          $(conditions + '[data-simbol-code="' + get_code + '"] .conf-layers [data-specification="modules-img"][data-id-modul="223"][data-modul-binding="-"]').attr("data-active", "N");
        } else if ((name == 223 || name == 227) && active_modules.some((modul) => modul == 227)) {
          $(conditions + '[data-simbol-code="' + get_code + '"] .conf-layers [data-specification="modules-img"][data-id-modul="223"][data-modul-binding="-"]').css("opacity", "1");
          $(conditions + '[data-simbol-code="' + get_code + '"] .conf-layers [data-specification="modules-img"][data-id-modul="223"][data-modul-binding="-"]').attr("data-active", "Y");
          $(conditions + '[data-simbol-code="' + get_code + '"] .conf-layers [data-specification="modules-img"][data-id-modul="223"][data-modul-binding="+"]').css("opacity", "0");
          $(conditions + '[data-simbol-code="' + get_code + '"] .conf-layers [data-specification="modules-img"][data-id-modul="223"][data-modul-binding="+"]').attr("data-active", "N");
        }

        if ((name == 155 || name == 116) && active_modules.some((modul) => modul == 116)) {
          $(conditions + '[data-simbol-code="' + get_code + '"] .conf-layers [data-specification="modules-img"][data-id-modul="155"][data-modul-binding="+"]').css("opacity", "1");
          $(conditions + '[data-simbol-code="' + get_code + '"] .conf-layers [data-specification="modules-img"][data-id-modul="155"][data-modul-binding="+"]').attr("data-active", "Y");
          $(conditions + '[data-simbol-code="' + get_code + '"] .conf-layers [data-specification="modules-img"][data-id-modul="155"][data-modul-binding="-"]').css("opacity", "0");
          $(conditions + '[data-simbol-code="' + get_code + '"] .conf-layers [data-specification="modules-img"][data-id-modul="155"][data-modul-binding="-"]').attr("data-active", "N");
        } else if ((name == 155 || name == 161) && active_modules.some((modul) => modul == 161)) {
          $(conditions + '[data-simbol-code="' + get_code + '"] .conf-layers [data-specification="modules-img"][data-id-modul="155"][data-modul-binding="-"]').css("opacity", "1");
          $(conditions + '[data-simbol-code="' + get_code + '"] .conf-layers [data-specification="modules-img"][data-id-modul="155"][data-modul-binding="-"]').attr("data-active", "Y");
          $(conditions + '[data-simbol-code="' + get_code + '"] .conf-layers [data-specification="modules-img"][data-id-modul="155"][data-modul-binding="+"]').css("opacity", "0");
          $(conditions + '[data-simbol-code="' + get_code + '"] .conf-layers [data-specification="modules-img"][data-id-modul="155"][data-modul-binding="+"]').attr("data-active", "N");
        }

        if ((name == 189 || name == 166) && active_modules.some((modul) => modul == 166)) {
          $(conditions + '[data-simbol-code="' + get_code + '"] .conf-layers [data-specification="modules-img"][data-id-modul="189"][data-modul-binding="+"]').css("opacity", "1");
          $(conditions + '[data-simbol-code="' + get_code + '"] .conf-layers [data-specification="modules-img"][data-id-modul="189"][data-modul-binding="+"]').attr("data-active", "Y");
          $(conditions + '[data-simbol-code="' + get_code + '"] .conf-layers [data-specification="modules-img"][data-id-modul="189"][data-modul-binding="-"]').css("opacity", "0");
          $(conditions + '[data-simbol-code="' + get_code + '"] .conf-layers [data-specification="modules-img"][data-id-modul="189"][data-modul-binding="-"]').attr("data-active", "N");
        } else if ((name == 189 || name == 193) && active_modules.some((modul) => modul == 193)) {
          $(conditions + '[data-simbol-code="' + get_code + '"] .conf-layers [data-specification="modules-img"][data-id-modul="189"][data-modul-binding="-"]').css("opacity", "1");
          $(conditions + '[data-simbol-code="' + get_code + '"] .conf-layers [data-specification="modules-img"][data-id-modul="189"][data-modul-binding="-"]').attr("data-active", "Y");
          $(conditions + '[data-simbol-code="' + get_code + '"] .conf-layers [data-specification="modules-img"][data-id-modul="189"][data-modul-binding="+"]').css("opacity", "0");
          $(conditions + '[data-simbol-code="' + get_code + '"] .conf-layers [data-specification="modules-img"][data-id-modul="189"][data-modul-binding="+"]').attr("data-active", "N");
        }

        if (name != 223 && name != 155 && name != 189) {
          $(conditions + '[data-simbol-code="' + get_code + '"] .conf-layers [data-specification="modules-img"][data-id-modul="' + name + '"][data-modul-binding="-"]').css("opacity", "1");
          $(conditions + '[data-simbol-code="' + get_code + '"] .conf-layers [data-specification="modules-img"][data-id-modul="' + name + '"][data-modul-binding="-"]').attr("data-active", "Y");
        }
      }

      if (get_block_name != "") {
        $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__options-item .checkbox__input').each(function () {
          if ($(this).attr("data-blocked-mods") === get_block_name && $(this).attr("data-id") !== name && $(this).parent().attr("data-group") == null) {
            $(this).prop("disabled", true);
            $(this).prop("checked", false);
            id_block = $(this).attr("data-id");
            let snaps = $(this).attr("data-snap").split(",");
            $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__options-item .checkbox__input').each(function () {
              if (snaps[0] != "" && $.inArray(id_block, snaps) && $(this).attr("data-id") !== name) {
                $(this).prop("disabled", true);
                $(this).prop("checked", false);
              }
            });
          }
        });
      }
      if (get_hidden_par.length > 0) {
        $(conditions + '[data-simbol-code="' + get_code + '"] img[data-specification="modules-img"]').each(function () {
          if ($(this).attr("data-hide") === get_hidden_par) {
            $(this).css("opacity", "0");
            $(this).css("display", "none");
          }
        });
      }

      if (name == "136") {
        $(
          conditions +
            '[data-simbol-code="' +
            get_code +
            '"] .conf-layers [data-specification="modules-img"][data-id-modul="' +
            name +
            '"][data-modul-binding="' +
            modName +
            " " +
            $("input[name='confColor']:checked").val() +
            '"]'
        ).css("opacity", "1");
        $(
          conditions +
            '[data-simbol-code="' +
            get_code +
            '"] .conf-layers [data-specification="modules-img"][data-id-modul="' +
            name +
            '"][data-modul-binding="' +
            modName +
            " " +
            $("input[name='confColor']:checked").val() +
            '"]'
        ).attr("data-active", "Y");
      }
      if (name == "184") {
        $(
          conditions +
            '[data-simbol-code="' +
            get_code +
            '"] .conf-layers [data-specification="modules-img"][data-id-modul="' +
            name +
            '"][data-modul-binding="' +
            modName +
            " " +
            $("input[name='confColor']:checked").val() +
            '"]'
        ).css("opacity", "1");
        $(
          conditions +
            '[data-simbol-code="' +
            get_code +
            '"] .conf-layers [data-specification="modules-img"][data-id-modul="' +
            name +
            '"][data-modul-binding="' +
            modName +
            " " +
            $("input[name='confColor']:checked").val() +
            '"]'
        ).attr("data-active", "Y");
      }
      if (name == "218") {
        $(
          conditions +
            '[data-simbol-code="' +
            get_code +
            '"] .conf-layers [data-specification="modules-img"][data-id-modul="' +
            name +
            '"][data-modul-binding="' +
            modName +
            " " +
            $("input[name='confColor']:checked").val() +
            '"]'
        ).css("opacity", "1");
        $(
          conditions +
            '[data-simbol-code="' +
            get_code +
            '"] .conf-layers [data-specification="modules-img"][data-id-modul="' +
            name +
            '"][data-modul-binding="' +
            modName +
            " " +
            $("input[name='confColor']:checked").val() +
            '"]'
        ).attr("data-active", "Y");
      }
    } else {
      $(conditions + '[data-simbol-code="' + get_code + '"] .swiper.conf-widget__swiper.margin_b_s .conf-layers .conf-layers__img[data-id-modul="' + name + '"]').css("opacity", "0");
      $(conditions + '[data-simbol-code="' + get_code + '"] .swiper.conf-widget__swiper.margin_b_s .conf-layers .conf-layers__img[data-id-modul="' + name + '"]').css("display", "block");
      $(conditions + '[data-simbol-code="' + get_code + '"] .swiper.conf-widget__swiper.margin_b_s .conf-layers .conf-layers__img[data-id-modul="' + name + '"]').attr("data-active", "");
      active_modules = active_modules.filter(function (f) {
        return f !== name;
      });

      $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__options .conf-widget__options-item[data-mods-name="' + modName + '"]').each(function () {
        if ($(this).attr("data-default") == "default" && $(this).find("input").is(":checked")) {
          $(this).find("input").change();
        }
      });

      if (get_block_name != "") {
        $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__options-item .checkbox__input').each(function () {
          if ($(this).attr("data-blocked-mods") === get_block_name && $(this).attr("data-id") !== name) {
            $(this).prop("disabled", false);
            id_block = $(this).attr("data-id");
            let snaps = $(this).attr("data-snap").split(",");
            $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__options-item .checkbox__input').each(function () {
              if (snaps[0] != "" && $.inArray(id_block, snaps) && $(this).attr("data-id") !== name) {
                $(this).prop("disabled", false);
              }
            });
          }
        });
      }
      if (get_hidden_par.length > 0) {
        $(conditions + '[data-simbol-code="' + get_code + '"] img[data-specification="modules-img"]').each(function () {
          if ($(this).attr("data-hide") === get_hidden_par && $(this).attr("data-active") == "Y") {
            $(this).css("opacity", 1);
            $(this).css("display", "block");
          }
        });
      }
    }

    // Активация связаных модулей
    let snaps = $(this).attr("data-snap").split(",");

    if ($(this).attr("data-snap") != "" && $(this).is(":checked")) {
      $.each(snaps, function (indexInArray, valueOfElement) {
        $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__options-item .checkbox__input[data-id="' + valueOfElement + '"]').prop("checked", true);
        $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__options-item .checkbox__input[data-id="' + valueOfElement + '"]').change();
        $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__options-item .checkbox__input[data-id="' + valueOfElement + '"]').prop("disabled", true);
      });
      if ($(this).parent().attr("data-group") != "") {
        $(
          conditions +
            '[data-simbol-code="' +
            get_code +
            '"] .conf-widget__options-item[data-id-modul != "' +
            $(this).parent().attr("data-id-modul") +
            '"][data-group="' +
            $(this).parent().attr("data-group") +
            '"]'
        ).attr("data-remove-snaps", $(this).attr("data-snap"));
      }
    } else if ($(this).attr("data-snap") != "" && !$(this).is(":checked")) {
      $.each(snaps, function (indexInArray, valueOfElement) {
        removeDisabled = true;
        $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__options-item .checkbox__input[data-snap*="' + valueOfElement + '"]').each(function () {
          if ($(this).is(":checked")) {
            removeDisabled = false;
          }
        });
        if (removeDisabled) {
          $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__options-item .checkbox__input[data-id="' + valueOfElement + '"]').prop("disabled", false);
        }
      });
    }
    if ($(this).parent().attr("data-remove-snaps") !== undefined && $(this).is(":checked")) {
      snaps = $(this).parent().attr("data-remove-snaps").split(",");
      $.each(snaps, function (indexInArray, valueOfElement) {
        $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__options-item .checkbox__input[data-id="' + valueOfElement + '"]').prop("disabled", false);
      });
    }

    let pack_name;
    $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__packages-container .conf-widget__packages .conf-widget__package').each(function () {
      if ($(this).find("input").is(":checked")) {
        pack_name = $(this).find(".conf-widget__package-name").text();
      }
    });

    // Прибавление цены модуля к итоговой
    colorpriced = 0;
    $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__options-item').each(function () {
      if ($(this).find(".checkbox__input").is(":checked") && $(this).attr("data-default") != "default") {
        if ($(this).attr("data-group") === undefined) {
          total_price += Number($(this).attr("data-price").replace(/\D+/g, ""));
          main_total_price += Number($(this).attr("data-price").replace(/\D+/g, ""));
        } else {
          if ($(this).attr("data-name") == "Шины сверхвысокой проходимости TINGER (4 шт.)") {
            dop_base_price = 78400;
          }
        }
      }
      if (!$(this).find(".checkbox__input").is(":checked")) {
        $(conditions + '[data-simbol-code="' + get_code + '"] .swiper.conf-widget__swiper.margin_b_s .conf-layers .conf-layers__img[data-id-modul="' + $(this).attr("data-id-modul") + '"]').css(
          "opacity",
          "0"
        );
      }

      if ($(this).attr("data-default") == "default" && $(this).attr("data-price-to-base") == "1" && $(conditions).attr("data-mods-name") == $(this).attr("data-mods-name")) {
        let pr = Number($(this).attr("data-price").replace(/\D+/g, ""));
        colorpriced += pr;
      }
    });

    $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__total .conf-numbers__price').text(Number(total_price - packageDiscount).toLocaleString("ru-RU") + " руб.");
    $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__total .conf-numbers.conf-numbers_place_conf-widget .section-subtitle').text(
      "Базовая цена модели: " + Number(base_price + dop_base_price + colorpriced).toLocaleString("ru-RU") + " руб."
    );
  });

  /**
   * Переключение изображения на стандартное при отключении связанного модуля
   */
  $(".conf-widget__options-item .checkbox__input").click(function () {
    let disabled_name = $(this).attr("data-id"),
      active_el;

    if ($(this).is(":not(:checked)")) {
      $(conditions + '[data-simbol-code="' + code_product + '"] [data-specification="modules-img"][data-modul-binding="' + disabled_name + '"]').each(function () {
        if (
          $(this).is(":visible") &&
          $(conditions + '[data-simbol-code="' + code_product + '"] .conf-widget__options .conf-widget__options-item[data-id-modul="' + $(this).attr("data-id-modul") + '"] .checkbox__input').is(
            ":checked"
          )
        ) {
          active_el = $(this).attr("data-id-modul");
          $(this).css("opacity", "0");
          $(this).attr("data-active", "");
          $(conditions + '[data-simbol-code="' + code_product + '"] [data-specification="modules-img"][data-id-modul="' + active_el + '"][data-modul-binding="-"]').css("opacity", "1");
          $(conditions + '[data-simbol-code="' + code_product + '"] [data-specification="modules-img"][data-id-modul="' + active_el + '"][data-modul-binding="-"]').attr("data-active", "Y");
        }
      });
    } else {
      $(conditions + '[data-simbol-code="' + code_product + '"] [data-specification="modules-img"][data-modul-binding="' + disabled_name + '"]').each(function () {
        if (
          $(this).is(":visible") &&
          $(conditions + '[data-simbol-code="' + code_product + '"] .conf-widget__options .conf-widget__options-item[data-id-modul="' + $(this).attr("data-id-modul") + '"] .checkbox__input').is(
            ":checked"
          )
        ) {
          active_el = $(this).attr("data-id-modul");
          $(this).css("opacity", "0");
          $(this).attr("data-active", "");
          $(conditions + '[data-simbol-code="' + code_product + '"] [data-specification="modules-img"][data-id-modul="' + active_el + '"][data-modul-binding="-"]').css("opacity", "0");
          $(conditions + '[data-simbol-code="' + code_product + '"] [data-specification="modules-img"][data-id-modul="' + active_el + '"][data-modul-binding="-"]').attr("data-active", "");
          $(conditions + '[data-simbol-code="' + code_product + '"] [data-specification="modules-img"][data-id-modul="' + active_el + '"][data-modul-binding="' + disabled_name + '"]').css(
            "opacity",
            "1"
          );
          $(conditions + '[data-simbol-code="' + code_product + '"] [data-specification="modules-img"][data-id-modul="' + active_el + '"][data-modul-binding="' + disabled_name + '"]').attr(
            "data-active",
            "Y"
          );
        }
      });
    }
  });

  /**
   * Выбор пакета
   */
  $(".conf-widget__packages-container .conf-widget__packages .conf-widget__package").click(function () {
    let get_code = $(this).attr("data-simbol-code");
    const modName = $(conditions + '[data-simbol-code="' + get_code + '"]').attr("data-mods-name");
    if ($(this).find("input.conf-widget__package-input").prop("checked")) {
      packageDiscount = Number($(this).find("input.conf-widget__package-input").attr("data-price-advantage"));
    } else {
      packageDiscount = 0;
    }

    let get_pack_price = Number($(this).find("input.conf-widget__package-input").attr("data-price-pack"));
    let total_price = $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__total .conf-numbers.conf-numbers_place_conf-widget .section-subtitle').attr("data-total-price");
    let modul_img = $(this).attr("data-modul-collection").split(",");
    let pack_name = $(this).find(".conf-widget__package-name").text();
    let pack_modul_price = 0;
    let colorPrice = 0;

    $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__options .conf-widget__options-item').each(function (index, el) {
      if ($(el).attr("data-sim-code") !== "color") {
        if ($(el).attr("data-default") !== "default" && $(el).attr("data-sim-code") != "color") {
          $(el).find("input").prop("disabled", false);
          $(el).find("input").prop("checked", false);
        }
        if ($(el).find("input").is(":checked")) {
          $(el).find("input").click();
        }
        if ($(el).find("input").attr("data-was-on") === "Y" && !$(el).find("input").is(":checked")) {
          $(el).find("input").removeAttr("data-was-on");
          if ($(el).find("input").is(":disabled")) {
            $(el).find("input").prop("disabled", false);
            $(el).find("input").click();
            $(el).find("input").prop("disabled", true);
          } else {
            $(el).find("input").click();
          }
        }
      }
    });

    if ($(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__options-item[data-sim-code="color"][data-mods-name="' + modName + '"] input').is(":checked")) {
      colorPrice = Number($(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__options-item[data-sim-code="color"][data-mods-name="' + modName + '"]').attr("data-price"));
    }

    if ($(this).find("input.conf-widget__package-input").is(":checked")) {
      $(conditions + '[data-simbol-code="' + get_code + '"] img[data-specification="modules-img"]').css("opacity", "0");
      $(conditions + '[data-simbol-code="' + get_code + '"] img[data-specification="modules-img"]').attr("data-active", "");
      $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__total .conf-numbers.conf-numbers_place_conf-widget .section-subtitle').attr("data-pack-price", get_pack_price);
      $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__options .conf-widget__options-item').each(function () {
        if ($(this).find("input").attr("data-default") === "default") {
          $(this).find("input").change();
        }
      });
      $.each(modul_img, function (key, val) {
        $(conditions + '[data-simbol-code="' + get_code + '"] img[data-specification="modules-img"][data-id-modul="' + val + '"]').attr("data-active", "Y");
        $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__options .conf-widget__options-item[data-id-modul="' + val + '"]').attr("data-pack-active", pack_name);
      });
      $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__options .conf-widget__options-item[data-pack-active="' + pack_name + '"]')
        .find("input")
        .click();
      $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__options .conf-widget__options-item[data-pack-active="' + pack_name + '"]')
        .find("input")
        .prop("checked", true);
      $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__options .conf-widget__options-item[data-pack-active="' + pack_name + '"]')
        .find("input")
        .prop("disabled", true);

      pack_modul_price = Number(get_pack_price.toString().replace(/\D+/g, "")) - Number(total_price.replace(/\D+/g, ""));

      return 0;
      $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__total .conf-numbers.conf-numbers_place_conf-widget .section-subtitle').text(
        "Базовая цена модели: " + Number(get_pack_price + colorPrice).toLocaleString("ru-RU") + " руб."
      );
    } else {
      $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__total .conf-numbers.conf-numbers_place_conf-widget .section-subtitle').attr("data-pack-price", "");
      $(conditions + '[data-simbol-code="' + get_code + '"] img[data-specification="modules-img"]').attr("data-active", "");

      $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__options .conf-widget__options-item[data-pack-active="' + pack_name + '"]')
        .find("input")
        .prop("disabled", false);

      let modulePrice;
      $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__options .conf-widget__options-item').each(function () {
        if ($(this).attr("data-sim-code") !== "color") {
          if ($(this).find("input").is(":disabled")) {
          } else {
            $(this).find("input").change();
          }
          if ($(this).attr("data-pack-active") === pack_name) {
            $(this).removeAttr("data-pack-active");
          }

          if ($(this).attr("data-default") != "default" && $(this).find("input").is(":checked")) {
            $(this).find("input").change();
            $(this).find("input").prop("checked", false);
          }
        }

        if ($(this).attr("data-price") == "—") {
          modulePrice = 0;
        } else {
          modulePrice = Number($(this).attr("data-price"));
        }
      });
      return 0;
      $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__total .conf-numbers__price').attr("data-mod-price", pack_modul_price);
      $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__total .conf-numbers__price').text(Number(pack_modul_price + colorPrice).toLocaleString("ru-RU") + " руб.");

      $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__total .conf-numbers.conf-numbers_place_conf-widget .section-subtitle').text(
        "Итого: " + Number(Number(total_price) + Number(colorPrice)).toLocaleString("ru-RU") + " руб."
      );
    }
  });

  /**
   * Перемещение через верхнее меню
   */
  $("li.conf-nav__item_status_success").click(function (e) {
    // base_price = 0;
    let get_block_id = $(this).attr("data-block-id"),
      get_model_name = $(this).attr("data-model-name");

    $("section").css("display", "none");
    if (get_block_id != "first-page") {
      if (get_block_id === "equipment") {
        window.location.href = "https://tinger.ru/configurator/?model=" + get_model_name;
        return;
        /*$(conditions + '[data-simbol-code="' + code_product + '"] .conf-widget__total .conf-numbers.conf-numbers_place_conf-widget .section-subtitle').attr("data-total-price", 0);
        $(conditions + '[data-simbol-code="' + code_product + '"] .conf-widget__packages-container .conf-widget__packages .conf-widget__package').each(function () {
          $(this).click();
          $(this).find("input").prop("checked", false);
        });*/
      }
      $('section[data-page="' + get_block_id + '"][data-simbol-code="' + get_model_name + '"]').css("display", "block");
    } else {
      window.location.href = "https://tinger.ru/configurator/";
      /*
      $(conditions + '[data-simbol-code="' + code_product + '"] .conf-widget__packages-container .conf-widget__packages .conf-widget__package').each(function () {
        $(this).click();
        $(this).find("input").prop("checked", false);
      });
      code_product = "";
      $('section[data-page="' + get_block_id + '"]').css("display", "block");*/
    }
  });

  /**
   * Получение get параметров
   * @param {String} url
   * @returns String
   */
  function getAllUrlParams(url) {
    // извлекаем строку из URL или объекта window
    var queryString = url ? url.split("?")[1] : window.location.search.slice(1);

    // объект для хранения параметров
    var obj = {};

    // если есть строка запроса
    if (queryString) {
      // данные после знака # будут опущены
      queryString = queryString.split("#")[0];

      // разделяем параметры
      var arr = queryString.split("&");

      for (var i = 0; i < arr.length; i++) {
        // разделяем параметр на ключ => значение
        var a = arr[i].split("=");

        // обработка данных вида: list[]=thing1&list[]=thing2
        var paramNum = undefined;
        var paramName = a[0].replace(/\[\d*\]/, function (v) {
          paramNum = v.slice(1, -1);
          return "";
        });

        // передача значения параметра ('true' если значение не задано)
        var paramValue = typeof a[1] === "undefined" ? true : a[1];

        // преобразование регистра
        paramName = paramName.toLowerCase();
        paramValue = paramValue.toLowerCase();

        // если ключ параметра уже задан
        if (obj[paramName]) {
          // преобразуем текущее значение в массив
          if (typeof obj[paramName] === "string") {
            obj[paramName] = [obj[paramName]];
          }
          // если не задан индекс...
          if (typeof paramNum === "undefined") {
            // помещаем значение в конец массива
            obj[paramName].push(paramValue);
          }
          // если индекс задан...
          else {
            // размещаем элемент по заданному индексу
            obj[paramName][paramNum] = paramValue;
          }
        }
        // если параметр не задан, делаем это вручную
        else {
          obj[paramName] = paramValue;
        }
      }
    }

    return obj;
  }

  /**
   * Выбор модификаций и двигателей
   */
  $(equipment + " .conf-modification__choice .select").change(function () {
    let get_price_modification = $('main[data-page="equipment"][data-simbol-code="' + code_product + '"] .conf-modification__choice .select[name="modification"]').val();
    let tag_price = $('main[data-page="equipment"][data-simbol-code="' + code_product + '"] .conf-modification__chars .conf-total');
    let get_total_price = tag_price.attr("data-total-price");
    let total_sum = Number(get_price_modification) + Number(get_total_price);
    tag_price.text("Базовая цена модели: " + Number(total_sum).toLocaleString("ru-RU") + " руб.");
  });
});
