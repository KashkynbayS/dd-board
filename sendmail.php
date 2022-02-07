<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php'
    require 'PHPMailer/src/PHPMailer.php'

    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';
    $mail->setLanguage('ru', 'PHPMailer/language/');
    $mail->IsHTML(true);

    $mail->setFrom('info@fls.guru', 'DD Board');
    $mail->addAddress('87053811230s@gmail.com');
    $mail->Subject = 'Привет! Это DD Board';

    $body = '<h1>Встречайте супер письмо</h1>'

    if(trim(!empty($_POST[name]))){
        $body.='<p><strong>Имя:</strong> '.$_POST[name].'</p>';
    }
    if(trim(!empty($_POST[email]))){
        $body.='<p><strong>E-mail:</strong> '.$_POST[email].'</p>';
    }
    if(trim(!empty($_POST[subject]))){
        $body.='<p><strong>Предмет:</strong> '.$_POST[subject].'</p>';
    }
    if(trim(!empty($_POST[message]))){
        $body.='<p><strong>Сообщение:</strong> '.$_POST[message].'</p>';
    }

    if (!$mail->send()) {
        $message = 'Ошибка';
    } else {
        $message = 'Данные отправлены!'ж
    }

    $response = ['message' => $message];

    header('Content-type: application/json');
    echo json_encode($response);
?>