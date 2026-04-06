<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

use \Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);

?>



<?if ($arResult['AUTHORIZED']):?>
	<?LocalRedirect("/account/")?>
<?else:?>
	<section class="section section_padding_bottom_big container">
		<h1 class="page-title margin_b_m">Смена пароля</h1>
		<div class="margin_b_m">
			<?=$arResult['GROUP_POLICY']['PASSWORD_REQUIREMENTS'];?>
		</div>

		<?$fields = $arResult['FIELDS'];?>

		<?if ($arResult['ERRORS']):?>
		<div class="note note_type_errortext">
			<? foreach ($arResult['ERRORS'] as $error) {
				echo $error;
			}?>
		</div>
		<?elseif ($arResult['SUCCESS']):?>
		<div class="note note_type_notetext">
			<?= $arResult['SUCCESS'];?>
		</div>
		<?endif;?>

		<form class="change-password__form" name="bform" method="post" target="_top" action="<?= POST_FORM_ACTION_URI;?>">
			<input type="hidden" name="<?= $fields['login'];?>" maxlength="255" value="<?= \htmlspecialcharsbx($arResult['LAST_LOGIN']);?>" />
			<input type="hidden" name="<?= $fields['checkword'];?>" maxlength="255" value="<?= \htmlspecialcharsbx($arResult[$fields['checkword']]);?>" />

			<div class="change-password__fields">
				<label class="field-label">
					<span class="field-name">Новый пароль<span class="field-star">*</span></span>
					<input class="field-input" type="password" name="<?= $fields['password'];?>" value="<?= \htmlspecialcharsbx($arResult[$fields['password']]);?>" maxlength="255" autocomplete="off">
				</label>
				<label class="field-label">
					<span class="field-name">Подтвердите новый пароль<span class="field-star">*</span></span>
					<input class="field-input" type="password" name="<?= $fields['confirm_password'];?>" value="<?= \htmlspecialcharsbx($arResult[$fields['confirm_password']]);?>" maxlength="255" autocomplete="off">
				</label>

				<div class="change-password__btn-container">
					<button type="submit" class="btn btn_color_green" name="<?= $fields['action'];?>" value="Сменить пароль">Сменить пароль</button>
				</div>

				<div class="change-password__links">
					<?if ($arResult['AUTH_AUTH_URL'] || $arResult['AUTH_REGISTER_URL']):?>
						<?if ($arResult['AUTH_AUTH_URL']):?>
							<a href="<?= $arResult['AUTH_AUTH_URL'];?>" rel="nofollow">Войти в аккаунт</a>
						<?endif;?>
						<?if ($arResult['AUTH_REGISTER_URL']):?>
							<a href="<?= $arResult['AUTH_REGISTER_URL'];?>" rel="nofollow">Зарегистрироваться</a>
						<?endif;?>
					<?endif;?>
				</div>
			</div>

		</form>
	</section>

	<script type="text/javascript">
		document.bform.<?= $fields['login'];?>.focus();
	</script>
<?endif?>