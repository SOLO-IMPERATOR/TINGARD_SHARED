<?php 
/* 
 Comment Text 
*/
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<section class="section section_padding-top_big section_padding-bottom_small lk">
  <h2 class="section-title section-title_margin_bottom">Оставьте сообщение</h2>
  <div class="lk__desc">И мы ответим вам в ближайшее время</div>

  <form class="lk__form lk__form_type_feedback" id="form_message">
    <label class="lk__label">
      <span class="lk__label-title">Сообщение*</span>
      <textarea class="lk__textarea textarea" name="message" required></textarea>
    </label>
    <label class="lk__label">
      <span class="lk__label-title">Прикрепление файла</span>
      <div class="lk__note note note_type_error" style="display: none;" id="size-error-box"></div>
      <span class="lk__download-container">
				<span class="lk__input-download">
					<input type="file" name="inputFiles[]" multiple class="form-control-file form-control-file_type_message" id="inputFile" data-title="Выберите или перетащите файл в эту область (до 5 МБ)">
				</span>
			</span>
    </label>
    <ul class="lk__form-list" id="file-list">
    </ul>
    <div class="lk__btn-container">
      <button class="lk__btn btn btn_type_turquoise-green btn_submit" id="submitSend" type="button">Отправить сообщение</button>
    </div>
  </form>
  <div class="messages" id="chat_history">
<!--      <div class="messages__date">02.04.2024</div>-->
  </div>
</section>

<script>
    $(document).ready(function () {
        console.log('Страт');
        let submitSend = document.getElementById('submitSend')
        function updateChat()
        {
            $.ajax({
                'method': 'POST',
                'dataType': 'html',
                'url': '/local/b24app/app/ajax.php',
                'data': 'type=chat_history',
                success: function (data) {//success callback
                    console.log(data);
                    $('#chat_history').text('').html(data);
                    //submitSend.classList.add('btn_status_loading')
                }
            });
            console.log('Загрузка сообщений');
        }
        setInterval(updateChat(), 5000);
        updateChat();
        // $('#form_message').on('submit', function (el) {//event submit form
        //     el.preventDefault();//the default action of the event will not be triggered
        //     // $('#chat_form').addClass('spinner-border');
        //     // $('#form_message').hide();
        //
        //
        //     var formData = $(this).serialize();
        //     // $.ajax({
        //     //     'method': 'POST',
        //     //     'dataType': 'json',
        //     //     'url': '/local/b24app/app/ajax.php',
        //     //     'data': formData + '&type=send_message',
        //     //     success: function (data) {//success callback
        //     //         // submitSend.classList.remove('btn_status_loading')
        //     //         updateChat();
        //     //         // $('#chat_form').removeClass('spinner-border');
        //     //         $('#form_message textarea[name=message]').val('');
        //     //         // $('#form_message').show();
        //     //     }
        //     // });
        // });
    });
</script>
