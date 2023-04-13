<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';
require 'path/to/PHPMailer/src/Exception.php';



function sendEmail($to, $subject, $message){

    // Sanitize the recipient email address
    $to = filter_var($to, FILTER_SANITIZE_EMAIL);

    // Validate the recipient email address
    if (!filter_var($to, FILTER_VALIDATE_EMAIL)) {
        // Return an error or throw an exception as appropriate
        return false;
    }

    $mail = new PHPMailer(true); // Enable exceptions

    try {
        // Enable SMTP debugging (0 = off, 1 = client messages, 2 = client and server messages)
        $mail->SMTPDebug = 0;

        // Set the mailer to use SMTP
        $mail->isSMTP();

        // SMTP server settings
        $mail->Host = 'smtp.gmail.com'; // Change this to your SMTP server
        $mail->Port = 587; // Change this to the appropriate port for your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'your-email@example.com'; // Change this to your email address
        $mail->Password = 'your-email-password'; // Change this to your email password
        $mail->SMTPSecure = 'tls';

        // Sender and recipient email addresses
        $mail->setFrom('sender@example.com', 'Sender Name'); // Change this to the email and name of the sender
        $mail->addAddress($to); // Change this to the email address of the recipient

        // Email subject and body
        $mail->Subject = $subject;
        $mail->Body = $message;

        // Send the email    
        $mail->send();
        return true;
        
    } catch (Exception $e) {
        // Log the error or take other appropriate action
        error_log('Failed to send email: ' . $mail->ErrorInfo);
        return false;
    }







}