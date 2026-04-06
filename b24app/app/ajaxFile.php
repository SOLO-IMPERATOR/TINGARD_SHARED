<?php
require_once('function.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/local/ajax/lib/downloadFile.php');
session_start();
$chatID = 'chat' . \Bitrix\Main\Engine\CurrentUser::get()->getId();  // . md5($_SERVER['HTTP_ORIGIN']) . md5(session_id());
$type = $_POST['type'];
$connector_id = getConnectorID();
$line_id = getLine();

/*
	simple example save chat, must lost any data
	recommend using database
*/

$files = [];
$arSendFiles = [];
if( !empty($_FILES['inputFiles']) ){
  // обработка файлов для загрузки
  $Files = new DownloadFiles( $_FILES['inputFiles'] );
  $arFiles = $Files->getURLsFiles();

  foreach ( $arFiles as $file ){
    $arSendFiles[] = [
      'url' => 'https://' . $_SERVER['SERVER_NAME'] . '/upload/' . $file['name']
    ];
  }
}
$arMessage = [
  'user' => [
    'id' => $chatID,
    'name' => getUserSend()['WORK_COMPANY'],
  ],
  'message' => [
    'id' => false,
    'date' => time(),
    'text' => htmlspecialchars($_POST['message']),
    'files' => $arSendFiles
  ],
  'chat' => [
    'id' => $chatID,
    'url' => htmlspecialchars($_SERVER['HTTP_REFERER']),
  ],
];
$id = saveMessage($chatID, $arMessage);
$result['error'] = 'error_save';
if ($id !== false){
  $arMessage['message']['id'] = $id;
  $result['b24'] = CRestOL::call(
    'imconnector.send.messages',
    [
      'CONNECTOR' => $connector_id,
      'LINE' => $line_id,
      'MESSAGES' => [$arMessage],
    ]
  );
  $result['params'] = [
    'CONNECTOR' => $connector_id,
    'LINE' => $line_id,
    'MESSAGES' => [$arMessage],
  ];
  $result['dateDay'] = date('m.d.Y');
}
echo json_encode(
  [
    'chat' => $chatID,
    'post' => $_POST,
    'result' => $result
  ]
);