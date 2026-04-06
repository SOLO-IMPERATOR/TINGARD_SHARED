<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>

<section class="section section_padding_bottom_big container">
	<h1 class="page-title margin_b_m">Сменить пароль</h1>

	<div class="profile__data-container">
		<?ShowError($arResult["strProfileError"]);?>
		<?if ($arResult['DATA_SAVED'] == 'Y')
			ShowNote(GetMessage('PROFILE_DATA_SAVED'));
		?>

		<form class="profile__form" method="post" name="form1" action="<?=$arResult["FORM_TARGET"]?>" enctype="multipart/form-data">
			<?=$arResult["BX_SESSION_CHECK"]?>
			<input type="hidden" name="lang" value="<?=LANG?>">
			<input type="hidden" name="ID" value=<?=$arResult["ID"]?>>

			<div class="profile__data margin_b_m">
				<?if($arResult['CAN_EDIT_PASSWORD']):?>
				<label class="field-label">
					<span class="field-name">Новый пароль</span>
					<input class="field-input" type="password" name="NEW_PASSWORD" maxlength="50" value="<?=$arResult['arUser']['NEW_PASSWORD']?>" autocomplete="off">
				</label>
				<label class="field-label">
					<span class="field-name">Повторите новый пароль</span>
					<input class="field-input" type="password" name="NEW_PASSWORD_CONFIRM" maxlength="50" value="<?=$arResult['arUser']['NEW_PASSWORD_CONFIRM']?>" autocomplete="off">
				</label>
				<p><?=$arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"];?></p>
				<?endif?>
			</div>
			<div class="profile__data-btn-container">
				<button class="btn btn_color_green" type="submit" name="save" value="<?=(($arResult["ID"]>0) ? GetMessage("MAIN_SAVE") : GetMessage("MAIN_ADD"))?>"><?=(($arResult["ID"]>0) ? GetMessage("MAIN_SAVE") : GetMessage("MAIN_ADD"))?></button>
			</div>
		</form>

	</div>
</section>