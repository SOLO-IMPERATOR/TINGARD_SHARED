<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) { die(); }
use Bitrix\Main\Error;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Web\Json;

/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var OpenSourceOrderComponent $component */
if (!$USER->IsAuthorized()) {
	LocalRedirect('/account/');
}
?>

<?/* global $USER;
if ($USER->IsAdmin()):
	echo '<pre>'; print_r($arResult); echo '</pre>';
endif */?>

<form action="" method="post" name="os-order-form" id="os-order-form">

	<section class="order__person margin_b_l">
		<div class="order__payer-container">
			<h2 class="section-title margin_b_s">Данные плательщика</h2>
			<div class="order__payer">
				<div class="radiobox__list margin_b_m">
					<?foreach ($arResult['PERSON_TYPES'] as $arPersonType):?>
					<label class="radiobox__list-item">
						<input class="radio__input" type="radio" name="person_type_id" value="<?= $arPersonType['ID'] ?>"<?= $arPersonType['CHECKED'] ? ' checked' : '' ?>>
						<span class="radiobox__container">
							<span class="radiobox"></span>
							<span class="radiobox__text"><?= $arPersonType['NAME'] ?></span>
						</span>
					</label>
					<?endforeach?>
				</div>
				<div class="field-input-list">
					<label class="field-label" data-person-id="1">
						<span class="field-name">Наименование организации или ИП<span class="field-star">*</span></span>
						<input class="field-input" type="text" name="properties[COMPANY]" placeholder="ИП Иванов Иван Иванович" value="<?=$arResult['PROPERTIES'][1]['COMPANY']['VALUE']?>"<?if($arResult['PERSON_TYPE_ID']!==1):?> disabled<?endif?>>
					</label>
					<label class="field-label" data-person-id="1">
						<span class="field-name">ИНН<span class="field-star">*</span></span>
						<input class="field-input" type="text" name="properties[TIN]" placeholder="123456789" value="<?=$arResult['PROPERTIES'][1]['TIN']['VALUE']?>"<?if($arResult['PERSON_TYPE_ID']!==1):?> disabled<?endif?>>
					</label>
					<label class="field-label" data-person-id="1">
						<span class="field-name">Имя контактного лица<span class="field-star">*</span></span>
						<input class="field-input" type="text" name="properties[NAME]" placeholder="Иван" value="<?=$arResult['PROPERTIES'][1]['NAME']['VALUE']?>"<?if($arResult['PERSON_TYPE_ID']!==1):?> disabled<?endif?>>
					</label>
					<label class="field-label" data-person-id="1">
						<span class="field-name">Телефон контактного лица<span class="field-star">*</span></span>
						<input class="field-input" type="tel" name="properties[PHONE]" placeholder="+7 (999) 999-99-99" value="<?=$arResult['PROPERTIES'][1]['PHONE']['VALUE']?>"<?if($arResult['PERSON_TYPE_ID']!==1):?> disabled<?endif?>>
					</label>
					<label class="field-label" data-person-id="2">
						<span class="field-name">ФИО<span class="field-star">*</span></span>
						<input class="field-input" type="text" name="properties[NAME]" placeholder="Иванов Иван Иванович" value="<?=$arResult['PROPERTIES'][2]['NAME']['VALUE']?>"<?if($arResult['PERSON_TYPE_ID']!==2):?> disabled<?endif?>>
					</label>
					<label class="field-label" data-person-id="2">
						<span class="field-name">Телефон<span class="field-star">*</span></span>
						<input class="field-input" type="tel" name="properties[PHONE]" placeholder="+7 (999) 999-99-99" value="<?=$arResult['PROPERTIES'][2]['PHONE']['VALUE']?>"<?if($arResult['PERSON_TYPE_ID']!==2):?> disabled<?endif?>>
					</label>
				</div>
			</div>
		</div>
		<div class="order__recipient-container">
			<h2 class="section-title margin_b_s">Данные получателя</h2>
			<div class="order__recipient">
				<div class="info margin_b_m">Укажите данные получателя, если заказ будете получать не вы.</div>
				<div class="field-input-list">
					<label class="field-label" data-person-id="1">
						<span class="field-name">Получатель (ФИО или организация)</span>
						<input class="field-input" type="text" name="properties[RECIPIENT]" placeholder="Андреев Андрей Андреевич" value="<?=$arResult['PROPERTIES'][1]['RECIPIENT']['VALUE']?>"<?if($arResult['PERSON_TYPE_ID']!==1):?> disabled<?endif?>>
					</label>
					<label class="field-label" data-person-id="1">
						<span class="field-name">Телефон получателя</span>
						<input class="field-input" type="tel" name="properties[RECIPIENT_PHONE]" placeholder="+7 (999) 777-77-77" value="<?=$arResult['PROPERTIES'][1]['RECIPIENT_PHONE']['VALUE']?>"<?if($arResult['PERSON_TYPE_ID']!==1):?> disabled<?endif?>>
					</label>
					<label class="field-label" data-person-id="2">
						<span class="field-name">Получатель (ФИО или организация)</span>
						<input class="field-input" type="text" name="properties[RECIPIENT]" placeholder="Андреев Андрей Андреевич" value="<?=$arResult['PROPERTIES'][2]['RECIPIENT']['VALUE']?>"<?if($arResult['PERSON_TYPE_ID']!==2):?> disabled<?endif?>>
					</label>
					<label class="field-label" data-person-id="2">
						<span class="field-name">Телефон получателя</span>
						<input class="field-input" type="tel" name="properties[RECIPIENT_PHONE]" placeholder="+7 (999) 777-77-77" value="<?=$arResult['PROPERTIES'][2]['RECIPIENT_PHONE']['VALUE']?>"<?if($arResult['PERSON_TYPE_ID']!==2):?> disabled<?endif?>>
					</label>
				</div>
			</div>
		</div>
	</section>

    <section class="order__delivery-container margin_b_l">
		<h2 class="section-title margin_b_s">Варианты доставки</h2>
		
		<div class="order__delivery">

			<div class="order__delivery-info info">Доставка не включаена в стоимость заказа и оплачивается отдельно при получении.</div>

			<div class="order__delivery-company">
				<h3 class="section-subtitle margin_b_s">Транспортная компания</h3>
				<div class="radiobox__list margin_b_m">
					<?foreach ($arResult['DELIVERY_LIST'] as $arDelivery):?>
					<label class="radiobox__list-item">
						<input class="radio__input" type="radio" name="delivery_id" value="<?= $arDelivery['ID'] ?>"<?=$arDelivery['CHECKED'] ? ' checked' : ''?>>
						<span class="radiobox__container">
							<span class="radiobox"></span>
							<span class="radiobox__text"><?= $arDelivery['NAME'] ?></span>
						</span>
					</label>
					<?endforeach?>
				</div>

				<h3 class="section-subtitle margin_b_s">Тип доставки</h3>
				<div class="radiobox__list">
					<label class="radiobox__list-item" data-person-id="1">
						<input class="radio__input" type="radio" type="radio" name="properties[DELIVERY_TYPE]" value="9246"<?if($arResult['PROPERTIES'][1]['DELIVERY_TYPE']['VALUE'] == '9246'):?> checked<?endif?><?if($arResult['PERSON_TYPE_ID']!==1):?> disabled<?endif?>>
						<span class="radiobox__container">
							<span class="radiobox"></span>
							<span class="radiobox__text">до терминала (в пункт выдачи)</span>
						</span>
					</label>
					<label class="radiobox__list-item" data-person-id="1">
						<input class="radio__input" type="radio" type="radio" name="properties[DELIVERY_TYPE]" value="9244"<?if($arResult['PROPERTIES'][1]['DELIVERY_TYPE']['VALUE'] == '9244'):?> checked<?endif?><?if($arResult['PERSON_TYPE_ID']!==1):?> disabled<?endif?>>
						<span class="radiobox__container">
							<span class="radiobox"></span>
							<span class="radiobox__text">до адреса (курьерская)</span>
						</span>
					</label>

					<label class="radiobox__list-item" data-person-id="2">
						<input class="radio__input" type="radio" type="radio" name="properties[DELIVERY_TYPE]" value="9246"<?if($arResult['PROPERTIES'][2]['DELIVERY_TYPE']['VALUE'] == '9246'):?> checked<?endif?><?if($arResult['PERSON_TYPE_ID']!==2):?> disabled<?endif?>>
						<span class="radiobox__container">
							<span class="radiobox"></span>
							<span class="radiobox__text">до терминала (в пункт выдачи)</span>
						</span>
					</label>
					<label class="radiobox__list-item" data-person-id="2">
						<input class="radio__input" type="radio" type="radio" name="properties[DELIVERY_TYPE]" value="9244"<?if($arResult['PROPERTIES'][2]['DELIVERY_TYPE']['VALUE'] == '9244'):?> checked<?endif?><?if($arResult['PERSON_TYPE_ID']!==2):?> disabled<?endif?>>
						<span class="radiobox__container">
							<span class="radiobox"></span>
							<span class="radiobox__text">до адреса (курьерская)</span>
						</span>
					</label>
				</div>
			</div>


			<div class="order__delivery-type">
				<div class="field-input-list">
					<label class="field-label" data-person-id="1">
						<span class="field-name">Адрес доставки или пункта самовывоза<span class="field-star">*</span></span>
						<input class="field-input" type="text" name="properties[ADDRESS]" placeholder="г. Москва, ул. Малая Остроумовская, 1А" value="<?=$arResult['PROPERTIES'][1]['ADDRESS']['VALUE']?>"<?if($arResult['PERSON_TYPE_ID']!==1):?> disabled<?endif?>>
					</label>
					<label class="field-label" data-person-id="2">
						<span class="field-name">Адрес доставки или пункта самовывоза<span class="field-star">*</span></span>
						<input class="field-input" type="text" name="properties[ADDRESS]" placeholder="г. Москва, ул. Малая Остроумовская, 1А" value="<?=$arResult['PROPERTIES'][2]['ADDRESS']['VALUE']?>"<?if($arResult['PERSON_TYPE_ID']!==2):?> disabled<?endif?>>
					</label>

					<label class="field-label field-label_type_textarea" data-person-id="1">
						<span class="field-name">Комментарий к доставке</span>
						<textarea class="field-textarea" placeholder="Если есть какие-то пожелания по доставке, напишите здесь" name="properties[DELIVERY_COMMENT]"<?if($arResult['PERSON_TYPE_ID']!==1):?> disabled<?endif?>><?=$arResult['PROPERTIES'][1]['DELIVERY_COMMENT']['VALUE']?></textarea>
					</label>

					<label class="field-label field-label_type_textarea" data-person-id="2">
						<span class="field-name">Комментарий к доставке</span>
						<textarea class="field-textarea" placeholder="Если есть какие-то пожелания по доставке, напишите здесь" name="properties[DELIVERY_COMMENT]"<?if($arResult['PERSON_TYPE_ID']!==2):?> disabled<?endif?>><?=$arResult['PROPERTIES'][2]['DELIVERY_COMMENT']['VALUE']?></textarea>
					</label>
				</div>
			</div>

		</div>
    </section>

    <section class="order__payment-container margin_b_l">
		<h2 class="section-title margin_b_s">Варианты оплаты</h2>
		<div class="order__payment">
			<div class="info margin_b_m">Счёт или QR-код на оплату будет отправлен на электронную почту или в Telegram сразу после подтверждения заказа менеджером.</div>
			<div class="radiobox__list">
				<?foreach ($arResult['PAY_SYSTEM_LIST'] as $arPaySystem): ?>
				<label class="radiobox__list-item">
					<input class="radio__input" type="radio" name="pay_system_id" value="<?= $arPaySystem['ID'] ?>"<?/*= $arPaySystem['CHECKED'] ? ' checked' : '' */?> checked>
					<span class="radiobox__container">
						<span class="radiobox"></span>
						<span class="radiobox__text"><?= $arPaySystem['NAME'] ?></span>
					</span>
				</label>
				<?endforeach?>
			</div>
		</div>
    </section>

	<section class="order__payment-container margin_b_l">
		<h2 class="section-title margin_b_s">Отправить счёт в Telegram?</h2>
		<div class="order__payment">
			<div class="radiobox__list">
				<label class="radiobox__list-item" data-person-id="1">
					<input class="radio__input" type="radio" name="properties[WHATSAPP]" value="Y"<?if($arResult['PROPERTIES'][1]['WHATSAPP']['VALUE'] == 'Y'):?> checked<?endif?>>
					<span class="radiobox__container">
						<span class="radiobox"></span>
						<span class="radiobox__text">Да</span>
					</span>
				</label>
				<label class="radiobox__list-item" data-person-id="1">
					<input class="radio__input" type="radio" name="properties[WHATSAPP]" value="N"<?if($arResult['PROPERTIES'][1]['WHATSAPP']['VALUE'] == 'N'):?> checked<?endif?>>
					<span class="radiobox__container">
						<span class="radiobox"></span>
						<span class="radiobox__text">Нет</span>
					</span>
				</label>
				<label class="radiobox__list-item" data-person-id="2">
					<input class="radio__input" type="radio" name="properties[WHATSAPP]" value="Y"<?if($arResult['PROPERTIES'][2]['WHATSAPP']['VALUE'] == 'Y'):?> checked<?endif?>>
					<span class="radiobox__container">
						<span class="radiobox"></span>
						<span class="radiobox__text">Да</span>
					</span>
				</label>
				<label class="radiobox__list-item" data-person-id="2">
					<input class="radio__input" type="radio" name="properties[WHATSAPP]" value="N"<?if($arResult['PROPERTIES'][2]['WHATSAPP']['VALUE'] == 'N'):?> checked<?endif?>>
					<span class="radiobox__container">
						<span class="radiobox"></span>
						<span class="radiobox__text">Нет</span>
					</span>
				</label>
			</div>
		</div>
    </section>

	<section class="order__comment-container margin_b_l">
    	<h2 class="section-title margin_b_s">Комментарий</h2>
		<div class="order__comment">
			<div class="margin_b_m info">Важно! По возможности укажите информацию о вездеходе.</div>
			<label class="field-label field-label_type_textarea">
				<span class="field-name">Комментарий к заказу</span>
				<textarea class="field-textarea" name="USER_DESCRIPTION" placeholder="Название вездехода, год выпуска, номер рамы и т. д."><?=$arResult['USER_DESCRIPTION']?></textarea>
			</label>
		<div>
	</section>

    <section class="order__items-container margin_b_l">
    	<h2 class="section-title margin_b_s">Состав заказа</h2>
		<div class="order__items">

			<div class="order__items-inner">

				<div class="order__items-titles">
					<div class="order__items-titles-sku">Ном. №</div>
					<div class="order__items-titles-name">Наименование</div>
					<div class="order__items-titles-quantity">Количество</div>
					<div class="order__items-titles-price">Цена за ед.</div>
					<div class="order__items-titles-amount">Сумма</div>
				</div>

				<div class="order__items-list">
					<?foreach ($arResult['BASKET'] as $arBasketItem):?>
					<div class="order__items-line">
						<div class="order__items-sku"><?=$arBasketItem['CML2_ARTICLE']?></div>
						<div class="order__items-name"><?=$arBasketItem['NAME']?></div>
						<div class="order__items-quantity"><?=$arBasketItem['QUANTITY_DISPLAY']?></div>
						<div class="order__items-price">
							<?if($arBasketItem['BASE_PRICE_DISPLAY']):?><div class="order__items-old-price"><?=$arBasketItem['BASE_PRICE_DISPLAY']?></div><?endif?>
							<div class="order__items-price-value"><?=$arBasketItem['PRICE_DISPLAY']?></div>
						</div>
						<div class="order__items-amount"><?=$arBasketItem['SUM_DISPLAY']?></div>
					</div>
					<?endforeach?>
				</div>
			</div>

		</div>

    </section>

	<input type="hidden" name="save" value="y">

	<div class="order__total">
		<div class="order__total-title section-subtitle">Итого к оплате:</div>
		<div class="order__total-list">
			<?if($arResult['SUM_BASE'] !== $arResult['SUM']):?>
			<div class="order__total-old-price-container">
				<div class="order__total-old-price section-subtitle"><?=$arResult['SUM_BASE_DISPLAY']?></div>
			</div>
			<?endif?>
			<div class="order__total-price section-title"><?=$arResult['SUM_DISPLAY']?></div>
		</div>
		<div class="order__total-info">Итоговая стоимость указана с учётом НДС</div>
		<div class="order__total-btn-container">
			<button class="order__total-btn btn btn_color_green" type="submit">Оформить заказ</button>
		</div>
	</div>
</form>