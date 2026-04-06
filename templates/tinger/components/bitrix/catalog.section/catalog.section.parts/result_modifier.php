<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogSectionComponent $component
 */

use \Bitrix\Main\Type\Collection;

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();

/* Сортировка по номеру на взрыв-схеме в конкретной категории */
$arIitems = $arResult['ITEMS'];

foreach ($arIitems as $arItemKey => $arItem) {
    $arResult['ITEMS'][$arItemKey]['SORT'] = null;
    foreach ($arItem['DISPLAY_PROPERTIES']['NUMBER']['VALUE'] as $sectionNumberKey => $sectionNumber) {
        if ($arItem['IBLOCK_SECTION_ID'] == $sectionNumber) {
            $arResult['ITEMS'][$arItemKey]['SORT'] = $arItem['DISPLAY_PROPERTIES']['NUMBER']['DESCRIPTION'][$sectionNumberKey];
        }
    }
}

Collection::sortByColumn($arResult['ITEMS'], array('SORT' => array(SORT_NUMERIC, SORT_ASC)/*, 'attr' => SORT_DESC), array('attr' => 'strlen'), 'www'*/));

$arResult['DETAIL_PICTURE']['WEBP_SRC_1000_1000'] = Pict::getResizedWebpSrc($arResult['DETAIL_PICTURE'], 1000, 1000, true);
$arResult['DETAIL_PICTURE']['WEBP_SRC_1280_1280'] = Pict::getResizedWebpSrc($arResult['DETAIL_PICTURE'], 1280, 1280, true);
$arResult['DETAIL_PICTURE']['WEBP_SRC_5000_5000'] = Pict::getResizedWebpSrc($arResult['DETAIL_PICTURE'], 5000, 5000, true);