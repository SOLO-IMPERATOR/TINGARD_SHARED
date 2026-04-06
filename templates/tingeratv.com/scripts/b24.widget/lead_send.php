<?php

$data = [];

foreach ($_POST as $key => $val) {
    $data[$key] = $val;
}

require "b24_send.php";

print_r(creationLead($data["data_form"]));