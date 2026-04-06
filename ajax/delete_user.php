<?php
define('STOP_STATISTICS', true);
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
$GLOBALS['APPLICATION']->RestartBuffer();
echo 'Удаление сотрудника';
print_r($_POST);

// массив прикрепленных сотрудников
$by = "ID";
$order = "desc";
$arFilter = array(
  "ACTIVE" => "Y",
  'ID' => \Bitrix\Main\Engine\CurrentUser::get()->getId()
  // Дополнительные фильтры, если необходимо
);
$arParameters = array(
  "SELECT" => array("UF_USERS_DEALER", "WORK_COMPANY"), // Укажите код множественного поля
);
$rsUsers = CUser::GetList($by, $order, $arFilter, $arParameters);
$arDealer = $rsUsers->Fetch();
print_r($arDealer);

global $USER;
$userIdToDelete = $_POST['idUser'];
$result = CUser::Delete( $userIdToDelete );

unset($arDealer['UF_USERS_DEALER'][array_search($_POST['idUser'],$arDealer['UF_USERS_DEALER'])]);

print_r($arDealer['UF_USERS_DEALER']);
$userID = \Bitrix\Main\Engine\CurrentUser::get()->getId();
$arFields = array(
  "UF_USERS_DEALER" => $arDealer['UF_USERS_DEALER'],
);
$user = new CUser;
$user->Update($userID, $arFields);