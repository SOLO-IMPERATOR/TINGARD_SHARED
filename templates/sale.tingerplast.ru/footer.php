<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<footer class="footer">
	<div class="container">
		<div class="footer__inner">
			<p class="footer__copyright">© ООО «ТехС», 2010-<?php echo date('Y'); ?></p>
			<nav class="footer__nav">
				<div class="footer__nav-item"><a class="footer__nav-link" href="/privacy-policy/">Политика обработки персональных данных</a></div>
				<div class="footer__nav-item"><a class="footer__nav-link" href="/agreement-policy/">Согласие на обработку персональных данных</a></div>
				<div class="footer__nav-item"><a class="footer__nav-link" href="/cookie-policy/">Согласие на использование файлов cookie</a></div>
			</nav>
		</div>
	</div>
</footer>
<div class="cookie-bar">
	<div class="cookie-bar__container container">
	<p class="cookie-bar__text">Мы используем «cookie» файлы, чтобы оптимизировать работу сайта для вашего удобства. Продолжая использовать сайт, вы даёте <a class="cookie__link" href="/cookie-policy/">согласие на обработку файлов «cookie»</a>.</p>
	<div class="cookie-bar__btn-container">
		<button class="btn btn_small" type="button" onclick="document.cookie='cookie_policy=accepted;path=/;expires=Fri, 31 Dec 9999 23:59:59 GMT';document.querySelector('.cookie-bar').style.display='none';">Закрыть</button></div>
	</div>
</div>


