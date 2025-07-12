<?php

namespace App\Helpers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailHelper
{
  public static function sendEmail($to, $subject, $body)
  {
    $mail = new PHPMailer(true);

    try {
      //Server settings
      $mail->isSMTP();
      $mail->Host       = 'smtp.gmail.com'; // Ganti dengan SMTP server kamu
      $mail->SMTPAuth   = true;
      $mail->Username   = 'yoursender.email@gmail.com'; // Email pengirim
      $mail->Password   = 'vzispxgwueodkdbm'; // Gunakan App Password jika Gmail
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
      $mail->Port       = 465;

      //Recipients
      $mail->setFrom('yoursender.email@gmail.com', 'For a Smile');
      $mail->addAddress($to);

      //Content
      $mail->isHTML(true);
      $mail->Subject = $subject;
      $mail->Body    = $body;

      $mail->send();
      return true;
    } catch (Exception $e) {
      return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
  }
}
