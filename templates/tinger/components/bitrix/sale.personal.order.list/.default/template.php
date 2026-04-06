<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main,
	Bitrix\Main\Localization\Loc,
	Bitrix\Main\Page\Asset;

Loc::loadMessages(__FILE__);
?>

<?if (!empty($arResult['ERRORS']['FATAL'])):?>
	<?$component = $this->__component;?>
	<?if ($arParams['AUTH_FORM_IN_TEMPLATE'] && isset($arResult['ERRORS']['FATAL'][$component::E_NOT_AUTHORIZED])):?>
		<?$APPLICATION->AuthForm('', false, false, 'N', false)?>
	<?endif?>
<?else:?>
	<div class="orders container margin_b_xl">
		<h1 class="page-title margin_b_m">Мои заказы</h1>
		<div class="orders__nav-container margin_b_m">
			<ul class="orders__nav">
				<li class="orders__nav-item">
					<a class="orders__nav-link" href="/account/order/">Текущие заказы</a>
				</li>
				<li class="orders__nav-item">
					<a class="orders__nav-link" href="/account/order/?filter_history=Y">Завершённые заказы</a>
				</li>
				<li class="orders__nav-item">
					<a class="orders__nav-link" href="/account/order/?filter_history=Y&show_canceled=Y">Отменённые заказы</a>
				</li>
			</ul>
		</div>
		<?if (!empty($arResult['ERRORS']['NONFATAL'])):?>
			<?foreach($arResult['ERRORS']['NONFATAL'] as $error):?>
				<?ShowError($error)?>
			<?endforeach?>
		<?endif?>
		<?if(!count($arResult['ORDERS'])):?>
			<?if($_REQUEST["filter_history"] == 'Y' && $_REQUEST["show_canceled"] == 'Y'):?>
				<div class="margin_b_xl">Нет отменённых заказов</div>
			<?elseif($_REQUEST["filter_history"] == 'Y'):?>
				<div class="margin_b_xl">Нет завершённых заказов</div>
			<?else:?>
				<div class="margin_b_xl">Нет текущих заказов</div>
			<?endif?>
		<?endif?>
		<?if ($_REQUEST["filter_history"] !== 'Y'):?>
			<div class="orders__list ajax-container margin_b_m">
				<?foreach ($arResult['ORDERS'] as $key => $order):?>
				<div class="ajax-item orders__item">
					<div class="orders__name-container">
						<h2 class="orders__name section-subtitle">Заказ №<?=$order['ORDER']['ACCOUNT_NUMBER']?></h2>
						<div class="orders__date">от <?=$order['ORDER']['DATE_INSERT_FORMATED']?></div>
						<div class="orders__status"><?=$arResult['INFO']['STATUS'][$order['ORDER']['STATUS_ID']]['NAME']?></div>
					</div>
					<div class="orders__body">
						<div class="orders__body-item">
							<div class="section-subtitle margin_b_s">Оплата</div>
							<div class="margin_b_s">Счёт отправлен на электронную почту, привязанную к аккаунту.</div>
							<?foreach ($order['PAYMENT'] as $payment):?>
							<ul class="orders__body-list">
								<li class="orders__body-list-item">
									<div class="orders__body-list-name">Сумма к оплате:</div>
									<div class="orders__body-list-value"><?=$payment['FORMATED_SUM']?> (НДС включён)</div>
								</li>
								<li class="orders__body-list-item">
									<div class="orders__body-list-name">Способ оплаты:</div>
									<div class="orders__body-list-value">«<?=$payment['PAY_SYSTEM_NAME']?>»</div>
								</li>
								<li class="orders__body-list-item">
									<div class="orders__body-list-name">Статус оплаты:</div>
									<div class="orders__body-list-value">
										<?if ($payment['PAID'] === 'Y'):?>
										<span class="orders__body-list-status orders__body-list-status_type_completed">оплачен</span>
										<?elseif($order['ORDER']['IS_ALLOW_PAY'] == 'N'):?>
										<span class="orders__body-list-status orders__body-list-status_type_not-avaliable">недоступно</span>
										<?else:?>
										<span class="orders__body-list-status orders__body-list-status_type_not-completed">не оплачен</span>
										<?endif?>
									</div>
								</li>
							</ul>
							<?endforeach?>
						</div>
						<div class="orders__body-item">
							<div class="section-subtitle margin_b_s">Доставка</div>
							<div class="margin_b_s">Номер для отслеживания будет доступен после отгрузки.</div>
							<?foreach ($order['SHIPMENT'] as $shipment):?>
							<ul class="orders__body-list">
								<li class="orders__body-list-item">
									<div class="orders__body-list-name">Транспортная компания:</div>
									<div class="orders__body-list-value"><?=$arResult['INFO']['DELIVERY'][$shipment['DELIVERY_ID']]['NAME']?></div>
								</li>
								<li class="orders__body-list-item">
									<div class="orders__body-list-name">Статус отгрузки:</div>
									<div class="orders__body-list-value">
										<?if ($shipment['DEDUCTED'] == 'Y'):?>
										<span class="orders__body-list-status orders__body-list-status_type_completed">отгружен</span>
										<?else:?>
										<span class="orders__body-list-status orders__body-list-status_type_not-completed">не отгружен</span>
										<?endif?>
									</div>
								</li>
								<?if(!empty($shipment['TRACKING_NUMBER'])):?>
								<li class="orders__body-list-item">
									<div class="orders__body-list-name">Трек-номер:</div>
									<div class="orders__body-list-value"><?=htmlspecialcharsbx($shipment['TRACKING_NUMBER'])?></div>
									
								</li>
								<?endif?>
							</ul>
							<?endforeach?>
						</div>
					</div>
					<div class="orders__item-links">
						<a class="orders__item-link" href="<?=htmlspecialcharsbx($order["ORDER"]["URL_TO_DETAIL"])?>">Подробнее о заказе</a>
						<a class="orders__item-link" href="<?=htmlspecialcharsbx($order["ORDER"]["URL_TO_COPY"])?>">Повторить заказ</a>
						<div class="orders__price"><?=$order['ORDER']['FORMATED_PRICE']?> (НДС включён)</div>
					</div>
				</div>
				<?endforeach?>
			</div>
		<?else:?>
			<div class="orders__list ajax-container margin_b_m">
				<?foreach ($arResult['ORDERS'] as $key => $order):?>
				<div class="ajax-item orders__item">
					<div class="orders__name-container">
						<h2 class="orders__name section-subtitle">Заказ №<?=$order['ORDER']['ACCOUNT_NUMBER']?></h2>
						<div class="orders__date">от <?=$order['ORDER']['DATE_INSERT_FORMATED']?></div>
						<div class="orders__status"><?if($_REQUEST["show_canceled"] !== 'Y'):?>Заказ выполнен<?else:?>Заказ отменён<?endif?></div>
					</div>
					<div class="orders__item-links">
						<a class="orders__item-link" href="<?=htmlspecialcharsbx($order["ORDER"]["URL_TO_DETAIL"])?>">Подробнее о заказе</a>
						<a class="orders__item-link" href="<?=htmlspecialcharsbx($order["ORDER"]["URL_TO_COPY"])?>">Повторить заказ</a>
						<div class="orders__price"><?=$order['ORDER']['FORMATED_PRICE']?> (НДС включён)</div>
					</div>
				</div>
				<?endforeach?>
			</div>
		<?endif?>
		<?=$arResult["NAV_STRING"]?>
	</div>
<?endif?>

