<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */?>

<form class="form margin_b_m">
    <p class="p margin_b_m">Уважаемые владельцы! <br>Нам важно знать мнение каждого обладателя техники TINGER.</p>
    <div class="customer-support-form__inner">
        <label class="customer-support-form__item">
            <input class="input-field" data-b24="NAME" type="text" name="name" placeholder="Имя">
        </label>
        <label class="customer-support-form__item">
            <input class="input-field" data-b24="PHONE_WORK" type="tel" name="phone" placeholder="Телефон*" required>
        </label>
        <label class="customer-support-form__item">
            <input class="input-field" data-b24="EMAIL_WORK" type="text" name="email" placeholder="E-mail*" required>
        </label>
        <label class="customer-support-form__item">
                <textarea class="textarea-field" data-b24="COMMENTS" name="question" placeholder="Вопрос*" required></textarea>
        </label>
        <label class="customer-support-form__item form-policy">
            <input class="checkbox__input" type="checkbox" name="policy">
            <span class="checkbox__container">
                <span class="checkbox"></span>
                <span class="checkbox__text">Нажимая на кнопку «<?=$arResult['PROPERTIES']['BUTTON_TEXT']['VALUE']?>», я даю согласие на обработку моих <a href="/privacy-policy/">персональных данных</a></span>
            </span>
        </label>
        <div class="customer-support-form__btn-container">
            <button class="btn btn--green--fill" type="submit"><?=$arResult['PROPERTIES']['BUTTON_TEXT']['VALUE']?></button>
        </div>
    </div>
</form>
<p class="p">Задать вопросы, выразить пожелания или замечания вы можете по телефону <a href="tel:8 (800) 350-25-05">8 (800) 350-25-05</a> <br>и по электронной почте <a href="mailto:help@tinger.ru">help@tinger.ru</a></p>