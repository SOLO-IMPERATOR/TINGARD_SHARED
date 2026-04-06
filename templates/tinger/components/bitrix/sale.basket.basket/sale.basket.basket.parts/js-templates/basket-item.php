<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

?>
<script id="basket-item-template" type="text/html">
	<div class="cart__item{{#SHOW_RESTORE}} cart__item_status_deleted{{/SHOW_RESTORE}}{{#NOT_AVAILABLE}} cart__item_unavailable{{/NOT_AVAILABLE}}" id="basket-item-{{ID}}" data-entity="basket-item" data-id="{{ID}}">
		{{#SHOW_RESTORE}}
			<div class="cart__deleted-item" id="basket-item-height-aligner-{{ID}}">
				{{#SHOW_LOADING}}
				<div class="basket-items-list-item-overlay"></div>
				{{/SHOW_LOADING}}

				<div class="cart__deteled-item-name">Позиция «{{NAME}}» была удалена из корзины</div>

				<div class="cart__deleted-link-container">
					<a class="card__deteled-btn" href="javascript:void(0)" data-entity="basket-item-restore-button">Восстановить</a>
				</div>

			</div>
		{{/SHOW_RESTORE}}
		{{^SHOW_RESTORE}}

			<div class="cart__img-container" id="basket-item-height-aligner-{{ID}}">
				<img class="cart__img" alt="{{NAME}}" src="{{{IMAGE_URL}}}{{^IMAGE_URL}}<?=SITE_TEMPLATE_PATH?>/img/no-photo.svg{{/IMAGE_URL}}">
			</div>

			<div class="cart__sku">
				{{^NOT_AVAILABLE}}
					{{COLUMN_LIST.0.VALUE}}
				{{/NOT_AVAILABLE}}
			</div>

			<div class="cart__name-container">
				{{#NOT_AVAILABLE}}В данный момент этот товар не доступен{{/NOT_AVAILABLE}}
				{{^NOT_AVAILABLE}}
					{{#DETAIL_PAGE_URL}}<a href="{{DETAIL_PAGE_URL}}">{{/DETAIL_PAGE_URL}}<span data-entity="basket-item-name">{{NAME}}</span>{{#DETAIL_PAGE_URL}}</a>{{/DETAIL_PAGE_URL}}
				{{/NOT_AVAILABLE}}
				{{#WARNINGS.length}}
					<div data-entity="basket-item-warning-node">
						<span data-entity="basket-item-warning-close">&times;</span>
						{{#WARNINGS}}<div data-entity="basket-item-warning-text">{{{.}}}</div>{{/WARNINGS}}
					</div>
				{{/WARNINGS.length}}
			</div>

			<div class="cart__price">
				{{^NOT_AVAILABLE}}
					{{#SHOW_DISCOUNT_PRICE}}<div class="cart__old-price">{{{FULL_PRICE_FORMATED}}}</div>{{/SHOW_DISCOUNT_PRICE}}
					<div class="cart__price-value" id="basket-item-price-{{ID}}">{{{PRICE_FORMATED}}}</div>
				{{/NOT_AVAILABLE}}
			</div>

			<div class="cart__quantity" data-entity="basket-item-quantity-block">
				{{^NOT_AVAILABLE}}
					<button class="cart__quantity-btn cart__quantity-btn_action_minus" type="button" data-entity="basket-item-quantity-minus"{{#NOT_AVAILABLE}} disabled{{/NOT_AVAILABLE}}>-</button>
					<input class="cart__quantity-input" type="text" value="{{QUANTITY}}" data-value="{{QUANTITY}}" data-entity="basket-item-quantity-field" id="basket-item-quantity-{{ID}}"{{#NOT_AVAILABLE}} disabled{{/NOT_AVAILABLE}}">
					<button class="cart__quantity-btn cart__quantity-btn_action_plus" type="button" data-entity="basket-item-quantity-plus"{{#NOT_AVAILABLE}} disabled{{/NOT_AVAILABLE}}>+</button>
				{{/NOT_AVAILABLE}}
			</div>

			<!-- <div class="cart__amount">
				{{#SHOW_DISCOUNT_PRICE}}
				<div class="cart__old-amount">{{{SUM_FULL_PRICE_FORMATED}}}</div>
				{{/SHOW_DISCOUNT_PRICE}}
				<div class="cart__amount-value" id="basket-item-sum-price-{{ID}}">{{{SUM_PRICE_FORMATED}}}</div>
			</div> -->

			<div class="cart__delete-btn-container">
				<button class="cart__delete-btn" type="button" data-entity="basket-item-delete">Удалить</button>
			</div>

		{{/SHOW_RESTORE}}
	</div>
</script>