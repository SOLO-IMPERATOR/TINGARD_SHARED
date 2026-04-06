function initDealers() {
    let map = new ymaps.Map('dealers', {
        center: [55, 70],
        zoom: 3,
        controls: [],
    });

    function placemark(coord, dealer) {
        myPlacemark = new ymaps.Placemark(coord, {
                balloonContentHeader: dealer[0],
                balloonContentBody: dealer[1],
                balloonContentFooter: dealer[2]
            }, {
                iconLayout: 'default#image',
                iconImageHref: '/local/templates/tinger/img/dealers-point.svg',
                iconImageSize: [30, 40],
                iconImageOffset: [-15, -40]
            });
        return myPlacemark;
    }


    const dealersSelector = document.querySelector('[data-entity="dealers"]');
    const dealersSelect = dealersSelector.querySelector('[data-entity="dealers-select"]');
    const dealersItems = dealersSelector.querySelectorAll('[data-entity="dealers-item"]');
    const dealersListSelector = dealersSelector.querySelector('[data-entity="dealers-list"]');
    const DEALER_ACTIVE_CLASS = 'dealers__item_active';

    dealersListSelector.addEventListener('click', (event) => {
        const currentDealerSelector = event.target.closest('[data-entity="dealers-item"]');
        if (currentDealerSelector) {
            const dealerCoorinates = currentDealerSelector.dataset.dealerCoordinates.split(', ').map(Number);
            dealersListSelector.querySelectorAll('.dealers__item_active').forEach(element => {
                element.classList.remove(DEALER_ACTIVE_CLASS);
            });
    
            currentDealerSelector.classList.add(DEALER_ACTIVE_CLASS);
    
            map.setZoom(13);
            map.panTo(dealerCoorinates);
        } else {
            return;
        }

    })

    dealersItems.forEach(dealerItem => {
        const dealerName = dealerItem.dataset.dealerName;
        const dealerAddress = dealerItem.dataset.dealerAddress;
        const dealerPhone = dealerItem.dataset.dealerPhone;
        const dealerCoordinates = dealerItem.dataset.dealerCoordinates.split(', ').map(Number);

        map.geoObjects.add(placemark(dealerCoordinates, [dealerName, dealerAddress, dealerPhone]));
    });

    dealersSelect.addEventListener('change', (event) => {
        dealersItems.forEach(dealerItem => {
            if(dealerItem.dataset.dealerCity === event.target.value) {
                dealerItem.style.display = 'block';
            } else {
                dealerItem.style.display = 'none';
            }
            
        });
        
    })

    
}

ymaps.ready(initDealers);