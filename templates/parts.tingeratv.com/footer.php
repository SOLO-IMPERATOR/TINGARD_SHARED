<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<footer itemscope itemtype="http://schema.org/WPFooter" class="footer">
	<div class="footer__bottom">
		<div class="footer__bottom-inner container">
			<div class="footer__bottom-copyrights">
				<p class="footer__bottom-copyrights-item">© TINGER, 2010 – <?= date('Y') ?></p>
			</div>
			<p class="footer__bottom-email">
				<a class="footer__bottom-email-link" href="mailto:i.sokolov@tingeratv.com">i.sokolov@tingeratv.com</a>
			</p>
			<p class="footer__bottom-phone">
				<a class="footer__bottom-phone-link" href="tel:+19299992156">+1 (929) 999-21-56</a>
			</p>
		</div>
	</div>
</footer>
<div class="header-bg"></div>
<div class="cookie-bar">
	<div class="cookie-bar__container">
		<p class="cookie-bar__text">Мы используем «cookie» файлы, чтобы оптимизировать работу сайта для вашего удобства.
			Продолжая использовать сайт, вы даёте <a class="cookie__link" href="/cookie-policy/">согласие на обработку
				файлов «cookie»</a>.</p>
		<div class="cookie-bar__btn-container">
			<button class="cookie-bar__btn" type="button"
				onclick="document.cookie='cookie_policy=accepted;path=/;expires=Fri, 31 Dec 9999 23:59:59 GMT';document.querySelector('.cookie-bar').style.display='none';">Закрыть
		</div>
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
				<label class="form-policy">
					<input class="checkbox__input" type="checkbox" name="policy" required>
					<span class="checkbox__container">
						<span class="checkbox"></span>
						<span class="checkbox__text">Я даю <a href="/agreement-policy/">Согласие на обработку
								персональных данных</a> в соответствии с <a href="/privacy-policy/">Политикой обработки
								персональных данных</a></span>
					</span>
				</label>
				<button class="btn btn_color_green" type="submit">Отправить</button>
			</form>
		</div>
	</div>
	<div class="modal" data-entity="modal" data-modal-type="default-email">
		<div class="modal__body">
			<button class="modal__close" type="button" data-entity="modal-close">Закрыть</button>
			<div class="modal__title section-title" data-entity="modal-title"></div>
			<form class="modal__form" method="POST" data-entity="form" data-send-pdf="true">
				<input type="hidden" name="crm-entity">
				<input type="hidden" name="crm-title">
				<input type="hidden" name="crm-sale-direction">
				<input type="hidden" name="crm-responsible">
				<input type="hidden" name="action">
				<label class="form-label">
					<span class="form-input-name">Имя: *</span>
					<input class="form-input" type="text" id="name_configurator" name="name" required>
				</label>
				<label class="form-label">
					<span class="form-input-name">Телефон: *</span>
					<input class="form-input" type="tel" id="pnohe_configurator" name="phone" required>
				</label>
				<label class="form-label">
					<span class="form-input-name">E-mail: *</span>
					<input class="form-input" type="email" id="email_configurator" name="email" required>
				</label>
				<label class="form-policy">
					<input class="checkbox__input" type="checkbox" name="policy" required>
					<span class="checkbox__container">
						<span class="checkbox"></span>
						<span class="checkbox__text">Я даю <a href="/agreement-policy/">Согласие на обработку
								персональных данных</a> в соответствии с <a href="/privacy-policy/">Политикой обработки
								персональных данных</a></span>
					</span>
				</label>
				<button class="btn btn_color_green" type="submit">Отправить</button>
			</form>
		</div>
	</div>
</div>

</body>

</html>