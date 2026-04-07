<?
require_once('upDealerB24.php');
require_once('constants.php');

/* функция поиска существующего контакта */
function findDuplicate($data)
{
    $result = CRest::call(
        "crm.duplicate.findbycomm",
        [
            'entity_type' => "CONTACT",
            'type' => "PHONE",
            'values' => [$data["PHONE_WORK"][0]["VALUE"]]
        ]
    );
    return $result;
}

function formatPhoneForB24($phone)
{
    // Удаляем все нецифровые символы, кроме плюса
    $cleaned = preg_replace('/[^\d+]/', '', $phone);

    // Если номер начинается с +7, оставляем как есть
    if (substr($cleaned, 0, 2) === '+7') {
        return $cleaned;
    }

    // Если номер начинается с 7 или 8, добавляем +
    if (substr($cleaned, 0, 1) === '7') {
        return '+' . $cleaned;
    }

    if (substr($cleaned, 0, 1) === '8') {
        return '+7' . substr($cleaned, 1);
    }

    // Для других случаев
    return $cleaned;
}


class ElementAddHandler
{
    public static function onAfterAdd(&$arFields)
    {
        if (!$arFields['ID'] && ($arFields["IBLOCK_ID"] != 70 || $arFields["IBLOCK_ID"] != 72)) {
            return;
        }



        $res = \CIBlockElement::GetByID($arFields['ID']);
        if (!$arItem = $res->GetNextElement()) {
            return;
        }

        $props = $arItem->GetProperties();

        require_once($_SERVER['DOCUMENT_ROOT'] . '/local/ajax/crest.php');

        /* присвоение значений для отправки в CRM */

        $data['NAME'] = $props['NAME']['VALUE'];
        $data['PHONE'] = [['VALUE' => formatPhoneForB24($props['PHONE']['VALUE']), 'VALUE_TYPE' => 'WORK']];
        $data['EMAIL'] = [['VALUE' => $props['EMAIL']['VALUE'], 'VALUE_TYPE' => 'WORK']];
        $data['UF_CRM_1517561552'] = array_key_exists('roistat_visit', $_COOKIE) ? $_COOKIE['roistat_visit'] : 'nocookie';
        $data['COMMENTS'] = "https://" . $_SERVER["HTTP_HOST"] . CFile::GetPath($props['PDF']['VALUE']);
        $data['TRACE'] = $props['TRACE'];
        $data['UF_CRM_1736853511'] = $props['METRIKA']['VALUE'];
        $data['UF_CRM_1736853555'] = $props['METRIKA']['VALUE'];
        $data['UF_CRM_1736853537'] = $props['METRIKA']['VALUE'];
        $data['TITLE'] = $arFields["IBLOCK_ID"] == 72 ? "Сконфигурированный вездеход (клиент отправил комплектацию себе на email)" : "Сохранить и отправить комплектацию на e-mail";

        $data['ASSIGNED_BY_ID'] = 58;
        if ($_SERVER["HTTP_HOST"] == "tinger.ru") {
            $data['SOURCE_ID'] = 'WEB';
            $data['UF_CRM_1449663065'] = 64;
        } else {
            $data['SOURCE_ID'] = '9';
            $data['UF_CRM_1449663065'] = 68;
        }
        $data['WEB'] = [['VALUE' => 'Сайт ' . strtoupper($_SERVER['HTTP_HOST']), 'VALUE_TYPE' => 'WORK']];

        $resultLead = CRest::call(
            'crm.lead.add',
            [
                'fields' => $data
            ]
        );
        // Отправим почтовое событие
        if ($props['PDF']['VALUE']) {
            if ($arFields["IBLOCK_ID"] == 72) {
                $result = CEvent::send("SEND_VEHICLE_CONFIGURATION", 's2', ["EMAIL" => $props['EMAIL']['VALUE']], 'N', '', [$props['PDF']['VALUE']]);
            } else {
                $result = CEvent::send("NEW_CELLAR_ORDER", 's1', ["EMAIL" => $props['EMAIL']['VALUE']], 'N', '', [$props['PDF']['VALUE']]);
            }
        }
        if ($result && $resultLead) {
            CIBlockElement::SetPropertyValues($arFields['ID'], $arFields['IBLOCK_ID'], "Да" . implode("", $resultLead), "B24_SEND");
        } else {
            CIBlockElement::SetPropertyValues($arFields['ID'], $arFields['IBLOCK_ID'], "Ошибка", "B24_SEND");
        }
    }
}
// добавляем обработчик на форму погребов
\Bitrix\Main\Loader::registerNamespace("Local", $_SERVER["DOCUMENT_ROOT"] . "/local/lib");
AddEventHandler("iblock", "OnAfterIBlockElementAdd", ["ElementAddHandler", "onAfterAdd"]);
// добавляем обработчик на форму погребов
function pre_var_dump($var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}

