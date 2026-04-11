<?

use Bitrix\Main\Loader;
use Bitrix\Main\Context;
use Bitrix\Main\Web\Json;
use Bitrix\Highloadblock\HighloadBlockTable;
use Bitrix\Main\Data\Cache;

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
  const CELLAR_OTPION_HLID = 29;
  const CELLAR_SIZE_HLID = 30;
  const CELLAR_CITY_PRICE_HLID = 36;
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
        // Накладываем городские цены поверх дефолтных
        $arFullResult = applyCityPrices($arFullResult);
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
  /**
   * Получить городские цены из HL 36 и наложить на базовые данные.
   * Если для города/размера/опции нет записи — остаётся дефолтная цена.
   */
  function applyCityPrices($arFullResult){
    if(!$arFullResult || !is_array($arFullResult)) return $arFullResult;

    $session = \Bitrix\Main\Application::getInstance()->getSession();
    $geoData = $session->get('B_GEOIP_DATA');
    $cityId = (int)($geoData['locationCode'] ?? 0);
    if($cityId <= 0) return $arFullResult;

    $cityPrices = getCityPrices($cityId);
    if(empty($cityPrices)) return $arFullResult;

    foreach($arFullResult as &$series){
        if(empty($series['SIZES'])) continue;

        $optionNames = [];
        if(!empty($series['OPTIONS'])){
            foreach($series['OPTIONS'] as $opt){
                $optionNames[$opt['ID']] = $opt['UF_CELLAR_OPTION_NAME'];
            }
        }

        foreach($series['SIZES'] as &$size){
            $sizeId = $size['ID'];
            if(empty($size['UF_CELLAR_SIZE_OPTION_PRICE']) || !is_array($size['UF_CELLAR_SIZE_OPTION_PRICE'])) continue;
            foreach($size['UF_CELLAR_SIZE_OPTION_PRICE'] as &$optionPrice){
                $optionId = $optionPrice['id'];
                $key = $sizeId . '_' . $optionId;
                if(isset($cityPrices[$key])){
                    $optionPrice['price'] = $cityPrices[$key];
                    if(($optionNames[$optionId] ?? '') === 'Базовая комплектация'){
                        $size['UF_CELLAR_SIZE_BASE_PRICE'] = $cityPrices[$key];
                    }
                }
            }
            unset($optionPrice);
        }
        unset($size);
    }
    unset($series);

    return $arFullResult;
  }

  /**
   * Получить массив городских цен из HL 36 (с кешем по городу).
   * Возвращает ["sizeId_optionId" => price, ...]
   */
  function getCityPrices($cityId){
    Loader::includeModule('highloadblock');

    $cacheId = 'cellar_city_prices_' . $cityId;
    $cacheDir = '/cellar/city_prices/';
    $cache = Cache::createInstance();
    $taggedCache = \Bitrix\Main\Application::getInstance()->getTaggedCache();

    if($cache->initCache(CACHE_TIME, $cacheId, $cacheDir)){
        return $cache->getVars();
    }

    if($cache->startDataCache()){
        $taggedCache->startTagCache($cacheDir);
        $taggedCache->registerTag('hlblock_id_' . CELLAR_CITY_PRICE_HLID);

        $arHLBlock = HighloadBlockTable::getById(CELLAR_CITY_PRICE_HLID)->fetch();
        if(!$arHLBlock){
            $cache->abortDataCache();
            return [];
        }

        $obEntity = HighloadBlockTable::compileEntity($arHLBlock);
        $strEntityDataClass = $obEntity->getDataClass();

        $rsData = $strEntityDataClass::getList([
            'select' => ['UF_CELLAR_SIZE', 'UF_CELLAR_OPTION', 'UF_CITY_PRICE_OPTION'],
            'filter' => ['UF_CITY_PRICE' => $cityId],
        ]);

        $prices = [];
        while($arItem = $rsData->Fetch()){
            $key = $arItem['UF_CELLAR_SIZE'] . '_' . $arItem['UF_CELLAR_OPTION'];
            $prices[$key] = $arItem['UF_CITY_PRICE_OPTION'];
        }

        $taggedCache->endTagCache();
        $cache->endDataCache($prices);
        return $prices;
    }

    return [];
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