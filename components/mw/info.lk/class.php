<?php 
/* 
* Comment Text 
*/
class info_lk extends CBitrixComponent {
  public function onPrepareComponentParams($arParams){
      $result = array(
        "CACHE_TYPE"      => $arParams["CACHE_TYPE"],
        "DEALER_GROUP_ID" => $arParams["DEALER_GROUP_ID"]
      );
      return $result;
  }
  private function getInfo()
  {
    $dbUser = \Bitrix\Main\UserTable::getList(array(
      'select' => ['*', 'UF_*'],
      'filter' => [
        'ID' => \Bitrix\Main\Engine\CurrentUser::get()->getId()
      ]
    ));
    $arUser = $dbUser->fetch();
      return $arUser;
  }

  private function isDealer(){
    $groupsUsers = \Bitrix\Main\Engine\CurrentUser::get()->getUserGroups();
    $isDealer = false;
    if( in_array($this->arParams["DEALER_GROUP_ID"], $groupsUsers)) $isDealer = true;
    return $isDealer;
  }
  function executeComponent(){
    $this->arResult['isDealer'] = $this->isDealer();
    $this->arResult['arUser'] = $this->getInfo();
    $this->IncludeComponentTemplate();
    return $this->arResult;
  }
}
