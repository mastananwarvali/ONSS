<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Include the Composer autoloader
require __DIR__ . "/vendor/autoload.php";

$mail = new PHPMailer(true); // true enables exceptions

// Enable debugging if needed
// $mail->SMTPDebug = SMTP::DEBUG_SERVER;

$mail->isSMTP();
$mail->SMTPAuth = true;

// Update these values with your SMTP server details
$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // or PHPMailer::ENCRYPTION_SMTPS
$mail->Port = 587; // or 465 for SSL
$mail->Username = "ankam4222@gmail.com";
$mail->Password = "vgsyupfyeduolews"; // Corrected the missing double quote

$mail->isHtml(true);

return $mail;
?>
