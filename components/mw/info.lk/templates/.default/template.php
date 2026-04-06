<?php 
/* 
 Comment Text 
*/
?>
<pre><?php //    print_r($arResult['arUser'])?></pre>
<section class="company">
  <div class="company__info">
    <div class="company__title">
      <span class="company__title-name">Компания: </span>
      <span class="company__title-value"><?=$arResult['arUser']['WORK_COMPANY']?></span>
        <? if($arResult['isDealer']){ ?>
            <a class="company__person" href="/account/employees/">управление сотрудниками</a>
        <?}?>
    </div>
    <div class="company__btn-container">
      <a href="/?logout=yes&<?=bitrix_sessid_get()?>" class="account__btn btn btn_type_white" type="button">Выйти из аккаунта</a>
    </div>
  </div>
  <div class="company__details">
    <div class="company__details-item">
      <div class="company__details-name">Менеджер:</div>
      <div class="company__details-value"><?=$arResult['arUser']['NAME']?></div>
    </div>
    <div class="company__details-item">
      <div class="company__details-name">Должность:</div>
      <div class="company__details-value"><?=$arResult['arUser']['WORK_POSITION']?></div>
    </div>
    <div class="company__details-item">
      <div class="company__details-name">Статус дилера:</div>
        <?
            $status = [
              'warning'     => [ 'class' => 'company__details-indicator_type_warning', 'text' => 'Давно не было отгрузок'],
              'successful'  => [ 'class' => 'company__details-indicator_type_normal', 'text' => 'Отгрузки были']
            ];
        ?>
        <? if( !empty($status[$arResult['arUser']['UF_TRAFIC_LIGHT']]) ){
          $arStatus = $status[$arResult['arUser']['UF_TRAFIC_LIGHT']];
        } else {
          $arStatus = $status['successful'];
        }?>
        <div class="company__details-value company__details-indicator <?=$arStatus['class']?>"><?=$arStatus['text']?></div>

    </div>
  </div>
</section>
