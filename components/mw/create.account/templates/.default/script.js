/* 
 Comment Text 
*/

BX.ready(function(){
    let formUser = document.getElementById('create-account');
    let submitButton = document.getElementById('submitButton')

    BX.bindDelegate(
        document.body, 'click', {className: 'btn_submit' },
        function(e){
            if(!e) {
                e = window.event;
            }
            data = new FormData(formUser);
            let NameUser = data.get('full-name');
            let post = data.get('post');
            let email = data.get('email');
            let tel = data.get('tel');
            let password = data.get('password')
            let validFlag = true;
            let errorBox = document.getElementById('errorNullfield')
            let successReg = document.getElementById('success-reg')
            let errorRegBox = document.getElementById('errorReg')

            submitButton.classList.add('btn_status_loading')

            // проверка на заполнение обязательных полей
            if(NameUser == '' || post =='' || email =='' || tel =='' || password == '') validFlag = false;

            if(validFlag) {
                BX.ajax({
                    url: '/local/ajax/create-account.php',  //адрес на который передаются данные с формы
                    method: 'POST',         //метод передачи данных POST или GET
                    dataType: 'json',       //тип передаваемых данных
                    data: data,
                    processData: false,     //
                    preparePost: false,     //предобработка передаваемых данных
                    onsuccess: function(data){  //в случаи успеха, выполняем действия
                        console.log(data);
                        submitButton.classList.remove('btn_status_loading');
                        submitButton.removeAttribute('disabled');
                        let resultRequest = JSON.parse(data);
                        console.log(resultRequest);
                        if( resultRequest.result == 'ok') {
                            errorBox.style.display = 'none';
                            successReg.style.display = 'block';
                            //document.location.href = '/account/employees/'
                            // sectionBox.innerHTML = data;
                        }else {
                            errorRegBox.style.display = 'block';
                            errorRegBox.innerText = resultRequest.error
                        }
                    },
                    onfailure: function(){  //действия в случаи ошибки
                        console.log('error') //выводим в результате ошибки, сообщение об ошибки
                    }
                });
            }else {
                // показываем ошибку
                console.log('поле пустое');
                errorBox.style.display = 'block';
                submitButton.classList.remove('btn_status_loading');
            }
            return BX.PreventDefault(e);
        }
    );
});