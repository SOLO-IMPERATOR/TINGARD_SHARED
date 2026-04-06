<?
define('STOP_STATISTICS', true);
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');




session_start();
// подключаем модуль
\Bitrix\Main\Loader::includeModule('mw.checklist');
\Bitrix\Main\Loader::includeModule('iblock');
\Bitrix\Main\Loader::IncludeModule("highloadblock");

use Mw\Checklist\Checkhelp;
use Mw\Checklist\GooglesSheetCheck;
use Mw\Checklist\Matching;
use Bitrix\Main\Diag\Debug;
use Bitrix\Highloadblock as HL,
    Bitrix\Main\Entity;


function getCheckPoints( $stage ){
    $hlblock = HL\HighloadBlockTable::getById(19)->fetch();

    $entity = HL\HighloadBlockTable::compileEntity($hlblock);
    $entity_data_class = $entity->getDataClass();

    $rsData = $entity_data_class::getList(array(
        "select" => array("*"),
        "filter" => array("UF_ID_POINT"=>$stage, "UF_RESULT"=>"Y") //Фильтрация выборки
    ));
    $arResultPoints = [];
    while($arData = $rsData->Fetch()){
        $arResultPoints[] = $arData;
    }
    return $arResultPoints;
}

function getCheckPoint( $stage ){
    $hlblock = HL\HighloadBlockTable::getById(20)->fetch();

    $entity = HL\HighloadBlockTable::compileEntity($hlblock);
    $entity_data_class = $entity->getDataClass();

    $rsData = $entity_data_class::getList(array(
        "select" => array("*"),
        "filter" => array("UF_ID_POINT" => $stage) //, "UF_CHECK"=>"Y") //Фильтрация выборки
    ));
    $arResultPoints = [];
    while($arData = $rsData->Fetch()){
        $arResultPoints = $arData;
    }
    return $arResultPoints;
}


$order    = $_GET['order'];
$stage    = $_GET['stage'];
$id       = $_GET['id'];
$action   = $_GET['action'];
$group    = $_GET['group'];
$question = $_GET['question'];
$verticalpos = $_GET['vpos'];


$arAjaxResult = ['result'=>'ok', 'action'=>'up', 'order'=>$order];
// нужно получить координаты ячейки онив HL таблице
$nameCol = Matching::getArIndex();

$numberLine = Matching::getNumberLine($order);

$coordinate = $nameCol[$stage].$numberLine['UF_INDEX_TABLE']; 
$arAjaxResult['coorY'] = $numberLine;
$arAjaxResult['coorX'] = $nameCol;
$arAjaxResult['coor']  = $coordinate;
$arAjaxResult['match'] = $numberLine;
$arAjaxResult['group'] = $group;
$paramsHook = [
          'coordinate'=> $coordinate,
     ];

// чекаем этап
if($action == 'up')
{
     Checkhelp::upCheck($id, $order, $stage);
     // Checkhelp::insertAutor($question, $USER->GetID());
     // $arAjaxResult = ['result'=>'ok', 'action'=>'up', 'order'=> $order];
     if($group == 'otk'){
          $paramsHook['color'] = '00CC00';
     }else {
          $paramsHook['color'] = 'FFCC00';
     }
     GooglesSheetCheck::webHook($paramsHook);
}

if($action == 'delete')
{   
     Checkhelp::deleteCheck($id, $order);
     if($group == 'otk'){
          $el = new CIBlockElement;
          $arLoadProductArray = Array(
               "MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
               "IBLOCK_SECTION_ID" => false,          // элемент лежит в корне раздела
               "IBLOCK_ID"      => 60,
               "NAME"           => "ОТК отменен подэтап по ордеру #".$order,
               "ACTIVE"         => "Y",            // активен
               "PREVIEW_TEXT"   => "ОТК Отменен подэтап по ордеру #" .$order. " \n Этап №".$stage. " \n id подэтапа-".$id." \n комментарий: ".$_GET['comment'],
               // "DETAIL_TEXT"    => "Комментарий"
          );
          if($PRODUCT_ID = $el->Add($arLoadProductArray)) $arAjaxResult['log'] = ['ID' => $PRODUCT_ID, 'action'=>'addLog'] ;
     }else {
          // $arAjaxResult = ['result'=>'ok', 'action'=>'delete', 'order'=> $order];
          $el = new CIBlockElement;
          $arLoadProductArray = Array(
               "MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
               "IBLOCK_SECTION_ID" => false,          // элемент лежит в корне раздела
               "IBLOCK_ID"      => 60,
               "NAME"           => "Отменен подэтап по ордеру #".$order,
               "ACTIVE"         => "Y",            // активен
               "PREVIEW_TEXT"   => "Отменен подэтап по ордеру #" .$order. " Этап №".$stage. " id подэтапа-".$id,
               // "DETAIL_TEXT"    => "Комментарий"
          );
          if($PRODUCT_ID = $el->Add($arLoadProductArray)) $arAjaxResult['log'] = ['ID' => $PRODUCT_ID, 'action'=>'addLog'] ;
     }
     GooglesSheetCheck::changeCellColor($stage,$verticalpos,'ff0000');
}

// пункт
$currPoint = getCheckPoint( $stage );
// после отметки надо проверить состояние этапа, сколько отмеченных пунтов
    $arCheck = getCheckPoints($stage);
    $countCheck = count($arCheck);
// выбрать все пункты с этим этапом
    $arFilter = array("IBLOCK_ID" => 59, "SECTION_ID" => $stage );
    $res = CIBlockElement::GetList(Array(), $arFilter, false, false, array( 'ID', 'NAME' ));
    $arCheckPoints = [];
    while( $ob = $res->Fetch() ){
        $arCheckPoints[] = $ob;
    }
    $countChecpoint = 0;
    if( !empty($arCheckPoints) ) {
        $countChecpoint = count($arCheckPoints);
    }
//сравнить количество и если оно полное то отметить этап
    if( $countCheck == $countChecpoint ){
        $hlblock = HL\HighloadBlockTable::getById(20)->fetch();
        $entity = HL\HighloadBlockTable::compileEntity($hlblock);
        $entity_data_class = $entity->getDataClass();

        // Массив обновляемых полей
        $data = array(
            "UF_CHECK"=>'Y'
        );

        $result = $entity_data_class::update($currPoint['ID'], $data);
    }
    if( $countCheck != $countChecpoint && !empty($currPoint) ){
        $hlblock = HL\HighloadBlockTable::getById(20)->fetch();
        $entity = HL\HighloadBlockTable::compileEntity($hlblock);
        $entity_data_class = $entity->getDataClass();

        // Массив обновляемых полей
        $data = array(
            "UF_CHECK"=>'N'
        );

        $result = $entity_data_class::update($currPoint['ID'], $data);
    }
$arAjaxResult['params'] = $paramsHook;
    $ar = [$countCheck, $countChecpoint];
echo json_encode($ar);