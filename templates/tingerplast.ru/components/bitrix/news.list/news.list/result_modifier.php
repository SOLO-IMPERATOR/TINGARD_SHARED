<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$res = CIBlock::GetByID($arParams['IBLOCK_ID']);
if ($ar_res = $res->GetNext())
	$arResult['SEO_TEXT'] = $ar_res['DESCRIPTION'];


	
foreach ($arResult['ITEMS'] as $key => $value) {
	if (isset($value['DETAIL_PICTURE']['SRC'])) {
		$arResult['ITEMS'][$key]['DETAIL_PICTURE']['PREVIEW_WEBP_SRC_140_140'] = Pict::getResizedWebpSrc($value['DETAIL_PICTURE'], 140, 140, false);
	}
	
}