//setcookie("PHPSESSID", "", 777, '/');
/* подключение класса для обработки изображений в формат webp */
CModule::AddAutoloadClasses("", array(
    'Pict' => '/local/php_interface/class/Pict.class.php',
));

/* удаление товаров из корзины при отправке формы */
/* if ($_POST['BasketDelete'] and CModule::IncludeModule('sale')) {
   CSaleBasket::DeleteAll(CSaleBasket::GetBasketUserID());
} */


/* 
Отправка данных диллеру при регистрации
*/



/* Отлавливаем пароль пользователя и кладем его в сессию */
AddEventHandler("main", "OnBeforeUserAdd", array("DillerPassword", "OnBeforeUserAddHandler"));
class DillerPassword
{
    public static function OnBeforeUserAddHandler(&$arFields)
    {
        $session = \Bitrix\Main\Application::getInstance()->getSession();
        $session->set('tmp_diller_pass', $arFields['PASSWORD']);
    }
}

$request = \Bitrix\Main\Context::getCurrent()->getRequest();

if ($request->isAdminSection()) {

    AddEventHandler("main", "OnAfterUserAdd", array("DillerRegistration", "OnAfterUserAddHandler"));

    /* Собираем данные и отправляем */
    class DillerRegistration
    {
        public static function OnAfterUserAddHandler(&$arFields)
        {
            $session = \Bitrix\Main\Application::getInstance()->getSession();
            if ($arFields['GROUP_ID'][0]['GROUP_ID'] == 22) {
                $arData = array(
                    "EMAIL" => $arFields['EMAIL'],
                    "LOGIN" => $arFields['LOGIN'],
                    "PASSWORD" => $session['tmp_diller_pass']
                );
                $result = CEvent::Send('NEW_USER_CONFIRM', 's3', $arData);
            }

        }
    }

}










/* добавление canonical url, если есть get параметры в url */
AddEventHandler('main', 'OnEpilog', 'setCanonical', 1);
function setCanonical()
{
    global $APPLICATION;

    if (strpos($APPLICATION->GetCurPageParam(), '?') !== false) {
        if ($APPLICATION->GetPageProperty('canonical') == '') {
            CMain::IsHTTPS() ? $s = 's' : $s = '';
            $url = 'http' . $s . '://' . SITE_SERVER_NAME . $APPLICATION->GetCurPage();
            $APPLICATION->SetPageProperty("canonical", $url);
        }
    }
}

/**
 * Получение свойств
 * @param Integer $iblock
 * @param Integer $id
 * @param String $property
 */
function get_props($iblock, $id, $property)
{
    $VAL = array();

    $db_props = CIBlockElement::GetProperty($iblock, $id, array("sort" => "asc"), array("CODE" => $property));

    if ($price_prop = $db_props->GetNext()) {
        $VAL = $price_prop["VALUE"];
    }

    return $VAL;
}

/**
 * Получить стандартные свойства элемента
 * @param Integer $iblock
 * @param Integer $id
 * @param String $par
 */
function get_main_props($iblock, $id, $par)
{
    $main_fields = array();

    $arSelect = array("ID", "NAME");
    $arFilter = array("IBLOCK_ID" => $iblock, "ACTIVE" => "Y");
    $res = CIBlockElement::GetList(array(), $arFilter, false, array("nPageSize" => 50), $arSelect);

    while ($ob = $res->GetNextElement()) {
        $arFields[] = $ob->GetFields();

    }


    foreach ($arFields as $set_par) {

        if ($set_par["ID"] == $id) {
            array_push($main_fields, $set_par);
        }
    }

    return $main_fields[0][$par];
}

function get_other_par($iblock, $id_el, $code)
{
    $prop_arr = [];

    $res = CIBlockElement::GetProperty($iblock, $id_el, array("sort" => "asc"), array("CODE" => $code));

    if ($ob = $res->GetNext()) {
        $prop_arr[] = $ob['VALUE'];
    }

    return $prop_arr;
}

