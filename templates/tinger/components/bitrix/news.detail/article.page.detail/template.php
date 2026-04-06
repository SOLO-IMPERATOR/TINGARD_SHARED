<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?global $USER;?>
<?//print_r($arResult);?>

<main>
    <section class="news container margin_b_xl">
        <article class="news__inner">
            <div class="news__about">
                <h1 class="h2 margin_b_m"><?=$arResult["NAME"]?></h1>
                <div class="author margin_b_m">
                    <img class="author__img" src="<?=$arResult["DISPLAY_PROPERTIES"]["N_AUTHOR_PICTURE"]["FILE_VALUE"]["SRC"]?>" alt="<?=$arResult["DISPLAY_PROPERTIES"]["N_AUTHOR_NAME"]["VALUE"]?>">
                    <p class="author__name"><?=$arResult["DISPLAY_PROPERTIES"]["N_AUTHOR_NAME"]["VALUE"]?></p>
                </div>
            </div>
            <div class="news__body">
                <div class="news__slider margin_b_m">
                    <div class="news__swiper swiper margin_b_s">
                        <div class="swiper-wrapper">
                            <?foreach ($arResult["DISPLAY_PROPERTIES"]["N_PHOTOGALLERY"]["FILE_VALUE"] as $pet_photo) {?>
                                <div class="swiper-slide news__img">
                                    <img class="news__img" src="<?=$pet_photo["SRC"]?>" alt="Фотография к новости">
                                </div>
                            <?}?>
                        </div>
                    </div>
                    <div class="news__img-desc">
                        <div class="news__arrows arrows">
                            <button class="news__arrows-prev arrows__btn"><img class="arrows__img" src="/local/templates/tinger/img/arrow-prev.svg" alt="Стрелка назад"></button>
                            <button class="news__arrows-next arrows__btn"><img class="arrows__img" src="/local/templates/tinger/img/arrow-next.svg" alt="Стрелка вперёд"></button>
                        </div>
                        <p class="news__img-text"><?=$arResult["DISPLAY_PROPERTIES"]["N_PHOTO_CAPTION"]["VALUE"]?></p>
                    </div>
                </div>
                <div class="news__text margin_b_s">
                    <?=$arResult["DETAIL_TEXT"]?>
                </div>
                <nav class="news__social">
                    <ul class="news__social-list">
                        <li class="news__social-item">
                            <a href="#popup-form" class="popup-link news__social-link">Подписаться</a>
                        </li>
                        <li class="news__social-item">
                            <a href="/" class="news__social-link">VK</a>
                        </li>
                        <li class="news__social-item">
                            <a href="/" class="news__social-link">FB</a>
                        </li>
                        <li class="news__social-item">
                            <a href="/" class="news__social-link">TW</a>
                        </li>
                        <li class="news__social-item">
                            <a id="copy-link" class="news__social-link">Скопировать ссылку</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </article>
    </section>

    <?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"news.main.list", 
	array(
		"COMPONENT_TEMPLATE" => "news.main.list",
		"IBLOCK_TYPE" => "news",
		"IBLOCK_ID" => "10",
		"NEWS_COUNT" => "20",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(
			0 => "DETAIL_PICTURE",
			1 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "/news/#ELEMENT_CODE#/",
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
		"SET_TITLE" => "Y",
		"SET_BROWSER_TITLE" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_META_DESCRIPTION" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"INCLUDE_SUBSECTIONS" => "Y",
		"STRICT_SECTION_CHECK" => "N",
		"PAGER_TEMPLATE" => "",
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

<input style="opacity:0;position:absolute;" type="text" value="Привет мир" id="myInput">

</main>

<script>
    $('#copy-link').click(function () {
        let new_link = document.location.href;
        var copyText = document.getElementById("myInput");
        $('#myInput').val(new_link);
        copyText.select();
        copyText.setSelectionRange(0, 99999)
        document.execCommand("copy");
        alert("Ссылка скопирована");
    });
</script>

<?//if (CModule::IncludeModule('subscribe')) {?>
    <script>
        // $('#subscription').click(function () {
            <?//if ($USER->isAuthorized()) {?>
                
            <?//} else {?>
                // alert("Пожалуйста, авторизуйтесь");
            <?//}?>
        // });
    </script>
<?//}?>
