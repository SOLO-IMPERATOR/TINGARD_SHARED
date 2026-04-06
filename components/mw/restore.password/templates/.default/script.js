
BX.ready(function(){
    console.log('restorepassword')
    let formRestorePassword = document.getElementById('restore-password')
    let submitButton = document.getElementById('btn_submit_lk');
    let errorBox = document.getElementById('error-box')
    let successfulBox = document.getElementById('successful-box')
    BX.bindDelegate(
        document.body, 'click', {className: 'btn_submit_lk' },
        function(e){
            if(!e) {
                e = window.event;
            }
            console.log('restore password');

            submitButton.classList.add('btn_status_loading')
            submitButton.setAttribute('disabled', 'disabled');

            data = new FormData(formRestorePassword);
                BX.ajax({
                    url:  '/local/ajax/restore-password.php',  //адрес на который передаются данные с формы
                    method: 'POST',         //метод передачи данных POST или GET
                    dataType: 'json',       //тип передаваемых данных
                    data: data,
                    processData: false,     //
                    preparePost: false,     //предобработка передаваемых данных
                    onsuccess: function(data){  //в случаи успеха, выполняем действия

                        submitButton.classList.remove('btn_status_loading');
                        submitButton.removeAttribute('disabled');
                        let response = JSON.parse(data);
                        console.log(response);
                        if( response.result == 'error'){
                            errorBox.style.display = 'block'
                        }
                        if( response.reset.result == "successful"){
                            errorBox.style.display = 'none'
                            successfulBox.style.display = 'block'
                        }

                        //location.reload()
                    },
                    onfailure: function(){  //действия в случаи ошибки
                        console.log('error') //выводим в результате ошибки, сообщение об ошибки
                    }
                });
            return BX.PreventDefault(e);
        }
    );
});