/**
 * Получить данные из highload-блока
 */
function get_hl_el()
{
    // $DATA = array();

    if (CModule::IncludeModule('highloadblock')) {
        $arHLBlock = Bitrix\Highloadblock\HighloadBlockTable::getById(7)->fetch();
        $obEntity = Bitrix\Highloadblock\HighloadBlockTable::compileEntity($arHLBlock);
        $strEntityDataClass = $obEntity->getDataClass();
        $resData = $strEntityDataClass::getList(array(
            'select' => array('*'),
            'order' => array('ID' => 'ASC'),
        ));
        while ($arItem = $resData->Fetch()) {
            $DATA[] = $arItem;
        }
    }

    return $DATA;
}

/**
 * Изменение тегов на значения в текста
 * @param String $txt
 */
function tag_replacement($txt)
{
    // include $_SERVER['DOCUMENT_ROOT']."/include/data_comp.php";

    $other_prop_arr;

    $hl_data = get_hl_el();

    $elem = array();

    foreach ($hl_data as $set_data) {
        $elem["#" . $set_data["UF_CODE"] . "#"] = $set_data["UF_DATA"];
    }

    $other_prop_arr = get_other_par(11, 1756, "C_PRICE");
    $elem["#TF4_PRICE#"] = $other_prop_arr[0];

    $other_prop_arr = get_other_par(52, 2067, "C_PRICE");
    $elem["#TF4_PRICE_EN#"] = $other_prop_arr[0];

    $other_prop_arr = get_other_par(11, 66, "C_PRICE");
    $elem["#TRACK_PRICE#"] = $other_prop_arr[0];

    $other_prop_arr = get_other_par(52, 2063, "C_PRICE");
    $elem["#TRACK_PRICE_EN#"] = $other_prop_arr[0];

    $other_prop_arr = get_other_par(11, 67, "C_PRICE");
    $elem["#AROMOR_PRICE#"] = $other_prop_arr[0];

    $other_prop_arr = get_other_par(52, 2064, "C_PRICE");
    $elem["#ARMOR_PRICE_EN#"] = $other_prop_arr[0];

    $other_prop_arr = get_other_par(11, 68, "C_PRICE");
    $elem["#DOG_PRICE#"] = $other_prop_arr[0];

    $other_prop_arr = get_other_par(52, 2065, "C_PRICE");
    $elem["#DOG_PRICE_EN#"] = $other_prop_arr[0];

    $other_prop_arr = get_other_par(11, 69, "C_PRICE");
    $elem["#T_PRICE#"] = $other_prop_arr[0];

    $other_prop_arr = get_other_par(52, 2066, "C_PRICE");
    $elem["#T_PRICE_EN#"] = $other_prop_arr[0];

    foreach ($elem as $key => $val) {
        if (strpos($txt, $key) != -1) {
            $txt = str_ireplace($key, $val, $txt);
        }
    }

    return $txt;
}


//множественное поле для привязки подкатегоири к номеру на схеме
AddEventHandler("iblock", "OnIBlockPropertyBuildList", array("CUserTypeSchemeNumber", "GetUserTypeDescription"));
class CUserTypeSchemeNumber
{

    private static $Script_included = false;

    public static function GetUserTypeDescription()
    {
        return array(
            "USER_TYPE_ID" => "SECTION_LINK",
            "CLASS_NAME" => "CUserTypeSchemeNumber",
            "DESCRIPTION" => "Привязка номера к взрыв-схеме",
            "BASE_TYPE" => "string",
            "PROPERTY_TYPE" => "N",
            "USER_TYPE" => "USER_SCHEME_NUMBER",
            "GetPublicViewHTML" => array("CUserTypeSchemeNumber", "GetPublicViewHTML"),
            "GetPropertyFieldHtml" => array("CUserTypeSchemeNumber", "GetPropertyFieldHtml"),
        );
    }

    public static function GetPublicViewHTML($arProperty, $value, $strHTMLControlName)
    {
        return $value['VALUE'];
    }

