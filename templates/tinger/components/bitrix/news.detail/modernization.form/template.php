<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();?>


<form class="form modernization-form margin_b_m">
	<div class="modernization-form__inner">
		<label class="modernization-form__item">
			<select class="select" name="model" required>
				<option selected="selected" disabled="disabled">Выберите модель вездехода*</option>
				<option>TINGER Scout 420</option>
				<option>TINGER Scout 690</option>
				<option>TINGER Track S380</option>
				<option>TINGER Track S500</option>
				<option>TINGER Track C500</option>
				<option>TINGER Armor W6</option>
				<option>TINGER Armor W8</option>
				<option>Viking</option>
			</select>
		</label>
		
		<label class="modernization-form__item">
			<input class="input-field" type="date" name="manufacture-date" placeholder="Дата выпуска*" required>
		</label>

		<label class="modernization-form__item">
			<input class="input-field" type="text" name="name" placeholder="Имя">
		</label>

		<label class="modernization-form__item">
			<input class="input-field" type="tel" name="phone" placeholder="Телефон*" required>
		</label>

		<label class="modernization-form__item">
			<input class="h5 input-field" type="email" name="email" placeholder="E-mail*" required>
		</label>

		<label class="modernization-form__item">
			<textarea class="h5 textarea-field" name="question" placeholder="Ваши пожелания"></textarea>
		</label>

		<label class="modernization-form__item form-policy">
			<input class="checkbox__input" type="checkbox" name="policy" required>
			<span class="checkbox__container">
				<span class="checkbox"></span>
				<span class="checkbox__text">Нажимая на кнопку «<?=$arResult['PROPERTIES']['BUTTON_TEXT']['VALUE']?>», я даю согласие на обработку моих <a href="/privacy-policy/">персональных данных</a></span>
			</span>
		</label>

		<div class="modernization-form__btn-container">
			<button class="btn btn--green--fill submit-btn" type="submit"><?=$arResult['PROPERTIES']['BUTTON_TEXT']['VALUE']?></button>
		</div>

	</div>
</form>

<p class="p">Запись на модернизацию или ремонт по телефону <a href="tel:8 (800) 350-25-05">8 (800) 350-25-05</a> (доб. 702) <br>и по электронной почте <a href="mailto:garant@tinger.ru">garant@tinger.ru</a></p>