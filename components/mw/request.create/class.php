<?php 
/* 
* Comment Text 
*/
class request_create extends CBitrixComponent {
  public function onPrepareComponentParams($arParams){
      $result = array(
"CACHE_TYPE"    => $arParams["CACHE_TYPE"]
);
      return $result;
  }

  public function getElementsSelect(){
      \Bitrix\Main\Loader::includeModule('iblock');
      $sectionId = 105;
      $iblockId = 41;
      $section = \Bitrix\Iblock\SectionTable::getByPrimary($sectionId, [
          'filter' => ['IBLOCK_ID' => $iblockId],
          'select' => ['LEFT_MARGIN', 'RIGHT_MARGIN'],
      ])->fetch();
    $dbItems = \Bitrix\Iblock\ElementTable::getList([
        'select' => ['IBLOCK_SECTION_ID', 'ID', 'NAME', 'IBLOCK_ID'],
        'filter' => [
            'IBLOCK_ID' => $iblockId,
            'IBLOCK_SECTION_ID' => [ 120, 118, 107, 106, 119, 105, 104,]
//            '>=IBLOCK_SECTION_ID.LEFT_MARGIN' => $section['LEFT_MARGIN'],
//            '<=IBLOCK_SECTION_ID.RIGHT_MARGIN' => $section['RIGHT_MARGIN'],
        ],
    ]);
    $elements = [];
    while( $result = $dbItems->fetch() ) {
        $elements[] = $result;
        //echo '<pre>'; print_r($result); echo '</pre>';
    }

    return $elements;
  }

    public function getDopElementsSelect(){
        \Bitrix\Main\Loader::includeModule('iblock');
        $sectionId = 105;
        $iblockId = 41;
        $section = \Bitrix\Iblock\SectionTable::getByPrimary($sectionId, [
            'filter' => ['IBLOCK_ID' => $iblockId],
            'select' => ['LEFT_MARGIN', 'RIGHT_MARGIN'],
        ])->fetch();
        $dbItems = \Bitrix\Iblock\ElementTable::getList([
            'select' => ['IBLOCK_SECTION_ID', 'ID', 'NAME', 'IBLOCK_ID'],
            'filter' => [
                'IBLOCK_ID' => $iblockId,
                'IBLOCK_SECTION_ID' => 108
//            '>=IBLOCK_SECTION_ID.LEFT_MARGIN' => $section['LEFT_MARGIN'],
//            '<=IBLOCK_SECTION_ID.RIGHT_MARGIN' => $section['RIGHT_MARGIN'],
            ],
        ]);
        $elements = [];
        while( $result = $dbItems->fetch() ) {
            $elements[] = $result;
            //echo '<pre>'; print_r($result); echo '</pre>';
        }

        return $elements;
    }
  function executeComponent(){
      $this->arResult['dopProducts'] = $this->getDopElementsSelect();
      $this->arResult['Products'] = $this->getElementsSelect();
      $this->IncludeComponentTemplate();
      return $this->arResult;
  }
}
