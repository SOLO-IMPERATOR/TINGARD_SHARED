/* 
 Comment Text 
*/

BX.ready(function(){
    let changePass = document.getElementById('changePass');
    let customForm = document.getElementById('bx_cahgepass_form')
    let errBox = document.getElementById('errorBox')
    let successBox = document.getElementById('successBox')
    BX.bind(changePass, "click", BX.proxy(sendForm, this));
    console.log(changePass);
    function sendForm(e) {
        // с формой работаем через объект FormData
        let data = new FormData(customForm);
        // ajax запрос
        BX.ajax({
            url: '/local/ajax/cange-pass.php', //адрес на который передаются данные с формы
            data: data, // данные формы, у нас содержатся в `data`
            method: "POST", // метод передачи данных POST или GET
            dataType: "json", // тип передаваемых данных
            processData: false, // предотвращает автоматическую обработку не строковых полей
            preparePost: false, // предобработка передаваемых данных
            // действия в случаи успеха
            onsuccess: function (data) {
                console.log(data);
                let request = JSON.parse(data);
                if(request.result.status == 1){
                    successBox.style.display = 'block';
                    successBox.innerText = request.result.desc
                }else {
                    errBox.style.display = 'block';
                    errBox.innerText = request.result.desc
                }

            },
            // действия в случаи ошибки
            onfailure: function () {
                console.log("error");
                errBox.style.display = 'block';
            },
        });
        // отмена действий по умолчанию
        return BX.PreventDefault(e);
    }
});
