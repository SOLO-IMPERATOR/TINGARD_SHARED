<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<footer itemscope itemtype="http://schema.org/WPFooter" class="footer">
	<div class="footer__inner container">
		<div class="footer__body">
			<div class="footer__logo logo">
				<div class="logo__img-container">
					<a class="logo__link" href="/"><img class="logo__img" src="<?=SITE_TEMPLATE_PATH?>/img/logo.svg" alt="Логотип TINGERPLAST"></a>
				</div>
				<div class="logo__desc">пластиковые ёмкости от производителя</div>
			</div>
			<div class="footer__phone-container">
				<div class="footer__phone">
					<a class="footer__phone-link" href="tel:8 (800) 350-81-69">8 (800) 350-81-69</a>
				</div>
			</div>
			<ul class="footer__policy">
				<li class="footer__policy-item">
					<a class="footer__policy-link" href="/privacy-policy/">Политика обработки персональных данных</a>
				</li>
				<li class="footer__policy-item">
					<a class="footer__policy-link" href="/agreement-policy/">Согласие на обработку персональных данных</a>
				</li>
				<li class="footer__policy-item">
					<a class="footer__policy-link" href="/cookie-policy/">Согласие на использования файлов cookie</a>
				</li>
			</ul>
		</div>
		<div class="footer__copyright">
			<div class="footer__copyright-item">© 2008-2023 ООО «ТехС».</div>
			<div class="footer__copyright-item">Все права защищены.</div>
		</div>
	</div>
</footer>
<form class="modal" data-modal-type="default">
	<input type="hidden" name="title">
	<input type="hidden" name="direction">
	<input type="hidden" name="comments">
	<div class="modal__block">
		<button class="modal__close" type="button">Закрыть</button>
		<div class="modal__title section-title section-title_margin_bottom" data-modal-entity="title"></div>
		<div class="modal__inner">
			<div class="modal__input-container">
				<input class="modal__input input" type="text" name="name" placeholder="Имя*" required>
			</div>
			<div class="modal__input-container">
				<input class="modal__input input" type="tel" name="phone" placeholder="Телефон*" required>
			</div>
			<label class="modal__agreement agreement">
				<input class="checkbox__input" type="checkbox" name="policy" required>
				<span class="checkbox"></span>
				<span class="checkbox__text">Я даю <a href="/agreement-policy/">Согласие на обработку персональных данных</a> в соответствии с <a href="/privacy-policy/">Политикой обработки персональных данных</a></span>
			</label>

			<div class="modal__btn-container">
				<button class="modal__btn btn btn_type_turquoise-green" type="submit">Отправить</button>
			</div>
		</div>
	</div>
</form>

<form class="modal" data-modal-type="default_with_comments">
	<input type="hidden" name="title">
	<input type="hidden" name="direction">
	<input type="hidden" name="comments">
	<div class="modal__block">
		<button class="modal__close" type="button">Закрыть</button>
		<div class="modal__title section-title section-title_margin_bottom" data-modal-entity="title"></div>
		<div class="modal__inner">
			<div class="modal__input-container">
				<input class="modal__input input" type="text" name="name" placeholder="Имя*" required>
			</div>
			<div class="modal__input-container">
				<input class="modal__input input" type="tel" name="phone" placeholder="Телефон*" required>
			</div>
			<div class="modal__input-container">
				<textarea class="modal__textarea textarea" rows="5" type="text" name="comments" placeholder="Сообщение*" required></textarea>
			</div>
			<label class="modal__agreement agreement">
				<input class="checkbox__input" type="checkbox" name="policy" required>
				<span class="checkbox"></span>
				<span class="checkbox__text">Я даю <a href="/agreement-policy/">Согласие на обработку персональных данных</a> в соответствии с <a href="/privacy-policy/">Политикой обработки персональных данных</a></span>
			</label>

			<div class="modal__btn-container">
				<button class="modal__btn btn btn_type_turquoise-green" type="submit">Отправить</button>
			</div>
		</div>
	</div>
</form>

