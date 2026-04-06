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

const conditions = document.getElementById('conditions');

window.addEventListener('load', function () {

/*     if (conditions) {
        const packageItems = conditions.querySelectorAll('.conf-widget__package');
        console.log(packageItems);
        packageItems.forEach(function (item) {
            if (item.querySelector('.conf-widget__package-input').checked) {
                item.click();
            }
        });
    } */

    const selectedMod = conditions.getAttribute('data-mods-name');

    const firstColorInput = conditions.querySelector('.conf-widget__color-list .conf-widget__color-item input');
    const firstColor = firstColorInput.value;

    // показать изображение с нужным цветом
    const colorImages = conditions.querySelectorAll('.conf-layers__img[data-name="color"]');
    colorImages.forEach(function (image) {
        image.style.display = 'none';
    });

    colorImages.forEach(function (image) {
        const dataColorBody = image.getAttribute('data-color-body');
        if (dataColorBody === selectedMod + " " + firstColor || (!conditions.querySelector('.conf-widget__color-list') && dataColorBody === selectedMod)) {
            image.style.display = 'block';
        } else {
            image.style.display = 'none';
        }
    });

    // выбрать первый цвет
    if (firstColorInput) {
        firstColorInput.click();
        firstColorInput.dispatchEvent(new Event('change'));
    }

    const packageItems = conditions.querySelectorAll('.conf-widget__packages-container .conf-widget__packages .conf-widget__package');

    packageItems.forEach(item => item.style.display = 'none');
    const selectedModPackageItems = conditions.querySelectorAll(`.conf-widget__package[data-modul-name="${selectedMod}"]`);
    selectedModPackageItems.forEach(item => item.style.display = 'block');

    const optionItems = conditions.querySelectorAll('.conf-widget__options-item');

    optionItems.forEach(item => item.style.display = 'none');
    const selectedModOptionItems = conditions.querySelectorAll(`.conf-widget__options-item[data-mods-name="${selectedMod}"]`);
    selectedModOptionItems.forEach(item => item.style.display = 'block');

    optionItems.forEach(function (item) {
        if (item.getAttribute('data-default') === "default" && item.querySelector('input').checked) {
            item.querySelector('input').dispatchEvent(new Event('change'));
        }
    });

    const firstColorItem = conditions.querySelector('.model-colors__list-item');
    if (firstColorItem) {
        firstColorItem.click();
    }

});

