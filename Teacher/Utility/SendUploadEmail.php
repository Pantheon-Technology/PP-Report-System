<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Path to autoload.php of PHPMailer

// Create a PHPMailer instance
$mail = new PHPMailer(true);

try {
    // SMTP configuration
    $mail->isSMTP();
    $mail->Host = 'smtp.ionos.co.uk'; // Your SMTP server address
    $mail->SMTPAuth = true;
    $mail->Username = 'system@mypositiveprogress.co.uk'; // Your email address
    $mail->Password = 'SystemPing123.'; // Your email password or App Password
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('system@mypositiveprogress.co.uk', 'Mailer');

    $mail->addAddress($_SESSION["emailForUpload"]);

    
    // Email content
    $mail->isHTML(true);
    $mail->Subject = 'You have been set new work by positive progress';
    $mail->Body = 'This is an email sent by the MyPositiveProgress system to inform you there has been work uploaded for you.';

    // Send email
    $mail->send();
    echo 'Email has been sent successfully!';
} catch (Exception $e) {
    echo 'Email could not be sent. Error: ', $mail->ErrorInfo;
}