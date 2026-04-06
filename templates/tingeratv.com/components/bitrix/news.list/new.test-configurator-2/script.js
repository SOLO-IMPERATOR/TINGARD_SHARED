/* preloader (configurator) */
const confPreloader = document.querySelector('.conf-preloader');
window.onload = function() {
    confPreloader.classList.remove('conf-preloader_active');
};

const firstPage = 'section[data-page="first-page"]';
const facilities = 'section[data-page="facilities"]';
const conditions = 'section[data-page="conditions"]';
const equipment = 'section[data-page="equipment"]';

// Слайдер модели в конфигураторе (вид спереди, вид сзади)
const swiperConf = new Swiper('.conf-widget__swiper', {
	navigation: {
		nextEl: '.conf-widget__arrows-next',
		prevEl: '.conf-widget__arrows-prev',
		disabledClass: 'arrows--disabled',
	},
	slidesPerView: 1,
	simulateTouch: true,
	effect: 'fade',
});

/**
 * Снятие активности пакета
 * @param {string} code
 */
function disablingPackages(code) {
    const packs = $(conditions + '[data-simbol-code=' + code + '] .conf-widget__package');
    const modules = $(conditions + '[data-simbol-code=' + code + '] .conf-widget__options-item');

    for (let i = 0; i < packs.length; i++) {
        if ($(packs[i]).find('.conf-widget__package-input').is(':checked')) {
            $(packs[i]).click();
            $(packs[i]).find('.conf-widget__package-input').prop('checked', false);
        }
    }
    for (let i = 0; i < modules.length; i++) {
        if ($(modules[i]).attr('data-default') != 'default' && $(modules[i]).attr('data-sim-code') != 'color') {
            $(modules[i]).find('.checkbox__input').prop('disabled', false);
        }
    }
}

/**
 * Снятие активности модификации
 * @param {object} modElement 
 */
