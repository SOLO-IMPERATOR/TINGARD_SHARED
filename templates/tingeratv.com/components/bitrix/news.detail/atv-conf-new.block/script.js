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

$(window).load(function() {
    if ($('#conditions').length > 0) {
        $('#conditions .conf-widget__packages-container .conf-widget__packages .conf-widget__package').each(function () {
            if ($(this).find('.conf-widget__package-input').is(':checked')) {
                $(this).click();
            }
        });
    }

    let selected_mod = $('#conditions').attr('data-mods-name');
    let first_color = $('#conditions .conf-widget__color-list .conf-widget__color-item').first().find('input').val();

    // показать изображение с нужным цветом
    $('#conditions .conf-widget__swiper img.conf-layers__img[data-name="color"]').css('display', 'none');
    if ($('#conditions .conf-widget__color-list').length > 0) {
        $('#conditions .conf-widget__swiper img.conf-layers__img[data-name="color"][data-color-body="' + selected_mod + " " + first_color + '"]').css('display', 'block');
    } else {
        $('#conditions .conf-widget__swiper img.conf-layers__img[data-name="color"][data-color-body="' + selected_mod + '"]').css('display', 'block');
    }

    // Выбрать первый цвет
    $('#conditions .conf-widget__color-list .conf-widget__color-item').first().find('input').click();
    $('#conditions .conf-widget__color-list .conf-widget__color-item').first().find('input').change();

    $('#conditions .conf-widget__packages-container .conf-widget__packages .conf-widget__package').css('display', 'none');
    $('#conditions .conf-widget__packages-container .conf-widget__packages .conf-widget__package[data-modul-name="' + selected_mod + '"]').css('display', 'block');

    $('#conditions .conf-widget__options .conf-widget__options-item').css('display', 'none');
    $('#conditions .conf-widget__options .conf-widget__options-item[data-mods-name="' + selected_mod + '"]').css('display', 'block');

    $('#conditions .conf-widget__options .conf-widget__options-item').each(function () {
        if ($(this).attr('data-default') === "default" && $(this).find('input').is(':checked')) {
            $(this).find('input').change();
        }
    });

    if ($('section#equipment').length > 0) {
        $('section#equipment .conf-widget__package input').first().change();
        $('section#equipment .conf-widget__package input').first().click();
    }

    if ($('section#engine').length > 0) {
        $('section#engine .conf-widget__package input').first().change();
        $('section#engine .conf-widget__package input').first().click();
    }

    $('.model-colors .model-colors__list .model-colors__list-item').first().click();
    // $('.model-colors .model-colors__list .model-colors__list-item[data-name-color="танковый"]').css('display', 'block');
});

