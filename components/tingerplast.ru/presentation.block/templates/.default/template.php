<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>

<div class="presentation__inner">
	<div class="presentation__head">
		<div class="presentation__title section-title section_margin-bottom_small">Запишитесь на бесплатную онлайн-презентацию</div>
		<div class="presentation__text">Оставьте свой номер телефона, мы перезвоним в течение часа и договоримся с вами о презентации завода и наших продуктов</div>
	</div>
	<form class="presentation__form">
		<input type="hidden" name="title" value="Записаться на онлайн-презентацию">
		<div class="presentation__input-container">
			<input class="presentation__input input" type="text" name="name" placeholder="Имя*" required>
		</div>
		<div class="presentation__input-container">
			<input class="presentation__input input" type="tel" name="phone" placeholder="Телефон*" required>
		</div>
		<div class="presentation__btn-container">
			<button class="presentation__btn btn btn_type_black" type="submit">Записаться</button>
		</div>
		<label class="presentation__agreement agreement">
			<input class="checkbox__input" type="checkbox" name="policy" required>
			<span class="checkbox checkbox_theme_black"></span>
			<span class="checkbox__text checkbox__text checkbox__text_theme_black">Я даю <a class="checkbox__link checkbox__link_theme_black" href="/agreement-policy/">Согласие на обработку персональных данных</a> в соответствии с <a class="checkbox__link checkbox__link_theme_black" href="/privacy-policy/">Политикой обработки персональных данных</a></span>
		</label>
	</form>
</div>