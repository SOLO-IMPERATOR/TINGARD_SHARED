
function opneModal(modal) {

}

document.addEventListener('DOMContentLoaded', function () {
    // 1. Собираем все элементы один раз
    const buttonsOpenModal = document.querySelectorAll('.header_city, .choose-city, .nav-name-city');
    const overlayWrapper = document.querySelector('.overlay-wrapper');
    const closeModalCity = document.querySelector('.close-modal-city');
    const selectNameCity = document.querySelector('.name-city');
    const listCity = document.querySelector('.list-city');
    const detectBtn = document.querySelector('.detect-city');
    const searchInput = document.querySelector('.input-search-city'); // проверь, есть ли этот класс в HTML



    // 2. Логика открытия модалки (все действия при клике в одном месте)
    buttonsOpenModal.forEach(button => {
        button.addEventListener('click', function () {
            overlayWrapper.classList.add('isActive');
            // Сразу сбрасываем поиск при открытии
            if (searchInput) {
                searchInput.value = "";
                const items = listCity.querySelectorAll('li');
                items.forEach(li => li.style.display = "");
            }

        });
    });
    document.querySelector('.btn-city-mobile .yes')?.addEventListener('click', function () {
        const cityDefault = 84;
        BX.ajax.runComponentAction(
            'soloimperator:user.geodata',
            'setCity',
            {
                mode: 'class',
                data: {
                    'cityCode': cityDefault
                }
            }
        )
        $('.header-city-mobile').remove();
    });
    document.querySelector('.close-mobile-city')?.addEventListener('click', function () {


        $('.header-city-mobile').remove();
    });




    // 3. Закрытие модалки
    if (closeModalCity) {
        closeModalCity.addEventListener('click', () => overlayWrapper.classList.remove('isActive'));
    }

    overlayWrapper.addEventListener('click', (e) => {
        if (e.target === overlayWrapper) overlayWrapper.classList.remove('isActive');
    });

    // 4. Выбор города из списка (Делегирование)
    if (listCity) {
        listCity.addEventListener('click', function (e) {
            if (e.target.tagName === "LI") {
                const cityCode = e.target.dataset.cityCode;
                if (!cityCode) {
                    console.error('CityCode is empty')
                }
                BX.ajax.runComponentAction(
                    'soloimperator:user.geodata',
                    'setCity',
                    {
                        mode: 'class',
                        data: {
                            'cityCode': cityCode
                        }
                    }
                ).then(function (response) {
                    if (response.data.result === true) {
                        window.location.reload();
                    }
                }, function (response) {
                    console.error('Ошибки:', response.errors);
                    alert('Не удалось выбрать город! Повторите попытку');
                });
            }
        });
    }

    // 5. Поиск городов
    if (searchInput && listCity) {
        searchInput.addEventListener('input', function () {
            const filter = searchInput.value.toLowerCase().trim();
            const items = listCity.querySelectorAll('li'); // берем актуальный список

            items.forEach(li => {
                const cityName = li.textContent.toLowerCase();
                li.style.display = cityName.includes(filter) ? "" : "none";
            });
        });
    }

    //    6. Геолокация
    if (detectBtn) {
        detectBtn.addEventListener('click', function (e) {
            e.preventDefault();
            BX.ajax.runComponentAction(
                'soloimperator:user.geodata',
                'setCity',
                {
                    mode: 'class',
                    data: {
                        'setAutomaticaly': true
                    }
                }
            ).then(function (response) {
                if (response.result === true) {
                    window.location.reload();
                }
            }, function (response) {
                console.error('Ошибки:', response.errors);
                alert('Не удалось выбрать город автоматически! Попробуйте еще раз или выбрерит город в ручную');
            });
        });
    }
});

