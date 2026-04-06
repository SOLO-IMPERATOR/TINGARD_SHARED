<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>

<form id="testdrive_form">

<h3 class="section-title section-title_margin_bottom">Где удобно пройти тест-драйв?</h3>

<div class="testdrive__options margin_b_l">

    <label class="testdrive__options-item">
        <input data-name-label="visiting" class="radio__input" type="radio" name="place" checked>
        <div class="testdrive__option-item-content">
            <span class="radiobox__container">
                <span class="radiobox"></span>
                <span class="radiobox__text">Выездной</span>
            </span>
            <span class="testdrive__options-list">
                <span class="testdrive__options-list-item">Москва и Санкт-Петербург</span>
                <span class="testdrive__options-list-item">Длительность — 1 час</span>
                <span class="testdrive__options-list-item">С опытным пилотом, участником Трофи</span>
                <span class="testdrive__options-list-item">Мастер-класс по эксплуатации техники</span>
            </span>
        </div>
    </label>

    <label class="testdrive__options-item">
        <input data-name-label="in_cherepovets" class="radio__input" type="radio" name="place">
        <div class="testdrive__option-item-content">
            <span class="radiobox__container">
                <span class="radiobox"></span>
                <span class="radiobox__text">В Череповце</span>
            </span>
            <span class="testdrive__options-list">
                <span class="testdrive__options-list-item">Длительность — 1 час</span>
                <span class="testdrive__options-list-item">С опытным пилотом, участником Трофи</span>
                <span class="testdrive__options-list-item">Мастер-класс по эксплуатации техники</span>
                <span class="testdrive__options-list-item">Cупругу отправим на расслабляющий массаж</span>
            </span>
        </div>
    </label>

    <label data-name-label="partners" class="testdrive__options-item">
        <input data-name-label="partners" class="radio__input" type="radio" name="place">
        <div class="testdrive__option-item-content">
            <span class="radiobox__container">
                <span class="radiobox"></span>
                <span class="radiobox__text">У партнёров</span>
            </span>

            <?$APPLICATION->IncludeComponent(
                "bitrix:news.list", 
                "city.list", 
                array(
                    "COMPONENT_TEMPLATE" => "city.list",
                    "IBLOCK_TYPE" => "content",
                    "IBLOCK_ID" => "17",
                    "NEWS_COUNT" => "300",
                    "SORT_BY1" => "ACTIVE_FROM",
                    "SORT_ORDER1" => "DESC",
                    "SORT_BY2" => "SORT",
                    "SORT_ORDER2" => "ASC",
                    "FILTER_NAME" => "",
                    "FIELD_CODE" => array(
                        0 => "",
                        1 => "",
                    ),
                    "PROPERTY_CODE" => array(
                        0 => "DM_CITY",
                        1 => "DM_TESTDRIVE",
                        2 => "",
                    ),
                    "CHECK_DATES" => "Y",
                    "DETAIL_URL" => "",
                    "AJAX_MODE" => "N",
                    "AJAX_OPTION_JUMP" => "N",
                    "AJAX_OPTION_STYLE" => "Y",
                    "AJAX_OPTION_HISTORY" => "N",
                    "AJAX_OPTION_ADDITIONAL" => "",
                    "CACHE_TYPE" => "A",
                    "CACHE_TIME" => "36000000",
                    "CACHE_FILTER" => "N",
                    "CACHE_GROUPS" => "Y",
                    "PREVIEW_TRUNCATE_LEN" => "",
                    "ACTIVE_DATE_FORMAT" => "d.m.Y",
                    "SET_TITLE" => "N",
                    "SET_BROWSER_TITLE" => "N",
                    "SET_META_KEYWORDS" => "N",
                    "SET_META_DESCRIPTION" => "N",
                    "SET_LAST_MODIFIED" => "N",
                    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                    "ADD_SECTIONS_CHAIN" => "N",
                    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                    "PARENT_SECTION" => "",
                    "PARENT_SECTION_CODE" => "",
                    "INCLUDE_SUBSECTIONS" => "Y",
                    "STRICT_SECTION_CHECK" => "N",
                    "PAGER_TEMPLATE" => ".default",
                    "DISPLAY_TOP_PAGER" => "N",
                    "DISPLAY_BOTTOM_PAGER" => "Y",
                    "PAGER_TITLE" => "Новости",
                    "PAGER_SHOW_ALWAYS" => "N",
                    "PAGER_DESC_NUMBERING" => "N",
                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                    "PAGER_SHOW_ALL" => "N",
                    "PAGER_BASE_LINK_ENABLE" => "N",
                    "SET_STATUS_404" => "N",
                    "SHOW_404" => "N",
                    "MESSAGE_404" => ""
                ),
                false
            );?>
            
        </div>
    </label>

