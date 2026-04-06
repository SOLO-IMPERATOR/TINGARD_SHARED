<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();?>

<footer class="footer" itemscope itemtype="https://schema.org/WPFooter">
	<div class="footer__inner container">
		<div class="footer__logo logo">
			<a class="logo__link" href="/">
				<img class="logo__img" src="<?=SITE_TEMPLATE_PATH?>/img/footer-logo.svg" alt="Логотип TINGARD">
			</a>
			<div class="footer__copyright">© 2008-<?=date('Y')?> <br>ООО «ТехС». Все права защищены.</div>
		</div>
		<div class="footer__policy">
			<a class="footer__policy-link" href="/cookie-policy/">Согласие на использование файлов cookie</a>
			<a class="footer__policy-link" href="/agreement-policy/">Согласие на обработку моих персональных данных</a>
			<a class="footer__policy-link" href="/privacy-policy/">Политика обработки персональных данных</a>
		</div>
		<div class="footer__contacts">
			<div class="footer__btn-container">
				<button class="btn btn_color_transparent-white" type="button" onclick="openModal('default-email-message', {'crm-entity': 'lead', 'crm-title': 'Связаться с производителем'})">Связаться с производителем</button>
			</div>
			<ul class="footer__requisites">
				<li class="footer__requisites-item">ИНН: 3528221902</li>
				<li class="footer__requisites-item">КПП: 352801001</li>
				<li class="footer__requisites-item">ОГРН: 1143528013155</li>
			</ul>
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



