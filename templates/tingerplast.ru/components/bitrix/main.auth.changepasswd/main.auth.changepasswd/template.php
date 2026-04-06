<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();
use \Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);
?>
<?//if ($arResult['AUTHORIZED']):?>
	<?//LocalRedirect("/account/")?>
<?//else:?>
    <?$arResult['GROUP_POLICY']['PASSWORD_REQUIREMENTS'];?>
    <?$fields = $arResult['FIELDS'];?>
    <section class="lk">
        <div class="lk__desc">Укажите новый пароль, длина нового пароля должна составлять не менее 6 символов</div>
            <form class="lk__form" name="bform" method="post" target="_top" action="<?= POST_FORM_ACTION_URI;?>">
                <input type="hidden" name="<?= $fields['login'];?>" maxlength="255" value="<?= \htmlspecialcharsbx($arResult['LAST_LOGIN']);?>" />
                <input type="hidden" name="<?= $fields['checkword'];?>" maxlength="255" value="<?= \htmlspecialcharsbx($arResult[$fields['checkword']]);?>" />
                  <?if ($arResult['ERRORS']):?>
                      <div class="lk__note note note_type_error">
                        <? foreach ($arResult['ERRORS'] as $error) {
                          echo $error;
                        }?>
                      </div>
                  <?elseif ($arResult['SUCCESS']):?>
                      <div class="lk__note note note_type_success">
                        <?= $arResult['SUCCESS'];?>
                      </div>
                  <?endif;?>
                <div class="lk__input-container">
                    <input class="lk__input input" type="password" name="<?= $fields['password'];?>" placeholder="Новый пароль*" value="<?= \htmlspecialcharsbx($arResult[$fields['password']]);?>" required>
                </div>
                <div class="lk__input-container">
                    <input class="lk__input input" type="password" name="<?= $fields['confirm_password'];?>" placeholder="Повторите новый пароль*" <?= \htmlspecialcharsbx($arResult[$fields['confirm_password']]);?> required>
                </div>
                <div class="lk__btn-container">
                    <input class="lk__btn btn btn_type_turquoise-green" type="submit" name="<?= $fields['action'];?>" value="Сменить пароль" />
                </div>
                <div class="lk__links-container">
                  <?if ($arResult['AUTH_AUTH_URL'] || $arResult['AUTH_REGISTER_URL']):?>
                    <?if ($arResult['AUTH_AUTH_URL']):?>
                          <a href="<?= $arResult['AUTH_AUTH_URL'];?>" rel="nofollow">Войти в аккаунт</a>
                    <?endif;?>
                  <?endif;?>
                </div>
            </form>
    </section>
<?//endif?>