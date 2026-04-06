<?php 
/* 
* Comment Text 
*/
class restore_password extends CBitrixComponent {
  public function onPrepareComponentParams($arParams){
      $result = array(
      "CACHE_TYPE"    => $arParams["CACHE_TYPE"]
      );
      return $result;
  }

  private function sendFogotPassword(){
    global $USER;
    $arResult = $USER->SendPassword($USER->GetLogin(), $USER->GetParam("EMAIL"));
    if($arResult["TYPE"] == "OK") echo "Контрольная строка для смены пароля выслана.";
    else echo "Введенные логин (email) не найдены.";
}
 function executeComponent(){
    $request = \Bitrix\Main\Context::getCurrent()->getRequest();
    $post = $request->getPostList()->toArray();
    $this->IncludeComponentTemplate();
      return $this->arResult;
  }
}
