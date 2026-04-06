<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)
{
	die();
}

use \Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);
?>

<section class="section section_padding_bottom_big container">
	<h1 class="page-title margin_b_m">Восстановить пароль</h1>

	<?if ($arResult['AUTHORIZED']):?>
		<?LocalRedirect("/account/")?>
	<?else:?>

		<div class="margin_b_m">Укажите логин или email для восстановления пароля</div>

		<?if ($arResult['ERRORS']):?>
		<div class="note note_type_errortext">
			<?foreach ($arResult['ERRORS'] as $error) {
				echo $error;
			}?>
		</div>
		<?elseif ($arResult['SUCCESS']):?>
		<div class="note note_type_notetext">
			<?=$arResult['SUCCESS'];?>
		</div>
		<?endif;?>


	<form class="reset-password__form" name="bform" method="post" target="_top" action="<?= POST_FORM_ACTION_URI;?>">

		<div class="reset-password__fields">

			<label class="field-label">
				<span class="field-name">Логин</span>
				<input class="field-input" type="text" name="<?= $arResult['FIELDS']['login'];?>" maxlength="255" value="<?= \htmlspecialcharsbx($arResult['LAST_LOGIN']);?>">
			</label>

			<label class="field-label">
				<span class="field-name">Email</span>
				<input class="field-input" type="text" name="<?= $arResult['FIELDS']['email'];?>" maxlength="255" value="">
			</label>

			<div class="restore-password__btn-container">
				<button type="submit" class="btn btn_color_green" name="<?= $arResult['FIELDS']['action'];?>" value="Восстановить пароль">Восстановить пароль</button>
			</div>

			<div class="reset-password__links">
			<?if ($arResult['AUTH_AUTH_URL'] || $arResult['AUTH_REGISTER_URL']):?>
				<?if ($arResult['AUTH_AUTH_URL']):?>
					<a href="<?= $arResult['AUTH_AUTH_URL'];?>" rel="nofollow">Войти в аккаунт</a>
				<?endif;?>
				<?if ($arResult['AUTH_REGISTER_URL']):?>
					<a href="<?= $arResult['AUTH_REGISTER_URL'];?>" rel="nofollow">Зарегистрировать аккаунт</a>
				<?endif;?>
			<?endif;?>
			</div>
		</div>

	</form>

	<?endif?>
</section>

<script type="text/javascript">
	document.bform.<?= $arResult['FIELDS']['login'];?>.focus();
</script>
