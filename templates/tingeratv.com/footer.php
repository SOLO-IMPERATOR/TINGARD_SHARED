<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<footer itemscope itemtype="http://schema.org/WPFooter" class="footer">
	<div class="footer-body">
		<nav class="footer-nav container">
			<ul class="footer-nav__list">
				<li class="footer-nav__title section-subtitle">Models</li>
				<li class="footer-nav__dropdown">
					<ul class="footer-nav__sublist">
						<li class="footer-nav__sublist-item"><a class="footer-nav__sublist-link" href="/catalog/perelomka/">TINGER TF4</a></li>
						<li class="footer-nav__sublist-item"><a class="footer-nav__sublist-link" href="/catalog/tinger-track-2/">TINGER Track 2</a></li>
						<li class="footer-nav__sublist-item"><a class="footer-nav__sublist-link" href="/catalog/tinger-armor/">TINGER Armor</a></li>
						<li class="footer-nav__sublist-item"><a class="footer-nav__sublist-link" href="/catalog/tinger-t/">TINGER T</a></li>
						<li class="footer-nav__sublist-item"><a class="footer-nav__sublist-link" href="/catalog/tinger-dog/">TINGER Dog</a></li>
					</ul>
				</li>
			</ul>
			<ul class="footer-nav__list">
				<li class="footer-nav__title section-subtitle">Buyers</li>
				<li class="footer-nav__dropdown">
					<ul class="footer-nav__sublist">
						<li class="footer-nav__sublist-item"><a class="footer-nav__sublist-link" href="/configurator/">Configurator</a></li>
						<li class="footer-nav__sublist-item"><a class="footer-nav__sublist-link" href="/dealers/">Dealers</a></li>
					</ul>
				</li>
			</ul>
			<ul class="footer-nav__list">
				<li class="footer-nav__title section-subtitle">Owners</li>
				<li class="footer-nav__dropdown">
					<ul class="footer-nav__sublist">
						<li class="footer-nav__sublist-item"><a class="footer-nav__sublist-link" href="/customer-support/">Customer support</a></li>
						<li class="footer-nav__sublist-item"><a class="footer-nav__sublist-link" href="/service/">Service</a></li>
						<li class="footer-nav__sublist-item"><a class="footer-nav__sublist-link" href="/warranty/">Warranty</a></li>
					</ul>
				</li>
			</ul>
			<ul class="footer-nav__list">
				<li class="footer-nav__title section-subtitle">Company</li>
				<li class="footer-nav__dropdown">
					<ul class="footer-nav__sublist">
						<li class="footer-nav__sublist-item"><a class="footer-nav__sublist-link" href="/about/">About us</a></li>
						<li class="footer-nav__sublist-item"><a class="footer-nav__sublist-link" href="/news/">News</a></li>
						<li class="footer-nav__sublist-item"><a class="footer-nav__sublist-link" href="/contacts/">Contacts</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</div>
	<div class="footer-bottom">
		<div class="footer-bottom__inner container">
			<div class="footer-bottom__copyrights">
				<meta itemprop="copyrightYear" content="2024">
				<meta itemprop="copyrightHolder" content="TINGER KAZAKHSTAN LLC">
				<p class="footer-bottom__copyrights-item">TINGER KAZAKHSTAN LLC 2024</p>
				<p class="footer-bottom__copyrights-item">All rights reserved</p>
			</div>
			<div class="footer-bottom__phone">
				<a class="footer-bottom__phone-link h5" href="tel:+1 (929) 999-21-56">+1 (929) 999-21-56</a>
				<a class="footer-bottom__phone-tagline" href="#" onclick="event.preventDefault(); openModal('default', {'crm-entity': 'lead', 'crm-title': 'Request a call'})">Request a call</a>
			</div>
			<nav class="social">
			</nav>
			<div class="footer__lang-container">
				<select class="footer__lang select">
					<option selected>EN</option>
					<option>DE</option>
					<option>FR</option>
				</select>
			</div>
		</div>
	</div>
</footer>
<div class="header-bg"></div>
<div class="cookie-bar">
	<div class="cookie-bar__container">
		<p class="cookie-bar__text">We use cookies to optimize the site for your convenience. By continuing to use the site, you give <a class="cookie__link" href="/cookie-policy/">consent to the processing of cookies</a>.</p>
		<div class="cookie-bar__btn-container">
			<button class="cookie-bar__btn" type="button" onclick="document.cookie='cookie_policy=accepted;path=/;expires=Fri, 31 Dec 9999 23:59:59 GMT';document.querySelector('.cookie-bar').style.display='none';">Закрыть</div>
		</div>
	</div>
