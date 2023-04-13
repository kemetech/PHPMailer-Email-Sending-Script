<?php
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;
// use PHPMailer\PHPMailer\SMTP;


require 'mail.php';
// require 'vendor/PHPMailer/PHPMailer/src/SMTP.php';
// require 'vendor/PHPMailer/PHPMailer/src/Exception.php';
// require 'vendor/PHPMailer/PHPMailer/src/PHPMailer.php';

try {
    $to = 'dr.moatazelsayed@gmail.com'; // Change this to the recipient email address
    $subject = 'Test email'; // Change this to the email subject
    $message = 'This is a test email sent using PHPMailer'; // Change this to the email message

    $result = sendEmail($to, $subject, $message); // Call the sendEmail() function

    if ($result) {
        echo 'Email sent successfully';
    } else {
        echo 'Failed to send email';
    }
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}