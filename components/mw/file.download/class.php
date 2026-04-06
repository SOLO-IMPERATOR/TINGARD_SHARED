<?php 
/* 
* Comment Text 
*/
class file_download extends CBitrixComponent {
  public function onPrepareComponentParams($arParams){
      $result = array(
      "CACHE_TYPE"    => $arParams["CACHE_TYPE"]
      );
      return $result;
  }

  private  function getDealerParams()
  {

  }

  private function isDealer(){
    $groupsUsers = \Bitrix\Main\Engine\CurrentUser::get()->getUserGroups();
    $isDealer = false;
    if( in_array($this->arParams["DEALER_GROUP_ID"], $groupsUsers)) $isDealer = true;
    return $isDealer;
  }

  private function getInfo()
  {
    $dbUser = \Bitrix\Main\UserTable::getList(array(
      'select' => ['ID', 'NAME'],
      'filter' => [
        'ID' => \Bitrix\Main\Engine\CurrentUser::get()->getId()
      ]
    ));
    global $USER;
    $arUser = CUser::GetByID($USER->GetID())->Fetch();
    return $arUser;
  }

  function executeComponent(){
    $this->arResult['DEALER'] = $this->getInfo();
    $this->IncludeComponentTemplate();
    return $this->arResult;
  }
}
