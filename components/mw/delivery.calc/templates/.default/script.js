/* 
 Comment Text 
*/

BX.ready(function(){
    let formUser = document.getElementById('delivery-calc');
    let successSend = document.getElementById('success-box')
    let errorSend = document.getElementById('error-box')

    BX.bindDelegate(
        document.body, 'click', {className: 'btn_submit' },
        function(e){
            if(!e) {
                e = window.event;
            }
            console.log('Отправляем заявку на расчет доставки')
            data = new FormData(formUser);
            let addressFrom = data.get('address-from');
            let addressTo = data.get('address-to');
            let transport = data.get('transport');
            let timeDelivery = data.get('time');
            let validFlag = true;
            let submitSend = document.getElementById('submitSend')
            submitSend.classList.add('btn_status_loading')

            // проверка на заполнение обязательных полей
            if(addressFrom == '' || addressTo =='' || transport =='' || timeDelivery =='') validFlag = false;

            if(validFlag) {
                errorSend.style.display = 'none';
                BX.ajax({
                    url: '/local/ajax/delivery_calc.php',  //адрес на который передаются данные с формы
                    method: 'POST',         //метод передачи данных POST или GET
                    dataType: 'html',       //тип передаваемых данных
                    data: data,
                    processData: false,     //
                    preparePost: false,     //предобработка передаваемых данных
                    onsuccess: function(data){  //в случаи успеха, выполняем действия
                        console.log(data)
                        submitSend.classList.remove('btn_status_loading')
                        let resultRequest = JSON.parse(data);
                        console.log(resultRequest);
                        if(resultRequest.result){
                            successSend.style.display = 'block';
                        }else {
                            errorSend.style.display = 'block';
                        }

                    },
                    onfailure: function(){  //действия в случаи ошибки
                        console.log('error') //выводим в результате ошибки, сообщение об ошибки
                    }
                });
            }else {
                // показываем ошибку
                errorSend.style.display = 'block';
                submitSend.classList.remove('btn_status_loading')
            }
            return BX.PreventDefault(e);
        }
    );
});