<form class="modal modal_type_feedback" data-modal-type="feedback" id="modal-feedback">
	<input type="hidden" name="title">
	<input type="hidden" name="direction">
	<input type="hidden" name="type" value="feedback">
	<div class="modal__block">
		<button class="modal__close" type="button">Закрыть</button>
		<div class="modal__title section-title section-title_margin_bottom" data-modal-entity="title"></div>
		<div class="modal__inner modal__inner_type_feedback">
			<label class="modal__item">
				<input class="radio__input" type="radio" name="feedback-answer" value="Не нашёл то, что искал">
				<span class="radio__container">
					<span class="radio"></span>
					<span class="radio__text">Не нашёл то, что искал</span>
				</span>
				<div class="modal__item-hidden-field">
					<div class="modal__item-hidden-title">А что вы искали?</div>
					<div class="modal__input-container">
						<input class="modal__input input" type="text" name="comments1" placeholder="Текст">
					</div>
				</div>
			</label>
			<label class="modal__item">
				<input class="radio__input" type="radio" name="feedback-answer" value="Непонятно, как заказать">
				<span class="radio__container">
					<span class="radio"></span>
					<span class="radio__text">Непонятно, как заказать</span>
				</span>
				<div class="modal__item-hidden-field">
					<div class="modal__item-hidden-title">Может мы вам позвоним и примем заказ по телефону?</div>
					<div class="modal__input-container">
						<input class="modal__input input" type="tel" name="phone1" placeholder="Укажите телефон">
					</div>
				</div>
			</label>
			<label class="modal__item">
				<input class="radio__input" type="radio" name="feedback-answer" value="Сайт не вызывает доверия">
				<span class="radio__container">
					<span class="radio"></span>
					<span class="radio__text">Сайт не вызывает доверия</span>
				</span>
				<div class="modal__item-hidden-field">
					<div class="modal__item-hidden-title">Может мы вам позвоним и обсудим?</div>
					<div class="modal__input-container">
						<input class="modal__input input" type="tel" name="phone2" placeholder="Укажите телефон">
					</div>
				</div>
			</label>
			<label class="modal__item">
				<input class="radio__input" type="radio" name="feedback-answer" value="Мне было просто любопытно">
				<span class="radio__container">
					<span class="radio"></span>
					<span class="radio__text">Мне было просто любопытно</span>
				</span>
			</label>
			<label class="modal__item">
				<input class="radio__input" type="radio" name="feedback-answer" value="Позвоните мне">
				<span class="radio__container">
					<span class="radio"></span>
					<span class="radio__text">Позвоните мне</span>
				</span>
				<div class="modal__item-hidden-field">
					<div class="modal__item-hidden-title">Укажите ваш телефон</div>
					<div class="modal__input-container">
						<input class="modal__input input" type="tel" name="phone3" placeholder="Телефон">
					</div>
				</div>
			</label>
			<label class="modal__item">
				<input class="radio__input" type="radio" name="feedback-answer" value="Дорого">
				<span class="radio__container">
					<span class="radio"></span>
					<span class="radio__text">Дорого</span>
				</span>
			</label>
			<label class="modal__item">
				<input class="radio__input" type="radio" name="feedback-answer" value="Другое">
				<span class="radio__container">
					<span class="radio"></span>
					<span class="radio__text">Другое</span>
				</span>
				<div class="modal__item-hidden-field">
					<div class="modal__item-hidden-title">Напишите здесь</div>
					<div class="modal__input-container">
						<input class="modal__input input" type="text" name="comments2" placeholder="Текст">
					</div>
				</div>
			</label>
		</div>

		<div class="modal__btn-container">
			<button class="modal__btn btn btn_type_turquoise-green" type="submit" disabled>Отправить</button>
		</div>
	</div>
</form>

<div class="cookie-bar">
	<div class="cookie-bar__container">
		<p class="cookie-bar__text">Мы используем «cookie» файлы, чтобы оптимизировать работу сайта для вашего удобства. Продолжая использовать сайт, вы даёте <a class="cookie__link" href="/cookie-policy/">согласие на обработку файлов «cookie»</a>.</p>
		<div class="cookie-bar__btn-container">
			<button class="cookie-bar__btn" type="button" onclick="document.cookie='cookie_policy=accepted;path=/;expires=Fri, 31 Dec 9999 23:59:59 GMT';document.querySelector('.cookie-bar').style.display='none';">Закрыть</div>
		</div>
	</div>
</div>

<button class="btn_hidden" type="button" data-action="modal" data-modal-type="feedback" data-crm-direction="16452" data-crm-title="Лид из опроса при выходе с сайта" data-modal-title="Почему вы уходите с сайта?"></button>

</body>

</html>