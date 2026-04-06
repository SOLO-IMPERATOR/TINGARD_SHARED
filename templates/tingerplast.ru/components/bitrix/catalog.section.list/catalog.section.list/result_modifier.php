<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

\Bitrix\Main\Loader::includeModule('catalog');

foreach ($arResult['SECTIONS'] as $key => $section) {

	$rsProducts = CIBlockElement::GetList(
		Array('CATALOG_PRICE_1' => 'ASC'),
		Array('IBLOCK_ID' => $section['IBLOCK_ID'], 'SECTION_ID' => $section['ID']),
		false,
		Array('nTopCount' => 1),
		Array('IBLOCK_ID', 'ID', 'NAME', 'CATALOG_PRICE_1')
	);

	$ob = $rsProducts->Fetch();
	$minPrice = floor($ob['CATALOG_PRICE_1']);
	$arResult['SECTIONS'][$key]['MIN_PRICE'] = number_format($minPrice, 0, '', ' ');

/*     echo '<pre>'; print_r($minPrice); echo '</pre>'; */
}

foreach ($arResult['SECTIONS'] as $key => $section) {

	$resPrice = CIBlockElement::GetList(
		Array('CATALOG_PRICE_1' => 'ASC'),
		Array('IBLOCK_ID' => $section['IBLOCK_ID'], 'SECTION_ID' => $section['ID']),
		false,
		Array(),
		Array('IBLOCK_ID', 'ID', 'NAME', 'CATALOG_PRICE_1')
	);

	while($getPrices = $resPrice->Fetch()) {

		$dbPrice = CPrice::GetList(
			array('QUANTITY_FROM' => 'ASC', 'QUANTITY_TO' => 'ASC', 'SORT' => 'ASC'),
			array('PRODUCT_ID' => $getPrices['ID']),
			false,
			false,
			array('ID', 'CATALOG_GROUP_ID', 'PRICE', 'CURRENCY', 'QUANTITY_FROM', 'QUANTITY_TO')
		);

		$prices;

		while ($arPrice = $dbPrice->Fetch()) {
			
			$arDiscounts = CCatalogDiscount::GetDiscountByPrice(
				$arPrice['ID'],
				$USER->GetUserGroupArray(),
				'N',
				SITE_ID
			);

			$discountPrice = CCatalogProduct::CountPriceWithDiscount(
				$arPrice['PRICE'],
				$arPrice['CURRENCY'],
				$arDiscounts
			);

			$prices[] = $discountPrice;
		}

		
	}

	$arResult['SECTIONS'][$key]['MIN_PRICE'] = number_format(min($prices), 0, '', ' ');

	unset($prices);

}