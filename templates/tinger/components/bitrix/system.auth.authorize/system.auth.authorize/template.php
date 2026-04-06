<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$APPLICATION->SetPageProperty('description', 'Страница авторизации в личный кабинет для клиентов компании TINGER. В личном кабинете вы можете отслеживать статус вашего заказа и смотреть историю покупок.');
$APPLICATION->SetPageProperty('header-class', 'header_background_dark');
$APPLICATION->SetPageProperty('robots', 'noindex, nofollow');
?>

<section class="auth section section_padding_bottom_big container">
	<h1 class="page-title margin_t_m margin_b_m">Авторизация</h1>

	<div class="margin_b_m">Для доступа к этой странице необходимо авторизоваться</div>

	<?
	ShowMessage($arParams["~AUTH_RESULT"]);
	ShowMessage($arResult['ERROR_MESSAGE']);
	?>

	<form class="auth__form" name="form_auth" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">

		<input type="hidden" name="AUTH_FORM" value="Y" />
		<input type="hidden" name="TYPE" value="AUTH" />

		<?if ($arResult["BACKURL"] <> ''):?>
		<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
		<?endif?>

		<?foreach ($arResult["POST"] as $key => $value):?>
		<input type="hidden" name="<?=$key?>" value="<?=$value?>" />
		<?endforeach?>

		<div class="auth__fields">

			<label class="field-label">
				<span class="field-name">Логин<span class="field-star">*</span></span>
				<input class="field-input" type="text" name="USER_LOGIN" maxlength="255" value="<?=$arResult["LAST_LOGIN"]?>">
			</label>

			<label class="field-label">
				<span class="field-name">Пароль<span class="field-star">*</span></span>
				<input class="field-input" type="password" name="USER_PASSWORD" maxlength="255" autocomplete="off">
			</label>

			<?if ($arResult["STORE_PASSWORD"] == "Y"):?>
				<label class="authorize__remember">
					<input class="checkbox__input" type="checkbox" id="USER_REMEMBER" name="USER_REMEMBER" value="Y" checked>
					<span class="checkbox__container">
						<span class="checkbox"></span>
						<span class="checkbox__text">Запомнить меня на этом устройстве</span>
					</span>
				</label>
			<?endif?>
		
			<div class="auth__btn-container">
				<button class="btn btn_color_green" type="submit" name="Login">Войти</button>
			</div>
		</div>
	</form>
</div>

<script type="text/javascript">
<?if ($arResult["LAST_LOGIN"] <> ''):?>
	try{document.form_auth.USER_PASSWORD.focus();}catch(e){}
<?else:?>
	try{document.form_auth.USER_LOGIN.focus();}catch(e){}
<?endif?>
</script>


</section>