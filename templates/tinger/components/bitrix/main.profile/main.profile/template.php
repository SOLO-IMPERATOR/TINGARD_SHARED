<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>

<section class="section section_padding_bottom_big container">
	<h1 class="page-title margin_b_m">Личный кабинет</h1>
	<div class="profile__nav-container margin_b_m">
		<ul class="profile__nav">
			<li class="profile__nav-item">
				<a class="profile__nav-link" href="/account/order/">Текущие заказы</a>
			</li>
			<li class="profile__nav-item">
				<a class="profile__nav-link" href="/account/order/?filter_history=Y">Завершённые заказы</a>
			</li>
			<li class="profile__nav-item">
				<a class="profile__nav-link" href="/account/order/?filter_history=Y&show_canceled=Y">Отменённые заказы</a>
			</li>
		</ul>
	</div>
	<div class="profile__data-container">
		<?ShowError($arResult["strProfileError"]);?>
		<?if ($arResult['DATA_SAVED'] == 'Y')
			ShowNote(GetMessage('PROFILE_DATA_SAVED'));
		?>

		<form class="profile__form" method="post" name="form1" action="<?=$arResult["FORM_TARGET"]?>" enctype="multipart/form-data">
			<?=$arResult["BX_SESSION_CHECK"]?>
			<input type="hidden" name="lang" value="<?=LANG?>">
			<input type="hidden" name="ID" value=<?=$arResult["ID"]?>>
			
			<h2 class="section-title section-title_margin_bottom">Редактирование информации</h2>

			<div class="profile__data margin_b_m">
<!-- 				<label class="field-label">
					<span class="field-name">Фамилия</span>
					<input class="field-input" type="text" name="LAST_NAME" maxlength="50" value="<?=$arResult["arUser"]["LAST_NAME"]?>">
				</label>
				<label class="field-label">
					<span class="field-name">Имя</span>
					<input class="field-input" type="text" name="NAME" maxlength="50" value="<?=$arResult["arUser"]["NAME"]?>">
				</label>
				<label class="field-label">
					<span class="field-name">Отчество</span>
					<input class="field-input" type="text" name="SECOND_NAME" maxlength="50" value="<?=$arResult["arUser"]["SECOND_NAME"]?>">
				</label> -->
				<label class="field-label">
					<span class="field-name">Логин<span class="field-star">*</span></span>
					<input class="field-input" type="text" name="LOGIN" maxlength="50" value="<? echo $arResult["arUser"]["LOGIN"]?>">
				</label>
				<label class="field-label">
					<span class="field-name">Email<span class="field-star">*</span></span>
					<input class="field-input" type="text" name="EMAIL" maxlength="50" value="<? echo $arResult["arUser"]["EMAIL"]?>">
				</label>
			</div>
			<div class="profile__data-btn-container margin_b_m">
				<button class="btn btn_color_green" type="submit" name="save" value="<?=(($arResult["ID"]>0) ? GetMessage("MAIN_SAVE") : GetMessage("MAIN_ADD"))?>"><?=(($arResult["ID"]>0) ? GetMessage("MAIN_SAVE") : GetMessage("MAIN_ADD"))?></button>
			</div>
		</form>

		Перейдите по <a href="/account/password/">ссылке</a>, если хотите изменить пароль.

	</div>
</section>