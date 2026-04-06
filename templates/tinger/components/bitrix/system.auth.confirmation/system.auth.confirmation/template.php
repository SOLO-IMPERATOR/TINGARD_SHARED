<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<section class="section section_padding_bottom_big container">
	<h1 class="page-title margin_b_m">Подтверждение регистрации</h1>

<?switch($arResult["MESSAGE_CODE"]) {
	case "E01":
		echo '<div class="note note_type_errortext">Некорректная ссылка для подтверждения регистрации</div>';
		break;
	case "E02":
		echo '<div class="note note_type_notetext">Вы уже подтвердили регистрацию и авторизовались</div>';
		break;
	case "E03":
		echo '<div class="note note_type_notetext">Вы уже подтвердили регистрацию</div>';
		break;
	case "E04":
		echo '<div class="note note_type_errortext">Некорректная ссылка для подтверждения регистрации</div>';
		break;
	case "E05":
		echo '<div class="note note_type_errortext">Некорректная ссылка для подтверждения регистрации</div>';
		break;
	case "E06":
		echo '<div class="note note_type_notetext">Регистрация успешно подтверждена</div>';
		break;
	case "E07":
		echo '<div class="note note_type_errortext">При подтверждении произошла ошибка</div>';
		break;
	}
?>

<?if($arResult["MESSAGE_CODE"] == 'E02'):?>
	<?LocalRedirect("/account/")?>
<?endif?>

<?if($arResult["SHOW_FORM"]):?>
<?elseif(!$USER->IsAuthorized()):?>
	<a href="/account/">Войти в аккаунт</a>
<?endif?>
</section>