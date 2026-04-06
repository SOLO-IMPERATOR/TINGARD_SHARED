<?require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");

$data = [];

foreach ($_POST as $key => $val) {
    $data[$key] = $val;
}

$arEventFields = array(
    "ID"                  => 36,
    "MESSAGE"             => $data["data_form"]["TITLE"] . "<br>" . $data["data_form"]["COMMENTS"],
    "EMAIL_TO"            => $data["data_widget"]["EMAIL_WIDGET"],
    "NAME"                => $data["data_form"]["TITLE"],
);

$result = CEvent::Send('WIDGET_SEND', 's2', $arEventFields);

print_r($result);
