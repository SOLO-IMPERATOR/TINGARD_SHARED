<?

use Bitrix\Main\Loader;
use Bitrix\Main\Context;
use Bitrix\Main\Web\Json;
use Bitrix\Highloadblock\HighloadBlockTable;
use Bitrix\Main\Data\Cache;

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
  const CELLAR_OTPION_HLID = 29;
  const CELLAR_SIZE_HLID = 30;
  const CELLAR_IBID = 69;
  const CACHE_TIME = 3600*24*10; // 10 дней
  const CACHE_ID = "cellar_full_info";
  const CACHE_DIR = "/cellar/full/";
  $request = Context::getCurrent()->getRequest();
  $method = $request->getRequestMethod();
  $uri = $request->getRequestedPage();
  $uripath = $request->getRequestedPageDirectory();

  $path = trim($request->getRequestUri(), "/");
  $path = preg_replace('/\?.*/', '', $path);
  $segmetns = explode("/",$path);

  try{
    if($segmetns[3] === 'series' && is_numeric($segmetns[4]) && $segmetns[5] == "options"){
        getCellarOptionBySeries($segmetns[4]);
    }else if($segmetns[3] === 'series' && $segmetns[4] == "full"){
        $cache = Cache::createInstance();
        $taggedCache = Bitrix\Main\Application::getInstance()->getTaggedCache();
        $arFullResult = null;
        if($cache->initCache(CACHE_TIME,CACHE_ID,CACHE_DIR) && $cache->getVars() != "null"){
            $arFullResult = $cache->getVars();
        }else if($cache->startDataCache()){
            $taggedCache->startTagCache(CACHE_DIR);

            $taggedCache->registerTag('iblock_id_' . CELLAR_IBID);
            $taggedCache->registerTag('hlblock_id_' . CELLAR_OTPION_HLID);
            $taggedCache->registerTag('hlblock_id_' . CELLAR_SIZE_HLID);

            $arFullResult = getCellarFullInfo();
     
            $taggedCache->endTagCache();
            $cache->endDataCache($arFullResult);
            
        }
        echo Json::encode($arFullResult);
    }else{
        http_response_code(404);
        echo Json::encode(['error' => 'Unknown endpoint']);
    }

  }catch(Exception $e){
    http_response_code(404);
    echo Json::encode(['error' => $e->getMessage()]);
  }

  function getCellarOptionBySeries($seria){
    Loader::includeModule("highloadblock");
    $arHLBlock = Bitrix\Highloadblock\HighloadBlockTable::getById(CELLAR_OTPION_HLID)->fetch();
    $obEntity = Bitrix\Highloadblock\HighloadBlockTable::compileEntity($arHLBlock);
    $strEntityDataClass = $obEntity->getDataClass();

    $rsData = $strEntityDataClass::getList(array(
        'select' => array('UF_CELLAR_OPTION_NAME','ID'),
        'filter' => array('UF_CELLAR_SERIA' => $seria)
    ));
    $arData = [];
    while ($arItem = $rsData->Fetch()) {
        $arData[] = $arItem;
    }
    echo Json::encode(['data' => $arData]);

  }
  function getCellarFullInfo(){ 

    Loader::includeModule('iblock');
    Loader::includeModule('highloadblock');
    $rsElement = CIBlockElement::GetList(
        [],
        ['IBLOCK_ID' => CELLAR_IBID, 'ACTIVE' => 'Y'],
        false, 
        false, 
        ['ID', 'NAME', 'CODE'] 
    );
    $arFullResult = [];
    while($arElement = $rsElement->fetch()) {
        if($arElement['PREVIEW_PICTURE']){
            $arElement['PREVIEW_PICTURE'] = CFile::GetFileArray($arElement['PREVIEW_PICTURE'])['SRC'];
        }
        $arFullResult[$arElement['ID']] = $arElement;
    }
    foreach($arFullResult as $key => $value){
        $arHLBlock = Bitrix\Highloadblock\HighloadBlockTable::getById(CELLAR_OTPION_HLID)->fetch();
        $obEntity = Bitrix\Highloadblock\HighloadBlockTable::compileEntity($arHLBlock);
        $strEntityDataClass = $obEntity->getDataClass();
        $rsData = $strEntityDataClass::getList(array(
            'select' => array('*'),
            'filter' => array('UF_CELLAR_SERIA' => $key),
            'order' => ['UF_CELLAR_OPTION_SORT' => 'ASC']
        ));
        $arData = [];
        while ($arItem = $rsData->Fetch()) {
            if($arItem['UF_CELLAR_OPTION_IMAGE']){
                $arItem['UF_CELLAR_OPTION_IMAGE'] = CFile::GetFileArray($arItem['UF_CELLAR_OPTION_IMAGE'])['SRC'];
            }
            if($arItem['UF_CELLAR_OPTION_IMAGE_FOR_PRINT']){
                $arItem['UF_CELLAR_OPTION_IMAGE_FOR_PRINT'] = CFile::GetFileArray($arItem['UF_CELLAR_OPTION_IMAGE_FOR_PRINT'])['SRC'];
            }
            
            $arData[] = $arItem;
        }
        $arFullResult[$key]['OPTIONS'] = $arData;


        $arHLBlock = Bitrix\Highloadblock\HighloadBlockTable::getById(CELLAR_SIZE_HLID)->fetch();
        $obEntity = Bitrix\Highloadblock\HighloadBlockTable::compileEntity($arHLBlock);
        $strEntityDataClass = $obEntity->getDataClass();
        $rsData = $strEntityDataClass::getList(array(
            'select' => array('*'),
            'filter' => array('UF_CELLAR_SIZE_SERIA' => $key),
            'order'  => ["UF_CELLAR_SIZE_SORT" => "ASC"]
        ));
        $arData = [];
        while ($arItem = $rsData->Fetch()) {
            if($arItem['UF_CELLAR_SIZE_OPTION_PRICE']){
                $arItem['UF_CELLAR_SIZE_OPTION_PRICE'] = Json::decode($arItem['UF_CELLAR_SIZE_OPTION_PRICE']);
            }
            if($arItem['UF_CELLAR_SIZE_IMAGE_BASE']){
                $arItem['UF_CELLAR_SIZE_IMAGE_BASE'] = CFile::GetFileArray($arItem['UF_CELLAR_SIZE_IMAGE_BASE'])['SRC'];
            }
            if($arItem['UF_CELLAR_SIZE_ICON']){
                $arItem['UF_CELLAR_SIZE_ICON'] = CFile::GetFileArray($arItem['UF_CELLAR_SIZE_ICON'])['SRC'];
            }
            $arData[] = $arItem;
        }
        $arFullResult[$key]['SIZES'] = $arData;
    }
    return $arFullResult;
  }

  

?>