<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)
{
	die();
}

use \Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);
?>

<section class="section section_padding_bottom_big container">
	<h1 class="page-title margin_b_m">Войти в аккаунт</h1>

	<?if ($arResult['ERRORS']):?>
		<div class="note note_type_errortext">
			<?foreach ($arResult['ERRORS'] as $error) {
				echo $error;
			}?>
		</div>
	<?endif?>

	<form class="auth__form" name="<?= $arResult['FORM_ID'];?>" method="post" target="_top" action="<?=POST_FORM_ACTION_URI?>">

		<div class="auth__fields">

			<label class="field-label">
				<span class="field-name">Логин<span class="field-star">*</span></span>
				<input class="field-input" type="text" name="<?= $arResult['FIELDS']['login'];?>" maxlength="255" value="<?=\htmlspecialcharsbx($arResult['LAST_LOGIN'])?>">
			</label>

			<label class="field-label">
				<span class="field-name">Пароль<span class="field-star">*</span></span>
				<input class="field-input" type="password" name="<?= $arResult['FIELDS']['password'];?>" maxlength="255" autocomplete="off">
			</label>

			<?if ($arResult['STORE_PASSWORD'] == 'Y'):?>
				<label class="authorize__remember">
					<input class="checkbox__input" type="checkbox" id="USER_REMEMBER" name="<?= $arResult['FIELDS']['remember'];?>" value="Y" checked>
					<span class="checkbox__container">
						<span class="checkbox"></span>
						<span class="checkbox__text">Запомнить меня на этом устройстве</span>
					</span>
				</label>
			<?endif?>

			<div class="auth__btn-container">
				<button class="btn btn_color_green" type="submit" name="<?= $arResult['FIELDS']['action'];?>" value="Войти">Войти</button>
			</div>

			<div class="auth__links">
				<?if ($arResult['AUTH_FORGOT_PASSWORD_URL'] || $arResult['AUTH_REGISTER_URL']):?>
					<?if ($arResult['AUTH_FORGOT_PASSWORD_URL']):?>
						<a href="<?= $arResult['AUTH_FORGOT_PASSWORD_URL'];?>" rel="nofollow">Забыли пароль?</a>
					<?endif?>
					<?if ($arResult['AUTH_REGISTER_URL']):?>
						<a href="<?= $arResult['AUTH_REGISTER_URL'];?>" rel="nofollow">Зарегистрироваться</a>
					<?endif?>
				<?endif?>
			</div>

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