function uncheckedMod(modElement, getBlockID = '', getModelID = '') {
    const blockID = getBlockID;
    const modelID = getModelID;
    const modName = modElement.closest('.conf-widget__options-item').attr('data-mods-name');
    const packName = modElement.closest('.conf-widget__options-item').attr('data-pack-active');
    const checkboxMods = $('[data-page="'+blockID+'"][data-simbol-code="'+modelID+'"] .conf-widget__options-item[data-mods-name="'+modName+'"] .checkbox__input');
    const disableId = modElement.attr('data-disable-mod');

    if (disableId.length > 0) {
        if (modElement.is(':checked')) {
            checkboxMods.each(function() {
                if ($(this).hasClass(disableId) && $(this).closest('.conf-widget__options-item').attr('data-pack-active') === undefined) {
                    if ($(this).is(':checked')) {
                        $(this).attr('data-was-on', 'Y');
                        if ($(this).is(":disabled")) {
                            $(this).prop("disabled", false);
                            $(this).click();
                            $(this).prop("disabled", true);
                        }
                        $(this).click();
                    }
                    $(this).prop('checked', false);
                }
            });
            return true;
        } else {
            checkboxMods.each(function() {
                if ($(this).hasClass(disableId) && $(this).attr('data-was-on') == 'Y' && $(this).closest('.conf-widget__options-item').attr('data-mods-name') === modName) {
                    $(this).attr('data-was-on', '');
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
    const moduleImg = $(conditions + '[data-simbol-code="'+modID+'"] .conf-layers__img');
    const modelName = $(conditions + '[data-simbol-code="'+modID+'"]').attr('data-mods-name');

    moduleImg.each((index, el) => {
        moduleId = $(el).attr('data-id-modul');
        if ($(conditions + '[data-simbol-code="'+modID+'"] .conf-widget__options-item[data-id-modul="'+moduleId+'"]').attr('data-mods-name') !== modelName && $(el).attr('data-name') !== "color") {
            $(el).css({'opacity': 0})
        }
    });
}


$(window).load(function () {

    let code_product = "";

    // функция для перехода на вторую страницу по коду
    function next_two(get_code) {
        code_product = get_code;

        let selected_mod = $(equipment + '[data-simbol-code="' + get_code + '"] .conf-modification__choice .conf-modification__choice-item .select[name="modification"]').find('option:selected').attr('data-mods-name');

        if (get_code != undefined) {
            $(conditions + '[data-simbol-code="' + get_code + '"]').attr('data-mods-name', selected_mod);
            if ($(equipment + '[data-simbol-code="' + get_code + '"] .conf-modification.margin_b_m .conf-modification__visual .conf-modification__layers.conf-layers img').length > 2) {
                $(equipment + ' .conf-modification.margin_b_m .conf-modification__visual .conf-modification__layers.conf-layers .conf-layers__img').css("display", "none");
                $(equipment + '[data-simbol-code="' + get_code + '"] .conf-modification.margin_b_m .conf-modification__visual .conf-modification__layers.conf-layers .conf-layers__img[data-mods-name="' + $('[data-page="equipment"][data-simbol-code="' + get_code + '"] .conf-modification__choice-item .select[name="modification"] option:selected').text() + '"]').css("display", "block");
                $(equipment + '[data-simbol-code="' + get_code + '"] .conf-modification__chars .table.margin_b_s .table__row[data-type="mods"]').css('display', 'none');
                $(equipment + '[data-simbol-code="' + get_code + '"] .conf-modification__chars .table.margin_b_s .table__row[data-type="mods"][data-mods-name="' + $('[data-page="equipment"][data-simbol-code="' + get_code + '"] .conf-modification__choice-item .select[name="modification"] option:selected').text() + '"]').css('display', 'table-row');
            } else {
                $(equipment + '[data-simbol-code="' + get_code + '"] .conf-modification.margin_b_m .conf-modification__visual .conf-modification__layers.conf-layers .conf-layers__img').css('display', 'block');
                $(equipment + '[data-simbol-code="' + get_code + '"] .conf-modification__chars .table.margin_b_s .table__row[data-type="mods"]').css('display', 'table-row');
            }
            
            $(firstPage + '').css('display', 'none');
            $(equipment + '[data-simbol-code="' + get_code + '"]').css('display', 'block');

        } else {
            alert("Выберите модель");
        }
    }

    /**
     * Переход на вторую страницу
     */
    $('button#continue-btn-2').click(function () {
        let get_code = $('.conf-models__item .radio__input:checked').attr('data-code-production');
        next_two(get_code);
    });

    if (localStorage.getItem('conf_name')) {
        $(firstPage + ' .conf-models .model-card label[data-code-production="' + localStorage.getItem('conf_name') + '"]').click();
        $('button#continue-btn-2').click();
        localStorage.removeItem("conf_name");
    }

    $(conditions + '[data-simbol-code="' + code_product + '"] .conf-widget__color-list .conf-widget__color-item').first().click();
    $(conditions + '[data-simbol-code="' + code_product + '"] .conf-widget__color-list .conf-widget__color-item').first().change();

    /**
     * Склеивание изображений
     */
    async function gluePictures () {
        let el = $(conditions + '[data-simbol-code="' + code_product + '"] div[data-side-img="layer-front"] img.conf-layers__img');
        let el_arr = [];

        el.each(function() {
            if ($(this).css('opacity') != 0 && $(this).is(":visible")) {
                el_arr.push(this);
            }
        });

        const glue = async (images) => {
            const width = images[0].naturalWidth;
            const height = images[0].naturalHeight;
    
            const $canvas = $('#conf-img');
            $canvas.attr('width', width);
            $canvas.attr('height', height);
    
            const ctx = $canvas[0].getContext('2d');
    
            for (let i = 0; i <= images.length - 1; i++) {
              const src = $(images[i]).attr('src');
              const image = new Image(width, height);
              image.src = src;
    
              await new Promise((resolve) => {
                image.onload = () => {
                  ctx.drawImage(image, 0, 0, width, height, 0, 0, width, height);
                  resolve(image);
                }
              });
            }

            return $canvas[0].toDataURL("image/png");
        }

        await glue(el_arr);

        $(facilities + ' #code-canvas').text(await glue(el_arr));
    }

    /**
     * Работа с модификациями
     */
    $('.conf-modification__choice .conf-modification__choice-item .select[name="modification"]').change(function () {
        let get_code = $(this).attr('data-simbol-code');
        let selected_mod = $(this).find('option:selected').text();

        $(conditions + '[data-simbol-code=' + get_code + ']').attr('data-mods-name', selected_mod);

        $(equipment + '[data-simbol-code="' + get_code + '"] .conf-modification.margin_b_m .conf-modification__visual .conf-modification__layers.conf-layers .conf-layers__img').css('display', 'none');
        $(equipment + '[data-simbol-code="' + get_code + '"] .conf-modification.margin_b_m .conf-modification__visual .conf-modification__layers.conf-layers .conf-layers__img[data-mods-name="' + selected_mod + '"]').css('display', 'block');

        $(equipment + '[data-simbol-code="' + get_code + '"] .conf-modification__chars .table.margin_b_s .table__row[data-type="mods"]').css('display', 'none');
        $(equipment + '[data-simbol-code="' + get_code + '"] .conf-modification__chars .table.margin_b_s .table__row[data-type="mods"][data-mods-name="' + selected_mod + '"]').css('display', 'table-row');


    });

    /**
     * Переход со второй на первую
     */
    $('[data-btn-specification="back-btn-1"]').click(function () {
        if (getAllUrlParams().id !== undefined) {
            window.location.href = "/configurator/";
        } else {
            $(equipment + '').css('display', 'none');
            $(firstPage + '').css('display', 'block');
        }
    });

    /**
     * Переход на третью страницу
     */
    $('[data-btn-specification="continue-btn-3"]').click(function () {
        let get_code = $(this).attr('data-simbol-code');


        let selected_mod = $('[data-page="equipment"][data-simbol-code="' + get_code + '"] .conf-modification__choice-item .select[name="modification"] option:selected').attr('data-mods-name'),
            mod_name = $(conditions + '[data-simbol-code="' + get_code + '"]').attr('data-mods-name');

        $(conditions + '[data-simbol-code="' + get_code + '"]').attr('data-mods-name', selected_mod);

        $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__visual.margin_b_s .conf-widget__options .conf-widget__options-item').css('display', 'none');
        
        $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__visual.margin_b_s .conf-widget__options .conf-widget__options-item').each(function () {
            if ($(this).attr('data-mods-name') == mod_name) {
                $(this).css('display', 'block');
            }
        });


        if ($(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__color-list .conf-widget__color-item').length <= 0) {
            $(conditions + '[data-simbol-code="' + get_code + '"] .conf-layers img[data-name="color"]').css('display', 'none');
            $(conditions + '[data-simbol-code="' + get_code + '"] .conf-layers img[data-name="color"][data-color-body="' + selected_mod + '"]').css('display', 'block');
        }

        $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__color-list .conf-widget__color-item').first().click();
        $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__color-list .conf-widget__color-item').first().find('input').change();

        $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__packages-container .conf-widget__packages .conf-widget__package').css('display', 'none');
        $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__packages-container .conf-widget__packages .conf-widget__package[data-modul-name="' + selected_mod + '"]').css('display', 'block');


        $(equipment + '').css('display', 'none');
        $(conditions + '[data-simbol-code="' + get_code + '"]').css('display', 'block');
    });

    /**
     * Переход обратно на вторую
     */
    $('button[data-btn-specification="back-btn-2"]').click(function () {
        let get_code = $(this).attr('data-simbol-code');
        disablingPackages(get_code);
        $(conditions + '').css('display', 'none');
        $(equipment + '[data-simbol-code="' + get_code + '"]').css('display', 'block');
        $(conditions + ' .conf-widget__options-item[data-default!="default"] .checkbox__input').prop('checked', false);
        $(conditions + ' .conf-widget__options-item .checkbox__input').change();
    });

    /**
     * Переход на четвертую страницу
     * Перенос выбранных данных конфигурации
     */
    $('button[data-btn-specification="continue-btn-4"]').click(function () {
        let get_code = $(this).attr('data-simbol-code'),
            get_moduls = [],
            get_characters = $(equipment + '[data-simbol-code="' + get_code + '"] .conf-modification.margin_b_m .conf-modification__chars .table.margin_b_s tbody').html(),
            get_short_name = $(conditions + '[data-simbol-code="' + get_code + '"] .conditions__short-name').text(),
            get_active_pack = "",
            get_active_color = "",
            glue_img = gluePictures();
        let get_modification = $(equipment + '[data-simbol-code="' + get_code + '"] select[name="modification"] option:selected').attr('data-mods-name');

        $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__packages-container .conf-widget__packages .conf-widget__package').each(function () {
            if ($(this).find('input').is(':checked')) {
                get_active_pack = $(this).find('.conf-widget__package-name').text();
            }
        });

        $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__color-list .conf-widget__color-item').each(function () {
            if ($(this).find('input').is(':checked')) {
                get_active_color = $(this).find('input').val();
            }
        });

        $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__options-item').each(function(){
            if ($(this).find('.checkbox__input').is(':checked') && $(this).is(':visible')) {
                get_moduls.push('<li class="conf-total__list-item">' + $(this).find('.checkbox__text>span:first-child').text() + '</li>');
            }
        });

        $(facilities + ' #facilities__modules .conf-total__list').html(get_moduls);

        $(facilities + ' #facilities__characteristics tbody').html(get_characters);

        $(facilities + ' #facilities__header-name').text(get_short_name);

        $(facilities + ' #active-pack').text(get_active_pack);

        $(facilities + ' #active-color').text(get_active_color);

        $(facilities + ' #active-modification').text(get_modification);

        $(facilities + '[data-simbol-code="end_block"] .conf-layers canvas#conf-img').html(glue_img); 
        $(facilities + '[data-simbol-code="end_block"] .conf-layers').html($(conditions + '[data-simbol-code="' + get_code + '"] div[data-side-img="layer-front"]').html());

        $(conditions + '').css('display', 'none');
        $(facilities + '[data-simbol-code="end_block"]').css('display', 'block');

        $(facilities + ' li.conf-nav__item_status_success').each(function () {
            if ($(this).attr('data-block-id') != "first-page") {
                $(this).attr('data-model-name', get_code);
            }
        });

        $(facilities + ' #code-canvas').text(glue_img);

    });

    /**
     * Смена цвета
     */
    $('.radio__input').change(function() {
        let get_code = $(this).attr('data-simbol-code');
        let get_mod_name = $(this).closest(conditions + '').attr('data-mods-name');
        let free = $(this).attr('data-free');

        //[data-mods-name=' + get_mod_name + ']

        $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__color-selected .conf-widget__color').text($(this).val());
        $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__color-selected .conf-widget__color').css("color", $(this).attr('data-color'));

        $(conditions + '[data-simbol-code="' + get_code + '"] .conf-layers__img[data-name="color"]').css('display', 'none');
        $(conditions + '[data-simbol-code="' + get_code + '"] .conf-layers__img[data-name="color"][data-color-body="' + get_mod_name + " " + $(this).val() + '"]').css('display', 'block');
        
        if (free !== '1') {
            $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__options-item[data-sim-code="color"][data-mods-name="' + get_mod_name + '"] .checkbox__input').prop('checked', true);
        } else {
            $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__options-item[data-sim-code="color"][data-mods-name="' + get_mod_name + '"] .checkbox__input').prop('checked', false);
        }
        $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__options-item[data-sim-code="color"][data-mods-name="' + get_mod_name + '"] .checkbox__input').change();
        color = $(this).val();

        if ($(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__options-item[data-id-modul="136"] input').is(':checked')) {
            $(conditions + '[data-simbol-code="' + get_code + '"] .conf-layers [data-specification="modules-img"][data-id-modul="136"]').css('opacity', '0');
            $(conditions + '[data-simbol-code="' + get_code + '"] .conf-layers [data-specification="modules-img"][data-id-modul="136"]').attr('data-active', '');

            $(conditions + '[data-simbol-code="' + get_code + '"] .conf-layers [data-specification="modules-img"][data-id-modul="136"][data-modul-binding="' + get_mod_name + ' ' + $("input[name='confColor']:checked").val() + '"]').css('opacity', '1');
            $(conditions + '[data-simbol-code="' + get_code + '"] .conf-layers [data-specification="modules-img"][data-id-modul="136"][data-modul-binding="' + get_mod_name + ' ' + $("input[name='confColor']:checked").val() + '"]').attr('data-active', 'Y');
        }
    });

    /**
     * Установка модулей
     */
    let active_modules = [];
    $('.conf-widget__options-item .checkbox__input').change(function () {
        let get_code = $(this).attr('data-simbol-code');
        const modName = $(conditions + '[data-simbol-code="'+get_code+'"]').attr('data-mods-name');

        let name = $(this).attr('data-id');
        let get_hidden_par = $(this).attr('data-hide');
        let get_block_name = $(this).attr('data-block-mods');
        let get_blocked_name = $(this).attr('data-blocked-mods');
        let id_block;

        uncheckedMod($(this), "conditions", get_code);

        disableImagesUnsuitableModules(get_code);

        // Проверка на изменение изображений при включении определённых модулей и их установка
        if ($(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__options-item .checkbox__input[data-id="' + name + '"]').is(':checked')) {

            active_modules.push(name);
            let existing_modules = [];
            $(conditions + '[data-simbol-code="' + get_code + '"] [data-side-img="layer-front"] [data-specification="modules-img"][data-id-modul="' + name + '"]').each(function () {
                const a = $(this).attr('data-modul-binding');

                if (active_modules.indexOf(a) >= 0) {
                    existing_modules.push(a);
                }
            });

            $(conditions + '[data-simbol-code="' + get_code + '"] .swiper.conf-widget__swiper.margin_b_s .conf-layers .conf-layers__img[data-id-modul="' + name + '"]').css("opacity", '0');
            if (existing_modules.length != 0) {
                $.each(existing_modules, function (key, val) {
                    $(conditions + '[data-simbol-code="' + get_code + '"] .conf-layers [data-specification="modules-img"][data-id-modul="' + name + '"][data-modul-binding="' + val + '"]').css("opacity", '1');
                    $(conditions + '[data-simbol-code="' + get_code + '"] .conf-layers [data-specification="modules-img"][data-id-modul="' + name + '"][data-modul-binding="' + val + '"]').attr('data-active', 'Y');
                }); 
            } else {
                $(conditions + '[data-simbol-code="' + get_code + '"] .conf-layers [data-specification="modules-img"][data-id-modul="' + name + '"][data-modul-binding="-"]').css("opacity", '1');
                $(conditions + '[data-simbol-code="' + get_code + '"] .conf-layers [data-specification="modules-img"][data-id-modul="' + name + '"][data-modul-binding="-"]').attr('data-active', 'Y');
            }

            if (get_block_name != '') {
                $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__options-item .checkbox__input').each(function () {

                    if ($(this).attr('data-blocked-mods') === get_block_name && $(this).attr('data-id') !== name) {
                        $(this).prop('disabled', true);
                        $(this).prop('checked', false);
                        id_block = $(this).attr('data-id');
                        
                        $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__options-item .checkbox__input').each(function () {
                            if ($(this).attr('data-snap') === id_block && $(this).attr('data-id') !== name) {
                                $(this).prop('disabled', true);
                                $(this).prop('checked', false);
                            }
                        });
    
                    }




                });
            }
            if (get_hidden_par.length > 0) {
                $(conditions + '[data-simbol-code="' + get_code + '"] img[data-specification="modules-img"]').each(function () {
                    if ($(this).attr('data-hide') === get_hidden_par) {
                        $(this).css('opacity', '0');
                        $(this).css('display', 'none');
                    }
                });
            }

            if(name == '136') {
                $(conditions + '[data-simbol-code="' + get_code + '"] .conf-layers [data-specification="modules-img"][data-id-modul="' + name + '"][data-modul-binding="' + modName + ' ' + $("input[name='confColor']:checked").val() + '"]').css('opacity', '1');
                $(conditions + '[data-simbol-code="' + get_code + '"] .conf-layers [data-specification="modules-img"][data-id-modul="' + name + '"][data-modul-binding="' + modName + ' ' + $("input[name='confColor']:checked").val() + '"]').attr('data-active', 'Y');
            }

        } else {
            $(conditions + '[data-simbol-code="' + get_code + '"] .swiper.conf-widget__swiper.margin_b_s .conf-layers .conf-layers__img[data-id-modul="' + name + '"]').css("opacity", '0');
            $(conditions + '[data-simbol-code="' + get_code + '"] .swiper.conf-widget__swiper.margin_b_s .conf-layers .conf-layers__img[data-id-modul="' + name + '"]').css("display", 'block');
            $(conditions + '[data-simbol-code="' + get_code + '"] .swiper.conf-widget__swiper.margin_b_s .conf-layers .conf-layers__img[data-id-modul="' + name + '"]').attr('data-active', '');
            active_modules = active_modules.filter(function (f) {return f !== name});

            $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__options .conf-widget__options-item[data-mods-name="'+modName+'"]').each(function () {
                if ($(this).attr('data-default') == "default" && $(this).find('input').is(':checked')) {
                    $(this).find('input').change();
                }
            });

            if (get_block_name != '') {
                $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__options-item .checkbox__input').each(function () {
                    if ($(this).attr('data-blocked-mods') === get_block_name && $(this).attr('data-id') !== name) {
                        $(this).prop('disabled', false);
                        id_block = $(this).attr('data-id');
                        
                        $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__options-item .checkbox__input').each(function () {
                            if ($(this).attr('data-snap') === id_block && $(this).attr('data-id') !== name) {
                                $(this).prop('disabled', false);
                            }
                        });
                    }
                });
            }
            if (get_hidden_par.length > 0) {
                $(conditions + '[data-simbol-code="' + get_code + '"] img[data-specification="modules-img"]').each(function () {
                    if ($(this).attr('data-hide') === get_hidden_par && $(this).attr('data-active') == 'Y') {
                        $(this).css('opacity', 1);
                        $(this).css('display', 'block');
                    }
                });
            }

        }

        // Активация связаных модулей
        if ($(this).attr('data-snap') != '' && $(this).is(":checked")) {
            $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__options-item .checkbox__input[data-id="' + $(this).attr('data-snap') + '"]').prop('checked', true);
            $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__options-item .checkbox__input[data-id="' + $(this).attr('data-snap') + '"]').change();
            $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__options-item .checkbox__input[data-id="' + $(this).attr('data-snap') + '"]').prop('disabled', true);
        } else {
            $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__options-item .checkbox__input[data-id="' + $(this).attr('data-snap') + '"]').prop('disabled', false);
        }
        
        let pack_name;
        $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__packages-container .conf-widget__packages .conf-widget__package').each(function() {
            if ($(this).find('input').is(':checked')) {
                pack_name = $(this).find('.conf-widget__package-name').text();
            }
        });
    });

    /**
     * Переключение изображения на стандартное при отключении связанного модуля
     */
    $('.conf-widget__options-item .checkbox__input').click(function () {
        let disabled_name = $(this).attr('data-id'),
            active_el;

        if ($(this).is(':not(:checked)')) {
            $(conditions + '[data-simbol-code="' + code_product + '"] [data-specification="modules-img"][data-modul-binding="' + disabled_name + '"]').each(function () {
                if ($(this).is(':visible') && $(conditions + '[data-simbol-code="' + code_product + '"] .conf-widget__options .conf-widget__options-item[data-id-modul="' + $(this).attr('data-id-modul') + '"] .checkbox__input').is(':checked')) {
                    active_el = $(this).attr('data-id-modul');
                    $(this).css("opacity", "0");
                    $(this).attr('data-active', '');
                    $(conditions + '[data-simbol-code="' + code_product + '"] [data-specification="modules-img"][data-id-modul="' + active_el + '"][data-modul-binding="-"]').css('opacity', '1');
                    $(conditions + '[data-simbol-code="' + code_product + '"] [data-specification="modules-img"][data-id-modul="' + active_el + '"][data-modul-binding="-"]').attr('data-active', 'Y');
                }
            });
        } else {
            $(conditions + '[data-simbol-code="' + code_product + '"] [data-specification="modules-img"][data-modul-binding="' + disabled_name + '"]').each(function () {
                if ($(this).is(':visible') && $(conditions + '[data-simbol-code="' + code_product + '"] .conf-widget__options .conf-widget__options-item[data-id-modul="' + $(this).attr('data-id-modul') + '"] .checkbox__input').is(':checked')) {
                    active_el = $(this).attr('data-id-modul');
                    $(this).css("opacity", "0");
                    $(this).attr('data-active', '');
                    $(conditions + '[data-simbol-code="' + code_product + '"] [data-specification="modules-img"][data-id-modul="' + active_el + '"][data-modul-binding="-"]').css('opacity', '0');
                    $(conditions + '[data-simbol-code="' + code_product + '"] [data-specification="modules-img"][data-id-modul="' + active_el + '"][data-modul-binding="-"]').attr('data-active', '');
                    $(conditions + '[data-simbol-code="' + code_product + '"] [data-specification="modules-img"][data-id-modul="' + active_el + '"][data-modul-binding="' + disabled_name + '"]').css('opacity', '1');
                    $(conditions + '[data-simbol-code="' + code_product + '"] [data-specification="modules-img"][data-id-modul="' + active_el + '"][data-modul-binding="' + disabled_name + '"]').attr('data-active', 'Y');
                }
            });
        }
    });

    /**
     * Выбор пакета
     */
    $('.conf-widget__packages-container .conf-widget__packages .conf-widget__package').click(function () {
        let get_code = $(this).attr('data-simbol-code');
        const modName = $(conditions + '[data-simbol-code="'+get_code+'"]').attr('data-mods-name');

        let modul_img = $(this).attr('data-modul-collection').split(',');
        let pack_name = $(this).find('.conf-widget__package-name').text();
        
        $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__options .conf-widget__options-item').each(function (index, el) {
            if ($(el).attr('data-sim-code') !== "color") {
                if ($(el).attr('data-default') !== "default" && $(el).attr('data-sim-code') != "color") {
                    $(el).find('input').prop('disabled', false);
                    $(el).find('input').prop('checked', false);
                }
                if ($(el).find('input').is(':checked')) {
                    $(el).find('input').click();
                }
                if ($(el).find('input').attr('data-was-on') === 'Y' && !$(el).find('input').is(':checked')) {
                    $(el).find('input').removeAttr('data-was-on');
                    if ($(el).find('input').is(':disabled')) {
                        $(el).find('input').prop('disabled', false);
                        $(el).find('input').click();
                        $(el).find('input').prop('disabled', true);
                    } else {
                        $(el).find('input').click();
                    }
                }
            }
        });

        if ($(this).find('input.conf-widget__package-input').is(':checked')) {
            $(conditions + '[data-simbol-code="' + get_code + '"] img[data-specification="modules-img"]').css('opacity', '0');
            $(conditions + '[data-simbol-code="' + get_code + '"] img[data-specification="modules-img"]').attr('data-active', '');
            $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__options .conf-widget__options-item').each(function () {
                if ($(this).find('input').attr('data-default') === "default") {
                    $(this).find('input').change();
                }
            });
            $.each (modul_img, function(key, val) {
                $(conditions + '[data-simbol-code="' + get_code + '"] img[data-specification="modules-img"][data-id-modul="' + val + '"]').attr('data-active', 'Y');
                $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__options .conf-widget__options-item[data-id-modul="' + val + '"]').attr('data-pack-active', pack_name);
            });
            $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__options .conf-widget__options-item[data-pack-active="' + pack_name + '"]').find('input').click();
            $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__options .conf-widget__options-item[data-pack-active="' + pack_name + '"]').find('input').prop('checked', true);
            $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__options .conf-widget__options-item[data-pack-active="' + pack_name + '"]').find('input').prop('disabled', true);

        } else {
            $(conditions + '[data-simbol-code="' + get_code + '"] img[data-specification="modules-img"]').attr('data-active', '');

            $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__options .conf-widget__options-item[data-pack-active="' + pack_name + '"]').find('input').prop('disabled', false);

            $(conditions + '[data-simbol-code="' + get_code + '"] .conf-widget__options .conf-widget__options-item').each(function () {
                if ($(this).attr('data-sim-code') !== "color") {
                    if ($(this).find('input').is(':disabled')) {
                    
                    } else {
                        $(this).find('input').change();
                    }
                    if ($(this).attr('data-pack-active') === pack_name) {
                        $(this).removeAttr('data-pack-active');
                    }
    
                    if ($(this).attr('data-default') != "default" && $(this).find('input').is(':checked')) {
                        $(this).find('input').change();
                        $(this).find('input').prop('checked', false);
                    }
                }
                

            });
        }
    });

    /**
     * Перемещение через верхнее меню
     */
    $('li.conf-nav__item_status_success').click(function () {
        let get_block_id = $(this).attr('data-block-id'),
            get_model_name = $(this).attr('data-model-name');

        $('section').css('display', 'none');
        if (get_block_id != "first-page") {
            $('section[data-page="' + get_block_id + '"][data-simbol-code="' + get_model_name + '"]').css('display', 'block');
            if (get_block_id === "equipment") {
                $(conditions + '[data-simbol-code="' + code_product + '"] .conf-widget__packages-container .conf-widget__packages .conf-widget__package').each(function () {
                    $(this).click();
                    $(this).find('input').prop('checked', false);
                });
            }
            
        } else {
            $(conditions + '[data-simbol-code="' + code_product + '"] .conf-widget__packages-container .conf-widget__packages .conf-widget__package').each(function () {
                $(this).click();
                $(this).find('input').prop('checked', false);
            });
            code_product = "";
            $('section[data-page="' + get_block_id + '"]').css('display', 'block');
        }
    });

    /**
     * Получение get параметров
     * @param {String} url 
     * @returns String
     */
    function getAllUrlParams(url) {

        // извлекаем строку из URL или объекта window
        var queryString = url ? url.split('?')[1] : window.location.search.slice(1);
      
        // объект для хранения параметров
        var obj = {};
      
        // если есть строка запроса
        if (queryString) {
      
          // данные после знака # будут опущены
          queryString = queryString.split('#')[0];
      
          // разделяем параметры
          var arr = queryString.split('&');
      
          for (var i=0; i<arr.length; i++) {
            // разделяем параметр на ключ => значение
            var a = arr[i].split('=');
      
            // обработка данных вида: list[]=thing1&list[]=thing2
            var paramNum = undefined;
            var paramName = a[0].replace(/\[\d*\]/, function(v) {
              paramNum = v.slice(1,-1);
              return '';
            });
      
            // передача значения параметра ('true' если значение не задано)
            var paramValue = typeof(a[1])==='undefined' ? true : a[1];
      
            // преобразование регистра
            paramName = paramName.toLowerCase();
            paramValue = paramValue.toLowerCase();
      
            // если ключ параметра уже задан
            if (obj[paramName]) {
              // преобразуем текущее значение в массив
              if (typeof obj[paramName] === 'string') {
                obj[paramName] = [obj[paramName]];
              }
              // если не задан индекс...
              if (typeof paramNum === 'undefined') {
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
});
