
			</main>
		</div>

		<section class="callback section section_padding-top_big section_padding-bottom_big">
			<div class="callback__inner container">
				<div class="callback__title">
					<div class="section-title callback__title-line">Возникли вопросы?</div>
					<div class="section-title callback__title-line">Свяжитесь с нами</div>
				</div>
				<div class="callback__contacts">
					<a class="callback__phone section-subtitle" href="tel:8 (800) 350-98-05">8 (800) 350-98-05</a>
					<a class="callback__mail section-subtitle" href="mailto:help@tingerplast.ru">help@tingerplast.ru</a>
				</div>
				<div class="callback__btn-container">
					<button class="callback__btn btn btn_type_white" type="button" data-action="modal" data-modal-type="default_with_comments" data-crm-title="Возникли вопросы">Оставить заявку</button>
				</div>
				<div class="callback__address-container">
					<div class="callback__address section-subtitle">Вологодская обл., г. Череповец, ул. Окружная, 18</div>
					<div class="callback__decor-container">
						<svg width="259" height="145" viewBox="0 0 259 145" fill="none" xmlns="http://www.w3.org/2000/svg">
							<rect opacity="0.3" width="46.238" height="46.238" transform="matrix(-0.707105 0.707109 0.707105 0.707109 226.053 39.4697)" fill="white"/>
							<rect opacity="0.3" width="46.238" height="46.238" transform="matrix(-0.707105 0.707109 0.707105 0.707109 32.8296 39.4697)" fill="white"/>
							<rect opacity="0.5" width="73.9808" height="73.9808" transform="matrix(-0.707105 0.707109 0.707105 0.707109 77.752 19.8525)" fill="white"/>
							<rect opacity="0.5" width="73.9808" height="73.9808" transform="matrix(-0.707105 0.707109 0.707105 0.707109 185.362 19.8525)" fill="white"/>
							<rect width="101.724" height="101.724" transform="matrix(-0.707105 0.707109 0.707105 0.707109 133.662 0.235352)" fill="white"/>
						</svg>
					</div>
				</div>
			</div>
		</section>
		<footer itemscope itemtype="https://schema.org/WPFooter">
			<div class="footer__top">
				<div class="footer__top-inner container">
					<div class="foooter__top-logo">
						<a class="footer__top-link" href="/">
							<img class="footer__top-img" src="<?=SITE_TEMPLATE_PATH?>/img/logo-black.svg" alt="Логотип компании TINGERPLAST">
						</a>
					</div>
					<div class="footer__contacts contacts-bar">
						<div class="contacts-bar__link-container">
							<a class="contacts-bar__link" href="mailto:help@tingerplast.ru">help@tingerplast.ru</a>
						</div>
						<div class="contacts-bar__link-container">
							<a class="contacts-bar__link" href="tel:88003509805">8 (800) 350-98-05</a>
						</div>
						<div class="contacts-bar__worktime">пн-пт c 9:00 до 18:00</div>
					</div>
				</div>
			</div>
			<div class="footer__middle container">
				<nav class="footer__middle-nav">
					<ul class="footer__nav-list">
						<li class="footer__nav-item">
							<a class="footer__nav-link" href="/delivery/">Доставка и оплата</a>
						</li>
						<li class="footer__nav-item">
							<a class="footer__nav-link" href="/warranty/">Гарантия и возврат</a>
						</li>
						<li class="footer__nav-item">
							<a class="footer__nav-link" href="/faq/">Вопросы и ответы</a>
						</li>
						<li class="footer__nav-item">
							<a class="footer__nav-link" href="/reviews/">Отзывы</a>
						</li>
						<li class="footer__nav-item footer__nav-item_type_submenu">
							<span class="footer__nav-link footer__nav-link_type_submenu">О компании</span>
							<ul class="footer__nav-sublist">
								<li class="footer__nav-subitem">
									<a class="footer__nav-sublink" href="/news/">Новости</a>
								</li>
								<li class="footer__nav-subitem">
									<a class="footer__nav-sublink" href="/articles/">Статьи</a>
								</li>
								<li class="footer__nav-subitem">
									<a class="footer__nav-sublink" href="/media/">СМИ о нас</a>
								</li>
								<li class="footer__nav-subitem">
									<a class="footer__nav-sublink" href="/about/">О компании</a>
								</li>
							</ul>
						</li>
						<li class="footer__nav-item">
							<a class="footer__nav-link" href="/contacts/">Контакты</a>
						</li>
					</ul>
				</nav>
				<div class="footer__middle-sections">
					<?$APPLICATION->IncludeComponent(
						"bitrix:catalog.section.list", 
						"catalog.section.list.footer", 
						array(
							"VIEW_MODE" => "LIST",
							"SHOW_PARENT_NAME" => "Y",
							"IBLOCK_TYPE" => "catalog",
							"IBLOCK_ID" => "41",
							"SECTION_ID" => "",
							"SECTION_CODE" => "",
							"SECTION_URL" => "",
							"COUNT_ELEMENTS" => "N",
							"TOP_DEPTH" => "2",
							"SECTION_FIELDS" => array(
								0 => "",
								1 => "",
							),
							"SECTION_USER_FIELDS" => array(
								0 => "UF_SECTION_IMAGE",
								1 => "UF_GENERAL_SECTIONS",
								2 => "",
							),
							"ADD_SECTIONS_CHAIN" => "N",
							"CACHE_TYPE" => "A",
							"CACHE_TIME" => "36000000",
							"CACHE_NOTES" => "",
							"CACHE_GROUPS" => "Y",
							"COMPONENT_TEMPLATE" => "catalog.section.list.sidebar",
							"COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
							"ADDITIONAL_COUNT_ELEMENTS_FILTER" => "additionalCountFilter",
							"HIDE_SECTIONS_WITH_ZERO_COUNT_ELEMENTS" => "N",
							"FILTER_NAME" => "sectionsFilter",
							"CACHE_FILTER" => "N"
						),
						false
					);?>
				</div>
			</div>

			<div class="footer__bottom">
				<div class="footer__bottom-inner container">
					<div class="footer__bottom-copyrights">
						<div class="footer__bottom-copyright">© 2008-<span itemprop="copyrightYear"><?=date('Y')?></span></div>
						<div class="footer__bottom-copyright">ООО «ТехС». Все права защищены.</div>
					</div>
					<div class="footer__bottom-links">
						<div class="footer__bottom-copyright">
							<a class="footer__bottom-link" href="/privacy-policy/">Политика обработки персональных данных</a>
						</div>
						<div class="footer__bottom-copyright">
							<a class="footer__bottom-link" href="/agreement-policy/">Согласие на обработку персональных данных</a>
						</div>
						<div class="footer__bottom-copyright">
							<a class="footer__bottom-link" href="/cookie-policy/">Политика использования файлов cookies</a>
						</div>
					</div>
					<div class="footer__bottom-socials">
						<ul class="social-list">
							<li class="social-item">
								<a class="social-link" href="/">
									<img class="social-img" src="<?=SITE_TEMPLATE_PATH?>/img/social-vk.svg" alt="Иконка ВК">
								</a>
							</li>
							<li class="social-item">
								<a class="social-link" href="/">
									<img class="social-img" src="<?=SITE_TEMPLATE_PATH?>/img/social-youtube.svg" alt="Иконка YouTube">
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			
		</footer>









		<form class="modal" data-modal-type="default" data-function="">
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
						<span class="checkbox__text">Я даю <a href="/agreement-policy/">Согласие на обработку
								персональных данных</a> в соответствии с <a href="/privacy-policy/">Политикой обработки
								персональных данных</a></span>
					</label>

					<div class="modal__btn-container">
						<button class="modal__btn btn btn_type_turquoise-green" type="submit">Отправить</button>
					</div>
				</div>
			</div>
		</form>

		<form class="modal" data-modal-type="default_with_comments" data-function="">
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
						<span class="checkbox__text">Я даю <a href="/agreement-policy/">Согласие на обработку
								персональных данных</a> в соответствии с <a href="/privacy-policy/">Политикой обработки
								персональных данных</a></span>
					</label>

					<div class="modal__btn-container">
						<button class="modal__btn btn btn_type_turquoise-green" type="submit">Отправить</button>
					</div>
				</div>
			</div>
		</form>







		<div class="cookie-bar">
			<div class="cookie-bar__container">
				<p class="cookie-bar__text">Мы используем «cookie» файлы, чтобы оптимизировать работу сайта для вашего удобства. Продолжая использовать сайт, вы даёте <a class="cookie__link" href="/cookie-policy/">согласие на обработку файлов «cookie»</a>.</p>
				<div class="cookie-bar__btn-container">
					<button class="cookie-bar__btn" type="button" onclick="document.cookie='cookie_policy=accepted;path=/;expires=Fri, 31 Dec 9999 23:59:59 GMT';document.querySelector('.cookie-bar').style.display='none';">Закрыть</button>
				</div>
			</div>
		</div>

		
	</body>
</html>