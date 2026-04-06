<?
use Bitrix\Sale;
use Bitrix\Sale\PaySystem\ServiceResult;

if(!definen('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$data = [
    'ACTION_URL' => $params['MYCUSTOMPAY_PAYMENT_URL'],
    'SHOP_ID' => $params['MYCUSTOMPAY_SHOP_ID'],
    'PAYMENT_ID' => $payment->getField("ID"),
    'AMOUNT' => round($payment->getSum(), 2),
    'CURRENCY' => $payment->getField("CURRENCY"),
];
$result = new ServiceResult();
$result->setTemplateFields($data);
return $result;
