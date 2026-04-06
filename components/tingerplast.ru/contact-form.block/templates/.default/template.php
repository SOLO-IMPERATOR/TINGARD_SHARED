<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>

<div class="contact-form__inner">
	<div class="contact-form__head">
		<div class="contact-form__title section-title section_margin-bottom_small">Если у вас есть вопросы, замечания или преложения</div>
		<div class="contact-form__text">Вы можете напрямую написать генеральному директору — Кононову Олегу Вячеславовичу</div>
	</div>
	<form class="contact-form__form">
		<input type="hidden" name="title" value="Заявка через форму обратной связи">
		<div class="contact-form__input-container">
			<input class="contact-form__input input input_theme_white" type="text" name="name" placeholder="Имя*" required>
		</div>
		<div class="contact-form__input-container">
			<input class="contact-form__input input input_theme_white" type="tel" name="phone" placeholder="Телефон">
		</div>
		<div class="contact-form__input-container">
			<input class="contact-form__input input input_theme_white" type="email" name="email" placeholder="Электронная почта*" required>
		</div>
		<div class="contact-form__textarea-container">
			<textarea class="contacts-form__textarea textarea textarea_theme_white" rows="5" name="comments" placeholder="Сообщение*" required></textarea>
		</div>
		<label class="contact-form__agreement agreement">
			<input class="checkbox__input" type="checkbox" name="policy" required>
			<span class="checkbox checkbox_theme_white"></span>
			<span class="checkbox__text checkbox__text checkbox__text_theme_white">Я даю <a class="checkbox__link checkbox__link_theme_white" href="/agreement-policy/">Согласие на обработку персональных данных</a> в соответствии с <a class="checkbox__link checkbox__link_theme_white" href="/privacy-policy/">Политикой обработки персональных данных</a></span>
		</label>
		<div class="contact-form__btn-container">
			<button class="contact-form__btn btn btn_type_white" type="submit">Отправить</button>
		</div>
	</form>
</div>