</div>

<div id="modal-container">
	<div class="modal" data-entity="modal" data-modal-type="thanks">
		<div class="modal__body">
			<button class="modal__close" type="button" data-entity="modal-close">Close</button>
			<div class="modal__title section-title" data-entity="modal-title"></div>
		</div>
	</div>
	<div class="modal" data-entity="modal" data-modal-type="default">
		<div class="modal__body">
			<button class="modal__close" type="button" data-entity="modal-close">Close</button>
			<div class="modal__title section-title" data-entity="modal-title"></div>
			<form class="modal__form" data-entity="form">
				<input type="hidden" name="crm-entity">
				<input type="hidden" name="crm-title">
				<input type="hidden" name="crm-sale-direction">
				<input type="hidden" name="crm-responsible">
				<input type="hidden" name="action">
				<label class="form-label">
					<span class="form-input-name">Name: *</span>
					<input class="form-input" type="text" name="name" required>
				</label>
				<label class="form-label">
					<span class="form-input-name">Phone: *</span>
					<input class="form-input" type="tel" name="phone" required>
				</label>
				<label class="form-policy">
					<input class="checkbox__input" type="checkbox" name="policy" required>
					<span class="checkbox__container">
						<span class="checkbox"></span>
						<span class="checkbox__text">By clicking on the «Submit», I consent to the processing of my <a href="/privacy-policy/">personal data</a></span>
					</span>
				</label>
				<button class="btn btn_color_green" type="submit">Submit</button>
			</form>
		</div>
	</div>
	<div class="modal" data-entity="modal" data-modal-type="default-email">
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
				<label class="form-policy">
					<input class="checkbox__input" type="checkbox" name="policy" required>
					<span class="checkbox__container">
						<span class="checkbox"></span>
						<span class="checkbox__text">Нажимая на кнопку «Отправить», я даю согласие на обработку моих <a href="/privacy-policy/">персональных данных</a></span>
					</span>
				</label>
				<button class="btn btn_color_green" type="submit">Отправить</button>
			</form>
		</div>
	</div>
	<div class="modal" data-entity="modal" data-modal-type="vacancy">
		<div class="modal__body">
			<button class="modal__close" type="button" data-entity="modal-close">Закрыть</button>
			<div class="modal__title section-title" data-entity="modal-title"></div>
			<form class="modal__form" data-entity="form">
				<input type="hidden" name="crm-entity">
				<input type="hidden" name="crm-title">
				<input type="hidden" name="crm-work">
				<input type="hidden" name="action">
				<label class="form-label">
					<span class="form-input-name">Имя и фамилия: *</span>
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
						<span class="checkbox__text">Нажимая на кнопку «Отправить», я даю согласие на обработку моих <a href="/privacy-policy/">персональных данных</a></span>
					</span>
				</label>
				<button class="btn btn_color_green" type="submit">Отправить</button>
			</form>
		</div>
	</div>
	<?if (CSite::InDir('/index.php')):?>
	<div class="modal" data-entity="modal" data-modal-type="atv-quiz">
		<div class="modal__body modal__body_type_atv-quiz">
			<button class="modal__close" type="button" data-entity="modal-close">Закрыть</button>
			<div class="modal__title section-title" data-entity="modal-title"></div>
			<div class="atv-quiz">
				<div data-question-index="1" class="atv-quiz__item">
					<div class="atv-quiz__title section-subtitle">Вам подходит гусеничный или колёсный вездеход?</div>
					<div class="quiz-atv__questions-list">
						<label class="model-card quiz-atv__radio">
							<input class="radio__input" type="radio" name="quiz-atv-model" value="TINGER Track 2">
							<span class="radiobox__container">
								<span class="radiobox"></span>
								<span class="radiobox__text">Выбрать</span>
							</span>
							<img class="quiz-atv__img" src="/local/templates/tinger/img/quiz-atv/tinger-track-2.webp" alt="Гусеничный вездеход TINGER Track 2">
							<span class="model-card__name">Гусеничный вездеход<br> TINGER Track 2</span>
							<span class="model-card__price"><span class="model-card__price-tagline">Цена от</span> 2 350 000 руб.</span>
						</label>
						<label class="model-card quiz-atv__radio">
							<input class="radio__input" type="radio" name="quiz-atv-model" value="TINGER Armor">
							<span class="radiobox__container">
								<span class="radiobox"></span>
								<span class="radiobox__text">Выбрать</span>
							</span>
							<img class="quiz-atv__img" src="/local/templates/tinger/img/quiz-atv/tinger-armor.webp" alt="Колёсный вездеход TINGER Armor">
							<span class="model-card__name">Колёсный вездеход<br> TINGER Armor</span>
							<span class="model-card__price"><span class="model-card__price-tagline">Цена от</span> 2 200 000 руб.</span>
						</label>
					</div>
					<div class="atv-quiz__btn-container">
						<button class="btn btn_color_green" onclick="atvNextQuestion(1)" data-action="next-question" type="button" disabled>Далее</button>
					</div>
					<div class="atv-quiz__indicator">Вопрос 1 из 4</div>
				</div>
				<div data-question-index="2" class="atv-quiz__item" style="display: none;">
					<div class="atv-quiz__title section-subtitle">С какой целью вы планируете использовать вездеход?</div>
					<div class="quiz-atv__questions-list">
						<label class="quiz-atv__radio">
							<input class="radio__input" type="radio" name="quiz-atv-purpose" value="для рыбалки">
							<span class="radiobox__container">
								<span class="radiobox"></span>
								<span class="radiobox__text">для рыбалки</span>
							</span>
						</label>
						<label class="quiz-atv__radio">
							<input class="radio__input" type="radio" name="quiz-atv-purpose" value="для охоты">
							<span class="radiobox__container">
								<span class="radiobox"></span>
								<span class="radiobox__text">для охоты</span>
							</span>
						</label>
						<label class="quiz-atv__radio">
							<input class="radio__input" type="radio" name="quiz-atv-purpose" value="я любитель бездорожья">
							<span class="radiobox__container">
								<span class="radiobox"></span>
								<span class="radiobox__text">я любитель бездорожья</span>
							</span>
						</label>
						<label class="quiz-atv__radio">
							<input class="radio__input" type="radio" name="quiz-atv-purpose" value="для активного туризма">
							<span class="radiobox__container">
								<span class="radiobox"></span>
								<span class="radiobox__text">для активного туризма</span>
							</span>
						</label>
						<label class="quiz-atv__radio">
							<input class="radio__input" type="radio" name="quiz-atv-purpose" value="для хозяйственных работ">
							<span class="radiobox__container">
								<span class="radiobox"></span>
								<span class="radiobox__text">для хозяйственных работ</span>
							</span>
						</label>
						<label class="quiz-atv__radio">
							<input class="radio__input" type="radio" name="quiz-atv-purpose" value="для всех случаев сразу">
							<span class="radiobox__container">
								<span class="radiobox"></span>
								<span class="radiobox__text">для всех случаев сразу</span>
							</span>
						</label>
					</div>
					<div class="atv-quiz__btn-container">
						<button class="btn btn_color_green" onclick="atvNextQuestion(2)" data-action="next-question" type="button" disabled>Далее</button>
					</div>
					<div class="atv-quiz__title atv-quiz__indicator">Вопрос 2 из 4</div>
				</div>
				<div data-question-index="3" class="atv-quiz__item" style="display: none;">
					<div class="quiz-atv__question-title section-subtitle">Какого цвета вездеход вам по душе?</div>
					<div class="quiz-atv__questions-list">
						<label class="quiz-atv__radio quiz-atv__radio_tank">
							<input class="radio__input" type="radio" name="quiz-atv-color" value="танковый">
							<span class="radiobox__container">
								<span class="radiobox"></span>
								<span class="radiobox__text">танковый</span>
							</span>
						</label>
						<label class="quiz-atv__radio quiz-atv__radio_yellow">
							<input class="radio__input" type="radio" name="quiz-atv-color" value="жёлтый">
							<span class="radiobox__container">
								<span class="radiobox"></span>
								<span class="radiobox__text">жёлтый</span>
							</span>
						</label>
						<label class="quiz-atv__radio quiz-atv__radio_green">
							<input class="radio__input" type="radio" name="quiz-atv-color" value="зелёный">
							<span class="radiobox__container">
								<span class="radiobox"></span>
								<span class="radiobox__text">зелёный</span>
							</span>
						</label>
						<label class="quiz-atv__radio quiz-atv__radio_brown">
							<input class="radio__input" type="radio" name="quiz-atv-color" value="коричневый">
							<span class="radiobox__container">
								<span class="radiobox"></span>
								<span class="radiobox__text">коричневый</span>
							</span>
						</label>
						<label class="quiz-atv__radio quiz-atv__radio_red">
							<input class="radio__input" type="radio" name="quiz-atv-color" value="красный">
							<span class="radiobox__container">
								<span class="radiobox"></span>
								<span class="radiobox__text">красный</span>
							</span>
						</label>
						<label class="quiz-atv__radio quiz-atv__radio_orange">
							<input class="radio__input" type="radio" name="quiz-atv-color" value="оранжевый">
							<span class="radiobox__container">
								<span class="radiobox"></span>
								<span class="radiobox__text">оранжевый</span>
							</span>
						</label>
						<label class="quiz-atv__radio quiz-atv__radio_blue">
							<input class="radio__input" type="radio" name="quiz-atv-color" value="синий">
							<span class="radiobox__container">
								<span class="radiobox"></span>
								<span class="radiobox__text">синий</span>
							</span>
						</label>
						<label class="quiz-atv__radio quiz-atv__radio_black">
							<input class="radio__input" type="radio" name="quiz-atv-color" value="чёрный">
							<span class="radiobox__container">
								<span class="radiobox"></span>
								<span class="radiobox__text">чёрный</span>
							</span>
						</label>
					</div>
					<div class="atv-quiz__btn-container">
						<button class="btn btn_color_green" onclick="atvNextQuestion(3)" data-action="next-question" type="button" disabled>Далее</button>
					</div>
					<div class="atv-quiz__indicator">Вопрос 3 из 4</div>
				</div>
				<div data-question-index="4" class="atv-quiz__item" style="display: none;">
				<div class="atv-quiz__title section-subtitle">По какой местности преимущественно будете передвигаться?</div>
				<div class="quiz-atv__questions-list">
					<label class="quiz-atv__radio">
							<input class="radio__input" type="radio" name="quiz-atv-terrain" value="глубокие водоёмы">
							<span class="radiobox__container">
								<span class="radiobox"></span>
								<span class="radiobox__text">глубокие водоёмы</span>
							</span>
						</label>
						<label class="quiz-atv__radio">
							<input class="radio__input" type="radio" name="quiz-atv-terrain" value="стланик">
							<span class="radiobox__container">
								<span class="radiobox"></span>
								<span class="radiobox__text">стланик</span>
							</span>
						</label>
						<label class="quiz-atv__radio">
							<input class="radio__input" type="radio" name="quiz-atv-terrain" value="каменная россыпь">
							<span class="radiobox__container">
								<span class="radiobox"></span>
								<span class="radiobox__text">каменная россыпь</span>
							</span>
						</label>
						<label class="quiz-atv__radio">
							<input class="radio__input" type="radio" name="quiz-atv-terrain" value="болото">
							<span class="radiobox__container">
								<span class="radiobox"></span>
								<span class="radiobox__text">болото</span>
							</span>
						</label>
						<label class="quiz-atv__radio">
							<input class="radio__input" type="radio" name="quiz-atv-terrain" value="бурелом">
							<span class="radiobox__container">
								<span class="radiobox"></span>
								<span class="radiobox__text">бурелом</span>
							</span>
						</label>
						<label class="quiz-atv__radio">
							<input class="radio__input" type="radio" name="quiz-atv-terrain" value="рыхлый снег">
							<span class="radiobox__container">
								<span class="radiobox"></span>
								<span class="radiobox__text">рыхлый снег</span>
							</span>
						</label>
						<label class="quiz-atv__radio">
							<input class="radio__input" type="radio" name="quiz-atv-terrain" value="по всем вышеперечисленным">
							<span class="radiobox__container">
								<span class="radiobox"></span>
								<span class="radiobox__text">по всем вышеперечисленным</span>
							</span>
						</label>
					</div>
					<div class="atv-quiz__btn-container">
						<button class="btn btn_color_green" onclick="atvNextQuestion(4)" data-action="next-question" type="button" disabled>Далее</button>
					</div>
					<div class="atv-quiz__indicator">Вопрос 4 из 4</div>
				</div>
			</div>
			<form class="modal__form" data-entity="form" data-question-index="5" style="display: none;">
				<input type="hidden" name="crm-entity">
				<input type="hidden" name="crm-title">
				<input type="hidden" name="crm-sale-direction">
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
						<span class="checkbox__text">Нажимая на кнопку «Отправить», я даю согласие на обработку моих <a href="/privacy-policy/">персональных данных</a></span>
					</span>
				</label>
				<button class="btn btn_color_green" type="submit">Отправить</button>
			</form>
		</div>
	</div>
	<?endif?>
</div>

</body>

</html>