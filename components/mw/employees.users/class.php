<?php 
/* 
* Comment Text 
*/
class employees_users extends CBitrixComponent {
  public function onPrepareComponentParams($arParams){
      $result = array(
"CACHE_TYPE"    => $arParams["CACHE_TYPE"]
);
      return $result;
  }
  private function getManagers()
  {
      $dealer = \Bitrix\Main\UserTable::getList(array(
          'filter' => array(
              '=ID' => \Bitrix\Main\Engine\CurrentUser::get()->getId(),
          ),
          'limit'=>1,
          'select'=>array('ID','UF_USERS_DEALER'),

      ))->fetch();

      $result = \Bitrix\Main\UserTable::getList(array(
          'select'  => ['ID', 'EMAIL', 'NAME', 'WORK_POSITION', 'WORK_PHONE', 'WORK_PAGER', 'WORK_DEPARTMENT'],
          'filter'  => [ 'ID'=> $dealer['UF_USERS_DEALER'] ]
      ));
      $arUsersDiler = [];
      while ($arUser = $result->fetch()) {
          $arUsersDiler[] =$arUser;
      }
      return $arUsersDiler;
  }
  function executeComponent(){
      $this->arResult['managers'] = $this->getManagers();
      $this->IncludeComponentTemplate();
      return $this->arResult;
  }
}