</div>

<h2 class="section-title section-title_margin_bottom">Какую модель вы хотели протестировать?</h2>

<?$APPLICATION->IncludeComponent(
    "bitrix:news.list", 
    "testdrive.product.block", 
    array(
        "COMPONENT_TEMPLATE" => "testdrive.product.block",
        "IBLOCK_TYPE" => "catalog",
        "IBLOCK_ID" => "11",
        "NEWS_COUNT" => "20",
        "SORT_BY1" => "ACTIVE_FROM",
        "SORT_ORDER1" => "DESC",
        "SORT_BY2" => "SORT",
        "SORT_ORDER2" => "ASC",
        "FILTER_NAME" => "",
        "FIELD_CODE" => array(
            0 => "",
            1 => "",
        ),
        "PROPERTY_CODE" => array(
            0 => "C_TESTDRIVE_YES",
            1 => "M_SHORT_NAME",
            2 => "C_PRICE",
            3 => "",
        ),
        "CHECK_DATES" => "Y",
        "DETAIL_URL" => "",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "36000000",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "Y",
        "PREVIEW_TRUNCATE_LEN" => "",
        "ACTIVE_DATE_FORMAT" => "d.m.Y",
        "SET_TITLE" => "N",
        "SET_BROWSER_TITLE" => "N",
        "SET_META_KEYWORDS" => "N",
        "SET_META_DESCRIPTION" => "N",
        "SET_LAST_MODIFIED" => "N",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "ADD_SECTIONS_CHAIN" => "N",
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => "",
        "INCLUDE_SUBSECTIONS" => "Y",
        "STRICT_SECTION_CHECK" => "N",
        "PAGER_TEMPLATE" => ".default",
        "DISPLAY_TOP_PAGER" => "N",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "PAGER_TITLE" => "Новости",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_DESC_NUMBERING" => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_BASE_LINK_ENABLE" => "N",
        "SET_STATUS_404" => "N",
        "SHOW_404" => "N",
        "MESSAGE_404" => ""
    ),
    false
);?>

<div class="margin_b_l">
    <h2 class="section-title section-title_margin_bottom">Выберите удобную дату</h2>
    <input class="input-field" type="date" name="date">
</div>

<div>
    <h2 class="section-title section-title_margin_bottom">Оставьте свои контактные данные</h2>
    <label class="testdrive__label margin_b_s">
        <input class="input-field" type="text" name="name" data-b24="NAME" placeholder="Имя">
    </label>
    <label class="testdrive__label margin_b_s">
        <input class="input-field" type="tel" name="phone" data-b24="PHONE_WORK" placeholder="Телефон*" required>
    </label>
    <label class="testdrive__policy form-policy margin_b_s">
        <input class="checkbox__input" type="checkbox" name="policy" required="">
        <span class="checkbox__container">
            <span class="checkbox"></span>
            <span class="checkbox__text">Нажимая на кнопку «Записаться на тест-драйв», я даю согласие на обработку моих <a href="/privacy-policy/">персональных данных</a></span>
        </span>
    </label>
    <div class="testdrive__btn-container">
        <button id="book_testdrive" class="btn btn--green--fill" type="submit">Записаться на тест-драйв</button>
    </div>
</div>
</form>