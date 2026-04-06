<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)
{
	die();
}

use \Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);
?>
<h1 class="page-title page-title_margin_bottom">Вход в аккаунт дилера</h1>
<section class="lk">
	<form class="lk__form" name="<?= $arResult['FORM_ID'];?>" method="post" target="_top" action="<?=POST_FORM_ACTION_URI?>">
      <?if ($arResult['ERRORS']):?>
          <div class="lk__note note note_type_error">
            <?foreach ($arResult['ERRORS'] as $error) {
              echo $error;
            }?>
          </div>
      <?endif?>
        <div class="lk__input-container">
            <input class="lk__input input" name="<?= $arResult['FIELDS']['login'];?>"  type="text" placeholder="Электронная почта*" >
        </div>
        <div class="lk__input-container">
            <input class="lk__input input" type="password" name=<?= $arResult['FIELDS']['password'];?> placeholder="Пароль*" >
        </div>

        <label class="lk__agreement agreement">
            <input class="checkbox__input" type="checkbox" name="save">
            <span class="checkbox"></span>
            <span class="checkbox__text" id="USER_REMEMBER" name="<?= $arResult['FIELDS']['remember'];?>" value="Y" >Запомнить меня на этом устройстве</span>
        </label>
        <div class="lk__btn-container">
            <input type="submit" name="<?= $arResult['FIELDS']['action'];?>" class="lk__btn btn btn_type_turquoise-green" value="Войти" />
        </div>
        <div class="lk__links-container">
            <a class="lk__link" href="/account/restore-password/">Забыли пароль?</a>
        </div>
    </form>
</section>
<script type="text/javascript">
	<?if ($arResult['LAST_LOGIN'] != ''):?>
		try	{document.<?= $arResult['FORM_ID'];?>.USER_PASSWORD.focus();}catch(e){}
	<?else:?>
		try{document.<?= $arResult['FORM_ID'];?>.USER_LOGIN.focus();}catch(e){}
	<?endif?>
</script>