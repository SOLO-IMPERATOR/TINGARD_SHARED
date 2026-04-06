<?php 
/* 
* Comment Text 
*/
class create_account extends CBitrixComponent {
  public function onPrepareComponentParams($arParams){
      $result = array(
"CACHE_TYPE"    => $arParams["CACHE_TYPE"]
);
      return $result;
  }
  function executeComponent(){
      $this->IncludeComponentTemplate();
        return $this->arResult;
  }
}
