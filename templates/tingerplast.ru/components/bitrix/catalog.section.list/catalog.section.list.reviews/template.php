<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

/* echo '<pre>'; print_r($arResult); echo '</pre>'; */

?>
<ul class="reviews-sections">
    <?foreach($arResult['SECTIONS'] as $section):?>
    <li class="reviews-sections__item">
        <a class="reviews-sections__link" href="<?=$section['SECTION_PAGE_URL']?>"><?=$section['NAME']?> (<?=$section['ELEMENT_CNT']?>)</a>
    </li>
    <?endforeach?>
</ul>