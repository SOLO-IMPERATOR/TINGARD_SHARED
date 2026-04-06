<?php
define('C_REST_WEB_HOOK_URL',$data["data_widget"]["WEBHOOK"]);
require_once($_SERVER['DOCUMENT_ROOT'] . '/local/templates/tinger/scripts/b24/crest.php');

/**
 * Поиск дубликатов
 * @param String $data
 */
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

/**
 * Создание контакта
 * @param Array $data
 */
function creationContact($data)
{
    $dubl = findDuplicate($data);
    $contact = false;

    if (empty($dubl["result"]["CONTACT"])) {
        $result = CRest::call(
            "crm.contact.add",
            [
                "fields" => [
                    'UF_CRM_566E8F1A1E899' => 170, //направление продаж (контакты)
                    "PHONE" =>  [["VALUE" => $data["PHONE_WORK"], "VALUE_TYPE" => "WORK"]], //телефон
                    "EMAIL" =>  [["VALUE" => $data["EMAIL_WORK"], "VALUE_TYPE" => "WORK"]], //почта
                    'NAME' => $data["NAME"], //имя контакта
                ]
            ]
        );

        $contact = $result['result'];

    } else {
        if (count($dubl["result"]["CONTACT"]) > 1) {
            $contact = $dubl["result"]["CONTACT"][0];
        } else {
            $contact = $dubl["result"]["CONTACT"];
        }
    }

    return  $contact;
}

/**
 * Создание лида
 * @param Array $data
 */
function creationLead($data)
{
    $fields = [
        'SOURCE_ID' => 'WEB', //источник
        'ASSIGNED_BY_ID' => 58, //ответственный
        'TITLE' => $data["TITLE"], //заголовок с источником и наименованием формы (наименование формы передаётся в форму в скрытый input при вызове модального окна, также к обычным формам будет добавлен этот скрытый input). По крайне мере я так вижу эту логику, можете предложить своё решение. $data["FORM_NAME"]
        'TAG' => 'TINGER.RU', //тег
        'NAME' => $data["NAME"],
        'SECOND_NAME' => "",
        'LAST_NAME' => "",
    ];

    if ($data["PHONE_WORK"]) {
        $fields["PHONE"] = [["VALUE" => $data["PHONE_WORK"], "VALUE_TYPE" => "WORK"]];
    }

    if ($data["EMAIL_WORK"]) {
        $fields["EMAIL"] = [["VALUE" => $data["EMAIL_WORK"], "VALUE_TYPE" => "WORK"]];
    }

    if ($data["COMMENTS"]) {
        $fields["COMMENTS"] = $data["COMMENTS"];
    }

    // var_dump(
    //     $fields
    // );

    $resultLead = CRest::call(
        'crm.lead.add',
        [
            'fields' => $fields
        ]
    );

    if (!empty($resultLead['result'])) {
        echo json_encode(['message' => 'Lead add']);
        return $resultLead['result'];
    } elseif (!empty($resultLead['error_description'])) {
        echo json_encode(['message' => 'Lead not added: ' . $resultLead['error_description']]);
    } else {
        echo json_encode(['message' => 'Lead not added']);
    }
}
