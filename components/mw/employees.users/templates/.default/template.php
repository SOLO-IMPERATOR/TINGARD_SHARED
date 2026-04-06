<?php 
/* 
 Comment Text 
*/
?>
<pre><? // print_r($arResult['managers']) ?></pre>
<style>
    .modal__block-delete {
        position: fixed;
		/* height: 500px; */
		max-width: 500px;
    	width: 100%;
		z-index: 11000;
		top: 35%;
		left: 0;
		right: 0;
		bottom: 0;
		margin: auto;
    }
    .modal__block-delete-backgr {
        display: none;
        position: fixed;
		width: 100%;
		height: 100%;
		background: #d5d5d5b0;
		top: 0;
		left: 0;
		z-index: 20;
    }
</style>
<section class="section section_padding-top_big section_padding-bottom_small lk">
    <h2 class="section-title section-title_margin_bottom">Управление сотрудниками</h2>
    <div class="lk__desc">В списке содержаться все зарегистрированные сотрудники вашей компании</div>
    <div class="lk__form lk__form_type_employees">
        <? if( count($arResult['managers']) === 0 ){ ?>
        <div class="lk__note note note_type_default">На данный момент нет зарегистрированных сотрудников</div>
        <?} else {?>
        <!--<div class="lk__note note note_type_error">Не заполнены обязательные поля</div> -->
        <div class="lk__note note note_type_success" style="display: none" id="success-up">Изменения сохранены</div>
        <!-- обнулить поля формы -->

        <div class="lk__employees">
            <? foreach ($arResult['managers'] as $item){?>
                <form class="lk__employees-item" id="formUser<?=$item['ID']?>">
                    <input type="hidden" name="idUser" value="<?=$item['ID']?>">
                    <div class="lk__employees-name">
                        <span class="lk__employees-num"><?=$item['NAME']?> <?=$item['LAST_NAME']?></div>
                    <div class="lk__employees-labels">
                        <label class="lk__label">
                            <span class="lk__label-title">Должность сотрудника*</span>
                            <input class="lk__input input" type="text" name="post" value="<?=$item['WORK_POSITION']?>" required>
                        </label>
                        <label class="lk__label">
                            <span class="lk__label-title">Email сотрудника*</span>
                            <input class="lk__input input" type="email" name="email" value="<?=$item['EMAIL']?>" required>
                        </label>
                        <label class="lk__label">
                            <span class="lk__label-title">Телефон сотрудника*</span>
                            <input class="lk__input input" type="tel" name="tel" value="<?=$item['WORK_PHONE']?>" required>
                        </label>
                        <label class="lk__label">
                            <span class="lk__label-title">Добавочный номер (если есть)</span>
                            <input class="lk__input input" type="text" name="tel-add" value="<?=$item['WORK_PAGER']?>">
                        </label>
                        <label class="lk__label">
                            <span class="lk__label-title">Новый пароль</span>
                            <input class="lk__input input" type="password" name="password" placeholder="Не менее 6 символов">
                        </label>
                    </div>
                    <div class="lk__employees-btn-container">
                        <button class="btn btn_type_turquoise-green upUsers" data-id="<?=$item['ID']?>" type="button">Сохранить измененмя</button>
                        <button class="btn btn_type_red deleteUser" data-id="<?=$item['ID']?>" type="button">Удалить сотрудника</button>
                    </div>
                </form>
                <div class="modal__block-delete-backgr" id="modalDelete<?=$item['ID']?>">
                    <div class="modal__block-delete">
                        <div class="lk__employees-item">
                            <div class="lk__employees-name">
                                <span class="lk__employees-num">Удалить сорудника <?=$item['NAME']?> <?=$item['LAST_NAME']?>?</span>
                            </div>
                            <div class="lk__employees-btn-container">
                                <button class="btn btn_type_turquoise-green deleteUserTrue" type="button" data-id="<?=$item['ID']?>">Удалить</button>
                                <button class="btn btn_type_red closeModal" data-id="<?=$item['ID']?>" type="button">Отменить</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?}?>
        </div>
        <?}?>
</section>