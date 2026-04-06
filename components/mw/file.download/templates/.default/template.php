<?php
/* 
 Comment Text 
*/
?>
<pre><? // print_r($arResult) 
      ?></pre>
<section class="section section_padding-top_big section_padding-bottom_small lk">
  <h2 class="section-title section-title_margin_bottom">Загрузка документов</h2>
  <form class="lk__form" id="loadFileForm" method="post" enctype="multipart/form-data">
    <input type="hidden" name="idcontact" value="<?= $arResult['DEALER']['UF_ID_COMPANY'] ?>">
    <div class="lk__note note note_type_error" style="display: none;" id="size-error-box"></div>
    <div class="lk__note note note_type_error" style="display: none;" id="error-box">Не удалось загрузить файлы</div>
    <div class="lk__note note note_type_success" style="display: none;" id="success-box">Файлы успешно загружены</div>
    <label class="lk__label">
      <span class="lk__label-title">Приложите файл*</span>
      <span class="lk__download-container">
        <span class="lk__input-download">
          <input type="file" class="form-control-file" id="file-input" name="inputFiles[]" multiple data-title="Выберите или перетащите файл в эту область (до 5 МБ)" required>
        </span>
      </span>
    </label>
    <ul class="lk__form-list" id="file-list">
    </ul>
    <label class="lk__label">
      <span class="lk__label-title">Сопроводительное письмо*</span>
      <textarea class="lk__textarea textarea" name="comment" required id="requestResult"></textarea>
    </label>
    <div class="lk__btn-container">
      <button class="lk__btn btn btn_type_turquoise-green btn_submit" type="button" id="submit-button">Отправить</button>
    </div>
  </form>

</section>
