<!DOCTYPE html>
<?php

$mail_to = "rusacov91@gmail.com"; // Email куда будет отправлено письмо
$email_from = "info@vozduh.ru"; // Указываем от кого будет отправлено письмо, email, reply to
$name_from = "Клиент"; // Указываем от кого будет отправлено письмо, имя
$subject = "Сообщение с сайта!"; // Тема письма

$message = "Cообщение с сайта 'Vozduh.lv': \n" . 
            "\n" .
           "Имя отправителя: " . trim($_POST['name']) . "\n" . 
           "\n" .
           "Телефон отправителя: " . trim($_POST['phone']) . "\n" . 
           "\n" .
           "Почта отправителя: " . trim($_POST['email']) . "\n";


$subject = "=?utf-8?B?" . base64_encode($subject) . "?=";

$headers = "MIME-Version: 1.0" . PHP_EOL .
    "Content-Type: text/html; charset=utf-8" . PHP_EOL .
    "From: " . "=?utf-8?B?" . base64_encode($name_from) . "?=" . "<" . $email_from . ">" .  PHP_EOL .
    "Reply-To: " . $email_from . PHP_EOL;

$mailResult = mail($mail_to, $subject, $message, $headers);

if ($mailResult) {
    header('location: index.html');
} else {
    echo "Ошибка отправки письма.";
}

?>