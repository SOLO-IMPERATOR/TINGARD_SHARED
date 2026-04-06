<?php 
/* 
 Comment Text 
*/
?>

<section class="section section_padding-top_big section_padding-bottom_small lk">
  <h2 class="section-title section-title_margin_bottom">Рассчёт доставки</h2>
  <div class="lk__desc">Заполните данные в форме для расчёта доставки</div>
  <form class="lk__form" id="delivery-calc">
    <div class="lk__note note note_type_error" id="error-box" style="display: none">Обязательное поле не заполнено</div>
    <div class="lk__note note note_type_success" id="success-box" style="display: none">Заявка отправлена</div><!-- обнулить поля формы -->


    <label class="lk__label">
      <span class="lk__label-title">Адрес отгрузки*</span>
      <input class="lk__input input" type="text" name="address-from" placeholder="Укажите адрес отгрузки" required>
    </label>

    <label class="lk__label">
      <span class="lk__label-title">Куда доставить*</span>
      <input class="lk__input input" type="text" name="address-to" placeholder="Укажите адрес доставки" required>
    </label>

    <label class="lk__label">
      <span class="lk__label-title">Вид транспорта*</span>
      <select class="select" name="transport">
        <option selected>Фура</option>
        <option selected>Догруз</option>
        <option selected>Манипулятор</option>
      </select>
    </label>

    <label class="lk__label">
      <span class="lk__label-title">Сроки доставки*</span>
      <input class="lk__input input" type="text" name="time" placeholder="От... до..." required>
    </label>

    <div class="lk__btn-container">
      <button class="lk__btn btn btn_type_turquoise-green btn_submit" id="submitSend" type="button">Сформировать заявку</button>
    </div>
  </form>
</section>