document.addEventListener('DOMContentLoaded', function () {
    /* Смена цвета */
    conditions.querySelectorAll('[data-entity="color"]').forEach(function (input) {
        input.addEventListener('change', function () {
/*             let get_code = input.dataset.simbolCode; */
            let get_mod_name = conditions ? conditions.dataset.modsName : null;
            let free = input.dataset.free;

            conditions.querySelector('.conf-widget__color').textContent = input.value;
            conditions.querySelector('.conf-widget__color').style.color = input.dataset.color;

            const colors = conditions.querySelectorAll('.conf-layers__img[data-name="color"]');

            colors.forEach(function (element) {
                element.style.display = 'none';
            });

            const selectedColor = input.value;

            colors.forEach(function (image) {
                const dataColorBody = image.dataset.colorBody;
                if (dataColorBody === `${get_mod_name} ${selectedColor}`) {
                    image.style.display = 'block';
                } else {
                    image.style.display = 'none';
                }
            });

            const checkboxInput = conditions.querySelector('.conf-widget__options-item[data-sim-code="color"] .checkbox__input');
            if (checkboxInput) {
                const isChecked = free !== '1';
                checkboxInput.checked = isChecked;
                checkboxInput.dispatchEvent(new Event('change'));
            }


            /* для переключения цветов кунга переломки */
            const moduleCheckbox = conditions.querySelector('.conf-widget__options-item[data-id-modul="126"] input');
            if (moduleCheckbox && moduleCheckbox.checked) {
                const moduleImg = conditions.querySelectorAll('[data-specification="modules-img"][data-id-modul="126"]');
                if (moduleImg.length > 0) {
                    moduleImg.forEach(item => {
                        item.style.opacity = '0';
                        item.removeAttribute('data-active');
                    })
                    

                    const modulBinding = conditions.querySelectorAll('[data-specification="modules-img"][data-id-modul="126"][data-modul-binding="' + get_mod_name + ' ' + conditions.querySelector('input[name="confColor"]:checked').value + '"]');
                    if (modulBinding.length > 0) {
                        modulBinding.forEach(item => {
                            item.style.opacity = '1';
                            item.setAttribute('data-active', 'Y');
                        })
                        
                    }
                }
            }



        });
    });
    /**
     * Установка модулей
     */
    let active_modules = [];
    conditions.querySelectorAll('.conf-widget__options-item .checkbox__input').forEach(function (checkbox) {
        checkbox.addEventListener('change', function () {
            
            let get_code = this.getAttribute('data-simbol-code');
            const modName = conditions.getAttribute('data-mods-name');
        
            let name = $(this).attr('data-id');
            let get_hidden_par = $(this).attr('data-hide');
            let get_block_name = $(this).attr('data-block-mods');
            let id_block;


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

                if (name == '136') {
                    $('#conditions[data-simbol-code="' + get_code + '"] .conf-layers [data-specification="modules-img"][data-id-modul="' + name + '"][data-modul-binding="' + modName + ' ' + $("input[name='confColor']:checked").val() + '"]').css('opacity', '1');
                    $('#conditions[data-simbol-code="' + get_code + '"] .conf-layers [data-specification="modules-img"][data-id-modul="' + name + '"][data-modul-binding="' + modName + ' ' + $("input[name='confColor']:checked").val() + '"]').attr('data-active', 'Y');
                }

            } else {
                $('#conditions[data-simbol-code="' + get_code + '"] .swiper.conf-widget__swiper.margin_b_s .conf-layers .conf-layers__img[data-id-modul="' + name + '"]').css("opacity", '0');
                $('#conditions[data-simbol-code="' + get_code + '"] .swiper.conf-widget__swiper.margin_b_s .conf-layers .conf-layers__img[data-id-modul="' + name + '"]').css("display", 'block');
                $('#conditions[data-simbol-code="' + get_code + '"] .swiper.conf-widget__swiper.margin_b_s .conf-layers .conf-layers__img[data-id-modul="' + name + '"]').attr('data-active', '');
                active_modules = active_modules.filter(function (f) { return f !== name });

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
            $('#conditions[data-simbol-code="' + get_code + '"] .conf-widget__packages-container .conf-widget__packages .conf-widget__package').each(function () {
                if ($(this).find('input').is(':checked')) {
                    pack_name = $(this).find('.conf-widget__package-name').text();
                }
            });

        });


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
        let pack_name = $(this).find('.conf-widget__package-name').text();
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
            $('#conditions[data-simbol-code="' + get_code + '"] .conf-widget__options .conf-widget__options-item').each(function () {
                if ($(this).find('input').attr('data-default') === "default") {
                    $(this).find('input').change();
                }
            });
            $.each(modul_img, function (key, val) {
                $('#conditions[data-simbol-code="' + get_code + '"] img[data-specification="modules-img"][data-id-modul="' + val + '"]').attr('data-active', 'Y');
                $('#conditions[data-simbol-code="' + get_code + '"] .conf-widget__options .conf-widget__options-item[data-id-modul="' + val + '"]').attr('data-pack-active', pack_name);
            });
            $('#conditions[data-simbol-code="' + get_code + '"] .conf-widget__options .conf-widget__options-item[data-pack-active="' + pack_name + '"]').find('input').click();
            $('#conditions[data-simbol-code="' + get_code + '"] .conf-widget__options .conf-widget__options-item[data-pack-active="' + pack_name + '"]').find('input').prop('checked', true);
            $('#conditions[data-simbol-code="' + get_code + '"] .conf-widget__options .conf-widget__options-item[data-pack-active="' + pack_name + '"]').find('input').prop('disabled', true);

        } else {

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


        }
    });

});