    public static function GetPropertyFieldHtml($arProperty, $value, $strHTMLControlName)
    {

        $rsSection = CIBlockSection::GetTreeList(
            [
                'IBLOCK_ID' => $arProperty["IBLOCK_ID"],
                'ACTIVE' => 'Y',
            ],
            [
                "ID",
                "IBLOCK_ID",
                "IBLOCK_NAME",
                "DEPTH_LEVEL",
                "IBLOCK_SECTION_ID",
                "NAME",
            ]
        );

        $sectionsList = [];

        while ($bind_value = $rsSection->Fetch()) {
            $sectionsList['SECTIONS'][] = $bind_value;
        }

        $optionsHTML = '<option value="">не выбрано</option>';

        foreach ($sectionsList['SECTIONS'] as $section) {

            if ($section['DEPTH_LEVEL'] == 1) {
                $mainSectionName = $section['NAME'];
                $optionsHTML .= '<option value="' . $section['ID'] . '" disabled>' . $section['NAME'] . ' ---------------------------------------------</option>';
            } else {
                $optionsHTML .= '<option value="' . $section['ID'] . '" ' . ($value['VALUE'] == $section['ID'] ? ' selected' : '') . '>' . $mainSectionName . ' — ' . $section['NAME'] . '</option>';
            }

        }

        return '<select name="' . $strHTMLControlName["VALUE"] . '">' . $optionsHTML . '</select><input type="text" name="' . $strHTMLControlName["DESCRIPTION"] . '" value="' . $value['DESCRIPTION'] . '">';

    }

}

//поле "количество в вездеходе"
AddEventHandler("iblock", "OnIBlockPropertyBuildList", array("CUserTypeQuanity", "GetUserTypeDescription"));

class CUserTypeQuanity
{

    private static $Script_included = false;

    public static function GetUserTypeDescription()
    {
        return array(
            "USER_TYPE_ID" => "SECTION_LINK",
            "CLASS_NAME" => "CUserTypeQuanity",
            "DESCRIPTION" => "Количество в вездеходе",
            "BASE_TYPE" => "string",
            "PROPERTY_TYPE" => "N",
            "USER_TYPE" => "USER_QUANITY",
            "GetPublicViewHTML" => array("CUserTypeQuanity", "GetPublicViewHTML"),
            "GetPropertyFieldHtml" => array("CUserTypeQuanity", "GetPropertyFieldHtml"),
        );
    }

    public static function GetPublicViewHTML($arProperty, $value, $strHTMLControlName)
    {
        return $value['VALUE'];
    }

    public static function GetPropertyFieldHtml($arProperty, $value, $strHTMLControlName)
    {

        $rsSection = CIBlockSection::GetTreeList(
            [
                'IBLOCK_ID' => $arProperty["IBLOCK_ID"],
                'ACTIVE' => 'Y',
            ],
            [
                "ID",
                "IBLOCK_ID",
                "IBLOCK_NAME",
                "DEPTH_LEVEL",
                "IBLOCK_SECTION_ID",
                "NAME",
            ]
        );

        $sectionsList = [];

        while ($bind_value = $rsSection->Fetch()) {
            $sectionsList['SECTIONS'][] = $bind_value;
        }

        $optionsHTML = '<option value="">не выбрано</option>';

        //echo '<pre>'; print_r($sectionsList['SECTIONS']); echo '</pre>';

        foreach ($sectionsList['SECTIONS'] as $section) {

            if ($section['DEPTH_LEVEL'] == 1) {
                $optionsHTML .= '<option value="' . $section['ID'] . '" ' . ($value['VALUE'] == $section['ID'] ? ' selected' : '') . '>' . $section['NAME'] . '</option>';
            }

        }

        return '<select name="' . $strHTMLControlName["VALUE"] . '">' . $optionsHTML . '</select><input type="text" name="' . $strHTMLControlName["DESCRIPTION"] . '" value="' . $value['DESCRIPTION'] . '">';

    }

}




// поиск только по названию товара и артикулу
AddEventHandler("search", "BeforeIndex", "BeforeIndexHandler");
function BeforeIndexHandler($arFields)
{
    if (!CModule::IncludeModule("iblock")) {
        return $arFields;
    }
    if ($arFields["MODULE_ID"] == "iblock" && $arFields["PARAM2"] == 37) {
        $db_props = CIBlockElement::GetProperty(
            $arFields["PARAM2"],
            $arFields["ITEM_ID"],
            array("sort" => "asc"),
            array("CODE" => "CML2_ARTICLE")
        );
        if ($ar_props = $db_props->Fetch()) {
            if (isset($ar_props["VALUE"])) {
                $arFields["TITLE"] .= ", арт. " . $ar_props["VALUE"];
            }
        }
        //$arFields["BODY"] = "";
    }
    return $arFields;
}


