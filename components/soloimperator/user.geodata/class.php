<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Engine\Contract\Controllerable;
use Bitrix\Main\Engine\ActionFilter;
use Bitrix\Main\Errorable;
use Bitrix\Main\ErrorableImplementation;
use Bitrix\Main\ErrorCollection;
use Bitrix\Main\Error;
use Bitrix\Sale\Location\LocationTable;
use Bitrix\Sale\Location\TypeTable;
use \Bitrix\Main\Service\GeoIp\Manager;
use Bitrix\Main\Loader;

class UserGeoDataComponent extends CBitrixComponent implements Controllerable, Errorable {

    use ErrorableImplementation;


    public function onPrepareComponentParams($params)
    {
        $this->errorCollection = new ErrorCollection();
        return parent::onPrepareComponentParams($params);

    }

    public function configureActions(): array
    {
        return [
            'setCity' => [
                'prefilters' => [
                    new ActionFilter\Csrf(),
                    new ActionFilter\HttpMethod([ActionFilter\HttpMethod::METHOD_POST]),
                ],
                'postfilters' => []
            ],
            
        ];
    }



    
    public function setCityAction($cityCode = null, $setAutomaticaly = false)
    {

        Loader::includeModule('sale');

        if((empty($cityCode) || $cityCode <= 0) && !$setAutomaticaly){
            $this->errorCollection->setError(new Error('Некоректный ID города'));
            return null;
        }

        if(empty($cityCode)){
            $result = Manager::getDataResult(Manager::getRealIp(), 'ru');
            if ($result->isSuccess()) {
                $geoData = $result->getGeoData();
               
                $loc = \Bitrix\Sale\Location\LocationTable::getList([
                    'filter' => [
                        '=NAME.NAME' => $geoData->cityName,
                        '=NAME.LANGUAGE_ID' => 'ru',
                        '=ID' => $this->arParams['regionsIds'],
                    ],
                    'select' => ['ID', 'CODE']
                ]);
                if($row = $loc->fetch()){
                     $cityCode = $row['ID'];
                }else{
                    $this->errorCollection->setError(new Error('Не удалось определить город автоматически'. implode(' ',$errors)));
                }

            } else {
                $errors = $result->getErrorMessages();
                $this->errorCollection->setError(new Error('Не удалось определить город автоматически'. implode(' ',$errors)));
            }
        }

        $res = LocationTable::getList([
            'filter' => [
                "ID" => $cityCode,
                "=NAME.LANGUAGE_ID" => 'ru',
            ],
            'select' => [
                'ID', 
                'LOCATION_NAME' => 'NAME.NAME',
            ],
        ]);

        $dataString = http_build_query((array)$geoData, '', ', ');
        if($row = $res->fetch()){
            $session = \Bitrix\Main\Application::getInstance()->getSession();
            $session->set('B_GEOIP_DATA', [
                'locationCode' => $row['ID'],
                'locationName' => $row['LOCATION_NAME'],
                'auto' => false,
            ]);
            return ['result' => true];
        }else{
            $this->errorCollection->setError(new Error('ID города не найден'. $dataString));
            return null;
        }


    }

    private function getCitiesByFilter($arFilter)
    {
        
        $res = LocationTable::getList([
            'filter' => $arFilter,
            'select' => [
                'ID', 
                'LOCATION_NAME' => 'NAME.NAME',
            ],
            'order' => [
                'SORT' => 'ASC', 
            ]
        ]);

        $locations = [];

        while ($item = $res->fetch()) {
            $locations[$item['ID']] = $item['LOCATION_NAME'];
        }

        return $locations;

    }




    public function executeComponent()
    {
        $this->arResult['ERRORS'] = [];

        if (!Loader::includeModule('sale')) {
            ShowError("Модуль sale не подключен");
            return;
        }

        if(empty($this->arParams['regionsIds']) || !is_array($this->arParams['regionsIds'])){
            ShowError('Список городов пуст!');
            return;
        }


        if($this->errorCollection->isEmpty()){
            $filter = ['ID' => $this->arParams['regionsIds']];
            $this->arResult['CITIES'] = $this->getCitiesByFilter($filter);
            if(empty($this->arResult['CITIES'])){
                $this->errorCollection->setError(new Error('Не найдено ни одного города в стране .' . $this->arParams['countryCode']));
            }
        }


        $this->includeComponentTemplate();
    }
}