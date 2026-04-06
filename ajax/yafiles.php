<?php
define('STOP_STATISTICS', true);
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
$GLOBALS['APPLICATION']->RestartBuffer();
$url = str_replace('disk:/', '', $_REQUEST['data']);
$explode = explode( '/', $url);
$parentPath = null;
if(count($explode) > 1) {
  array_pop($explode);
  $parentPath = implode('/', $explode);
}
//print_r($_POST);
$APPLICATION->IncludeComponent(
  "mw:files.ya",
  "",
  Array(
    "TITLE" => $_POST['titleBox'],
    "URL_YA" => $url,
    "PARENT_PATH" => $parentPath,
    "ROOT_PATH" => $_POST['rootDir'],
    "AJAX" => "Y"
  )
);

