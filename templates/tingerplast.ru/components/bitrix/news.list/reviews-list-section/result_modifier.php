<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/* echo '<pre>'; print_r($arResult['SECTION']); echo '</pre>'; */

foreach ($arResult['ITEMS'] as $key => $value) {

	$previewText;

	if (strlen($value['DETAIL_TEXT']) > 300) {
		$previewText = substr($value['DETAIL_TEXT'], 0, 300);
		$previewText = rtrim($previewText, '!,.-—"');
		$previewText = rtrim($previewText, '!,.-—"');
		$previewText = rtrim($previewText, '!,.-—"');
		$previewText = substr($previewText, 0, strrpos($previewText, ' '));
		$previewText = $previewText . '...';

	} else {
		$previewText = $value['DETAIL_TEXT'];
	}

	$arResult['ITEMS'][$key]['PREVIEW_TEXT'] = $previewText;

	unset($previewText);
}

if (isset($arResult['SECTION']['PATH'])) {
	$arResult['SEO_TEXT'] = '';
	if ($arParams['PARENT_SECTION'] > 0) {
		$iterator = CIBlockSection::GetList(
			[],
			[
				'IBLOCK_ID' => $arResult['ID'],
				'ID' => $arParams['PARENT_SECTION']
			],
			false,
			[
				'ID',
				'IBLOCK_ID',
				'DESCRIPTION',
			]
		);
		$row = $iterator->GetNext();
		if ($row) {
			$arResult['SEO_TEXT'] = $row['DESCRIPTION'];
		}
	}
} else {
	$res = CIBlock::GetByID($arParams['IBLOCK_ID']);
	if ($ar_res = $res->GetNext()) {
		$arResult['SEO_TEXT'] = $ar_res['DESCRIPTION'];
	}
}
