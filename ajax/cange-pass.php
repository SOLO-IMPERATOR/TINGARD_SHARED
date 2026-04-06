<?php
define('STOP_STATISTICS', true);
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
$GLOBALS['APPLICATION']->RestartBuffer();
global $USER;
$arResultRequest = [];

if ($USER->IsAuthorized() && acceessLK() ){
  $result = $USER->Update(\Bitrix\Main\Engine\CurrentUser::get()->getId(),array("PASSWORD"=>$_POST['password']));
  if($result == 1 ){
    $arResultRequest['result'] = [
      'user_id' => \Bitrix\Main\Engine\CurrentUser::get()->getId(),
      'desc' => 'Пароль изменен',
      'status' => $result
    ];
  }else {
    $arResultRequest['result'] = [
      'user_id' => \Bitrix\Main\Engine\CurrentUser::get()->getId(),
      'desc' => 'Ошибка при смене пароля',
      'status' => false
    ];
  }

}else {
  $arResultRequest['result'] = [
    'status' => false,
    'desc' => 'Нет доступа.'
  ];
}

echo json_encode($arResultRequest);