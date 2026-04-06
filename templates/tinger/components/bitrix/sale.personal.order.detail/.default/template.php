<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$APPLICATION->AddChainItem(htmlspecialcharsbx('Заказ №' . $arResult['ACCOUNT_NUMBER']), '');

use Bitrix\Main\Localization\Loc,
	Bitrix\Main\Page\Asset;
?>

<?if (!empty($arResult['ERRORS']['FATAL'])):?>
	<?$component = $this->__component;?>

	<?if ($arParams['AUTH_FORM_IN_TEMPLATE'] && isset($arResult['ERRORS']['FATAL'][$component::E_NOT_AUTHORIZED])):?>
		<?$APPLICATION->AuthForm('', false, false, 'N', false);?>
	<?endif?>
<?else:?>


<div class="detail-order container margin_b_xl">
	<h1 class="page-title margin_b_m">Заказ №<?=htmlspecialcharsbx($arResult["ACCOUNT_NUMBER"])?></h1>

	<?if (!empty($arResult['ERRORS']['NONFATAL'])):?>
		<?foreach ($arResult['ERRORS']['NONFATAL'] as $error):?>
			<?ShowError($error);?>
		<?endforeach?>
	<?endif?>
		
	<div class="detail-order__columns">

		<div class="detail-order__info-container margin_b_l">
			<h2 class="section-title margin_b_s">Информация о заказе</h2>
			<div class="detail-order__info">
				<ul class="detail-order__list">
					<li class="detail-order__list-item">
						<div class="detail-order__list-name">Дата заказа:</div>
						<div class="detail-order__list-value"><?=$arResult["DATE_INSERT_FORMATED"]?></div>
					</li>
					<li class="detail-order__list-item">
						<div class="detail-order__list-name">Сумма заказа:</div>
						<div class="detail-order__list-value"><?=$arResult["PRICE_FORMATED"]?> (НДС включён)</div>
					</li>
					<li class="detail-order__list-item">
						<div class="detail-order__list-name">Статус заказа:</div>
						<div class="detail-order__list-value">
							<span class="detail-order__status"><?=$arResult["STATUS"]["NAME"]?></span>
						</div>
					</li>
					<li class="detail-order__list-item">
						<div class="detail-order__list-name">E-mail:</div>
						<div class="detail-order__list-value"><?=$arResult["USER"]["EMAIL"]?></div>
					</li>
					<li class="detail-order__list-item">
						<div class="detail-order__list-name">Комментарий к заказу:</div>
						<div class="detail-order__list-value"><?=nl2br(htmlspecialcharsbx($arResult["USER_DESCRIPTION"]))?></div>
					</li>
					<li class="detail-order__list-item">
					<?foreach ($arResult["ORDER_PROPS"] as $property):?>
						<?if($property['CODE'] == 'DELIVERY_COMMENT'):?>
							<div class="detail-order__list-name"><?=htmlspecialcharsbx($property['NAME'])?>:</div>
							<div class="detail-order__list-value"><?=htmlspecialcharsbx($property['VALUE'])?></div>
						<?endif?>
					<?endforeach?>
					</li>
				</ul>
			</div>
		</div>

		<div class="detail-order__payer-container margin_b_l">
			<h2 class="section-title margin_b_s">Данные плательщика</h2>
			<div class="detail-order__payer">
				<ul class="detail-order__list">
					<li class="detail-order__list-item">
						<div class="detail-order__list-name">Плательщик:</div>
						<div class="detail-order__list-value"><?=$arResult['USER']['PERSON_TYPE_NAME']?></div>
					</li>
					<li class="detail-order__list-item">
					<?foreach ($arResult["ORDER_PROPS"] as $property):?>
						<?if($property['CODE'] == 'COMPANY'):?>
							<div class="detail-order__list-name"><?=htmlspecialcharsbx($property['NAME'])?>:</div>
							<div class="detail-order__list-value"><?=htmlspecialcharsbx($property['VALUE'])?></div>
						<?endif?>
					<?endforeach?>
					</li>
					<li class="detail-order__list-item">
					<?foreach ($arResult["ORDER_PROPS"] as $property):?>
						<?if($property['CODE'] == 'NAME'):?>
							<div class="detail-order__list-name"><?=htmlspecialcharsbx($property['NAME'])?>:</div>
							<div class="detail-order__list-value"><?=htmlspecialcharsbx($property['VALUE'])?></div>
						<?endif?>
					<?endforeach?>
					</li>
					<li class="detail-order__list-item">
					<?foreach ($arResult["ORDER_PROPS"] as $property):?>
						<?if($property['CODE'] == 'TIN'):?>
							<div class="detail-order__list-name"><?=htmlspecialcharsbx($property['NAME'])?>:</div>
							<div class="detail-order__list-value"><?=htmlspecialcharsbx($property['VALUE'])?></div>
						<?endif?>
					<?endforeach?>
					</li>
					<li class="detail-order__list-item">
					<?foreach ($arResult["ORDER_PROPS"] as $property):?>
						<?if($property['CODE'] == 'PHONE'):?>
							<div class="detail-order__list-name"><?=htmlspecialcharsbx($property['NAME'])?>:</div>
							<div class="detail-order__list-value"><?=htmlspecialcharsbx($property['VALUE'])?></div>
						<?endif?>
					<?endforeach?>
					</li>
				</ul>
			</div>
		</div>

	</div>
				
	<div class="detail-order__recipient-container margin_b_l">
		<h2 class="section-title margin_b_s">Данные получателя</h2>
		<div class="detail-order__recipient">
			<ul class="detail-order__list">
				<li class="detail-order__list-item">
				<?foreach ($arResult["ORDER_PROPS"] as $property):?>
					<?if($property['CODE'] == 'RECIPIENT'):?>
						<div class="detail-order__list-name"><?=htmlspecialcharsbx($property['NAME'])?></div>
						<div class="detail-order__list-value"><?=htmlspecialcharsbx($property['VALUE'])?></div>
					<?endif?>
				<?endforeach?>
				</li>
				<li class="detail-order__list-item">
				<?foreach ($arResult["ORDER_PROPS"] as $property):?>
					<?if($property['CODE'] == 'RECIPIENT_PHONE'):?>
						<div class="detail-order__list-name"><?=htmlspecialcharsbx($property['NAME'])?>:</div>
						<div class="detail-order__list-value"><?=htmlspecialcharsbx($property['VALUE'])?></div>
					<?endif?>
				<?endforeach?>
				</li>
			</ul>
		</div>
	</div>

	<div class="detail-order__columns">

		<div class="detail-order__payment-container margin_b_l">
			<h2 class="section-title margin_b_s">Информация об оплате</h2>
			<div class="detail-order__payment">
				<ul class="detail-order__list">
					<li class="detail-order__list-item">
						<div class="detail-order__list-name">Сумма к оплате:</div>
						<div class="detail-order__list-value"><?=$arResult['PRICE_FORMATED']?></div>
					</li>
					<?foreach ($arResult['PAYMENT'] as $payment):?>
					<li class="detail-order__list-item">
						<div class="detail-order__list-name">Способ оплаты:</div>
						<div class="detail-order__list-value">«<?=$payment['PAY_SYSTEM_NAME']?>»</div>
					</li>
					<li class="detail-order__list-item">
						<div class="detail-order__list-name">Статус оплаты:</div>
						<div class="detail-order__list-value">
							<?if ($payment['PAID'] === 'Y'):?>
								<div class="detail-order__status detail-order__status-item_type_completed">оплачен</div>
							<?elseif ($arResult['IS_ALLOW_PAY'] == 'N'):?>
								<div>Оплата недоступна</div>
							<?else:?>
								<div class="detail-order__status detail-order__status-item_type_not-completed">не оплачен</div>
							<?endif?>
						</div>
					</li>
					<?endforeach?>
				</ul>
			</div>
		</div>

		<div class="detail-order__delivery-container margin_b_l">
			<h2 class="section-title margin_b_s">Информация о доставке</h2>
			<div class="detail-order__delivery">
				<ul class="detail-order__list">
					<?foreach ($arResult['SHIPMENT'] as $shipment):?>
					<li class="detail-order__list-item">
						<div class="detail-order__list-name">Транспортная компания:</div>
						<div class="detail-order__list-value"><?=htmlspecialcharsbx($shipment['DELIVERY_NAME'])?></div>
					</li>
					<li class="detail-order__list-item">
						<div class="detail-order__list-name">Статус доставки:</div>
						<div class="detail-order__list-value">
							<?if ($shipment['DEDUCTED'] == 'Y'):?>
							<div class="detail-order__status detail-order__status-item_type_completed">отгружен</div>
							<?else:?>
							<div class="detail-order__status detail-order__status-item_type_not-completed">не отгружен</div>
							<?endif?>
						</div>
					</li>
					<?if($shipment['TRACKING_NUMBER'] <> ''):?>
					<li class="detail-order__list-item">
						<div class="detail-order__list-name">Трек-номер:</div>
						<div class="detail-order__list-value"><?=htmlspecialcharsbx($shipment['TRACKING_NUMBER'])?></div>
					</li>
					<?endif?>
					<?endforeach?>
				</ul>
			</div>
		</div>

	</div>


	<h3 class="section-title margin_b_s">Состав заказа</h3>

	<div class="detail-order__items-container margin_b_m">

		<div class="detail-order__items-inner">

			<div class="detail-order__items-titles">
				<div class="detail-order__items-titles-sku">Ном. №</div>
				<div class="detail-order__items-titles-name">Наименование</div>
				<div class="detail-order__items-titles-quantity">Количество</div>
				<div class="detail-order__items-titles-price">Цена за ед.</div>
				<div class="detail-order__items-titles-amount">Сумма</div>
			</div>

			<?foreach($arResult['BASKET'] as $basketItem):?>
			<div class="detail-order__items-list">
				<div class="detail-order__items-line">
					<div class="detail-order__items-sku"><?=$basketItem['CML2_ARTICLE']?></div>
					<div class="detail-order__items-name"><a href="<?=$basketItem['DETAIL_PAGE_URL']?>"><?=htmlspecialcharsbx($basketItem['NAME'])?></a></div>
					<div class="detail-order__items-quantity"><?=$basketItem['QUANTITY']?> шт.</div>
					<div class="detail-order__items-price">
						<div class="detail-order__items-old-price"><?=$basketItem['PRICE_FORMATED']?></div>
						<div class="detail-order__items-price-value"><?=$basketItem['BASE_PRICE_FORMATED']?></div>
					</div>
					<div class="detail-order__items-amount"><?=$basketItem['FORMATED_SUM']?></div>
				</div>
			</div>
			<?endforeach?>
		</div>
	</div>
	<a class="btn btn_color_green" href="<?=$arResult["URL_TO_LIST"]?>">Вернуться в список заказов</a>
</div>

<?endif?>
