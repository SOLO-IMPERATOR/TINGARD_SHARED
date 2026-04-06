<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$ITEMS = $arResult['ITEMS'];?>

<span class="testdrive__options-list">
    <select class="select select--dark">
        <option value="не выбрано" name="default">выберите дилера</option>
        <?foreach ($ITEMS as $set_cities) {?>
            <?if ($set_cities['PROPERTIES']['DM_TESTDRIVE']['VALUE'] == 'Y') {?>
                <option value="<?=$set_cities['NAME']?> (<?=$set_cities['DISPLAY_PROPERTIES']['DM_CITY']['DISPLAY_VALUE']?>)"><?=$set_cities['NAME']?> (<?=$set_cities['DISPLAY_PROPERTIES']['DM_CITY']['DISPLAY_VALUE']?>)</option>
            <?}?>
        <?}?>
    </select>
</span>