<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();?>
<script id="basket-total-template" type="text/html">
	<div class="cart__total margin_t_m" data-entity="basket-checkout-aligner">
		<div class="cart__total-title section-subtitle">Итого:</div>
		<div class="cart__total-list">
			{{#DISCOUNT_PRICE_FORMATED}}
			<div class="cart__total-old-price-container">
				<div class="cart__total-old-price section-subtitle">{{{PRICE_WITHOUT_DISCOUNT_FORMATED}}}</div>
			</div>
			{{/DISCOUNT_PRICE_FORMATED}}
			<div class="cart__total-price section-title" data-entity="basket-total-price">{{{PRICE_FORMATED}}}</div>
		</div>
		<div class="cart__total-info">Итоговая стоимость указана с учётом НДС</div>
		<div class="cart__total-btn-container">
			<button class="btn btn_color_green" data-entity="basket-checkout-button" {{#DISABLE_CHECKOUT}} disabled{{/DISABLE_CHECKOUT}}>Перейти к оформлению заказа</button>
		</div>
	</div>
</script>