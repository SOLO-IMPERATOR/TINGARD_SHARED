<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/local/templates/tinger/scripts/b24/crest.php');

/**
 * Создание лида
 * @param Array $data
 */
function creationLead($data)
{
    $fields = [
        'SOURCE_ID' => 'WEB',
        'ASSIGNED_BY_ID' => 58,
        'TITLE' => 'TINGER.RU | ' . $data['form'],
        'TAG' => 'TINGER.RU',
        'NAME' => $data['name'],
    ];

    if ($data['phone']) {
        $fields["PHONE"] = [["VALUE" => $data['phone'], "VALUE_TYPE" => "WORK"]];
    }

    if ($data['email']) {
        $fields["EMAIL"] = [["VALUE" => $data['email'], "VALUE_TYPE" => "WORK"]];
    }

    if ($data['comment']) {
        $fields["COMMENTS"] = $data['comment'];
    }

    $fields["UF_CRM_1449663065"] = ($data['direction']) ? $data['direction'] : 64;

    // var_dump($fields);

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
