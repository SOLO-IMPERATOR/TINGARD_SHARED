<?php
define('STOP_STATISTICS', true);
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
$GLOBALS['APPLICATION']->RestartBuffer();

$userIdToUpdate = $_POST['idUser']; // замените на ID изменяемого пользователя
$fields = array(
    "EMAIL"             => $_POST['email'],
    "WORK_PHONE"        => $_POST['tel'],
    "WORK_POSITION"     => $_POST['post'],
  "WORK_PAGER"        => $_POST['tel-add'],
    //"PASSWORD"          => $_POST['password']
);

$currentUser = new CUser;
$result = $currentUser->Update($userIdToUpdate, $fields);
if ($result) {
    echo "Данные пользователя успешно изменены";
} else {
    echo "Ошибка при изменении данных пользователя: " . $currentUser->LAST_ERROR;
}
