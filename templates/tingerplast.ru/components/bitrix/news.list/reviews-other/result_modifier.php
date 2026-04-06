<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

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