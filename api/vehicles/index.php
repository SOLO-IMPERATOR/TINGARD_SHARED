<?
header("Access-Control-Allow-Origin: *"); // Разрешить всем доменам
header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); // Разрешенные методы
header("Access-Control-Allow-Headers: Content-Type"); // Разрешенные заголовки

use Bitrix\Main\Loader;
use Bitrix\Main\Context;
use Bitrix\Main\Web\Json;
use Bitrix\Highloadblock\HighloadBlockTable;
use Bitrix\Main\Data\Cache;

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

const IBLOCK_ID = 11;
const VEHICLE_HL_ID = 31;
const VEHICLE_COLOR_HL_ID = 33;
const VEHICLE_OPTION_HL_ID = 34;
const VEHICLE_PACKET_HL_ID = 35;
const CACHE_TIME = 3600*24*10; // 10 дней
const CACHE_ID = "vehicle_full_info";
const CACHE_DIR = "/vehicle/full/";


function getModels($vehicleId){
    $arModels = [];
    $hl = HighloadBlockTable::getById(VEHICLE_HL_ID)->fetch();
    $entity = HighloadBlockTable::compileEntity($hl);
    $dataClass = $entity->getDataClass();
    $rsData = $dataClass::getList([
        "select" => ["*"],
        "filter" => ["UF_VEHICLE" =>$vehicleId, "UF_MODEL_ACTIVE" => 1],
    ]);
    while($row = $rsData->fetch()){
        $row['UF_VEHICLE_MODEL_PREVIEW_IMAGE'] = "https://tinger.ru".CFile::GetPath($row['UF_VEHICLE_MODEL_PREVIEW_IMAGE']);
        $row['options'] = getOptions($row['ID']);
        $row['colors'] = getColors($row['ID']);
        $row['packets'] = getPakets($row['ID']);
        $arModels[] = $row;
    }

    return $arModels;
}

function getPakets($modelId){
    $arPackets = [];
    $hl = HighloadBlockTable::getById(VEHICLE_PACKET_HL_ID)->fetch();
    $entity =  HighloadBlockTable::compileEntity($hl);
    $dataClass = $entity->getDataClass();
    $rsData = $dataClass::getList([
        "select" => ["*"],
        "filter" => ["UF_VEHICLE_OPTION_PACKET_MODAL" =>$modelId]
    ]);
    while($row = $rsData->fetch()){
        $arPackets[] = $row;
    }
    return $arPackets;
}

function getOptions($modelId){
    $arOptions = [];
    $hl = HighloadBlockTable::getById(VEHICLE_OPTION_HL_ID)->fetch();
    $entity =  HighloadBlockTable::compileEntity($hl);
    $dataClass = $entity->getDataClass();
    $rsData = $dataClass::getList([
        "select" => ["*"],
        "filter" => ["UF_VEHICLE_MODEL_SELECT_O" =>$modelId]
    ]);
    while($row = $rsData->fetch()){
        $row['UF_VEHICLE_OPTION_IMG'] = "https://tinger.ru".CFile::GetPath($row['UF_VEHICLE_OPTION_IMG']);
        $row['UF_VEHICLE_OPTION_IMG_BACK'] = "https://tinger.ru".CFile::GetPath($row['UF_VEHICLE_OPTION_IMG_BACK']);
        $row['UF_VEHICLE_OPTION_IMG_FRONT'] = "https://tinger.ru".CFile::GetPath($row['UF_VEHICLE_OPTION_IMG_FRONT']);
        $arOptions[] = $row;
    }
    return $arOptions;
}


function getColors($modelId){
    $arColors = [];
    $hl = HighloadBlockTable::getById(VEHICLE_COLOR_HL_ID)->fetch();
    $entity =  HighloadBlockTable::compileEntity($hl);
    $dataClass = $entity->getDataClass();
    $rsData = $dataClass::getList([
        "select" => ["*"],
        "filter" => ["UF_VEHICLE_MODEL_SELECT" =>$modelId]
    ]);
    while($row = $rsData->fetch()){
        $row['UF_VEHICLE_COLOR_BACK'] = "https://tinger.ru".CFile::GetPath($row['UF_VEHICLE_COLOR_BACK']);
        $row['UF_VEHICLE_COLOR_FRONT'] = "https://tinger.ru".CFile::GetPath($row['UF_VEHICLE_COLOR_FRONT']);
        $row['UF_VEHICLE_COLOR_KUNG_BACK'] = "https://tinger.ru".CFile::GetPath($row['UF_VEHICLE_COLOR_KUNG_BACK']);
        $row['UF_VEHICLE_COLOR_KUNG_FRONT'] = "https://tinger.ru".CFile::GetPath($row['UF_VEHICLE_COLOR_KUNG_FRONT']);
        $arColors[] = $row;
    }
    return $arColors;
}

if(Loader::includeModule('iblock') && Loader::includeModule('highloadblock')){

    $cache = Cache::createInstance();
    $taggedCache = Bitrix\Main\Application::getInstance()->getTaggedCache();
    $arFullResult = [];
    if($cache->initCache(CACHE_TIME,CACHE_ID,CACHE_DIR) && $cache->getVars() != "null"){

        $arFullResult = $cache->getVars();
    }else if($cache->startDataCache()){
        $taggedCache->startTagCache(CACHE_DIR);
        $taggedCache->registerTag('iblock_id_' . IBLOCK_ID);
        $taggedCache->registerTag('hlblock_id_' . VEHICLE_HL_ID);
        $taggedCache->registerTag('hlblock_id_' . VEHICLE_COLOR_HL_ID);
        $taggedCache->registerTag('hlblock_id_' . VEHICLE_OPTION_HL_ID);
        $taggedCache->registerTag('hlblock_id_' . VEHICLE_PACKET_HL_ID);
        $resDb = CIBlockElement::getList(
            ["SORT" => "ASC"],
            ["IBLOCK_ID" => IBLOCK_ID, "ACTIVE" => "Y"],
            false,
            false,
            ["ID", "NAME", "PROPERTY_C_MODS_IMG", 'PROPERTY_C_PRICE','PREVIEW_PICTURE', 'CODE', "PROPERTY_IMG_BG"]
        );
        while($row = $resDb->fetch()){

            if(empty($row["PROPERTY_C_MODS_IMG_VALUE"]) || in_array($row["ID"],$arFullResult)) continue;
            $row["PROPERTY_C_MODS_IMG"] = "https://tinger.ru".CFile::GetPath($row["PROPERTY_C_MODS_IMG_VALUE"]);
            $row["PROPERTY_IMG_BG"] = "https://tinger.ru".CFile::GetPath($row["PROPERTY_IMG_BG_VALUE"]);
            $row['PREVIEW_PICTURE'] = "https://tinger.ru".CFile::GetPath($row['PREVIEW_PICTURE']);
            unset($row["PROPERTY_C_MODS_IMG_VALUE"]);
            unset($row["PROPERTY_C_MODS_IMG_VALUE_ID"]);
            $row["models"] = getModels($row["ID"]);
            $arFullResult[$row["ID"]] = $row;
        }
        $taggedCache->endTagCache();
        $cache->endDataCache($arFullResult);
    }
	header("Content-type: application/json");
    echo Json::encode($arFullResult);
}else{
header("Content-type: application/json");
    echo Json::encode('Ошибка, не удалось подключить модули');
}