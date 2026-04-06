<?php 
/* 
* Comment Text 
*/
class message_b24 extends CBitrixComponent {
  public function onPrepareComponentParams($arParams){
      $result = array(
"CACHE_TYPE"    => $arParams["CACHE_TYPE"]
);
      return $result;
  }

  private function clearMess(){
    \Bitrix\Main\Loader::IncludeModule("highloadblock");
    $hlblock_id = 28; // ID вашей HL-таблицы
    $hlblock = Bitrix\Highloadblock\HighloadBlockTable::getById($hlblock_id)->fetch();
    $entity = Bitrix\Highloadblock\HighloadBlockTable::compileEntity($hlblock);
    $entity_data_class = $entity->getDataClass();
    $chatID = 'chat'. \Bitrix\Main\Engine\CurrentUser::get()->getId();
    $filter = array(
      'UF_ID_CHAT' => $chatID
    );
    $rsData = $entity_data_class::getList(array(
      "select" => array("*"),
      "filter" => $filter
    ))->Fetch();
    $currentCount = $rsData['UF_COUNT'] ?? 0;
    if( $currentCount > 0){
      ;
      $result = $entity_data_class::update(
        $rsData['ID'],
        [ 'UF_COUNT' => 0 ]
      );
    }
  }


  function executeComponent(){
      $this->clearMess();
      $this->IncludeComponentTemplate();
        return $this->arResult;
  }
}
