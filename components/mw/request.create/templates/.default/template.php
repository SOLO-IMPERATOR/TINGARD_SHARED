<?php 
/* 
 Comment Text 
*/
?>

<section class="section section_padding-top_big section_padding-bottom_small lk">
    <h2 class="section-title section-title_margin_bottom">Формирование заявки</h2>
    <div class="lk__desc">Заполните данные в форме для оформления заявки на продукцию</div>
    <form class="lk__form lk__form_type_countable" id="lk__form-request">
        <div class="lk__note note note_type_required" style="display: none" id="required-box">Не заполнены обязательные поля</div>
        <div class="lk__note note note_type_error" style="display: none" id="errors-box">Поле «Вид доставки» не заполнено</div>
        <div class="lk__note note note_type_success" style="display: none" id="success-box">Заявка отправлена</div><!-- обнулить поля формы -->

        <label class="lk__label lk__label_type_countable">
            <span class="lk__label-title">Выберите позиции<span class="lk__label-required">*</span></span>
            <label class="lk__label-inside">
                <select required class="select select--required" name="position">
                    <option disabled value="" selected>выберите позиции</option>
                    <option value="TINGARD 1500">TINGARD 1500</option>
                    <option value="TINGARD 1900">TINGARD 1900</option>
                    <option value="TINGARD 1900Б">TINGARD 1900Б</option>
                    <option value="TINGARD 1900К">TINGARD 1900К</option>
                    <option value="TINGARD 1900БК">TINGARD 1900БК</option>
                    <option value="TINGARD 2500">TINGARD 2500</option>
                    <option value="TINGARD 2500Б">TINGARD 2500Б</option>
                    <option value="TINGARD 2500К">TINGARD 2500К</option>
                    <option value="TINGARD 3000">TINGARD 3000</option>
                    <option value="TINGARD 3500">TINGARD 3500</option>
                    <option value="Пластиковая ёмкость 10 кубов, синий">Пластиковая ёмкость 10 кубов, синий</option>
                    <option value="Пластиковая ёмкость 20 кубов, синий">Пластиковая ёмкость 20 кубов, синий</option>
                    <option value="Пластиковая ёмкость 30 кубов, синий">Пластиковая ёмкость 30 кубов, синий</option>
                    <option value="Пластиковая ёмкость 40 кубов, синий">Пластиковая ёмкость 40 кубов, синий</option>
                    <option value="Пластиковая ёмкость 50 кубов, синий">Пластиковая ёмкость 50 кубов, синий</option>
                </select>
            </label>
            <span class="lk__count">
					<button class="lk__input-btn input-btn input-btn_action_minus" type="button">-</button>
					<input class="lk__input input input_action_count" type="text" name="valueprod" value="1">
					<button class="lk__input-btn input-btn input-btn_action_plus" type="button">+</button>
				</span>
            <span class="lk__label-btn-container">
					<button class="input-btn input-btn_action_add" type="button">+</button>
				</span>
            </span>
        </label>

        <label class="lk__label lk__label_type_countable">
            <span class="lk__label-title">Выберите доп. комплектацию<span class="lk__label-required">*</span></span>
            <label class="lk__label-inside">
                <select required class="select select--required" name="additionalposition">
                    <option value="" disabled selected>выберите доп. комплектацию</option>
                    <option value="Винный стеллаж TINGARD">Винный стеллаж TINGARD</option>
                    <option value="Автоматический грузоподъёмник (чёрный)">Автоматический грузоподъёмник (чёрный)</option>
                    <option value="Автоматический грузоподъёмник (чёрно-жёлтый)">Автоматический грузоподъёмник (чёрно-жёлтый)</option>
                    <option value="Монтажный комплект">Монтажный комплект</option>
                    <option value="Декинг">Декинг</option>
                    <option value="Напольный люк TINGARD">Напольный люк TINGARD</option>
                    <option value="Надставная горловина TINGARD">Надставная горловина TINGARD</option>
                </select>
            </label>
            <span class="lk__count">
					<button class="lk__input-btn input-btn input-btn_action_minus" type="button">-</button>
					<input class="lk__input input input_action_count" type="text" name="valuedop" value="1">
					<button class="lk__input-btn input-btn input-btn_action_plus" type="button">+</button>
				</span>
            <span class="lk__label-btn-container">
					<button class="input-btn input-btn_action_add" type="button">+</button>
				</span>
            </span>
        </label>

        <label class="lk__label">
            <span class="lk__label-title">Склад отгрузки*</span>
            <select class="select" name="stock">
                <option selected>г. Череповец, ул. Окружная, 18</option>
                <option>г. Москва, 2-я Вольская улица, 34с2</option>
                <option>г. Москва, Ленинградское шоссе, д. 290А</option>
                <option>г. Санкт-Петербург, 3-й Рыбацкий проезд, 3</option>
                <option>г. Екатеринбург, ул. Горнощитская, 42, павильон В3</option>
            </select>
        </label>

        <label class="lk__label">
            <span class="lk__label-title">Вид доставки*</span>
            <select class="select" name="delivery">
                <option selected>Самовывоз</option>
            </select>
        </label>

        <label class="lk__label">
            <span class="lk__label-title">Способ оплаты*</span>
            <select class="select" name="payment">
                <option selected>Наличный расчёт</option>
                <option selected>Безналичный расчёт</option>
            </select>
        </label>

        <label class="lk__label">
            <span class="lk__label-title">Комментарий</span>
            <textarea class="lk__input input" name="comment"></textarea>
<!--            <input  type="text" name="comment" placeholder="Укажите адрес отгрузки" required="">-->
        </label>


        <div class="lk__btn-container">
            <button class="lk__btn btn btn_type_turquoise-green" type="submit" id="lk__submit-btn">Сформировать заявку</button>
        </div>
    </form>
</section>
