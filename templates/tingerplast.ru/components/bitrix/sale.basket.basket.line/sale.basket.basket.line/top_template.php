<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();
/**
 * @global array $arParams
 * @global CUser $USER
 * @global CMain $APPLICATION
 * @global string $cartId
 */
$compositeStub = (isset($arResult['COMPOSITE_STUB']) && $arResult['COMPOSITE_STUB'] == 'Y');
?>

<?//echo '<pre>'; print_r($arResult); echo '</pre>';?>

<a class="small-basket" href="<?=$arParams['PATH_TO_BASKET']?>">
	<div class="small-basket__count-container">
		<?if (($arResult['NUM_PRODUCTS']) <> 0):?>
		<div class="small-basket__container">
			<div class="small-basket__count"><?=$arResult['BASKET_COUNT_DESCRIPTION']?></div>
			<div class="small-basket__total"><?=$arResult['TOTAL_PRICE']?></div>
		</div>
		<?else:?>Корзина<?endif?></div>
</a>

