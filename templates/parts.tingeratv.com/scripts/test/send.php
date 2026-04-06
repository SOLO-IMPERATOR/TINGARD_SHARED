<?php
    header('Access-Control-Allow-Origin: *');

    $to      = '333knyaz333@gmail.com';
    $subject = 'Test cron';
    $message = 'It`s Ok';
    $headers = 'From: webmaster@example.com' . "\r\n" .
        'Reply-To: webmaster@example.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    
    mail($to, $subject, $message, $headers);
?>