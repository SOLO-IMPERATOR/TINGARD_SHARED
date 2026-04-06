<?php

require "b24_send.php";

$data = [];

foreach ($_POST as $key => $val) {
    $data[$key] = $val;
}

print_r(creationLead($data));