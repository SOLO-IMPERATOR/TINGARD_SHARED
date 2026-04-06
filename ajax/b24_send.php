<?php

require 'b24_func.php';

$data = [];

foreach ($_POST as $key => $val) {
    if ($key !== 'title' && $key !== 'name' && $key !== 'phone' && $key !== 'email' && $key !== 'salesDirection' && $key !== 'type' && $key !== 'feedback') {
        $data['comments'] .= $val . '<br>';
    } else {
        $data[$key] = $val;
    }
}

print_r($data);

if ($data['feedback'] == 'feedback') {
    $answer = filter_var($_POST['feedbackData'], FILTER_SANITIZE_STRING);
    $today = date('m.d.Y G:i:s') . ' | Сайт: TINGERPLAST.RU | Ответ: ' . $_POST['popup-feedback-answer'] . ' | Комментарий: ' . $_POST['why1'] . $_POST['why2'] . $_POST['why3'] . $_POST['why4'] . PHP_EOL;
    $fh = fopen('feedback-answer-tingerplast.txt', 'r+') or die('Не удалось открыть файл');
    fseek($fh, 0, SEEK_END);
    fwrite($fh, $today) or die('Не удалось записать в файл');
    fclose($fh);

    if ($_POST['why3'] != '' || $_POST['why4'] != '') {
        $data['phone'] = $_POST['why3'] . $_POST['why4'];
        $data['title'] = 'Опрос при выходе с рекламной страницы ёмкостей (' . $_POST['popup-feedback-answer'] . ')';
        print_r(creationLead($data));
    }

} else {
    print_r(creationLead($data));
}