$(document).ready(function () {
    let code_product = $('#conditions').attr('data-simbol-code');

    /**
     * Работа с модификациями
     */
    $('section#equipment .conf-widget__package input').change(function () {
        let selected_mod = $(this).attr("data-model");
        let model_price = Number($(this).val());
        let standart_price = Number($('section#equipment .conf-widget__total .section-subtitle').attr('data-standart-price'));
        let total_price = 0;

        $('section#equipment .conf-layers img').css('display', 'none');
        $('section#equipment .conf-layers img[data-mods-name="' + selected_mod + '"]').css('display', 'block');

        $('section#equipment .conf-widget__options tbody .table__row').css('display', 'none');
        $('section#equipment .conf-widget__options tbody .table__row[data-mods-name="' + selected_mod + '"]').css('display', 'table-row');

        total_price = standart_price + model_price;

        $('section#equipment .conf-widget__total .section-subtitle').text('Итого: ' + Number(total_price).toLocaleString('ru-RU') + ' руб.');
    });

    /**
     * Смена цвета
     */
    $('.radio__input').change(function() {
        let get_code = $(this).attr('data-simbol-code');
        let get_mod_name = $(this).closest('#conditions').attr('data-mods-name');
        let free = $(this).attr('data-free');

        $('#conditions .conf-widget__color-selected .conf-widget__color').text($(this).val());
        $('#conditions .conf-widget__color-selected .conf-widget__color').css("color", $(this).attr('data-color'));

        $('#conditions .conf-layers__img[data-name="color"]').css('display', 'none');
        $('#conditions .conf-layers__img[data-name="color"][data-color-body="' + get_mod_name + " " + $(this).val() + '"]').css('display', 'block');
        
        if (free !== '1') {
            $('#conditions .conf-widget__options-item[data-sim-code="color"] .checkbox__input').prop('checked', true);
        } else {
            $('#conditions .conf-widget__options-item[data-sim-code="color"] .checkbox__input').prop('checked', false);
        }
        $('#conditions .conf-widget__options-item[data-sim-code="color"] .checkbox__input').change();
        color = $(this).val();
    });

    /**
     * Установка модулей
     */
     let active_modules = [];
     $('#conditions .conf-widget__options-item .checkbox__input').change(function () {
         let get_code = $(this).attr('data-simbol-code');
         let total_price = Number($('#conditions[data-simbol-code="' + get_code + '"] .conf-widget__total .conf-numbers.conf-numbers_place_conf-widget .conf-numbers__item.margin_b_s .conf-numbers__price').attr('data-mod-price').replace(/\D+/g, ''));
         let main_total_price = Number($('#conditions[data-simbol-code="' + get_code + '"] .conf-widget__total .conf-numbers.conf-numbers_place_conf-widget .section-subtitle').attr('data-total-price').replace(/\D+/g, ''));
         let name = $(this).attr('data-id');
         let pack_price = Number($('#conditions[data-simbol-code="' + get_code + '"] .conf-widget__total .conf-numbers.conf-numbers_place_conf-widget .section-subtitle').attr('data-pack-price').replace(/\D+/g, ''));
         let get_hidden_par = $(this).attr('data-hide');
         let get_block_name = $(this).attr('data-block-mods');
         let get_blocked_name = $(this).attr('data-blocked-mods');
         let id_block;
 
         // Изменение цены при активации пакета
         if ($('#conditions[data-simbol-code="' + get_code + '"] .conf-widget__packages-container .conf-widget__packages.margin_b_s .conf-widget__package .conf-widget__package-input').is(':checked')) {
             main_total_price = pack_price;
         }
 
         // Проверка на изменение изображений при включении определённых модулей и их установка
         if ($('#conditions[data-simbol-code="' + get_code + '"] .conf-widget__options-item .checkbox__input[data-id="' + name + '"]').is(':checked')) {
             active_modules.push(name);
             let existing_modules = [];
             $('#conditions[data-simbol-code="' + get_code + '"] #layer-front [data-specification="modules-img"][data-id-modul="' + name + '"]').each(function () {
                 const a = $(this).attr('data-modul-binding');
 
                 if (active_modules.indexOf(a) >= 0) {
                     existing_modules.push(a);
                 }
             });
             $('#conditions[data-simbol-code="' + get_code + '"] .swiper.conf-widget__swiper.margin_b_s .conf-layers .conf-layers__img[data-id-modul="' + name + '"]').css("opacity", '0');
             if (existing_modules != 0) {
                 $.each(existing_modules, function (key, val) {
                     $('#conditions[data-simbol-code="' + get_code + '"] .conf-layers [data-specification="modules-img"][data-id-modul="' + name + '"][data-modul-binding="' + val + '"]').css("opacity", '1');
                     $('#conditions[data-simbol-code="' + get_code + '"] .conf-layers [data-specification="modules-img"][data-id-modul="' + name + '"][data-modul-binding="' + val + '"]').attr('data-active', 'Y');
                 }); 
             } else {
                 $('#conditions[data-simbol-code="' + get_code + '"] .conf-layers [data-specification="modules-img"][data-id-modul="' + name + '"][data-modul-binding="-"]').css("opacity", '1');
                 $('#conditions[data-simbol-code="' + get_code + '"] .conf-layers [data-specification="modules-img"][data-id-modul="' + name + '"][data-modul-binding="-"]').attr('data-active', 'Y');
             }
 
             if (get_block_name != '') {
                 $('#conditions[data-simbol-code="' + get_code + '"] .conf-widget__options-item .checkbox__input').each(function () {
                     if ($(this).attr('data-blocked-mods') === get_block_name && $(this).attr('data-id') !== name) {
                         $(this).prop('disabled', true);
                         $(this).prop('checked', false);
                         id_block = $(this).attr('data-id');
                         
                         $('#conditions[data-simbol-code="' + get_code + '"] .conf-widget__options-item .checkbox__input').each(function () {
                             if ($(this).attr('data-snap') === id_block && $(this).attr('data-id') !== name) {
                                 $(this).prop('disabled', true);
                                 $(this).prop('checked', false);
                             }
                         });
     
                     }
                 });
             }
             if (get_hidden_par.search('_') != -1) {
                 $('#conditions[data-simbol-code="' + get_code + '"] img[data-specification="modules-img"]').each(function () {
                     if ($(this).attr('data-hide') === get_hidden_par) {
                         $(this).css('opacity', '0');
                         $(this).css('display', 'none');
                     }
                 });
             }
 
         } else {
             $('#conditions[data-simbol-code="' + get_code + '"] .swiper.conf-widget__swiper.margin_b_s .conf-layers .conf-layers__img[data-id-modul="' + name + '"]').css("opacity", '0');
             $('#conditions[data-simbol-code="' + get_code + '"] .swiper.conf-widget__swiper.margin_b_s .conf-layers .conf-layers__img[data-id-modul="' + name + '"]').css("display", 'block');
             $('#conditions[data-simbol-code="' + get_code + '"] .swiper.conf-widget__swiper.margin_b_s .conf-layers .conf-layers__img[data-id-modul="' + name + '"]').attr('data-active', '');
             active_modules = active_modules.filter(function (f) {return f !== name});
 
             $('#conditions[data-simbol-code="' + get_code + '"] .conf-widget__options .conf-widget__options-item').each(function () {
                 if ($(this).attr('data-default') == "default" && $(this).find('input').is(':checked')) {
                     $(this).find('input').change();
                 }
             });
 
             if (get_block_name != '') {
                 $('#conditions[data-simbol-code="' + get_code + '"] .conf-widget__options-item .checkbox__input').each(function () {
                     if ($(this).attr('data-blocked-mods') === get_block_name && $(this).attr('data-id') !== name) {
                         $(this).prop('disabled', false);
                         id_block = $(this).attr('data-id');
                         
                         $('#conditions[data-simbol-code="' + get_code + '"] .conf-widget__options-item .checkbox__input').each(function () {
                             if ($(this).attr('data-snap') === id_block && $(this).attr('data-id') !== name) {
                                 $(this).prop('disabled', false);
                             }
                         });
                     }
                 });
             }
             if (get_hidden_par.search('_') != -1) {
                 $('#conditions[data-simbol-code="' + get_code + '"] img[data-specification="modules-img"]').each(function () {
                     if ($(this).attr('data-hide') === get_hidden_par) {
                         $(this).css('display', 'block');
                     }
                 });
             }
 
         }
 
         // Активация связаных модулей
         if ($(this).attr('data-snap') != '' && $(this).is(":checked")) {
             $('#conditions[data-simbol-code="' + get_code + '"] .conf-widget__options-item .checkbox__input[data-id="' + $(this).attr('data-snap') + '"]').prop('checked', true);
             $('#conditions[data-simbol-code="' + get_code + '"] .conf-widget__options-item .checkbox__input[data-id="' + $(this).attr('data-snap') + '"]').change();
             $('#conditions[data-simbol-code="' + get_code + '"] .conf-widget__options-item .checkbox__input[data-id="' + $(this).attr('data-snap') + '"]').prop('disabled', true);
         } else {
             $('#conditions[data-simbol-code="' + get_code + '"] .conf-widget__options-item .checkbox__input[data-id="' + $(this).attr('data-snap') + '"]').prop('disabled', false);
         }
         
        let pack_name;
        $('#conditions[data-simbol-code="' + get_code + '"] .conf-widget__packages-container .conf-widget__packages .conf-widget__package').each(function() {
            if ($(this).find('input').is(':checked')) {
                pack_name = $(this).find('.conf-widget__package-name').text();
            }
        });

        // Прибавление цены модуля к итоговой
        $('#conditions[data-simbol-code="' + get_code + '"] .conf-widget__options-item').each(function(){
            if ($(this).find('.checkbox__input').is(':checked')) {
                if (pack_name != undefined) {
                    if ($(this).attr('data-pack-active') != pack_name) {
                        total_price += Number($(this).attr('data-price').replace(/\D+/g, ''));
                        main_total_price += Number($(this).attr('data-price').replace(/\D+/g, ''));
                    }
                } else {
                    total_price += Number($(this).attr('data-price').replace(/\D+/g, ''));
                    main_total_price += Number($(this).attr('data-price').replace(/\D+/g, ''));
                }
            }
        });
 
         $('#conditions[data-simbol-code="' + get_code + '"] .conf-widget__total .conf-numbers__price').text(Number(total_price).toLocaleString('ru-RU') + ' руб.');
         $('#conditions[data-simbol-code="' + get_code + '"] .conf-widget__total .conf-numbers.conf-numbers_place_conf-widget .section-subtitle').text('Итого: ' + Number(main_total_price).toLocaleString('ru-RU') + ' руб.');
     });

    /**
     * Переключение изображения на стандартное при отключении связанного модуля
     */
    $('.conf-widget__options-item .checkbox__input').click(function () {
        let disabled_name = $(this).attr('data-id'),
            active_el;


        if ($(this).is(':not(:checked)')) {
            $('#conditions img[data-specification="modules-img"][data-modul-binding="' + disabled_name + '"]').each(function () {
                if ($(this).is(':visible') && $('#conditions .conf-widget__options .conf-widget__options-item[data-id-modul="' + $(this).attr('data-id-modul') + '"] .checkbox__input').is(':checked')) {
                    active_el = $(this).attr('data-id-modul');
                    $(this).css("opacity", "0");
                    $(this).attr('data-active', '');
                    $('#conditions img[data-specification="modules-img"][data-id-modul="' + active_el + '"][data-modul-binding="-"]').css('opacity', '1');
                    $('#conditions img[data-specification="modules-img"][data-id-modul="' + active_el + '"][data-modul-binding="-"]').attr('data-active', 'Y');
                }
            });
        } else {
            $('#conditions img[data-specification="modules-img"][data-modul-binding="' + disabled_name + '"]').each(function () {
                if ($(this).is(':visible') && $('#conditions .conf-widget__options .conf-widget__options-item[data-id-modul="' + $(this).attr('data-id-modul') + '"] .checkbox__input').is(':checked')) {
                    active_el = $(this).attr('data-id-modul');
                    $(this).css("opacity", "0");
                    $(this).attr('data-active', '');
                    $('#conditions img[data-specification="modules-img"][data-id-modul="' + active_el + '"][data-modul-binding="-"]').css('opacity', '0');
                    $('#conditions img[data-specification="modules-img"][data-id-modul="' + active_el + '"][data-modul-binding="-"]').attr('data-active', '');
                    $('#conditions img[data-specification="modules-img"][data-id-modul="' + active_el + '"][data-modul-binding="' + disabled_name + '"]').css('opacity', '1');
                    $('#conditions img[data-specification="modules-img"][data-id-modul="' + active_el + '"][data-modul-binding="' + disabled_name + '"]').attr('data-active', 'Y');
                }
            });
        }
    });

    /**
     * Выбор пакета
     */
     $('#conditions .conf-widget__packages-container .conf-widget__packages .conf-widget__package').click(function () {
        let get_code = $(this).attr('data-simbol-code');
        let get_pack_price = Number($(this).find('input.conf-widget__package-input').attr('data-price-pack')).toLocaleString('ru-RU');
        let total_price = $('#conditions[data-simbol-code="' + get_code + '"] .conf-widget__total .conf-numbers.conf-numbers_place_conf-widget .section-subtitle').attr('data-total-price');
        let pack_name = $(this).find('.conf-widget__package-name').text();
        let pack_modul_price = 0;
        let modul_img = $(this).attr('data-modul-collection').split(',');
        
        
        $('#conditions[data-simbol-code="' + get_code + '"] .conf-widget__options .conf-widget__options-item').each(function () {
            if ($(this).attr('data-pack-active') !== undefined) {
                $(this).find('input').prop('checked', false);
                $(this).find('input').prop('disabled', false);
            }
            if ($(this).find('input').is(':checked')) {
                $(this).find('input').click();
            }
        });

        if ($(this).find('input.conf-widget__package-input').is(':checked')) {
            $('#conditions[data-simbol-code="' + get_code + '"] img[data-specification="modules-img"]').css('opacity', '0');
            $('#conditions[data-simbol-code="' + get_code + '"] img[data-specification="modules-img"]').attr('data-active', '');
            $('#conditions[data-simbol-code="' + get_code + '"] .conf-widget__total .conf-numbers.conf-numbers_place_conf-widget .section-subtitle').attr('data-pack-price', get_pack_price);
            $('#conditions[data-simbol-code="' + get_code + '"] .conf-widget__options .conf-widget__options-item').each(function () {
                if ($(this).find('input').attr('data-default') === "default") {
                    $(this).find('input').change();
                }
            });
            $.each (modul_img, function(key, val) {
                $('#conditions[data-simbol-code="' + get_code + '"] img[data-specification="modules-img"][data-id-modul="' + val + '"]').attr('data-active', 'Y');
                $('#conditions[data-simbol-code="' + get_code + '"] .conf-widget__options .conf-widget__options-item[data-id-modul="' + val + '"]').attr('data-pack-active', pack_name);
            });
            $('#conditions[data-simbol-code="' + get_code + '"] .conf-widget__options .conf-widget__options-item[data-pack-active="' + pack_name + '"]').find('input').click();
            $('#conditions[data-simbol-code="' + get_code + '"] .conf-widget__options .conf-widget__options-item[data-pack-active="' + pack_name + '"]').find('input').prop('checked', true);
            $('#conditions[data-simbol-code="' + get_code + '"] .conf-widget__options .conf-widget__options-item[data-pack-active="' + pack_name + '"]').find('input').prop('disabled', true);

            pack_modul_price = Number(get_pack_price.replace(/\D+/g, '')) - Number(total_price.replace(/\D+/g, ''));

            $('#conditions[data-simbol-code="' + get_code + '"] .conf-widget__total .conf-numbers__price').attr('data-mod-price', pack_modul_price);
            $('#conditions[data-simbol-code="' + get_code + '"] .conf-widget__total .conf-numbers__price').text(Number(pack_modul_price).toLocaleString('ru-RU') + " руб.");

            $('#conditions[data-simbol-code="' + get_code + '"] .conf-widget__total .conf-numbers.conf-numbers_place_conf-widget .section-subtitle').text('Итого: ' + get_pack_price + ' руб.');
        } else {
            $('#conditions[data-simbol-code="' + get_code + '"] .conf-widget__total .conf-numbers.conf-numbers_place_conf-widget .section-subtitle').attr('data-pack-price', '');
            $('#conditions[data-simbol-code="' + get_code + '"] img[data-specification="modules-img"]').attr('data-active', '');

            $('#conditions[data-simbol-code="' + get_code + '"] .conf-widget__options .conf-widget__options-item[data-pack-active="' + pack_name + '"]').find('input').prop('disabled', false);

            $('#conditions[data-simbol-code="' + get_code + '"] .conf-widget__options .conf-widget__options-item').each(function () {
                if ($(this).find('input').is(':disabled')) {
                
                } else {
                    $(this).find('input').change();
                }
                if ($(this).attr('data-pack-active') === pack_name) {
                    $(this).removeAttr('data-pack-active');
                }

                if ($(this).attr('data-default') == "default" && $(this).find('input').is(':checked')) {
                    $(this).find('input').change();
                }
            });

            pack_modul_price = 0;

            $('#conditions[data-simbol-code="' + get_code + '"] .conf-widget__total .conf-numbers__price').attr('data-mod-price', pack_modul_price);
            $('#conditions[data-simbol-code="' + get_code + '"] .conf-widget__total .conf-numbers__price').text(Number(pack_modul_price).toLocaleString('ru-RU') + " руб.");

            $('#conditions[data-simbol-code="' + get_code + '"] .conf-widget__total .conf-numbers.conf-numbers_place_conf-widget .section-subtitle').text('Итого: ' + Number(total_price.replace(/\D+/g, '')).toLocaleString('ru-RU') + " руб.");
        }
    });

    /**
     * Присвоение названия
     */
    $('[data-assign-data-form="btn-order"]').click(function () {
        $('form#popup-form').attr('data-form-name', $(this).attr('data-model-shortname'));
        $('form#popup-form').attr('data-form-binding', $(this).attr('data-binding'));
    });

});
