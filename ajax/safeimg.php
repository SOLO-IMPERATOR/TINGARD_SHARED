<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
use Bitrix\Main\Diag\Debug;
CModule::IncludeModule("iblock");

move_uploaded_file($_FILES['file']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/upload/insert/'.$_FILES['file']['name']);

$newFileName = $_SERVER['DOCUMENT_ROOT'].'/upload/insert/'.$_FILES['file']['name'];
$ELEMENT_ID = $_POST['elementid'];
$arFile = CFile::MakeFileArray($newFileName);
$res = CIBlockElement::SetPropertyValueCode($ELEMENT_ID, "MORE_PHOTE", $arFile);

// CIBlockElement::SetPropertyValuesEx($Element_ID, $IBlock_ID, $PropFileArr);

Debug::writeToFile($res, 'res','/upload/log_img_file.txt');
Debug::writeToFile($arFile, 'res','/upload/log_img_file.txt');
Debug::writeToFile($ELEMENT_ID, 'res','/upload/log_img_file.txt');