//вывод товаров со скидкой
use Bitrix\Main\Loader;
use Bitrix\Main\SystemException;

class AllProductDiscount
{
    /**
     * @return XML_ID|array
     * @throws SystemException
     * @throws \Bitrix\Main\LoaderException
     */
    public static function getFull($arrFilter = array(), $arSelect = array())
    {
        if (!Loader::includeModule('sale'))
            throw new SystemException('Не подключен модуль Sale');

        //Все товары со скидкой!!!
        // Группы пользователей
        global $USER;
        $arUserGroups = $USER->GetUserGroupArray();
        if (!is_array($arUserGroups))
            $arUserGroups = array($arUserGroups);
        // Достаем старым методом только ID скидок привязанных к группам пользователей по ограничениям
        $actionsNotTemp = \CSaleDiscount::GetList(array("ID" => "ASC"), array("USER_GROUPS" => $arUserGroups), false, false, array("ID"));
        while ($actionNot = $actionsNotTemp->fetch()) {
            $actionIds[] = $actionNot['ID'];
        }
        $actionIds = array_unique($actionIds);
        sort($actionIds);
        // Подготавливаем необходимые переменные для разборчивости кода
        global $DB;
        $conditionLogic = array('Equal' => '=', 'Not' => '!', 'Great' => '>', 'Less' => '<', 'EqGr' => '>=', 'EqLs' => '<=');
        $arSelect = array_merge(array("ID", "IBLOCK_ID", "XML_ID"), $arSelect);
        $city = 'MSK';
        // Теперь достаем новым методом скидки с условиями. P.S. Старым методом этого делать не нужно из-за очень высокой нагрузки (уже тестировал)
        $actions = \Bitrix\Sale\Internals\DiscountTable::getList(array(
            'select' => array("ID", "ACTIONS_LIST"),
            'filter' => array(
                "ACTIVE" => "Y",
                "USE_COUPONS" => "N",
                "DISCOUNT_TYPE" => "P",
                "LID" => SITE_ID,
                "ID" => $actionIds,
                array(
                    "LOGIC" => "OR",
                    array(
                        "<=ACTIVE_FROM" => $DB->FormatDate(date("Y-m-d H:i:s"), "YYYY-MM-DD HH:MI:SS", \CSite::GetDateFormat("FULL")),
                        ">=ACTIVE_TO" => $DB->FormatDate(date("Y-m-d H:i:s"), "YYYY-MM-DD HH:MI:SS", \CSite::GetDateFormat("FULL"))
                    ),
                    array(
                        "=ACTIVE_FROM" => false,
                        ">=ACTIVE_TO" => $DB->FormatDate(date("Y-m-d H:i:s"), "YYYY-MM-DD HH:MI:SS", \CSite::GetDateFormat("FULL"))
                    ),
                    array(
                        "<=ACTIVE_FROM" => $DB->FormatDate(date("Y-m-d H:i:s"), "YYYY-MM-DD HH:MI:SS", \CSite::GetDateFormat("FULL")),
                        "=ACTIVE_TO" => false
                    ),
                    array(
                        "=ACTIVE_FROM" => false,
                        "=ACTIVE_TO" => false
                    ),
                )
            )
        ));
        // Перебираем каждую скидку и подготавливаем условия фильтрации для CIBlockElement::GetList
        while ($arrAction = $actions->fetch()) {
            $arrActions[$arrAction['ID']] = $arrAction;
        }
        foreach ($arrActions as $actionId => $action) {
            $arPredFilter = array_merge(array("ACTIVE_DATE" => "Y", "CAN_BUY" => "Y"), $arrFilter); //Набор предустановленных параметров
            $arFilter = $arPredFilter; //Основной фильтр
            $dopArFilter = $arPredFilter; //Фильтр для доп. запроса
            $dopArFilter["=XML_ID"] = array(); //Пустое значения для первой отработки array_merge
            //Магия генерации фильтра
            foreach ($action['ACTIONS_LIST']['CHILDREN'] as $condition) {
                foreach ($condition['CHILDREN'] as $keyConditionSub => $conditionSub) {
                    $cs = $conditionSub['DATA']['value']; //Значение условия
                    $cls = $conditionLogic[$conditionSub['DATA']['logic']]; //Оператор условия
                    //$arFilter["LOGIC"]=$conditionSub['DATA']['All']?:'AND';
                    $CLASS_ID = explode(':', $conditionSub['CLASS_ID']);

                    if ($CLASS_ID[0] == 'ActSaleSubGrp') {
                        foreach ($conditionSub['CHILDREN'] as $keyConditionSubElem => $conditionSubElem) {
                            $cse = $conditionSubElem['DATA']['value']; //Значение условия
                            $clse = $conditionLogic[$conditionSubElem['DATA']['logic']]; //Оператор условия
                            //$arFilter["LOGIC"]=$conditionSubElem['DATA']['All']?:'AND';
                            $CLASS_ID_EL = explode(':', $conditionSubElem['CLASS_ID']);

                            if ($CLASS_ID_EL[0] == 'CondIBProp') {
                                $arFilter["IBLOCK_ID"] = $CLASS_ID_EL[1];
                                $arFilter[$clse . "PROPERTY_" . $CLASS_ID_EL[2]] = array_merge((array) $arFilter[$clse . "PROPERTY_" . $CLASS_ID_EL[2]], (array) $cse);
                                $arFilter[$clse . "PROPERTY_" . $CLASS_ID_EL[2]] = array_unique($arFilter[$clse . "PROPERTY_" . $CLASS_ID_EL[2]]);
                            } elseif ($CLASS_ID_EL[0] == 'CondIBName') {
                                $arFilter[$clse . "NAME"] = array_merge((array) $arFilter[$clse . "NAME"], (array) $cse);
                                $arFilter[$clse . "NAME"] = array_unique($arFilter[$clse . "NAME"]);
                            } elseif ($CLASS_ID_EL[0] == 'CondIBElement') {
                                $arFilter[$clse . "ID"] = array_merge((array) $arFilter[$clse . "ID"], (array) $cse);
                                $arFilter[$clse . "ID"] = array_unique($arFilter[$clse . "ID"]);
                            } elseif ($CLASS_ID_EL[0] == 'CondIBTags') {
                                $arFilter[$clse . "TAGS"] = array_merge((array) $arFilter[$clse . "TAGS"], (array) $cse);
                                $arFilter[$clse . "TAGS"] = array_unique($arFilter[$clse . "TAGS"]);
                            } elseif ($CLASS_ID_EL[0] == 'CondIBSection') {
                                $arFilter[$clse . "SECTION_ID"] = array_merge((array) $arFilter[$clse . "SECTION_ID"], (array) $cse);
                                $arFilter[$clse . "SECTION_ID"] = array_unique($arFilter[$clse . "SECTION_ID"]);
                            } elseif ($CLASS_ID_EL[0] == 'CondIBXmlID') {
                                $arFilter[$clse . "XML_ID"] = array_merge((array) $arFilter[$clse . "XML_ID"], (array) $cse);
                                $arFilter[$clse . "XML_ID"] = array_unique($arFilter[$clse . "XML_ID"]);
                            } elseif ($CLASS_ID_EL[0] == 'CondBsktAppliedDiscount') { //Условие: Были применены скидки (Y/N)
                                foreach ($arrActions as $tempAction) {
                                    if (($tempAction['SORT'] < $action['SORT'] && $tempAction['PRIORITY'] > $action['PRIORITY'] && $cse == 'N') || ($tempAction['SORT'] > $action['SORT'] && $tempAction['PRIORITY'] < $action['PRIORITY'] && $cse == 'Y')) {
                                        $arFilter = false;
                                        break 4;
                                    }
                                }
                            }
                        }
                    } elseif ($CLASS_ID[0] == 'CondIBProp') {
                        $arFilter["IBLOCK_ID"] = $CLASS_ID[1];
                        $arFilter[$cls . "PROPERTY_" . $CLASS_ID[2]] = array_merge((array) $arFilter[$cls . "PROPERTY_" . $CLASS_ID[2]], (array) $cs);
                        $arFilter[$cls . "PROPERTY_" . $CLASS_ID[2]] = array_unique($arFilter[$cls . "PROPERTY_" . $CLASS_ID[2]]);
                    } elseif ($CLASS_ID[0] == 'CondIBName') {
                        $arFilter[$cls . "NAME"] = array_merge((array) $arFilter[$cls . "NAME"], (array) $cs);
                        $arFilter[$cls . "NAME"] = array_unique($arFilter[$cls . "NAME"]);
                    } elseif ($CLASS_ID[0] == 'CondIBElement') {
                        $arFilter[$cls . "ID"] = array_merge((array) $arFilter[$cls . "ID"], (array) $cs);
                        $arFilter[$cls . "ID"] = array_unique($arFilter[$cls . "ID"]);
                    } elseif ($CLASS_ID[0] == 'CondIBTags') {
                        $arFilter[$cls . "TAGS"] = array_merge((array) $arFilter[$cls . "TAGS"], (array) $cs);
                        $arFilter[$cls . "TAGS"] = array_unique($arFilter[$cls . "TAGS"]);
                    } elseif ($CLASS_ID[0] == 'CondIBSection') {
                        $arFilter[$cls . "SECTION_ID"] = array_merge((array) $arFilter[$cls . "SECTION_ID"], (array) $cs);
                        $arFilter[$cls . "SECTION_ID"] = array_unique($arFilter[$cls . "SECTION_ID"]);
                    } elseif ($CLASS_ID[0] == 'CondIBXmlID') {
                        $arFilter[$cls . "XML_ID"] = array_merge((array) $arFilter[$cls . "XML_ID"], (array) $cs);
                        $arFilter[$cls . "XML_ID"] = array_unique($arFilter[$cls . "XML_ID"]);
                    } elseif ($CLASS_ID[0] == 'CondBsktAppliedDiscount') { //Условие: Были применены скидки (Y/N)
                        foreach ($arrActions as $tempAction) {
                            if (($tempAction['SORT'] < $action['SORT'] && $tempAction['PRIORITY'] > $action['PRIORITY'] && $cs == 'N') || ($tempAction['SORT'] > $action['SORT'] && $tempAction['PRIORITY'] < $action['PRIORITY'] && $cs == 'Y')) {
                                $arFilter = false;
                                break 3;
                            }
                        }
                    }
                }
            }
            if ($arFilter !== false && $arFilter != $arPredFilter) {
                if (!isset($arFilter['=XML_ID'])) {
                    //Делаем запрос по каждому из фильтров, т.к. один фильтр не получится сделать из-за противоречий условий каждой скидки
                    $res = \CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
                    while ($ob = $res->GetNextElement()) {
                        $arFields = $ob->GetFields();
                        $poductsArray['IDS'][] = $arFields["ID"];
                    }
                } elseif (!empty($arFilter['=XML_ID'])) {
                    //Подготавливаем массив для отдельного запроса
                    $dopArFilter['=XML_ID'] = array_unique(array_merge($arFilter['=XML_ID'], $dopArFilter['=XML_ID']));
                }
            }
        }

        if (isset($dopArFilter) && !empty($dopArFilter['=XML_ID'])) {
            //Делаем отдельный запрос по конкретным XML_ID
            $res = \CIBlockElement::GetList(array(), $dopArFilter, false, array("nTopCount" => count($dopArFilter['=XML_ID'])), $arSelect);
            while ($ob = $res->GetNextElement()) {
                $arFields = $ob->GetFields();
                $poductsArray['IDS'][] = $arFields["ID"];
            }
        }
        if (is_array($poductsArray['ids'])) {
            $poductsArray['ids'] = array_unique($poductsArray['ids']);
        }


        return $poductsArray;
    }
}

