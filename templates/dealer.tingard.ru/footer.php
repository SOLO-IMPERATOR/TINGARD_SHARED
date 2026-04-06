<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();?>

<footer class="footer" itemscope itemtype="https://schema.org/WPFooter">
	<div class="footer__inner container">
		<div class="footer__logo">
			<img class="footer__logo-img" src="<?=SITE_TEMPLATE_PATH?>/img/footer-logo.svg" alt="Логотип TINGERPLAST">
		</div>
		<div class="footer__btn-container">
			<button class="btn btn_color_transparent-white" type="button" onclick="openModal('default-email-message', {'crm-entity': 'lead', 'crm-title': 'Связаться с производителем'})">Связаться с производителем</button>
		</div>
		<div class="footer__copyrights">© <?=date("Y");?>, ООО «ТехС» <br>Все права защищены</div>
		<div class="footer__links">
			<div class="footer__links-item">
				<a class="footer__link" href="/privacy-policy/">Политика обработки персональных данных</a>
			</div>
			<div class="footer__links-item">
				<a class="footer__link" href="/agreement-policy/">Согласие на обработку моих персональных данных</a>
			</div>
			<div class="footer__links-item">
				<a class="footer__link" href="/cookie-policy/">Согласие на использование файлов cookie</a>
			</div>
		</div>
		<div class="footer__requisites">
			<div class="footer__requisites-item">ИНН: 3528221902</div>
			<div class="footer__requisites-item">КПП: 352801001</div>
			<div class="footer__requisites-item">ОГРН: 1143528013155</div>
		</div>
		<div class="footer__contacts">
			<div class="footer__contacts-item">
				<a class="footer__contacts-link footer__contacts-link_type_email" href="mailto:sales@tingard.ru">sales@tingard.ru</a>
			</div>
			<div class="footer__contacts-item">
				<a class="footer__contacts-link footer__contacts-link_type_phone" href="tel:+78001003532">8 (800) 100-35-32</a>
			</div>
		</div>
	</div>
</footer>

<div class="cookie-bar">
	<div class="cookie-bar__container">
		<p class="cookie-bar__text">Мы используем «cookie» файлы, чтобы оптимизировать работу сайта для вашего удобства. Продолжая использовать сайт, вы даёте <a class="cookie__link" href="/cookie-policy/">согласие на обработку файлов «cookie»</a>.</p>
		<div class="cookie-bar__btn-container">
			<button class="cookie-bar__btn" type="button" onclick="document.cookie='cookie_policy=accepted;path=/;expires=Fri, 31 Dec 9999 23:59:59 GMT';document.querySelector('.cookie-bar').style.display='none';">Закрыть</div>
		</div>
	</div>
</div>





<div id="modal-container">

	<div class="modal" data-entity="modal" data-modal-type="thanks">
		<div class="modal__body">
			<button class="modal__close" type="button" data-entity="modal-close">Закрыть</button>
			<div class="modal__title section-title" data-entity="modal-title"></div>
		</div>
	</div>

	<div class="modal" data-entity="modal" data-modal-type="default">
		<div class="modal__body">
			<button class="modal__close" type="button" data-entity="modal-close">Закрыть</button>
			<div class="modal__title section-title" data-entity="modal-title"></div>
			<form class="modal__form" data-entity="form">
				<input type="hidden" name="crm-entity">
				<input type="hidden" name="crm-title">
				<input type="hidden" name="crm-sale-direction">
				<input type="hidden" name="crm-responsible">
				<input type="hidden" name="action">
				<label class="form-label">
					<span class="form-input-name">Имя: *</span>
					<input class="form-input" type="text" name="name" required>
				</label>
				<label class="form-label">
					<span class="form-input-name">Телефон: *</span>
					<input class="form-input" type="tel" name="phone" required>
				</label>
				<label class="form-label">
					<span class="form-input-name">E-mail:</span>
					<input class="form-input" type="email" name="email">
				</label>
				<label class="form-policy">
					<input class="checkbox__input" type="checkbox" name="policy" required>
					<span class="checkbox__container">
						<span class="checkbox"></span>
						<span class="checkbox__text">Я даю <a href="/agreement-policy/">Согласие на обработку персональных данных</a> в соответствии с <a href="/privacy-policy/">Политикой обработки персональных данных</a></span>
					</span>
				</label>
				<button class="btn btn_color_blue" type="submit">Отправить</button>
			</form>
		</div>
	</div>

	<div class="modal" data-entity="modal" data-modal-type="default-email-message">
		<div class="modal__body">
			<button class="modal__close" type="button" data-entity="modal-close">Закрыть</button>
			<div class="modal__title section-title" data-entity="modal-title"></div>
			<form class="modal__form" data-entity="form">
				<input type="hidden" name="crm-entity">
				<input type="hidden" name="crm-title">
				<input type="hidden" name="crm-sale-direction">
				<input type="hidden" name="crm-responsible">
				<input type="hidden" name="action">
				<label class="form-label">
					<span class="form-input-name">Имя: *</span>
					<input class="form-input" type="text" name="name" required>
				</label>
				<label class="form-label">
					<span class="form-input-name">E-mail: *</span>
					<input class="form-input" type="email" name="email" required>
				</label>
				<label class="form-label">
					<span class="form-input-name">Сообщение: *</span>
					<textarea class="form-textarea" name="comments" required></textarea>
				</label>
				<label class="form-policy">
					<input class="checkbox__input" type="checkbox" name="policy" required>
					<span class="checkbox__container">
						<span class="checkbox"></span>
						<span class="checkbox__text">Я даю <a href="/agreement-policy/">Согласие на обработку персональных данных</a> в соответствии с <a href="/privacy-policy/">Политикой обработки персональных данных</a></span>
					</span>
				</label>
				<button class="btn btn_color_blue" type="submit">Отправить</button>
			</form>
		</div>
	</div>

</div>
</body>
</html>