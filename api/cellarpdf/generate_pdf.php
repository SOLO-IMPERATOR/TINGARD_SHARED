<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use Bitrix\Main\Context;
use Bitrix\Main\HttpRequest;
use Bitrix\Main\Web\Json;
use Bitrix\Main\Loader;


header('Content-Type: application/json');

$context = Context::getCurrent();
$rawData = HttpRequest::getInput();
$data = json_decode($rawData, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    echo Json::encode(['status' => 'error', 'message' => 'Неверный JSON-формат запроса']);
    exit;
}

if (!isset($data['htmlpdf'])) {
    echo Json::encode(['status' => 'error', 'message' => 'Отсутствует htmlpdf в запросе']);
    exit;
}
if (!isset($data['userData'])) {
    echo Json::encode(['status' => 'error', 'message' => 'Отсутствует данные пользователя']);
    exit;
}
if (!isset($data['userData']['name']) || empty($data['userData']['name'])) {
    echo Json::encode(['status' => 'error', 'message' => 'Отсутствует имя пользователя']);
    exit;
}
if (!isset($data['userData']['phone']) || empty($data['userData']['phone'])) {
    echo Json::encode(['status' => 'error', 'message' => 'Отсутствует телефон пользователя']);
    exit;
}

if (!isset($data['userData']['email']) || empty($data['userData']['email'])) {
    echo Json::encode(['status' => 'error', 'message' => 'Отсутствует email пользователя']);
    exit;
}


$headStatic = "<!DOCTYPE html> <html> <head> <meta charset='UTF-8'> <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'> <style> svg{ width:20px; height:20px; } @font-face{ font-family: 'OpenSansLight'; src: url('https://tingard.ru/local/components/soloimperator/cellar.configurator/templates/.default/fonts/OpenSans-Light.ttf'); } @font-face{ font-family: 'OpenSansMedium'; src: url('https://tingard.ru/local/components/soloimperator/cellar.configurator/templates/.default/fonts/OpenSans-Medium.ttf'); } body,html{ margin: 0; padding: 0; width: 100%; font-family: 'OpenSansMedium'; zoom:1.2; } *{ box-sizing: border-box; } .pagebreak_before{ page-break-before: always; } .a4_container{ margin-left: auto; margin-right: auto; width:210mm; } .checkbox{ width: 10px; height: 10px; border: 1px solid black; margin-left: auto; margin-right: auto; display: flex; justify-content: center; align-items: center; } .checkbox.check span{ width: 6px; height: 6px; display: block; background: black; } .head{ display: flex; align-items: center; justify-content: space-between; padding-left: 35px; padding-right: 35px; padding-top: 5px; padding-bottom: 5px; } .head img{ width: 190px; } .head_links{ display: flex; flex-direction: column; } .head_links img{ width: 12px; } .head_links > div{ display: flex;align-items: center; gap:6px; } .head_links a{ text-decoration: none; color: black; } .head div{ font-size: 13px; line-height: 150%; } h1{ white-space: nowrap; font-size: 24px; width: 100%; text-align: center; padding-top: 4px; padding-bottom: 7px; background: #e9f6fe; color:#1C418A; font-weight: normal; } h2{ margin: 0; margin-left: 35px; margin-bottom: 6px; margin-top: 7px; } h2 img{ width: 14px; } h2 span{ display: block; margin-top: -21px; margin-left: 11px; font-weight: normal; color: #1C418A; font-size: 23px; } table{ padding-left: 35px; border-collapse: collapse; border-spacing: 0; } .main_info{ display: flex; gap:35px; } .main_info div{ display: flex; flex-direction: column; } .main_info table{ width: 48%; } .main_info div img{ max-width: 100%; margin-top: -25px; max-height: 283px; object-fit:contain; } .main_info div span{ font-family: 'OpenSansLight'; font-weight:500; font-size: 16px; margin-top: 60px; color: #1C418A; } .main_info div b{ margin-top: 30px; color: #1C418A; font-size: 16px; } table .blue{ background: #e9f6fe; color:#1C418A; } table td{ font-family: 'OpenSansLight'; font-weight:500; font-size: 15px; padding-top: 4px; padding-bottom: 4px; padding-left: 5px; height:26px; } .character{ width: 100%; padding: 0; border-spacing: 35px 0px; table-layout: fixed; } .character.lastonpage{ margin-bottom: 25px; } .itog{ margin-left: 35px; color:#1C418A; font-size: 18px; display: block; font-family: 'OpenSansLight'; font-weight:500; } .blue_tr td, .blue_tr th{ background: #e9f6fe; color:#1C418A; } .dop{ width: 100%; padding-right: 35px; } .name{ display: block; } table { page-break-inside: auto; } tr { page-break-inside: avoid; page-break-after: auto; } thead { display: table-header-group; } tfoot { display: table-footer-group; } @page{ size:A4; margin-top:30px; marggin-bottom:30px; } .main_info, .character{ padding-left:35px; } .character, .dop{ width: calc(100% - 70px); margin-left: 35px; } th{ text-align:left; padding-left:5px; padding-top:10px; padding-bottom:10px; padding-right:5px; } th:first-child{ width:185px; } .dop ul{ list-style-type:none; padding:0; } .dop li::before { content: '•'; font-size: 37px; padding-right: 5px; vertical-align: middle; height: 5px; display: inline-block; margin-top: -49px; } .dop .name{ margin-bottom:4px; } .dprice{ white-space:nowrap; } .dop tr td:last-child{ text-align:center; } </style> </head>";
$data['htmlpdf'] = $headStatic . $data['htmlpdf'];
$cleanText = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', '', $data['htmlpdf']);
$cleanText = preg_replace('/\bon\w+\s*=\s*["\'][^"\']*["\']/i', '', $cleanText);
$ch = curl_init('http://localhost:3000/generate-pdf');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: text/html']);
curl_setopt($ch, CURLOPT_POSTFIELDS, $cleanText);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$pdf = curl_exec($ch);
if (curl_errno($ch)) {
    curl_close($ch);
    echo Json::encode(['status' => 'error', 'message' => 'На сервере печати произошла критическая ошибка, повторите попытку позже.']);
    exit;
}
curl_close($ch);
if (strpos($pdf, '%PDF-') !== 0) {
    echo Json::encode(['status' => 'error', 'message' => 'Сервер печати вернул не PDF']);
    exit;
}
Loader::includeModule('iblock');

$rsElement = new CIBlockElement;
$file = CFile::SaveFile(array(
    "name" => "Конфигурация_погреба.pdf",
    "type" => "application/pdf",
    "content" => $pdf
), "iblock");

$arFields = array(
    "IBLOCK_ID" => "70",
    "ACTIVE" => "Y",
    "NAME" => "Заявка от " . date('d.m.Y'),
    "PROPERTY_VALUES" => array(
        422 => $data['userData']['name'],
        420 => $data['userData']['email'],
        421 => $data['userData']['phone'],
        419 => $file,
        423 => $data['trace'],
        424 => $data['metrikaid']
    )
);
if ($id = $rsElement->Add($arFields)) {
    echo Json::encode(['status' => 'success', 'message' => 'Данные успешно обновлены']);
} else {
    echo Json::encode(['status' => 'error', 'message' => $rsElement->LAST_ERROR]);
}
?>