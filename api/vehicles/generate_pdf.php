<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

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
if (!isset($data['action'])) {
    echo Json::encode(['status' => 'error', 'message' => 'Отсутствует action в запросе']);
    exit;
}

if (!isset($data['htmlpdf'])) {
    echo Json::encode(['status' => 'error', 'message' => 'Отсутствует htmlpdf в запросе']);
    exit;
}

$headStatic = '<!DOCTYPE html><html lang="en"><head>    <meta charset="UTF-8" />    <style>        :root {            --bgcolor-gray: #EBECEC;            --h2-color: #028542;            --text-green-color: #028542;            --standart-text-color: #434344;        }        @font-face {            font-family: "Roboto";            src: url("https://tingard.ru/upload/main/Roboto.ttf");        }            @font-face{            font-family: "Micrac";            src: url("https://tingard.ru/upload/vehicleconf/Micrac.OTF");        }        @font-face {            font-family: "Montserat";            src: url("https://tingard.ru/upload/vehicleconf/Montserrat-Medium.ttf");        }        @font-face {            font-family: "OpenSansLight";            src: url("https://tingard.ru/local/components/soloimperator/cellar.configurator/templates/.default/fonts/OpenSans-Light.ttf");        }        @font-face {            font-family: "OpenSansMedium";            src: url("https://tingard.ru/local/components/soloimperator/cellar.configurator/templates/.default/fonts/OpenSans-Medium.ttf");        }        @page {            size: A4;            margin: 0;            margin-top: 10mm;            padding: 0;        }        b {            font-family: "OpenSansMedium";        }        body {            width: 210mm;            height: 297mm;            margin: 0;            padding: 10mm;            padding-top:0;            box-sizing: border-box;            font-family: "OpenSansLight";            background: white;            color: var(--standart-text-color);        }        .break-before {            page-break-before: always;        }        img {            max-width: 100%;        }        .doc-header {            display: flex;            justify-content: space-between;        }        .doc-header-logo {            width: 25%;            object-fit: contain;        }        .doc-header-company {            width: 50%;            padding-left: 20px;            font-size: 15px;        }        .doc-header-company a {            color: var(--standart-text-color);        }        .doc-header-contact {            display: flex;            flex-direction: column;        }        .doc-header-contact a {            text-decoration: none;            color: var(--standart-text-color);            font-size: 15px;        }        .doc-line {            height: 40px;            background: var(--h2-color);            width: 210mm;            position: relative;            left: -10mm;            margin-top: 40px;        }        .doc-line-title {            color: white;            font-size: 30px;            max-width: 82%;            width: 100%;            display: flex;            justify-content: center;            align-items: center;            left: 70px;            text-transform: uppercase;            position: relative;            top: -20px;            font-weight: 300;            letter-spacing: 1.2px;            padding-bottom: 2px;            padding-top: 2px;            z-index: 2;        }        .doc-line-title::before {            content: "";            position: absolute;            left: 0;            top: 0;            width: 100%;            height: 100%;            background: #42454A;            z-index: -1;            transform: skew(-25deg);        }        .doc-machine-data {            display: flex;            gap: 30px;            padding-top: 30px;        }        h1{         font-family:"Micrac";        }        h2,        thead tr td {            margin: 0;            padding: 0;            color: #028542;            text-transform: uppercase;            font-weight: 400;            width: 100%;            text-align: center;            font-size: 22px;            padding-bottom: 10px;            font-family:"Micrac";        }        .grayLine td {            background: var(--bgcolor-gray);        }        table {            border-spacing: 0;            width: 100%;            border-collapse: collapse;        }                 .doc-machine-data-image-shini table {            margin-bottom: 30px;        }        .doc-machine-data-image-color span {            color: #028542;            font-size: 18px;            line-height: 37px;        }        .list-color {            display: flex;            gap: 10px;            align-items: center;        }        .list-color span {            height: 28px;            width: 28px;            border-radius: 100%;            display: block;        }        .list-color span.selected {            border: 3px solid black;        }        .primechanie {            color: #028542;            font-size: 12px;        }        .doc-machine-data-char table {            margin-bottom: 20px;        }        .doc-machine-data-image {            max-width: 44%;            padding-top: 20px;            position:relative;            width:100%;        }        .page-break {            page-break-before: always;        }        .doc-header-contact a img {            max-width: 12px;        }        table td {            font-size: 15px;        }        .doc-machine-data-char table tr td:first-child {            width: 41%;        }        .doc-machine-data-char table tr td {            padding-left: 5px;        }        .doc-machine-data-char table tr td {            padding-top: 4px;            padding-bottom: 4px;        }        .doc-machine-data-image-shini table tr td {            padding-left: 8px;            width: 88%;        }        .doc-priem td {   padding-left:7px;         padding-top: 7px;            padding-bottom: 7px;        }        .dop-table tr td:first-child {            width: 160px;        }        .dop-table tr td:nth-child(2) {            padding-left: 10px;            width: 56%;        }        .dop-table tr td:nth-child(3) {            font-family: "OpenSansMedium";            color: var(--h2-color);            white-space: nowrap;            font-size: 20px;            text-align: center;        }        .dop-table tr td:nth-child(4) {            text-align: center;            width: 50px;        }        td img {            display: block;        }        td {            padding: 0;            border: 0;        }        .dop-table {            margin-bottom: 20px;        }        .base-price {            color: var(--h2-color);            font-size: 20px;        }        .doc-footer-garanty {            color: var(--h2-color);            display: block;            margin-top: 20px;        }        hr {            width: 100%;            height: 4px;            border: none;            background: var(--h2-color);            margin-top: 20px;            margin-bottom: 20px;        }        .doc-footer-bottom {            display: flex;            justify-content: space-between;            padding-bottom: 20px;        }        .doc-footer-bottom>span {            width: 63%;            line-height: 25px;        }            .pseudochekbox {      display: flex;      justify-content: center;      align-items: center;      width: 10px;      height: 10px;      background: transparent;      border: 1px solid black;      padding: 2px    }    input[type="checkbox"] {      display: none;    }    input:checked+.pseudochekbox::before {      content: "";      width: 8px;      height: 8px;      background: black;      display: block;    }    .conf_images{        position:relative;        margin-bottom:256px;    }            </style></head>';
$data['htmlpdf'] = $headStatic . $data['htmlpdf'];
$cleanText = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', '', $data['htmlpdf']);
$cleanText = preg_replace('/\bon\w+\s*=\s*["\'][^"\']*["\']/i', '', $cleanText);
file_put_contents(__DIR__ . "/pdf.html", $cleanText, true);

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

if ($data['action'] == "get") {
    echo Json::encode(['status' => 'success', 'message' => base64_encode($pdf)]);
    exit;
}
if ($data['action'] == "send") {
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
    Loader::includeModule('iblock');
    $rsElement = new CIBlockElement;

    $fileNewName = str_replace(' ', '', $data['modelName']) . '_' . date('d.m.Y') . '_' . date("H-m");
    $file = CFile::SaveFile(array(
        "name" => $fileNewName . ".pdf",
        "type" => "application/pdf",
        "content" => $pdf
    ), "iblock");
    $arFields = array(
        "IBLOCK_ID" => "72",
        "ACTIVE" => "Y",
        "NAME" => "Заявка от " . date('d.m.Y'),
        "PROPERTY_VALUES" => array(
            429 => $data['userData']['name'],
            430 => $data['userData']['email'],
            431 => $data['userData']['phone'],
            428 => $file,
            433 => $data['trace'],
            432 => $data['metrikaid']
        )
    );
    if ($id = $rsElement->Add($arFields)) {
        echo Json::encode(['status' => 'success', 'message' => 'Данные успешно обновлены']);
    } else {
        echo Json::encode(['status' => 'error', 'message' => $rsElement->LAST_ERROR]);
    }
}
?>