<?php 
/* 
 Comment Text 
*/

function getClassFileDom( $fileExt ){
  $class = 'files__item_ext_txt';
  $arExt = [
    'xlsx' => 'files__item_ext_xls',
    'xls'  => 'files__item_ext_xls',
    'doc'  => 'files__item_ext_doc',
    'docx'  => 'files__item_ext_doc',
    'pdf'  => 'files__item_ext_pdf',
    'txt'  => 'files__item_ext_txt',
    'jpg'  => 'files__item_ext_jpg'
  ];
  if( $arExt[$fileExt] ){
    $class = $arExt[$fileExt];
  }
  return $class;
}


?>
<? if($arParams["AJAX"] != 'Y'){?>
<div style="display: none">
    <form method="post" id="lk__form-root">
        <input type="hidden" name="rootDir" value="<?=$arParams["URL_YA"]?>">
        <input type="hidden" name="titleBox" value="<?=$arParams['TITLE']?>">
    </form>
</div>
<div id="replaceContent">
<? } ?>
<div class="section section_padding-top_big section_padding-bottom_small" id="sectionDir">
  <h2 class="section-title section-title_margin_bottom"><?=$arParams['TITLE']?></h2>
  <div class="files">
    <? foreach ($arResult['homeDir'] as $item){?>
      <?
        switch ($item['type']){
          case 'dir':
              ?>
              <a class="files__item files__item_type_folder type_dir" href="<?=$item['path']?>" onclick="return false">
                  <span class="files__content"><?=$item['name']?></span>
              </a>
            <?
              break;
          case 'file':
              $arFileExt   = explode('.', $item['name']);
              $fileExt = end($arFileExt) ;
              $classItem = 'files__item_ext_txt';
              $classItem = getClassFileDom($fileExt);
              $pathYD = str_replace('disk:', '', $item['path']);
              $nameFileYD = basename($pathYD);
              ?>
            <a class="files__item files__item_type_file <?=$classItem?>" href="<?=$pathYD?>" data-namefile="<?=$nameFileYD?>" onclick="return false" download>
                <span class="files__content"><?=$item['name']?></span>
                <span class="files__download">Скачать</span>
            </a>
            <?
              break;
        }

      ?>

    <?}?>
  </div>
</div>
<? if($arParams["AJAX"] != 'Y'){?>
</div>
<? } ?>