/**
 * кнопки в админке спец инфоблоки для чеклистов
 *
 */

AddEventHandler("main", "OnAdminListDisplay", "MyOnAdminListDisplay");
function MyOnAdminListDisplay(&$list)
{
    if ($list->table_id == "tbl_iblock_element_d382d26d4d0303256d991835d130d4fc") {

        // меню групповых действий над элементами
        $list->arActions["print_orders"] = array(
            'type' => 'button',
            'name' => "PDF для выбранных пунктов",
            'action' => 'generate_pdf()',
            'value' => 'generate_pdf',
            'title' => "PDF для выбранных пунктов"
        );
    }
}

/**
 * Агент вычислния статуса дилера
 */

function setStatusDealer()
{
    global $USER;
    // Получим всех дилеров
    $filter = array("ACTIVE" => "Y", 'GROUP_ID' => 15, '!UF_ID_COMPANY' => false);
    $arUsers = CUser::GetList($by = "ID", $order = "desc", $filter, ['SELECT' => ['UF_ID_COMPANY']]);
    while ($user = $arUsers->fetch()) {
        // запрос в Б24 сделок по ID компании за последние 3 месяца
        $threeMonthsAgo = date('Y-m-d', strtotime("-3 months"));
        $result = CRest::call(
            'crm.deal.list',
            [
                'order' => ['DATE_CREATE' => 'DESC'],
                'filter' => ['=COMPANY_ID' => $user['UF_ID_COMPANY'], '>=DATE_CREATE' => $threeMonthsAgo],
                'select' => ['ID', 'TITLE', 'DATE_CREATE']
            ],

        );
        if (empty($result['result'])) {
            // не было сделок
            $status = 'warning';
        } else {
            $status = 'successful';
        }
        // если есть  меняем статус если нет устанавливаем статус не активен
        $arFields = array(
            "UF_TRAFIC_LIGHT" => $status,
        );
        $userObj = new CUser;
        $userObj->Update($user['ID'], $arFields);
    }
    return "setStatusDealer()";
}

