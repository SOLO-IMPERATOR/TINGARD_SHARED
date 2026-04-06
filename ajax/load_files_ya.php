<?php
define('STOP_STATISTICS', true);
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
$GLOBALS['APPLICATION']->RestartBuffer();
\Bitrix\Main\Loader::IncludeModule("mw.lk");
use mw\lk\yadisk;
$ya = new yadisk();
$token = $ya->getToken();

// Файл на Диске.
$yd_file = $_POST['downloadPath'];

// Директория, куда будет сохранен файл.
$path = __DIR__ . '/upload'.$yd_file;
$nameFile = basename($yd_file);
$ch = curl_init('https://cloud-api.yandex.net/v1/disk/resources/download?path=' . urlencode($yd_file));
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', $token));
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, false);
$res = curl_exec($ch);
curl_close($ch);

$res = json_decode($res, true);
//print_f($res);
$fil = file_get_contents($res['href']);
$tempFileDownload = '/var/www/bitrix/data/www/shared/upload/ya/'.$nameFile;
file_put_contents($tempFileDownload, $fil);