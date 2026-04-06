<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<section class="section section_padding_bottom_big container">
	<h1 class="page-title margin_b_m">Регистрация</h1>

	<?if($USER->IsAuthorized()):?>
		<?LocalRedirect("/account/")?>
	<?else:?>
	<?if (count($arResult["ERRORS"]) > 0):?>
		<?foreach ($arResult["ERRORS"] as $key => $error):?>
			<?if (intval($key) == 0 && $key !== 0):?>
				<?$arResult["ERRORS"][$key] = str_replace("#FIELD_NAME#", "&quot;".GetMessage("REGISTER_FIELD_".$key)."&quot;", $error)?>
			<?endif?>
		<?endforeach?>
		<?ShowError(implode("<br>", $arResult["ERRORS"]))?>

	<?elseif($_REQUEST['success'] == 'true'):?>
		<p class="note note_type_notetext ">Вы успешно зарегистрированы. Ссылка на подтверждение регистрации отправлена на указанную вами почту.</p>
	<?endif?>

	<?if($arResult["USE_EMAIL_CONFIRMATION"] === "Y"):?>
		<div class="margin_b_s">Логин будет использоваться для входа в личный кабинет.</div>
		<div class="margin_b_s">На email будет отправлена ссылка для подтверждения регистрации.</div>
		<div class="margin_b_m"><?=$arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"]?></div>
	<?endif?>

	<form class="reg__form" method="post" action="<?=POST_FORM_ACTION_URI?>" name="regform" enctype="multipart/form-data">
		<?if($arResult["BACKURL"] <> ''):?>
			<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
		<?endif?>
		<div class="reg__fields">
			<label class="field-label">
				<span class="field-name">Логин<span class="field-star">*</span></span>
				<input class="field-input" size="30" type="text" name="REGISTER[LOGIN]" value="<?=$arResult["VALUES"]["LOGIN"]?>">
			</label>
			<label class="field-label">
				<span class="field-name">Электронная почта<span class="field-star">*</span></span>
				<input class="field-input" size="30" type="text" name="REGISTER[EMAIL]" value="<?=$arResult["VALUES"]["EMAIL"]?>">
			</label>
			<label class="field-label">
				<span class="field-name">Пароль<span class="field-star">*</span></span>
				<input class="field-input" size="30" type="password" name="REGISTER[PASSWORD]" value="<?=$arResult["VALUES"]["PASSWORD"]?>" autocomplete="off">
			</label>
			<label class="field-label">
				<span class="field-name">Повторите пароль<span class="field-star">*</span></span>
				<input class="field-input" size="30" type="password" name="REGISTER[CONFIRM_PASSWORD]" value="<?=$arResult["VALUES"]["CONFIRM_PASSWORD"]?>" autocomplete="off">
			</label>
			<label class="form-policy">
				<input class="checkbox__input" type="checkbox" name="policy" required="">
				<span class="checkbox__container">
					<span class="checkbox"></span>
					<span class="checkbox__text">Нажимая на кнопку «Зарегистрироваться», я даю согласие на обработку моих <a href="/privacy-policy/">персональных данных</a></span>
				</span>
			</label>
			<div class="reg__btn-container">
				<button class="btn btn_color_green" type="submit" name="register_submit_button" value="Зарегистрироваться">Зарегистрироваться</button>
			</div>
		</div>

	</form>

	<?endif?>


</section>