/**
 * Функция определяющая доступ в ЛК
 */

function acceessLK()
{
    $arGroupUser = \Bitrix\Main\Engine\CurrentUser::get()->getUserGroups();
    if (in_array(DEALER_ID_GROUP, $arGroupUser) || in_array(DEALER_PERSONAL_ID_GROUP, $arGroupUser) || in_array(22, $arGroupUser)) {
        return true;
    }
    return false;
}
// Подключаем поле "Местоположение России" (Sale-модуль, города и области)
require_once(__DIR__ . '/userField/locationfield.php');

// Подключаем поле для погребов
require_once(__DIR__ . '/userField/cellarfield.php');
// Подключаем поле для погребов


//Удаляем кеш при изменении Вездеходов
use Bitrix\Main\Event;
use Bitrix\Highloadblock\HighloadBlockTable;
use Bitrix\Main\ORM\EventManager;
use Bitrix\Main\Application;
function deleteCacheVehicleHighLoadBlock()
{
    $taggedCache = Application::getInstance()->getTaggedCache();
    $taggedCache->clearByTag('hlblock_id_31');
    $taggedCache->clearByTag('hlblock_id_34');
    $taggedCache->clearByTag('hlblock_id_35');
    $taggedCache->clearByTag('hlblock_id_33');
}


