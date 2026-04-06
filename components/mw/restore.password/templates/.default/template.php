<?php 
/* 
 Comment Text 
*/
$request = \Bitrix\Main\Application::getInstance()->getContext()->getRequest();
$uri = new \Bitrix\Main\Web\Uri($request->getRequestUri());
$path = $uri->getPath();
?>
<section class="lk">
  <div class="lk__desc">Укажите адрес электронной почты для восстановления пароля, указанный при регистрации</div>
  <form class="lk__form" id="restore-password" name="bform" method="post" target="_top" action="<?=$path?>">
    <input type="hidden" name="AUTH_FORM" value="Y">
    <input type="hidden" name="TYPE" value="SEND_PWD">
      <div class="lk__note note note_type_error" id="error-box" style="display: none;">Учётная запись не найдена</div>
      <div class="lk__note note note_type_success" id="successful-box" style="display: none;">Ссылка на создание нового пароля отправлена на указанную электронную почту</div>
    <div class="lk__input-container">
<!--      <input class="lk__input input" type="text" name="USER_LOGIN" value="--><?php //=$arResult["USER_LOGIN"]?><!--" required/>-->
      <input class="lk__input input" type="text" name="USER_EMAIL" />
    </div>
    <div class="lk__btn-container">
      <input class="lk__btn btn btn_type_turquoise-green btn_submit_lk" id="btn_submit_lk" type="submit" name="send_account_info" value="Восстановить пароль" />
    </div>
    <div class="lk__links-container">
      <a class="lk__link" href="/account/auth/">Войти в аккаунт</a>
<!--      <a class="lk__link" href="/account/">Зарегистрироваться</a>-->
    </div>
  </form>
</section>

