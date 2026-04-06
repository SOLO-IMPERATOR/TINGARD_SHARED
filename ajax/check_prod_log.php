<?
define('STOP_STATISTICS', true);
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
session_start();

\Bitrix\Main\Loader::includeModule('iblock');

$el = new CIBlockElement;
$arLoadProductArray = Array(
	"MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
	"IBLOCK_SECTION_ID" => false,          // элемент лежит в корне раздела
	"IBLOCK_ID"      => 17,
	"NAME"           => "Отметка подэтапа",
	"ACTIVE"         => "Y",            // активен
	"PREVIEW_TEXT"   => "",
	"DETAIL_TEXT"    => "Комментарий"
);
if($PRODUCT_ID = $el->Add($arLoadProductArray)) echo json_encode(['result' => 'ok']);