$hlblock = HighloadBlockTable::getById(31)->fetch();
$entity = HighloadBlockTable::compileEntity($hlblock);
$entityClass = $entity->getDataClass();
EventManager::getInstance()->addEventHandler($entityClass, 'OnAfterUpdate', 'deleteCacheVehicleHighLoadBlock');
EventManager::getInstance()->addEventHandler($entityClass, 'OnAfterDelete', 'deleteCacheVehicleHighLoadBlock');
EventManager::getInstance()->addEventHandler($entityClass, 'OnAfterAdd', 'deleteCacheVehicleHighLoadBlock');

$hlblock = HighloadBlockTable::getById(33)->fetch();
$entity = HighloadBlockTable::compileEntity($hlblock);
$entityClass = $entity->getDataClass();
EventManager::getInstance()->addEventHandler($entityClass, 'OnAfterUpdate', 'deleteCacheVehicleHighLoadBlock');
EventManager::getInstance()->addEventHandler($entityClass, 'OnAfterDelete', 'deleteCacheVehicleHighLoadBlock');
EventManager::getInstance()->addEventHandler($entityClass, 'OnAfterAdd', 'deleteCacheVehicleHighLoadBlock');
$hlblock = HighloadBlockTable::getById(34)->fetch();
$entity = HighloadBlockTable::compileEntity($hlblock);
$entityClass = $entity->getDataClass();
EventManager::getInstance()->addEventHandler($entityClass, 'OnAfterUpdate', 'deleteCacheVehicleHighLoadBlock');
EventManager::getInstance()->addEventHandler($entityClass, 'OnAfterDelete', 'deleteCacheVehicleHighLoadBlock');
EventManager::getInstance()->addEventHandler($entityClass, 'OnAfterAdd', 'deleteCacheVehicleHighLoadBlock');
$hlblock = HighloadBlockTable::getById(35)->fetch();
$entity = HighloadBlockTable::compileEntity($hlblock);
$entityClass = $entity->getDataClass();
EventManager::getInstance()->addEventHandler($entityClass, 'OnAfterUpdate', 'deleteCacheVehicleHighLoadBlock');
EventManager::getInstance()->addEventHandler($entityClass, 'OnAfterDelete', 'deleteCacheVehicleHighLoadBlock');
EventManager::getInstance()->addEventHandler($entityClass, 'OnAfterAdd', 'deleteCacheVehicleHighLoadBlock');

//Удаляем кеш при изменении Вездеходов