<div id="modal-container">
	<div class="modal" data-entity="modal" data-modal-type="quiz">
		<div class="modal__body modal__body_type_quiz">
			<button class="modal__close" type="button" data-entity="modal-close">Закрыть</button>
			<div class="modal__quiz quiz" data-entity="quiz">

				<div data-question="1" class="quiz__question">
					<div class="section-subtitle quiz__title">Какой вид пластика вам нужен?</div>
					<div class="quiz__answers">
						<div class="quiz__answers-img-container">
							<img class="quiz__answers-img" src="<?=SITE_TEMPLATE_PATH?>/images/quiz-question-1.webp" alt="Пластик">
						</div>
						<label class="radio">
							<input class="radio__input" type="radio" name="type" value="полиэтилен">
							<span class="radiobox"></span>
							<span class="radiobox__text">полиэтилен</span>
						</label>
						<label class="radio">
							<input class="radio__input" type="radio" name="type" value="полипропилен">
							<span class="radiobox"></span>
							<span class="radiobox__text">полипропилен</span>
						</label>
					</div>
					<div class="quiz__btn-container">
						<button class="btn btn_color_red" onclick="showQuestion(2)">Далее</button>
					</div>
				</div>

				<div data-question="2" class="quiz__question" style="display: none;">
					<div class="section-subtitle quiz__title">Укажите параметры</div>
					<div class="quiz__answers">
						<input class="input input_border_black" type="text" name="length" placeholder="Укажите длину, мм">
						<input class="input input_border_black" type="text" name="weight" placeholder="Укажите ширину, мм">
						<input class="input input_border_black" type="text" name="thickness" placeholder="Укажите толщину, мм">
						<select class="select" name="color">
							<option selected disabled value="">выберите цвет</option>
							<option value="чёрный">чёрный</option>
							<option value="белый">белый</option>
							<option value="серый">серый</option>
							<option value="голубой">голубой</option>
							<option value="другой">другой</option>
						</select>
					</div>
					<div class="quiz__btn-container">
						<button class="btn btn_color_red" onclick="showQuestion(3)">Далее</button>
					</div>
				</div>
			
				<div data-question="3" class="quiz__question" style="display: none;">
					<div class="section-subtitle quiz__title">Какой объём?</div>
					<div class="quiz__answers">
						<input class="input input_border_black" type="text" name="number" placeholder="Количество, шт.">
						<input class="input input_border_black" type="text" name="volume" placeholder="Тонн">
					</div>
					<div class="quiz__btn-container">
						<button class="btn btn_color_red" onclick="showQuestion(4)">Далее</button>
					</div>
				</div>

				<div data-question="4" class="quiz__question" style="display: none;">
					<div class="section-subtitle quiz__title">Куда доставить?</div>
					<div class="quiz__answers">
						<select class="select" name="region">
							<option selected disabled value="">выберите регион</option>
							<option value="Алтайский край">Алтайский край</option>
							<option value="Амурская область">Амурская область</option>
							<option value="Архангельская область">Архангельская область</option>
							<option value="Астраханская область">Астраханская область</option>
							<option value="Белгородская область">Белгородская область</option>
							<option value="Брянская область">Брянская область</option>
							<option value="Владимирская область">Владимирская область</option>
							<option value="Волгоградская область">Волгоградская область</option>
							<option value="Вологодская область">Вологодская область</option>
							<option value="Воронежская область">Воронежская область</option>
							<option value="г. Москва">г. Москва</option>
							<option value="Еврейская автономная область">Еврейская автономная область</option>
							<option value="Забайкальский край">Забайкальский край</option>
							<option value="Ивановская область">Ивановская область</option>
							<option value="Иные территории, включая город и космодром Байконур">Иные территории, включая город и космодром Байконур</option>
							<option value="Иркутская область">Иркутская область</option>
							<option value="Кабардино-Балкарская Республика">Кабардино-Балкарская Республика</option>
							<option value="Калининградская область">Калининградская область</option>
							<option value="Калужская область">Калужская область</option>
							<option value="Камчатский край">Камчатский край</option>
							<option value="Карачаево-Черкесская Республика">Карачаево-Черкесская Республика</option>
							<option value="Кемеровская область&nbsp;- Кузбасс">Кемеровская область&nbsp;- Кузбасс</option>
							<option value="Кировская область">Кировская область</option>
							<option value="Костромская область">Костромская область</option>
							<option value="Краснодарский край">Краснодарский край</option>
							<option value="Красноярский край">Красноярский край</option>
							<option value="Курганская область">Курганская область</option>
							<option value="Курская область">Курская область</option>
							<option value="Ленинградская область">Ленинградская область</option>
							<option value="Липецкая область">Липецкая область</option>
							<option value="Магаданская область">Магаданская область</option>
							<option value="Московская область">Московская область</option>
							<option value="Мурманская область">Мурманская область</option>
							<option value="Ненецкий автономный округ">Ненецкий автономный округ</option>
							<option value="Нижегородская область">Нижегородская область</option>
							<option value="Новгородская область">Новгородская область</option>
							<option value="Новосибирская область">Новосибирская область</option>
							<option value="Омская область">Омская область</option>
							<option value="Оренбургская область">Оренбургская область</option>
							<option value="Орловская область">Орловская область</option>
							<option value="Пензенская область">Пензенская область</option>
							<option value="Пермский край">Пермский край</option>
							<option value="Приморский край">Приморский край</option>
							<option value="Псковская область">Псковская область</option>
							<option value="Республика Адыгея (Адыгея)">Республика Адыгея (Адыгея)</option>
							<option value="Республика Алтай">Республика Алтай</option>
							<option value="Республика Башкортостан">Республика Башкортостан</option>
							<option value="Республика Бурятия">Республика Бурятия</option>
							<option value="Республика Дагестан">Республика Дагестан</option>
							<option value="Республика Ингушетия">Республика Ингушетия</option>
							<option value="Республика Калмыкия">Республика Калмыкия</option>
							<option value="Республика Карелия">Республика Карелия</option>
							<option value="Республика Коми">Республика Коми</option>
							<option value="Республика Крым">Республика Крым</option>
							<option value="Республика Марий Эл">Республика Марий Эл</option>
							<option value="Республика Мордовия">Республика Мордовия</option>
							<option value="Республика Саха (Якутия)">Республика Саха (Якутия)</option>
							<option value="Республика Северная Осетия - Алания">Республика Северная Осетия - Алания</option>
							<option value="Республика Татарстан (Татарстан)">Республика Татарстан (Татарстан)</option>
							<option value="Республика Тыва">Республика Тыва</option>
							<option value="Республика Хакасия">Республика Хакасия</option>
							<option value="Ростовская область">Ростовская область</option>
							<option value="Рязанская область">Рязанская область</option>
							<option value="Самарская область">Самарская область</option>
							<option value="Санкт-Петербург">Санкт-Петербург</option>
							<option value="Саратовская область">Саратовская область</option>
							<option value="Сахалинская область">Сахалинская область</option>
							<option value="Свердловская область">Свердловская область</option>
							<option value="Севастополь">Севастополь</option>
							<option value="Смоленская область">Смоленская область</option>
							<option value="Ставропольский край">Ставропольский край</option>
							<option value="Тамбовская область">Тамбовская область</option>
							<option value="Тверская область">Тверская область</option>
							<option value="Томская область">Томская область</option>
							<option value="Тульская область">Тульская область</option>
							<option value="Тюменская область">Тюменская область</option>
							<option value="Удмуртская Республика">Удмуртская Республика</option>
							<option value="Ульяновская область">Ульяновская область</option>
							<option value="Хабаровский край">Хабаровский край</option>
							<option value="Ханты-Мансийский автономный округ - Югра">Ханты-Мансийский автономный округ - Югра</option>
							<option value="Челябинская область">Челябинская область</option>
							<option value="Чеченская Республика">Чеченская Республика</option>
							<option value="Чувашская Республика - Чувашия">Чувашская Республика - Чувашия</option>
							<option value="Чукотский автономный округ">Чукотский автономный округ</option>
							<option value="Ямало-Ненецкий автономный округ">Ямало-Ненецкий автономный округ</option>
							<option value="Ярославская область">Ярославская область</option>
						</select>
					</div>
					<div class="quiz__btn-container">
						<button class="btn btn_color_red" onclick="showQuestion(5)">Далее</button>
					</div>
				</div>
			
				<form data-question="5" class="quiz__form" data-entity="form" style="display: none;">
					<div class="section-subtitle quiz__title">Заполните форму и получите коммерческое предложение</div>
					<input type="hidden" name="crm-entity">
					<input type="hidden" name="crm-title">
					<input type="hidden" name="action">
					<div class="quiz__answers">
						<input class="input input_border_black" type="text" name="name" placeholder="Имя">
						<input class="input input_border_black" type="tel" name="phone" placeholder="Телефон*" required>
						<label class="policy">
							<input class="checkbox-input" type="checkbox" name="policy" required>
							<span class="checkbox">
								<span class="checkbox__box checkbox__box_border_black"></span>
								<span class="checkbox__text checkbox__text_color_black">Я даю <a class="checkbox__text-link checkbox__text-link_color_black" href="/agreement-policy/">Согласие на обработку персональных данных</a> в соответствии с <a class="checkbox__text-link checkbox__text-link_color_black" href="/privacy-policy/">Политикой обработки персональных данных</a></span>
							</span>
						</label>
					</div>
					<div class="quiz__form-btn-container">
						<button class="btn btn_color_red" type="submit">Отправить</button>
					</div>
				</form>
			</div>
			
		</div>
	</div>
</div>