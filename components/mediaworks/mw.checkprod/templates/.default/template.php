<?php 
/* 
 Comment Text 
*/



function getProgressClass( $value ){
    $class = '';
    $class = 'checklist-atv__steps-item_active';
    if( $arResult['CHECK_POINT_FILL'][$value]['UF_CHECK'] == 'Y'){
        $class = 'checklist-atv__steps-item_completed';
    }
    return $class;
}

function getProgressClassOTK( $value ){
    $class = '';
    $arValue = explode( '/', $value);
    if($value == '') $class = ''; 
    if( $arValue[0] == $arValue[1] && $value != '' ){
        $class = 'checklist-atv__steps-item_completed'; 
    }
    return $class;
}
// заливка этапов:
foreach ($arResult['SECTION_PARENT'] as $key => $section ) {
    foreach ($section['SECTIONS'] as $item) {
            $countItemPoints = 0;
            if ( !empty($arResult['CHECK_POINT_FILL']['TEMPL'][$key][$item['ID']]) ) {
                $countItemPoints = count($arResult['CHECK_POINT_FILL']['TEMPL'][$key][$item['ID']]);
            }
            $countItemsCheck = 0;
            if( !empty($arResult['CHECK_POINT_FILL']['CHECK'][$key][$item['ID']]) ) {
                $countItemsCheck = count($arResult['CHECK_POINT_FILL']['CHECK'][$key][$item['ID']]) ?? 0;
            }
        $classFill = '';
        if($_GET['debug'] == 'Y') echo "<br> $key {$item['ID']} check: $countItemsCheck   point: $countItemPoints";
        if ($countItemPoints == $countItemsCheck && $countItemPoints != 0) {
            $classFill = "checklist-steps__list-item-container_completed";
        } elseif ($countItemPoints > $countItemsCheck && $countItemsCheck != 0) {
            $classFill = "checklist-steps__list-item-container_active";
        }
        $arFillPoint[$key][$item['ID']] = $classFill;
    }
}
?>

<main>
    <? if($_GET['debug'] == 'Y'){?>
        <pre><? // print_r($arResult['CHECK_POINT_FILL']) ?></pre>
    <?}?>
    <section class="section container section_padding_bottom_big container">
        <h1 class="page-title margin_b_m">План сборки</h1>
		<div class="checklist-atv__list">
            <? foreach ($arResult['CARDS'] as $item){
             
                ?>
                <div class="checklist-atv__item">
                    <div class="checklist-atv__desc-container">
                        <div class="checklist-atv__desc">
                            <span class="checklist-atv__desc-name">Номер рамы</span>
                            <span class="checklist-atv__desc-separator"></span>
                            <span class="checklist-atv__desc-value"><?=$item[6]?></span>
                        </div>
                        <div class="checklist-atv__desc">
                            <span class="checklist-atv__desc-name">Заказ-наряд</span>
                            <span class="checklist-atv__desc-separator"></span>
                            <span class="checklist-atv__desc-value"><?=$item[3]?></span>
                        </div>
                        <div class="checklist-atv__desc">
                            <span class="checklist-atv__desc-name">Модель</span>
                            <span class="checklist-atv__desc-separator"></span>
                            <span class="checklist-atv__desc-value"><?=$item[4]?></span>
                        </div>
                        <div class="checklist-atv__desc">
                            <span class="checklist-atv__desc-name">Цвет</span>
                            <span class="checklist-atv__desc-separator"></span>
                            <span class="checklist-atv__desc-value"><?=$item[5]?></span>
                        </div>
                        <div class="checklist-atv__desc">
                            <span class="checklist-atv__desc-name">Месяц выполнения</span>
                            <span class="checklist-atv__desc-separator"></span>
                            <span class="checklist-atv__desc-value"><?=$item[23]?></span>
                        </div>
                        <div class="checklist-atv__desc">
                            <span class="checklist-atv__desc-name">Ответственный на текущем этапе</span>
                            <span class="checklist-atv__desc-separator"></span>
                            <span class="checklist-atv__desc-value">Иванов Иван Иванович</span>
                        </div>
                    </div>
                    <div class="checklist-atv__steps-container">
                        <div class="checklist-atv__steps"><? $i=1; ?>
                            <? foreach($arResult['SECTION_PARENT'][$item[6]]['SECTIONS'] as $step ){?>
                                <a class="checklist-atv__steps-item <?=$arFillPoint[$item[6]][$step['ID']]?>"
                                   href="#" disabled data="<?=$step['ID']?>"><?=$i?></a>
                                <? $i++; ?>
                            <?}?>
                            <a class="checklist-atv__steps-item checklist-atv__steps-item_important <?=getProgressClassOTK( $item[21] )?>" href="#">ОТК</a>
                        </div>
                    </div>
                    <div class="checklist-atv__btn-container">
                        <a class="btn btn_color_green" href="/checklist/<?=$item[6]?>/">Перейти к этапам</a>
                    </div>
                </div>
            <?}?>
        </div>
    </section>
</main>