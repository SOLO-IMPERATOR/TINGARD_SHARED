<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var string $componentPath
 * @var string $componentName
 * @var array $arCurrentValues
 * @var array $arTemplateParameters
 */

 $arComponentParameters = array(
    "PARAMETERS" => array(
        "URL_webhook"    =>  array(
            "PARENT"    =>  "BASE",
            "NAME"      =>  "URL вебхука",
            "TYPE"      =>  "STRING",
            "DEFAULT"   =>  "URL вебхука"
        ),
        "ID_DOC"    =>  array(
            "PARENT"    =>  "BASE",
            "NAME"      =>  "ID документа таблицы",
            "TYPE"      =>  "STRING",
            "DEFAULT"   =>  "ID документа таблицы"
        ),
        "GID"    =>  array(
            "PARENT"    =>  "BASE",
            "NAME"      =>  "gid документа таблицы",
            "TYPE"      =>  "STRING",
            "DEFAULT"   =>  "0"
        ),
        "TIME_COOKIES"    =>  array(
            "PARENT"    =>  "BASE",
            "NAME"      =>  "Время хранния coockies в часах.",
            "TYPE"      =>  "INTEGER",
            "DEFAULT"   =>  "1"
        ),
    ),
);