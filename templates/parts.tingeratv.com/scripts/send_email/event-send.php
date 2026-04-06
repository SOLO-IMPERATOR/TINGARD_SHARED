<?require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");

$data = "";

foreach ($_POST as $val) {
    $data .= "<p>" . $val . "</p>";
}

$res = CEvent::Send('FEED_FORM', 's2', array("DATA" => $data), "Y");

print_r($res);
