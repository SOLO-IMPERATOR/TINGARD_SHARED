<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

		<footer class="footer container">
			<ul class="footer__organization">
				<li class="footer__organization-item">ИНН: 3528221902</li>
				<li class="footer__organization-item">КПП: 352801001 </li>
				<li class="footer__organization-item">ОГРН: 1143528013155</li>
			</ul>
			<ul class="footer__nav">
				<li class="footer__nav-item">
					<a class="footer__nav-link" href="/privacy-policy/">Политика обработки персональных данных</a>
				</li>
				<li class="footer__nav-item">
					<a class="footer__nav-link" href="/agreement-policy/">Согласие на использование персональных данных</a>
				</li>
				<li class="footer__nav-item">
					<a class="footer__nav-link" href="/cookie-policy/">Согласие на использование файлов cookies</a>
				</li>
			</ul>
		</footer>
		<span class="grass"></span>


		<form class="modal" data-entity="quiz">
			<div class="modal__inner">
				<div class="modal__page modal__page_active" data-entity="modal-page" data-type="question">
					<div class="modal__title">Где планируете устанавливать погреб?</div>
					<div class="modal__body modal__body_type_label-list">
						<label class="modal__label radio">
							<input class="radio__input" type="radio" name="question-1" value="На открытом участке">
							<span class="radio__container">
								<span class="radio__box"></span>
								<span class="radio__text">На открытом участке</span>
							</span>
						</label>
						<label class="modal__label radio">
							<input class="radio__input" type="radio" name="question-1" value="Под дом">
							<span class="radio__container">
								<span class="radio__box"></span>
								<span class="radio__text">Под дом</span>
							</span>
						</label>
						<label class="modal__label radio">
							<input class="radio__input" type="radio" name="question-1" value="Под беседку/гараж">
							<span class="radio__container">
								<span class="radio__box"></span>
								<span class="radio__text">Под беседку/гараж</span>
							</span>
						</label>
						<label class="modal__label radio">
							<input class="radio__input" type="radio" name="question-1" value="Ещё не определились">
							<span class="radio__container">
								<span class="radio__box"></span>
								<span class="radio__text">Ещё не определились</span>
							</span>
						</label>
					</div>
				</div>

				<div class="modal__page" data-entity="modal-page" data-type="question">
					<div class="modal__title">Какой уровень грунтовых вод на вашем участке?</div>
					<div class="modal__body modal__body_type_label-list">
						<label class="modal__label radio">
							<input class="radio__input" type="radio" name="question-2" value="Высокий">
							<span class="radio__container">
								<span class="radio__box"></span>
								<span class="radio__text">Высокий</span>
							</span>
						</label>
						<label class="modal__label radio">
							<input class="radio__input" type="radio" name="question-2" value="Низкий">
							<span class="radio__container">
								<span class="radio__box"></span>
								<span class="radio__text">Низкий</span>
							</span>
						</label>
						<label class="modal__label radio">
							<input class="radio__input" type="radio" name="question-2" value="Не знаю">
							<span class="radio__container">
								<span class="radio__box"></span>
								<span class="radio__text">Не знаю</span>
							</span>
						</label>
					</div>
				</div>

				<div class="modal__page" data-entity="modal-page" data-type="question">
					<div class="modal__title">Какой объем заготовок планируете хранить?</div>
					<div class="modal__body modal__body_type_label-list">
						<label class="modal__label radio">
							<input class="radio__input" type="radio" name="question-3" value="До 100 банок и до 8 ящиков">
							<span class="radio__container">
								<span class="radio__box"></span>
								<span class="radio__text">До 100 банок и до 8 ящиков</span>
							</span>
						</label>
						<label class="modal__label radio">
							<input class="radio__input" type="radio" name="question-3" value="До 200 банок и до 20 ящиков">
							<span class="radio__container">
								<span class="radio__box"></span>
								<span class="radio__text">До 200 банок и до 20 ящиков</span>
							</span>
						</label>
						<label class="modal__label radio">
							<input class="radio__input" type="radio" name="question-3" value="До 250 банок и до 25 ящиков">
							<span class="radio__container">
								<span class="radio__box"></span>
								<span class="radio__text">До 250 банок и до 25 ящиков</span>
							</span>
						</label>
						<label class="modal__label radio">
							<input class="radio__input" type="radio" name="question-3" value="Пока не знаю">
							<span class="radio__container">
								<span class="radio__box"></span>
								<span class="radio__text">Пока не знаю</span>
							</span>
						</label>
					</div>
				</div>

				<div class="modal__page" data-entity="modal-page" data-type="question">
					<div class="modal__title">Предполагаемые сроки монтажа</div>
					<div class="modal__body modal__body_type_label-list">
						<label class="modal__label radio">
							<input class="radio__input" type="radio" name="question-4" value="На этой неделе">
							<span class="radio__container">
								<span class="radio__box"></span>
								<span class="radio__text">На этой неделе</span>
							</span>
						</label>
						<label class="modal__label radio">
							<input class="radio__input" type="radio" name="question-4" value="На следующей неделе">
							<span class="radio__container">
								<span class="radio__box"></span>
								<span class="radio__text">На следующей неделе</span>
							</span>
						</label>
						<label class="modal__label radio">
							<input class="radio__input" type="radio" name="question-4" value="В течение месяца">
							<span class="radio__container">
								<span class="radio__box"></span>
								<span class="radio__text">В течение месяца</span>
							</span>
						</label>
						<label class="modal__label radio">
							<input class="radio__input" type="radio" name="question-4" value="Через 2-3 месяца">
							<span class="radio__container">
								<span class="radio__box"></span>
								<span class="radio__text">Через 2-3 месяца</span>
							</span>
						</label>
						<label class="modal__label radio">
							<input class="radio__input" type="radio" name="question-4" value="В течение года">
							<span class="radio__container">
								<span class="radio__box"></span>
								<span class="radio__text">В течение года</span>
							</span>
						</label>
					</div>
				</div>

				<div class="modal__page" data-entity="modal-page">
					<div class="modal__title">Оставьте телефон, мы с вами свяжемся и расскажем про погреб, а также отправим файл</div>
					<div class="modal__body modal__body_type_form">
						<label>
							<span class="modal__input-label">Ввидите имя:</span>
							<input class="modal__input" type="text" name="name" placeholder="Имя">
						</label>
						<label>
							<span class="modal__input-label">Укажмите телефон:</span>
							<input class="modal__input" type="tel" name="phone" placeholder="Телефон*" required>
						</label>
						<label class="modal__agreement agreement">
							<input class="checkbox__input" type="checkbox" name="policy" required>
							<span class="checkbox"></span>
							<span class="checkbox__text">Я даю <a href="/agreement-policy/">Согласие на обработку персональных данных</a> в соответствии с <a href="/privacy-policy/">Политикой обработки персональных данных</a></span>
						</label>
						<div class="modal__form-btn-container">
							<button class="modal__form-btn" type="submit">Получить файл</button>
						</div>
					</div>
				</div>

				<div class="modal__thanks" data-entity="modal-thanks">
					<div class="modal__title">Спасибо!</div>
					<div class="modal__body modal__body_type_thanks">
						<div class="modal__body-text">Спасибо! Наши специалисты перезвонят вам в ближайшее время.</div>
						<div class="modal__file">
							<div class="modal__file-text">Ваши бонусы:</div>
							<div class="modal__file-block">8 ошибок при выборе погреба</div>
						</div>
					</div>
				</div>

				<div class="modal__navigation" data-entity="quiz-navigation">
					<div class="modal__progressbar">
						<div class="modal__progressbar-percent">Готово: <span class="modal__progressbar-percent_accent"><span data-entity="progressbar-percent">0%</span></span></div>
						<div class="modal__progressbar-line-container">
							<div class="modal__progressbar-line" data-entity="progressbar"></div>
						</div>
					</div>
					<div class="modal__btn-container">
						<button class="modal__btn" type="button" data-entity="prev-btn" disabled>Назад</button>
						<button class="modal__btn" type="button" data-entity="next-btn" disabled>Далее</button>
					</div>
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
	<script>
		(function(w,d,u){
			var s=d.createElement('script');s.async=true;s.src=u+'?'+(Date.now()/60000|0);
			var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
		})(window,document,'https://cdn-ru.bitrix24.ru/b1538393/crm/tag/call.tracker.js');
	</script>
	</body>


</html>