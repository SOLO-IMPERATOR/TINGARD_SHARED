<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/local/ajax/crest.php');

/* Проверка reCAPTCHA */

/* function verifyRecaptcha($recaptchaToken) {
    $recaptcha_url = "https://www.google.com/recaptcha/api/siteverify";
    $recaptchaSecret = '6Lel6XUqAAAAAK58g0xxgNEZ9GKsL_RCV-J3xihT';
    $recaptcha_response = $recaptchaToken;
    $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptchaSecret . '&response=' . $recaptcha_response);
    $recaptcha = json_decode($recaptcha);
    return $recaptcha->score >= 0.4 ? true : false;
}
 */
// Получаем токен из POST-запроса
/* $recaptchaToken = $_POST['token']; */

// Если токен не прошёл проверку, возвращаем ошибку
/* if (!$recaptchaToken || !verifyRecaptcha($recaptchaToken)) {
    echo json_encode(['message' => 'Ошибка: Проверка reCAPTCHA не пройдена.']);
    exit;
} */

/* функция отправки лида на email */
function sendLeadEmail($data) {
    $fromEmail = 'lid@tinger.ru';
    $toEmail = 'tinger35@yandex.ru';
    $subject = "Лид с сайта TINGARD.RU";
    $message = "<b>Форма:</b> " . $data['TITLE'] . "<br>\n";
    $message .= "<b>Имя:</b> " . $data['NAME'] . "<br>\n";

    if (isset($data['PHONE'][0]['VALUE'])) {
        $message .= "<b>Телефон:</b> " . $data['PHONE'][0]['VALUE'] . "<br>\n";
    }

    if (isset($data['EMAIL'][0]['VALUE'])) {
        $message .= "<b>Email:</b> " . $data['EMAIL'][0]['VALUE'] . "<br>\n";
    }

    if (isset($data['COMMENTS'])) {
        $message .= "<b>Сообщение:</b> <br>" . $data['COMMENTS'];
    }

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: ' . $fromEmail . "\r\n" .
                'Reply-To: ' . $fromEmail . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

    $success = mail($toEmail, $subject, $message, $headers);

    if ($success) {
        echo "Письмо успешно отправлено.";
    } else {
        echo "Ошибка при отправке письма.";
    }
}

/* функция поиска существующего контакта */
function findDuplicate($data) {
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

/* функция создания контакта */
function creationContact($data) {
    $dubl = findDuplicate($data);
    $contact = false;

    if (empty($dubl["result"]["CONTACT"])) {
        $result = CRest::call(
            "crm.contact.add",
            [
                "fields" => [
                    'UF_CRM_566E8F1A1E899' => 174,
                    'ASSIGNED_BY_ID' => isset($data['ASSIGNED_BY_ID']) && $data['ASSIGNED_BY_ID'] !== '' ? $data['ASSIGNED_BY_ID'] : 190,
                    'PHONE' =>  $data['PHONE'],
                    'EMAIL' => $data['EMAIL'],
                    'NAME' => $data['NAME'],
                ]
            ]
        );

        $contact = $result['result'];
    } else {
        if (count($dubl['result']['CONTACT']) > 1) {
            $contact = $dubl['result']['CONTACT'][0];
        } else {
            $contact = $dubl['result']['CONTACT'];
        }
    }

    return  $contact;
}

/* функция создания лида */
function createLead($data) {
    $resultLead = CRest::call(
        'crm.lead.add',
        [
            'fields' => $data
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

/* функция создания сделки */
function createDeal($data) {
    $data['CONTACT_ID'] = creationContact($data);
    $resultDeal = CRest::call(
        'crm.deal.add',
        [
            'fields' => $data
        ]
    );

    if (!empty($resultDeal['result'])) {
        echo json_encode(['message' => 'Deal add']);
        return $resultDeal['result'];
    } elseif (!empty($resultDeal['error_description'])) {
        echo json_encode(['message' => 'Deal not added: ' . $resultDeal['error_description']]);
    } else {
        echo json_encode(['message' => 'Deal not added']);
    }
}

/* присвоение значений для отправки в CRM */
$comment = "";
$entity = "";
$crmtitle = "";
$crmsaledirection = "";
$crmresponsible="";

foreach($_POST['formdataaaz'] as $value){
    if($value['name'] == 'name'){
        $data['NAME'] = $value['value'];
    }
    if($value['name'] == 'phone'){
        $data['PHONE'] = [['VALUE' => $value['value'], 'VALUE_TYPE' => 'WORK']];
    }
    if($value['name'] == 'email'){
        $data['EMAIL'] = [['VALUE' => $value['value'], 'VALUE_TYPE' => 'WORK']];
    } 
    if($value['name'] == 'comments'){
        $comment = $value['value'];
    }
    if($value['name'] == 'crm-entity'){
        $entity = $value['value'];
    } 
    if($value['name'] == 'crm-sale-direction'){
        $crmsaledirection = $value['value'];
    } 
    if($value['name'] == 'crm-responsible'){
        $crmresponsible = $value['value'];
    }
    if($value['name'] == 'crm-title'){
        $crmtitle = $value['value'];
    } 
}
if(strlen($comment) < 1){
    $comment = $_POST['comments'];
}
$data['TRACE'] = $_POST['trace'];
$data['UF_CRM_1736853511'] = $_POST['metrikaclientid']; //лид
$data['UF_CRM_1736853555'] = $_POST['metrikaclientid']; //сделка
$data['UF_CRM_1736853537'] = $_POST['metrikaclientid']; //контакт
$data['UF_CRM_1517561552'] = array_key_exists('roistat_visit', $_COOKIE) ? $_COOKIE['roistat_visit'] : 'nocookie';

if ($_POST['promo'] === 'true') {
    $data['COMMENTS'] = 'Есть промокод: ' . $utm['tags']['list']['utm_campaign'] . '<br>';
    $data['COMMENTS'] .= $comment;
    $data['UF_CRM_1699518130'] = $utm['tags']['list']['utm_campaign'];
} else {
    $data['COMMENTS'] = $comment;
}

/* сделка или лид */
switch ($entity) {
    case 'lead':
        $data['TITLE'] = isset($crmtitle) ? $crmtitle : 'Новый лид';
        $data['UF_CRM_1449663065'] = isset($crmsaledirection) && $crmsaledirection !== '' ? $crmsaledirection : 68;
        $data['ASSIGNED_BY_ID'] = isset($crmresponsible) && $crmresponsible !== '' ? $crmresponsible : 58;
        $data['SOURCE_ID'] = 9;
        sendLeadEmail($data);
        createLead($data);
        break;
    default:
        return;
}
?>
