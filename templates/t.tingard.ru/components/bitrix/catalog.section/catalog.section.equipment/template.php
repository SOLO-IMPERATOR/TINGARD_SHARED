<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;
use Bitrix\Catalog\ProductTable;

$this->setFrameMode(true);

$showTopPager = false;
$showBottomPager = false;
$showLazyLoad = false;

$elementEdit = CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_EDIT');
$elementDelete = CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_DELETE');
$elementDeleteParams = array('CONFIRM' => GetMessage('CT_BCS_TPL_ELEMENT_DELETE_CONFIRM'));

$arParams['~MESS_BTN_BUY'] = $arParams['~MESS_BTN_BUY'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_BUY');
$arParams['~MESS_BTN_DETAIL'] = $arParams['~MESS_BTN_DETAIL'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_DETAIL');
$arParams['~MESS_BTN_COMPARE'] = $arParams['~MESS_BTN_COMPARE'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_COMPARE');
$arParams['~MESS_BTN_SUBSCRIBE'] = $arParams['~MESS_BTN_SUBSCRIBE'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_SUBSCRIBE');
$arParams['~MESS_BTN_ADD_TO_BASKET'] = $arParams['~MESS_BTN_ADD_TO_BASKET'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_ADD_TO_BASKET');
$arParams['~MESS_NOT_AVAILABLE'] = $arParams['~MESS_NOT_AVAILABLE'] ?: Loc::getMessage('CT_BCS_TPL_MESS_PRODUCT_NOT_AVAILABLE');
$arParams['~MESS_NOT_AVAILABLE_SERVICE'] = ($arParams['~MESS_NOT_AVAILABLE_SERVICE'] ?? '')
	?: Loc::getMessage('CP_BCS_TPL_MESS_PRODUCT_NOT_AVAILABLE_SERVICE')
;
$arParams['~MESS_SHOW_MAX_QUANTITY'] = $arParams['~MESS_SHOW_MAX_QUANTITY'] ?: Loc::getMessage('CT_BCS_CATALOG_SHOW_MAX_QUANTITY');
$arParams['~MESS_RELATIVE_QUANTITY_MANY'] = $arParams['~MESS_RELATIVE_QUANTITY_MANY'] ?: Loc::getMessage('CT_BCS_CATALOG_RELATIVE_QUANTITY_MANY');
$arParams['MESS_RELATIVE_QUANTITY_MANY'] = $arParams['MESS_RELATIVE_QUANTITY_MANY'] ?: Loc::getMessage('CT_BCS_CATALOG_RELATIVE_QUANTITY_MANY');
$arParams['~MESS_RELATIVE_QUANTITY_FEW'] = $arParams['~MESS_RELATIVE_QUANTITY_FEW'] ?: Loc::getMessage('CT_BCS_CATALOG_RELATIVE_QUANTITY_FEW');
$arParams['MESS_RELATIVE_QUANTITY_FEW'] = $arParams['MESS_RELATIVE_QUANTITY_FEW'] ?: Loc::getMessage('CT_BCS_CATALOG_RELATIVE_QUANTITY_FEW');

$arParams['MESS_BTN_LAZY_LOAD'] = $arParams['MESS_BTN_LAZY_LOAD'] ?: Loc::getMessage('CT_BCS_CATALOG_MESS_BTN_LAZY_LOAD');

?>

		<div class="additional-equipment__slider swiper" data-entity="additional-equipment-slider" itemscope itemtype="http://schema.org/ItemList">
			<div class="additional-equipment__slider-wrapper swiper-wrapper">
			<!-- items-container -->
			<?
			if (!empty($arResult['ITEMS']) && !empty($arResult['ITEM_ROWS'])) {
				$generalParams = [
					'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'],
					'PRODUCT_DISPLAY_MODE' => $arParams['PRODUCT_DISPLAY_MODE'],
					'SHOW_MAX_QUANTITY' => $arParams['SHOW_MAX_QUANTITY'],
					'RELATIVE_QUANTITY_FACTOR' => $arParams['RELATIVE_QUANTITY_FACTOR'],
					'MESS_SHOW_MAX_QUANTITY' => $arParams['~MESS_SHOW_MAX_QUANTITY'],
					'MESS_RELATIVE_QUANTITY_MANY' => $arParams['~MESS_RELATIVE_QUANTITY_MANY'],
					'MESS_RELATIVE_QUANTITY_FEW' => $arParams['~MESS_RELATIVE_QUANTITY_FEW'],
					'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'],
					'USE_PRODUCT_QUANTITY' => $arParams['USE_PRODUCT_QUANTITY'],
					'PRODUCT_QUANTITY_VARIABLE' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
					'ADD_TO_BASKET_ACTION' => $arParams['ADD_TO_BASKET_ACTION'],
					'ADD_PROPERTIES_TO_BASKET' => $arParams['ADD_PROPERTIES_TO_BASKET'],
					'PRODUCT_PROPS_VARIABLE' => $arParams['PRODUCT_PROPS_VARIABLE'],
					'SHOW_CLOSE_POPUP' => $arParams['SHOW_CLOSE_POPUP'],
					'DISPLAY_COMPARE' => $arParams['DISPLAY_COMPARE'],
					'COMPARE_PATH' => $arParams['COMPARE_PATH'],
					'COMPARE_NAME' => $arParams['COMPARE_NAME'],
					'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
					'PRODUCT_BLOCKS_ORDER' => $arParams['PRODUCT_BLOCKS_ORDER'],
					'SLIDER_INTERVAL' => $arParams['SLIDER_INTERVAL'],
					'SLIDER_PROGRESS' => $arParams['SLIDER_PROGRESS'],
					'~BASKET_URL' => $arParams['~BASKET_URL'],
					'~ADD_URL_TEMPLATE' => $arResult['~ADD_URL_TEMPLATE'],
					'~BUY_URL_TEMPLATE' => $arResult['~BUY_URL_TEMPLATE'],
					'~COMPARE_URL_TEMPLATE' => $arResult['~COMPARE_URL_TEMPLATE'],
					'~COMPARE_DELETE_URL_TEMPLATE' => $arResult['~COMPARE_DELETE_URL_TEMPLATE'],
					'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
					'USE_ENHANCED_ECOMMERCE' => $arParams['USE_ENHANCED_ECOMMERCE'],
					'DATA_LAYER_NAME' => $arParams['DATA_LAYER_NAME'],
					'BRAND_PROPERTY' => $arParams['BRAND_PROPERTY'],
					'MESS_BTN_BUY' => $arParams['~MESS_BTN_BUY'],
					'MESS_BTN_DETAIL' => $arParams['~MESS_BTN_DETAIL'],
					'MESS_BTN_COMPARE' => $arParams['~MESS_BTN_COMPARE'],
					'MESS_BTN_SUBSCRIBE' => $arParams['~MESS_BTN_SUBSCRIBE'],
					'MESS_BTN_ADD_TO_BASKET' => $arParams['~MESS_BTN_ADD_TO_BASKET'],
				];

				$areaIds = [];
				$itemParameters = [];

				foreach ($arResult['ITEMS'] as $item)
				{
					$uniqueId = $item['ID'].'_'.md5($this->randString().$component->getAction());
					$areaIds[$item['ID']] = $this->GetEditAreaId($uniqueId);
					$this->AddEditAction($uniqueId, $item['EDIT_LINK'], $elementEdit);
					$this->AddDeleteAction($uniqueId, $item['DELETE_LINK'], $elementDelete, $elementDeleteParams);

					$itemParameters[$item['ID']] = [
						'SKU_PROPS' => $arResult['SKU_PROPS'][$item['IBLOCK_ID']],
						'MESS_NOT_AVAILABLE' => ($arResult['MODULES']['catalog'] && $item['PRODUCT']['TYPE'] === ProductTable::TYPE_SERVICE
							? $arParams['~MESS_NOT_AVAILABLE_SERVICE']
							: $arParams['~MESS_NOT_AVAILABLE']
						),
					];
				}

				foreach ($arResult['ITEM_ROWS'] as $key => $rowData) {
					$rowItems = array_splice($arResult['ITEMS'], 0, $rowData['COUNT']);
					$item = reset($rowItems);
					$item['INDEX'] = $key + 1;
					$APPLICATION->IncludeComponent(
						'bitrix:catalog.item',
						'catalog.item.equipment',
						array(
							'RESULT' => array(
								'ITEM' => $item,
								'AREA_ID' => $areaIds[$item['ID']],
								'TYPE' => $rowData['TYPE'],
								'BIG_LABEL' => 'N',
								'BIG_DISCOUNT_PERCENT' => 'N',
								'BIG_BUTTONS' => 'N',
								'SCALABLE' => 'N'
							),
							'PARAMS' => $generalParams + $itemParameters[$item['ID']],
						),
						$component,
						array('HIDE_ICONS' => 'Y')
					);
				}
				unset($rowItems);
				unset($itemParameters);
				unset($areaIds);
				unset($generalParams);

			} else {
				?>Ничего не найдено<?
			}
			?>
			<!-- items-container -->
			</div>
		</div>

		<?
		$signer = new \Bitrix\Main\Security\Sign\Signer;
		$signedTemplate = $signer->sign($templateName, 'catalog.section');
		$signedParams = $signer->sign(base64_encode(serialize($arResult['ORIGINAL_PARAMETERS'])), 'catalog.section');
		?>



<!-- component-end -->
