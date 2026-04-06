<?php 
/* 
 Comment Text 
*/
?>


<section class="lk">
  <div class="lk__desc">Заполните все данные формы, после регистрации ожидайте подтверждения вашей регистрации в течение 1-2 рабочих дней, соответствующее уведомление придёт вам на указанную электронную почту</div>
  <form class="lk__form" id="create-account">
    <div class="lk__note note note_type_error" style="display: none" id="errorNullfield">Обязательное поле не заполнено</div>
    <div class="lk__note note note_type_error" style="display: none" id="errorReg">Ошибка регистрации</div>
    <div class="lk__note note note_type_error" style="display: none">Пароль менее 6 символов</div>
    <div class="lk__note note note_type_success" id="success-reg" style="display: none">Сотрудник зарегистрирован, данные для входа отправлены на ваш и его email</div><!-- обнулить поля формы -->
    <label class="lk__label">
      <span class="lk__label-title">ФИО сотрудника*</span>
      <input class="lk__input input" type="text" name="full-name" placeholder="Иванов Иван Иванович" required>
    </label>
    <label class="lk__label">
      <span class="lk__label-title">Должность сотрудника*</span>
      <input class="lk__input input" type="text" name="post" placeholder="Менеджер по снабжению" required>
    </label>
    <label class="lk__label">
      <span class="lk__label-title">Email сотрудника*</span>
      <input class="lk__input input" type="email" name="email" placeholder="ivan@company.ru" required>
    </label>
    <label class="lk__label">
      <span class="lk__label-title">Телефон сотрудника*</span>
      <input class="lk__input input" type="tel" name="tel" placeholder="+7 (888) 888-88-88" required>
    </label>
    <label class="lk__label">
      <span class="lk__label-title">Добавочный номер (если есть)</span>
      <input class="lk__input input" type="text" name="tel-add">
    </label>
    <label class="lk__label">
      <span class="lk__label-title">Пароль сотрудника*</span>
      <input class="lk__input input" type="password" name="password" placeholder="Не менее 6 символов" required>
    </label>
    <div class="lk__btn-container">
      <button class="lk__btn btn btn_type_turquoise-green btn_submit" id="submitButton" type="submit">Создать аккаунт</button>
    </div>
  </form>
</section>