<?/* if($_COOKIE['utm_content'] === 'gift' || $_GET['utm_content'] === 'gift'):?>
<a class="wheel-button" href="/"></a>
<?endif */?>





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
					<span class="form-input-name">Электронная почта:</span>
					<input class="form-input" type="email" name="email">
				</label>
				<label class="form-policy">
					<input class="checkbox__input" type="checkbox" name="policy" required>
					<span class="checkbox__container">
						<span class="checkbox"></span>
						<span class="checkbox__text">Я даю <a href="/agreement-policy/">Согласие на обработку персональных данных</a> в соответствии с <a href="/privacy-policy/">Политикой обработки персональных данных</a></span>
					</span>
				</label>
				<button class="btn btn_color_yellow" type="submit">Отправить</button>
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
					<span class="form-input-name">Электронная почта: *</span>
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
				<button class="btn btn_color_yellow" type="submit">Отправить</button>
			</form>
		</div>
	</div>

	<div class="modal" data-entity="modal" data-modal-type="quiz">
		<div class="modal__body modal__body_type_quiz">
			<button class="modal__close" type="button" data-entity="modal-close">Закрыть</button>
			<div class="modal__quiz-question" data-entity="quiz-question-container" data-question-id="1">
				<div class="modal__quiz-title">Подбери погреб за 30 секунд</div>
				<div class="modal__quiz-question-title" data-entity="quiz-question-title">Где планируете устанавливать погреб?</div>
				<div class="modal__quiz-labels">
					<label class="modal__quiz-label">
						<input class="radio__input" data-entity="quiz-question" type="radio" name="quiz-answer-1" value="на открытом участке">
						<span class="radiobox__container">
							<span class="radiobox"></span>
							<span class="radiobox__text">на открытом участке</span>
						</span>
					</label>
					<label class="modal__quiz-label">
						<input class="radio__input" data-entity="quiz-question" type="radio" name="quiz-answer-1" value="под домом">
						<span class="radiobox__container">
							<span class="radiobox"></span>
							<span class="radiobox__text">под домом</span>
						</span>
					</label>
					<label class="modal__quiz-label">
						<input class="radio__input" data-entity="quiz-question" type="radio" name="quiz-answer-1" value="под беседку/гараж">
						<span class="radiobox__container">
							<span class="radiobox"></span>
							<span class="radiobox__text">под беседку/гараж</span>
						</span>
					</label>
					<label class="modal__quiz-label">
						<input class="radio__input" data-entity="quiz-question" type="radio" name="quiz-answer-1" value="ещё не определились">
						<span class="radiobox__container">
							<span class="radiobox"></span>
							<span class="radiobox__text">ещё не определились</span>
						</span>
					</label>
				</div>
				<div class="modal__quiz-progress">
					<div class="modal__quiz-progress-text">Вопрос 1 из 5</div>
					<div class="modal__quiz-progress-value modal__quiz-progress-value_1"></div>
				</div>
				<div class="modal__quiz-btn-container">
					<button class="modal__quiz-btn_next btn btn_color_blue" type="button" data-entity="quiz-btn-next" disabled>Далее</button>
				</div>
			</div>
			<div class="modal__quiz-question" data-entity="quiz-question-container" data-question-id="2" style="display: none;">
				<div class="modal__quiz-title">Подбери погреб за 30 секунд</div>
				<div class="modal__quiz-question-title" data-entity="quiz-question-title">Какой уровень грунтовых вод на вашем участке?</div>
				<div class="modal__quiz-labels">
					<label class="modal__quiz-label">
						<input class="radio__input" type="radio" name="quiz-answer-2" value="высокий">
						<span class="radiobox__container">
							<span class="radiobox"></span>
							<span class="radiobox__text">высокий</span>
						</span>
					</label>
					<label class="modal__quiz-label">
						<input class="radio__input" type="radio" name="quiz-answer-2" value="низкий">
						<span class="radiobox__container">
							<span class="radiobox"></span>
							<span class="radiobox__text">низкий</span>
						</span>
					</label>
					<label class="modal__quiz-label">
						<input class="radio__input" type="radio" name="quiz-answer-2" value="нужна консультация">
						<span class="radiobox__container">
							<span class="radiobox"></span>
							<span class="radiobox__text">нужна консультация</span>
						</span>
					</label>
				</div>
				<div class="modal__quiz-progress">
					<div class="modal__quiz-progress-text">Вопрос 2 из 5</div>
					<div class="modal__quiz-progress-value modal__quiz-progress-value_2"></div>
				</div>
				<div class="modal__quiz-btn-container">
					<button class="btn btn_color_transparent-black" type="button" data-entity="quiz-btn-prev">Назад</button>
					<button class="modal__quiz-btn_next btn btn_color_blue" type="button" data-entity="quiz-btn-next" disabled>Далее</button>
				</div>
			</div>
			<div class="modal__quiz-question" data-entity="quiz-question-container" data-question-id="3" style="display: none;">
				<div class="modal__quiz-title" data-entity="quiz-question-title">Подбери погреб за 30 секунд</div>
				<div class="modal__quiz-question-title">Какой объём заготовок планируете хранить?</div>
				<div class="modal__quiz-labels">
					<label class="modal__quiz-label">
						<input class="radio__input" type="radio" name="quiz-answer-3" value="до 100 банок и до 8 ящиков">
						<span class="radiobox__container">
							<span class="radiobox"></span>
							<span class="radiobox__text">до 100 банок и до 8 ящиков</span>
						</span>
					</label>
					<label class="modal__quiz-label">
						<input class="radio__input" type="radio" name="quiz-answer-3" value="до 200 банок и до 20 ящиков">
						<span class="radiobox__container">
							<span class="radiobox"></span>
							<span class="radiobox__text">до 200 банок и до 20 ящиков</span>
						</span>
					</label>
					<label class="modal__quiz-label">
						<input class="radio__input" type="radio" name="quiz-answer-3" value="до 250 банок и до 25 ящиков">
						<span class="radiobox__container">
							<span class="radiobox"></span>
							<span class="radiobox__text">до 250 банок и до 25 ящиков</span>
						</span>
					</label>
					<label class="modal__quiz-label">
						<input class="radio__input" type="radio" name="quiz-answer-3" value="до 300 банок и до 30 ящиков">
						<span class="radiobox__container">
							<span class="radiobox"></span>
							<span class="radiobox__text">до 300 банок и до 30 ящиков</span>
						</span>
					</label>
					<label class="modal__quiz-label">
						<input class="radio__input" type="radio" name="quiz-answer-3" value="до 350 банок и до 35 ящиков">
						<span class="radiobox__container">
							<span class="radiobox"></span>
							<span class="radiobox__text">до 350 банок и до 35 ящиков</span>
						</span>
					</label>
					<label class="modal__quiz-label">
						<input class="radio__input" type="radio" name="quiz-answer" value="пока не знаю">
						<span class="radiobox__container">
							<span class="radiobox"></span>
							<span class="radiobox__text">пока не знаю</span>
						</span>
					</label>
				</div>
				<div class="modal__quiz-progress">
					<div class="modal__quiz-progress-text">Вопрос 3 из 5</div>
					<div class="modal__quiz-progress-value modal__quiz-progress-value_3"></div>
				</div>
				<div class="modal__quiz-btn-container">
					<button class="btn btn_color_transparent-black" type="button" data-entity="quiz-btn-prev">Назад</button>
					<button class="modal__quiz-btn_next btn btn_color_blue" type="button" data-entity="quiz-btn-next" disabled>Далее</button>
				</div>
			</div>

			<div class="modal__quiz-question" data-entity="quiz-question-container" data-question-id="4" style="display: none;">
				<div class="modal__quiz-title">Подбери погреб за 30 секунд</div>
				<div class="modal__quiz-question-title" data-entity="quiz-question-title">Кто будет заниматься установкой погреба?</div>
				<div class="modal__quiz-labels">
					<label class="modal__quiz-label">
						<input class="radio__input" type="radio" name="quiz-answer-4" value="профильная организация">
						<span class="radiobox__container">
							<span class="radiobox"></span>
							<span class="radiobox__text">профильная организация</span>
						</span>
					</label>
					<label class="modal__quiz-label">
						<input class="radio__input" type="radio" name="quiz-answer-4" value="строители на участке">
						<span class="radiobox__container">
							<span class="radiobox"></span>
							<span class="radiobox__text">строители на участке</span>
						</span>
					</label>
					<label class="modal__quiz-label">
						<input class="radio__input" type="radio" name="quiz-answer-4" value="самостоятельно">
						<span class="radiobox__container">
							<span class="radiobox"></span>
							<span class="radiobox__text">самостоятельно</span>
						</span>
					</label>
				</div>
				<div class="modal__quiz-progress">
					<div class="modal__quiz-progress-text">Вопрос 4 из 5</div>
					<div class="modal__quiz-progress-value modal__quiz-progress-value_4"></div>
				</div>
				<div class="modal__quiz-btn-container">
					<button class="btn btn_color_transparent-black" type="button" data-entity="quiz-btn-prev">Назад</button>
					<button class="modal__quiz-btn_next btn btn_color_blue" type="button" data-entity="quiz-btn-next" disabled>Далее</button>
				</div>
			</div>

			<div class="modal__quiz-question" data-entity="quiz-question-container" data-question-id="5" style="display: none;">
				<div class="modal__quiz-title">Подбери погреб за 30 секунд</div>
				<div class="modal__quiz-question-title" data-entity="quiz-question-title">Когда вы планируете приобрести погреб?</div>
				<div class="modal__quiz-labels">
					<label class="modal__quiz-label">
						<input class="radio__input" type="radio" name="quiz-answer-5" value="в течение 1-2 недель">
						<span class="radiobox__container">
							<span class="radiobox"></span>
							<span class="radiobox__text">в течение 1-2 недель</span>
						</span>
					</label>
					<label class="modal__quiz-label">
						<input class="radio__input" type="radio" name="quiz-answer-5" value="в течение месяца">
						<span class="radiobox__container">
							<span class="radiobox"></span>
							<span class="radiobox__text">в течение месяца</span>
						</span>
					</label>
					<label class="modal__quiz-label">
						<input class="radio__input" type="radio" name="quiz-answer-5" value="до конца года">
						<span class="radiobox__container">
							<span class="radiobox"></span>
							<span class="radiobox__text">до конца года</span>
						</span>
					</label>
					<label class="modal__quiz-label">
						<input class="radio__input" type="radio" name="quiz-answer-5" value="в следующем году">
						<span class="radiobox__container">
							<span class="radiobox"></span>
							<span class="radiobox__text">в следующем году</span>
						</span>
					</label>
				</div>
				<div class="modal__quiz-progress">
					<div class="modal__quiz-progress-text">Вопрос 5 из 5</div>
					<div class="modal__quiz-progress-value modal__quiz-progress-value_5"></div>
				</div>
				<div class="modal__quiz-btn-container">
					<button class="btn btn_color_transparent-black" type="button" data-entity="quiz-btn-prev">Назад</button>
					<button class="modal__quiz-btn_next btn btn_color_blue" type="button" data-entity="quiz-btn-next" disabled>Далее</button>
				</div>
			</div>


			<div class="modal__form-container" data-entity="quiz-question-container" data-question-id="6" style="display: none;" >
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
						<span class="form-input-name">Электронная почта:</span>
						<input class="form-input" type="email" name="email">
					</label>
					<label class="form-policy">
						<input class="checkbox__input" type="checkbox" name="policy" required>
						<span class="checkbox__container">
							<span class="checkbox"></span>
							<span class="checkbox__text">Я даю <a href="/agreement-policy/">Согласие на обработку персональных данных</a> в соответствии с <a href="/privacy-policy/">Политикой обработки персональных данных</a></span>
						</span>
					</label>
					<button class="btn btn_color_yellow" type="submit">Отправить</button>
				</form>
			</div>
		</div>
	</div>

	<div class="modal" data-entity="modal" data-modal-type="fortune">
		<div class="modal__body modal__body_type_fortune">
			<button class="modal__close" type="button" data-entity="modal-close">Закрыть</button>
			<div class="modal__title section-title" data-entity="modal-title"></div>
			<div class="modal__fortune" data-entity="fortune">
				<div class="modal__fortune-form modal__fortune-form_hidden">
					<form class="modal__form" data-entity="form">
						<input type="hidden" name="crm-entity">
						<input type="hidden" name="crm-title">
						<input type="hidden" name="crm-sale-direction">
						<input type="hidden" name="crm-responsible">
						<input type="hidden" name="action">
						<input type="hidden" name="comments">
						<label class="form-label">
							<span class="form-input-name">Имя: *</span>
							<input class="form-input" type="text" name="name" required>
						</label>
						<label class="form-label">
							<span class="form-input-name">Телефон: *</span>
							<input class="form-input" type="tel" name="phone" required>
						</label>
						<label class="form-label">
							<span class="form-input-name">Электронная почта:</span>
							<input class="form-input" type="email" name="email">
						</label>
						<label class="form-policy">
							<input class="checkbox__input" type="checkbox" name="policy" required>
							<span class="checkbox__container">
								<span class="checkbox"></span>
								<span class="checkbox__text">Я даю <a href="/agreement-policy/">Согласие на обработку персональных данных</a> в соответствии с <a href="/privacy-policy/">Политикой обработки персональных данных</a></span>
							</span>
						</label>
						<button class="btn btn_color_black" type="submit">Забрать подарок</button>
					</form>
				</div>
				<div class="modal__fortune-wheel-container">
					<div class="modal__fortune-wheel-gift modal__fortune-wheel-gift_hidden" data-entity="fortune-gift">Вы выиграли: <br><span class="modal__fortune-wheel-gift_accent"></span></div>
					<div class="modal__fortune-wheel-text modal__fortune-wheel-text_hidden" data-entity="fortune-text">Чтобы получить подарок, заполните форму и купите погреб TINGARD до 28.02.2026. *Все подробности акции уточняйте у менеджеров</div>
					<div class="wheel-wrapper">
						<div class="wheel" data-entity="wheel">
							<div class="wheel-item" data-index="0">
								<div class="wheel-item-content">
									<span>Скидка 10% на погреб</span>
								</div>
							</div>
							<div class="wheel-item" data-index="1">
								<div class="wheel-item-content">
									<span>Скидка 20% на 2-ой погреб</span>
								</div>
							</div>
							<div class="wheel-item" data-index="2">
								<div class="wheel-item-content">
									<span>Винный стеллаж</span>
								</div>
							</div>
							<div class="wheel-item" data-index="3">
								<div class="wheel-item-content">
									<span>Монтажный комплект</span>
								</div>
							</div>
							<div class="wheel-item" data-index="4">
								<div class="wheel-item-content">
									<span>Террасная доска-дэкинг</span>
								</div>
							</div>
							<div class="wheel-item" data-index="5">
								<div class="wheel-item-content">
									<span>Грузо-подъемник</span>
								</div>
							</div>
						</div>
					</div>
					<div class="modal__fortune-wheel modal__fortune-wheel_hidden"></div>
					<button class="btn btn_color_red modal__fortune-wheel-btn modal__fortune-wheel-btn_hidden" type="button" data-entity="fortune-btn">Крутить колесо</button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal" data-entity="modal" data-modal-type="sert">
		<div class="modal__body modal__body_type_sert">
			<button class="modal__close" type="button" data-entity="modal-close">Закрыть</button>
			<div class="modal__title section-title" data-entity="modal-title"></div>
			<div class="modal__sert" data-entity="sert">
				<div class="modal__sert-form">
					<form class="modal__form" data-entity="form">
						<input type="hidden" name="crm-entity">
						<input type="hidden" name="crm-title">
						<input type="hidden" name="crm-sale-direction">
						<input type="hidden" name="crm-responsible">
						<input type="hidden" name="action">
						<input type="hidden" name="comments">
						<label class="form-label">
							<span class="form-input-name">Имя: *</span>
							<input class="form-input" type="text" name="name" required>
						</label>
						<label class="form-label">
							<span class="form-input-name">Телефон: *</span>
							<input class="form-input" type="tel" name="phone" required>
						</label>
						<label class="form-label">
							<span class="form-input-name">Электронная почта:</span>
							<input class="form-input" type="email" name="email">
						</label>
						<label class="form-policy">
							<input class="checkbox__input" type="checkbox" name="policy" required>
							<span class="checkbox__container">
								<span class="checkbox"></span>
								<span class="checkbox__text">Я даю <a href="/agreement-policy/">Согласие на обработку персональных данных</a> в соответствии с <a href="/privacy-policy/">Политикой обработки персональных данных</a></span>
							</span>
						</label>
						<button class="btn btn_color_red" type="submit">Подарить погреб</button>
					</form>
				</div>
				<div class="modal__sert-container">
					<div class="modal__sert-img-container">
						<img class="modal__sert-img" src="<?=SITE_TEMPLATE_PATH?>/img/modal-sert.webp" alt="Сертификат">
					</div>
					<ul class="modal__sert-list">
						<li>Акция действует до 28.02.2026</li>
						<li>Бесплатное хранение погреба до установки</li>
						<li>Подробности акции можно узнать у менеджеров</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

</div>
</body>
</html>