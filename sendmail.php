<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exeption;

require 'phpmailer/src/Exeption.php';
require 'phpmailer/src/PHPMailer.php';

$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
$mail->setLanguage('ru', 'phpmailer/language/');
$mail->isHTML(true);

//from whom
$mail->setFrom('MrGoncharoff@yandex.ru');
//to whom {
$mail->addAddress('oleg_goncharov@inbox.ru');
//thema
$mail->Subject = 'Письмо с сайта';


//Body letter Korper vom Brief
$body = '<h1>Встречайте письмо!</h1>';

if (trim(!empty($_POST['name']))) {
    $body .= '<p><strong>Имя:</strong> ' . $_POST['name'] . '</p>';
}
if (trim(!empty($_POST['email']))) {
    $body .= '<p><strong>E-mail:</strong> ' . $_POST['email'] . '</p>';
}
if (trim(!empty($_POST['message']))) {
    $body .= '<p><strong>Сообщение:</strong> ' . $_POST['message'] . '</p>';
}

//Send

if (!$mail->send()) {
    $message = 'Ошибка';
} else {
    $message = 'Ваше сообщение отправлено!';
}

$response = ['message' => $message];

header('Content-type: application/json');
echo json_encode($response);
