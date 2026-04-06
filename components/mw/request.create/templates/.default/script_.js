/* 
 Comment Text 
*/
BX.ready(function ()
{

    //Дубль полей
    const selectFields = document.querySelectorAll('.lk__label_type_countable');

    let currentIndex = selectFields.length;

    const addEventListeners = (field, index) =>
    {
        console.log(index);
        let plusValue = field.querySelector('.input-btn_action_plus');
        let minusValue = field.querySelector('.input-btn_action_minus');
        let fieldValue = field.querySelector('.input_action_count');
        let fieldAdd = field.querySelector('.input-btn_action_add');
        let fieldDelete = field.querySelector('.input-btn_action_delete');

        fieldValue.addEventListener('keydown', function (event)
        {
            if (['e', 'E', '+', '-', '.'].includes(event.key))
            {
                event.preventDefault();
            }
        });

        fieldValue.addEventListener('input', function (event)
        {
            if (this.value === '' || this.value.startsWith('0') || this.value < 1)
            {
                this.value = 1;
            }
        });

        plusValue.addEventListener('click', () =>
        {
            fieldValue.value = Number(fieldValue.value) + 1;
        });

        minusValue.addEventListener('click', () =>
        {
            if (Number(fieldValue.value) > 1)
            {
                fieldValue.value = Number(fieldValue.value) - 1;
            }
        });

        if (fieldAdd)
        {
            fieldAdd.addEventListener('click', () =>
            {
                let clone = field.cloneNode(true);
                
                clone.querySelector('.input_action_count').setAttribute('name', `${clone.querySelector('.input_action_count').getAttribute('name') + currentIndex}`)
                clone.querySelector('.select').setAttribute('name', `${clone.querySelector('.select').getAttribute('name') + currentIndex}`)

                clone.querySelector('.input_action_count').value = 1;
                clone.querySelector('.input-btn_action_add').textContent = '-';
                clone.querySelector('.input-btn_action_add').classList.replace('input-btn_action_add', 'input-btn_action_delete');
                addEventListeners(clone, currentIndex);
                currentIndex++;
                field.after(clone);
            });
        }

        if (fieldDelete)
        {
            fieldDelete.addEventListener('click', () =>
            {
                field.remove();
            });
        }
    };

    if (selectFields.length)
    {        
        selectFields.forEach((field, index) =>
        {
            addEventListeners(field, index);
        });
    }


    //Отправка заявки
    let submitButton = document.getElementById('lk__submit-btn');
    let successBox = document.getElementById('success-box');
    let formRequest = document.getElementById('lk__form-request');
    if (submitButton)
    {
        submitButton.addEventListener('click', function ()
        {

            data = new FormData(formRequest);
            submitButton.classList.add('btn_status_loading')
            submitButton.setAttribute('disabled', 'disabled');
            BX.ajax({
                url: '/local/ajax/request.create.php',  //адрес на который передаются данные с формы
                method: 'POST',         //метод передачи данных POST или GET
                dataType: 'html',       //тип передаваемых данных
                data: data,
                processData: false,     //
                preparePost: false,     //предобработка передаваемых данных
                onsuccess: function (data)
                {  //в случаи успеха, выполняем действия
                    submitButton.classList.remove('btn_status_loading');
                    submitButton.removeAttribute('disabled');
                    successBox.style.display = 'block';
                    // location.reload();
                    console.log(data)
                },
                onfailure: function ()
                {  //действия в случаи ошибки
                    console.log('error') //выводим в результате ошибки, сообщение об ошибки
                }
            });

        });
    }
});
