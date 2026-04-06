<?php 
    $answer = filter_var($_POST['feedbackData'], FILTER_SANITIZE_STRING);
    
    //$whyAnswer = filter_var($_POST['why1'] . $_POST['why2'] . $_POST['why3'] . $_POST['why4'] . $_POST['why7'], FILTER_SANITIZE_STRING);

    //if (isset($whyAnswer) && !empty($whyAnswer)) {
    //    $whyAnswer = ' | ' . $whyAnswer;
    //} else {
    //    $whyAnswer = '';
    //}

    $today = date('m.d.Y G:i:s') . ' | ' . $answer . PHP_EOL;
    $fh = fopen('feedback-answer-tinger.txt', 'r+') or die('Не удалось открыть файл');
    fseek($fh, 0, SEEK_END);
    fwrite($fh, $today) or die('Не удалось записать в файл');
    fclose($fh);
?>