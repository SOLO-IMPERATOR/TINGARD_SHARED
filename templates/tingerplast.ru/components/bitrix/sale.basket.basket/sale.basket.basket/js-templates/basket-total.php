<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();?>
<script id="basket-total-template" type="text/html">
	<div class="cart__total" data-entity="basket-checkout-aligner">
		<div class="cart__total-title section-subtitle">Итого:</div>
		<div class="cart__total-list">
			{{#DISCOUNT_PRICE_FORMATED}}
			<div class="cart__total-old-price-container">
				<div class="cart__total-old-price section-subtitle">{{{PRICE_WITHOUT_DISCOUNT_FORMATED}}}</div>
			</div>
			{{/DISCOUNT_PRICE_FORMATED}}
			<div class="cart__total-price section-title" data-entity="basket-total-price">{{{PRICE_FORMATED}}}</div>
		</div>
		<div class="cart__total-info">Итоговая стоимость с учётом НДС</div>
		<div class="cart__total-btn-container">
			<button class="btn btn_type_turquoise-green" data-action="modal" data-crm-title="Заказ с сайта (из корзины)" data-crm-direction="68" data-modal-type="default" data-function="sendCart"{{#DISABLE_CHECKOUT}} disabled{{/DISABLE_CHECKOUT}}>Оформить заказ</button>
		</div>
	</div>
</script>