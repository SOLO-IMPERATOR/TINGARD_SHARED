<?php
define('STOP_STATISTICS', true);
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
$GLOBALS['APPLICATION']->RestartBuffer();
require_once (__DIR__ . '/settings/settings_b24.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/local/ajax/crest.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/local/ajax/lib/downloadFile.php');

function callM($array, $name){
  $result = CRest::call(
    $name, $array
  );
  return $result;
}
//print_r($_FILES);
$userGroups = \Bitrix\Main\Engine\CurrentUser::get()->getUserGroups();
// обработка файлов для загрузки
$Files = new DownloadFiles( $_FILES['inputFiles'] );
$arFiles = $Files->getURLsFiles();
// если есть файлы то отправляем сообщение
if ( $arFiles && $_REQUEST['comment'] != '' ) {
  $arSendFiles = [];

  foreach ( $arFiles as $file ){
    $arSendFiles[] = [
      $file['name'],
      $Files->getfileContent($file['url'])
    ];
  }
  $ENTITY_TYPE = "company";
  if(in_array(21, $userGroups)) $ENTITY_TYPE = "contact";
  $Fields = [
    "fields" => [
      "ENTITY_TYPE" => $ENTITY_TYPE,
      "AUTHOR_ID"   => ASSIGNED_BY_ID,
      "COMMENT"     => $_REQUEST['comment'],
      "ENTITY_ID"    => (int)$_REQUEST['idcontact'],
      "SETTINGS" => ['HAS_FILES' => 'Y'],
      "FILES" => $arSendFiles
    ]
  ];
//  print_r($Fields);
 $requestResult = callM($Fields, 'crm.timeline.comment.add');
  Bitrix\Main\Diag\Debug::writeToFile($Fields, 'rest отправка файлов: '.date('d.m.Y'), '/upload/log_sendFileRequest.txt');
  Bitrix\Main\Diag\Debug::writeToFile($requestResult, 'rest результат: '.date('d.m.Y'), '/upload/log_sendFileRequest.txt');
  echo json_encode( $requestResult );
} else {
  echo json_encode( ["result"=>'error', 'texterror'=>'Ошибка загрузки файла или пустой текст комментария!'] );
}