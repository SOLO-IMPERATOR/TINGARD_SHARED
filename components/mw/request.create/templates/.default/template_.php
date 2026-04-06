<?php 
/* 
 Comment Text 
*/
?>

<section class="section section_padding-top_big section_padding-bottom_small lk">
    <h2 class="section-title section-title_margin_bottom">Формирование заявки</h2>
    <div class="lk__desc">Заполните данные в форме для оформления заявки на продукцию</div>
    <form class="lk__form lk__form_type_countable" id="lk__form-request">
        <div class="lk__note note note_type_error" style="display: none" id="errors-box">Поле «Вид доставки» не заполнено</div>
        <div class="lk__note note note_type_success" style="display: none" id="success-box">Заявка отправлена</div><!-- обнулить поля формы -->

        <label class="lk__label lk__label_type_countable">
            <span class="lk__label-title">Выберите позиции</span>
            <label class="lk__label-inside">
                <select class="select" name="position">
                    <option disabled selected>выберите позиции</option>
                    <? foreach ($arResult['Products'] as $item){?>
                        <option value="<?=$item['NAME']?>"><?=$item['NAME']?></option>
                    <?}?>
                    <option value="25">Погреб TINGARD 1900</option>
                    <option value="26">Ёмкость PT50</option>
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
            <span class="lk__label-title">Выберите доп. комплектацию</span>
            <label class="lk__label-inside">
                <select class="select" name="additionalposition">
                    <option disabled selected>выберите доп. комплектацию</option>
                    <? foreach ($arResult['dopProducts'] as $item){?>
                        <option value="<?=$item['NAME']?>"><?=$item['NAME']?></option>
                    <?}?>
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
            <button class="lk__btn btn btn_type_turquoise-green" type="button" id="lk__submit-btn">Сформировать заявку</button>
        </div>
    </form>
</section>
