<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

$mail = new PHPMailer(true);

try {

    $mail->isSMTP();
    $mail->Host = 'smtp.ionos.co.uk'; 
    $mail->SMTPAuth = true;
    $mail->Username = 'system@mypositiveprogress.co.uk'; 
    $mail->Password = 'SystemPing123.'; 
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('system@mypositiveprogress.co.uk', 'Mailer');

    $mail->isHTML(true);
    $mail->addAddress('Safeguarding@positive-progress.co.uk');
    $mail->Subject = 'You have a new incident upload';
    $mail->Body = 'This is an email sent by the MyPositiveProgress system to inform you there has been an incident reported on the system. ';

    $mail->send();
    echo 'Email has been sent successfully!';
} catch (Exception $e) {
    echo 'Email could not be sent. Error: ', $mail->ErrorInfo;
}