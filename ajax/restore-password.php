<?php
define('STOP_STATISTICS', true);
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
$GLOBALS['APPLICATION']->RestartBuffer();
global $USER;

$request = \Bitrix\Main\Context::getCurrent()->getRequest();
$post = $request->getPostList()->toArray();

$resultAjax = [];
// поиск пользователя
$user = $USER::GetList(
  $by="ID",
  $order="desc",
  array('EMAIL' => $post['USER_EMAIL']),
  array('SELECT' => array('ID'))
)->fetch();

if( $user['ID'] > 0 ){
  $arResult = $USER->SendPassword($USER->GetLogin(), $USER->GetParam("EMAIL"), SITE_ID);
  if($arResult["TYPE"] == "OK"){
    $resultAjax['reset'] = [
      'result' => 'successful'
    ];
  }else{
    $resultAjax['reset'] = [
      'result' => 'error'
    ];
  }
}
echo json_encode($resultAjax);