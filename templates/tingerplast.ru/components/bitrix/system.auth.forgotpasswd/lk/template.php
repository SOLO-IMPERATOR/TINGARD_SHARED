<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><?

?>
<h1 class="page-title page-title_margin_bottom">Восстановление пароля</h1>

<section class="lk">
    <div class="lk__desc">Укажите адрес электронной почты для восстановления пароля, указанный при регистрации</div>
    <form class="lk__form" name="bform" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">
<!--        <div class="lk__note note note_type_error">Учётная запись не найдена</div>-->
        <?
        if ($arResult["BACKURL"] <> '')
        {
        ?>
            <input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
        <?
        }
        ?>
            <input type="hidden" name="AUTH_FORM" value="Y">
            <input type="hidden" name="TYPE" value="SEND_PWD">
            <? if (!empty($arParams["~AUTH_RESULT"])) { ?>
                <div class="lk__note note note_type_success"><?=ShowMessage($arParams["~AUTH_RESULT"])?></div>
            <?}?>
        <div class="lk__input-container">
            <input class="lk__input input" type="text" name="USER_LOGIN" value="<?=$arResult["USER_LOGIN"]?>" required/>
            <input class="lk__input input" type="hidden" name="USER_EMAIL" />
        </div>
        <div class="lk__btn-container">
            <input class="lk__btn btn btn_type_turquoise-green" type="submit" name="send_account_info" value="<?=GetMessage("AUTH_SEND")?>" />
        </div>
        <div class="lk__links-container">
            <a class="lk__link" href="<?=$arResult["AUTH_AUTH_URL"]?>">Войти в аккаунт</a>
            <a class="lk__link" href="/create-account/">Зарегистрироваться</a>
        </div>
    </form>
    <script type="text/javascript">
    document.bform.onsubmit = function(){document.bform.USER_EMAIL.value = document.bform.USER_LOGIN.value;};
    document.bform.USER_LOGIN.focus();
    </script>
</section>


