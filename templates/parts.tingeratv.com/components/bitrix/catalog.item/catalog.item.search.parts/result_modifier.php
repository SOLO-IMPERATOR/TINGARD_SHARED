<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

if(isset($arResult['ITEM']['ID'])) {

	$arResultSubsections = CIBlockElement::GetElementGroups($arResult['ITEM']['ID'], true);
	$n = 0;
	while ($arItemSubsections = $arResultSubsections->Fetch()) {
		$arItemSections = CIBlockSection::GetByID($arItemSubsections['IBLOCK_SECTION_ID'])->GetNext();
		$arResult['ITEM']['SECTIONS'][$n]['SECTION_NAME'] = $arItemSections['NAME'];
		$arResult['ITEM']['SECTIONS'][$n]['SUBSECTION_NAME'] = $arItemSubsections['NAME'];
		$arResult['ITEM']['SECTIONS'][$n]['URL'] = $arItemSections['SECTION_PAGE_URL'] . $arItemSubsections['CODE'] . '/';
		$n++;
	}	

}