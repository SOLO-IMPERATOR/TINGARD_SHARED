<?php 
/* 
 Comment Text 
*/
?>
<section class="lk">
  <div class="lk__desc">Укажите новый пароль, длина нового пароля должна составлять не менее 6 символов</div>
  <form class="lk__form" id="bx_cahgepass_form" method="post" action="">
      <div class="lk__note note note_type_error" id="errorBox" style="display: none;">Вы не можете изменить пароль</div>
      <div class="lk__note note note_type_success" id="successBox" style="display: none;">Пароль успешно изменён</div>
    <div class="lk__input-container">
      <input class="lk__input input" type="password" name="password" placeholder="Новый пароль*" required>
    </div>
    <div class="lk__input-container">
      <input class="lk__input input" type="password" name="confirmpassword" placeholder="Повторите новый пароль*" required>
    </div>
    <div class="lk__btn-container">
      <button class="lk__btn btn btn_type_turquoise-green" id="changePass" type="button">Сменить пароль</button>
    </div>
<!--    <div class="lk__links-container">-->
<!--      <a class="lk__link" href="/auth/">Войти в аккаунт</a>-->
<!--    </div>-->
  </form>
</section>
