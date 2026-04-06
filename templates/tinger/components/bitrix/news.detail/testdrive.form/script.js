/* 

//const dateControl = document.querySelector('input[type="date"]');
//const dateToday = new Date();

//dateControl.value = String(dateToday.getDate()).padStart(2, '0')+'-'+String(dateToday.getMonth()).padStart(2, '0')+'-'+dateToday.getFullYear();

//console.log(dateControl.value);


$('form#testdrive_form').submit(function (e) {

    let data_form = {"TITLE": "", "COMMENTS": ""};
    let product;

    data_form.TITLE = 'TINGER.RU | Записаться на тест-драйв';

    $('form#testdrive_form .input-field').each(function () {
        data_form[$(this).attr('data-b24')] = $(this).val();
    });

    if ($('.testdrive__inner input.radio__input[data-name-label="visiting"]').is(':checked')) {
        data_form.COMMENTS += "<strong>Где удобно пройти тест-драйв:</strong> выездной<br>";
    }
    if ($('.testdrive__inner input.radio__input[data-name-label="in_cherepovets"]').is(':checked')) {
        data_form.COMMENTS += "<strong>Где удобно пройти тест-драйв:</strong> в Череповце<br>";
    }
    if ($('.testdrive__inner input.radio__input[data-name-label="partners"]').is(':checked')) {
        let city = $('.testdrive__inner .testdrive__options-list .select.select--dark').val();
        data_form.COMMENTS += "<strong>Где удобно пройти тест-драйв:</strong> " + city + "<br>";
    }

    $('div.testdrive-models label.testdrive-models__radio').each(function () {
        if ($(this).find('input').is(':checked')) {
            product = $(this).find('input').attr('data-model-name');
        }
    });

    data_form.COMMENTS += "<strong>Выбранная модель:</strong> " + product + "<br>";

    data_form.COMMENTS += '<strong>Выбранная дата:</strong> ' + $('.testdrive__inner input.input-field[name="date"]').val();

    if ($('.testdrive__inner input.radio__input[data-name-label="partners"]').is(':checked') && $('.testdrive__inner label[data-name-label="partners"] select option:selected').attr('name') === "default") {
        alert('Не выбран партнер');
    } else {
        //console.log(data_form);
        $('button#book_testdrive').prop('disabled', true);
        $.ajax({
            url: "/local/templates/tinger/scripts/b24/lead_send.php",
            type: "post",
            dataType: "html",
            data: data_form,
            success: function (data) {
                console.log("success");
            },
            error: function () {
                console.log("fail");
            }
        });

        $.ajax({
            url: "/local/templates/tinger/scripts/send_email/event-send.php",
            type: "post",
            data: data_form,
            success: function (data) {
                console.log("success");
                window.location.href = "/thanks/";
            },
            error: function () {
                console.log("fail");
            }
        });
        $('button#book_testdrive').prop('disabled', false);
    }
    
    return false;

}); */