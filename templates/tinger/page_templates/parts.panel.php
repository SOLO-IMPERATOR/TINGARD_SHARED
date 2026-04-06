<?

use Bitrix\Main\Page\Asset;
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/components/panel.css');

global $USER;

use Bitrix\Main\Loader;
Loader::includeModule('sale');

$arIDs = array();
$discountValue = '';

$discountListResutl = Bitrix\Sale\Internals\DiscountGroupTable::getList(array(
	'select' => array('DISCOUNT_ID'),
	'filter' => array('@GROUP_ID' => CUser::GetUserGroup($USER->GetID()), '=ACTIVE' => 'Y')
));

$discountList = $discountListResutl->fetchAll();

foreach($discountList as $discount) {
	$arIDs[] = $discount['DISCOUNT_ID'];
}

if ($arIDs) {
	$discountResult = Bitrix\Sale\Internals\DiscountTable::getList(array(
		'select' => array('ID', 'NAME', 'SHORT_DESCRIPTION_STRUCTURE'),
		'filter' => array(
			'@ID' => $arIDs,
			'@LID' => 's2',
		),
		'order' => array(
			"PRIORITY" => "DESC",
			"SORT" => "ASC",
			"ID" => "ASC"
		)
	));

	$discount = $discountResult->fetchAll();

	$discountValue = $discount[0]['SHORT_DESCRIPTION_STRUCTURE']['VALUE'];
}

?>
<div class="panel">
	<div class="panel__inner container">
		<div class="panel__link-container">
			<a class="panel__link" href="/parts/">Каталог</a>
		</div>
		<div class="panel__search-form">
			<?$APPLICATION->IncludeComponent(
				"bitrix:search.title",
				"search.title.parts",
				Array(
					"CATEGORY_0" => array("iblock_catalog"),
					"CATEGORY_0_TITLE" => "Запчасти",
					"CATEGORY_0_iblock_catalog" => array("37"),
					"CATEGORY_1" => array(),
					"CATEGORY_1_TITLE" => "",
					"CATEGORY_2" => array("iblock_catalog"),
					"CATEGORY_2_TITLE" => "",
					"CATEGORY_2_iblock_catalog" => array("37"),
					"CATEGORY_OTHERS_TITLE" => "",
					"CHECK_DATES" => "Y",
					"CONTAINER_ID" => "title-search",
					"CONVERT_CURRENCY" => "Y",
					"CURRENCY_ID" => "RUB",
					"INPUT_ID" => "title-search-input",
					"NUM_CATEGORIES" => "1",
					"ORDER" => "rank",
					"PAGE" => "#SITE_DIR#parts/index.php",
					"PREVIEW_HEIGHT" => "75",
					"PREVIEW_TRUNCATE_LEN" => "150",
					"PREVIEW_WIDTH" => "75",
					"PRICE_CODE" => array("PRICE"),
					"PRICE_VAT_INCLUDE" => "Y",
					"SHOW_INPUT" => "Y",
					"SHOW_OTHERS" => "N",
					"SHOW_PREVIEW" => "Y",
					"TOP_COUNT" => "10",
					"USE_LANGUAGE_GUESS" => "N"
				)
			);?>
		</div>
		<div class="panel__basket">
			 <?$APPLICATION->IncludeComponent(
				"bitrix:sale.basket.basket.line",
				"sale.basket.basket.line.parts",
				Array(
					"HIDE_ON_BASKET_PAGES" => "N",
					"PATH_TO_AUTHORIZE" => "",
					"PATH_TO_BASKET" => SITE_DIR."account/cart/",
					"PATH_TO_ORDER" => SITE_DIR."account/order/make/",
					"PATH_TO_PERSONAL" => SITE_DIR."account/",
					"PATH_TO_PROFILE" => SITE_DIR."account/",
					"PATH_TO_REGISTER" => SITE_DIR."account/",
					"POSITION_FIXED" => "N",
					"SHOW_AUTHOR" => "Y",
					"SHOW_EMPTY_VALUES" => "Y",
					"SHOW_NUM_PRODUCTS" => "Y",
					"SHOW_PERSONAL_LINK" => "Y",
					"SHOW_PRODUCTS" => "N",
					"SHOW_REGISTRATION" => "Y",
					"SHOW_TOTAL_PRICE" => "Y"
				)
			);?>
		</div>
		<div class="panel__account">
			<div class="panel__account-list">
			<?\Bitrix\Main\Page\Frame::getInstance()->startDynamicWithID("area");?>
			<?if($USER->IsAuthorized()):?>
				<div class="panel__account-item">
					[ <a class="panel__account-link" href="/account/"><?=$USER->GetLogin()?></a><?if ($discountValue <> ''):?> <span class="panel__account-discount">-<?=$discountValue?>%</span><?endif?> ]
				</div>
				<div class="panel__account-item">
					<a class="panel__account-link" href="/?logout=yes&<?=bitrix_sessid_get()?>">Выйти</a>
				</div>
				<?else:?> 
				<div class="panel__account-item">
					<a class="panel__account-link" href="/account/">Войти</a>
				</div>
				<div class="panel__account-item">
					<a class="panel__account-link" href="/account/create/">Зарегистрироваться</a>
				</div>
			<?endif?> 
			<?\Bitrix\Main\Page\Frame::getInstance()->finishDynamicWithID("area", "");?>
			</div>
		</div>
	</div>
</div>