<?php
require_once __DIR__ . '/../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__, '/../.env');
$dotenv->load();

function sendMail($to, $subject, $body) {
    $mail = new PHPMailer(true);

    $SMTP_HOST = $_ENV['SMTP_HOST'];
    $SMTP_USER = $_ENV['SMTP_USER'];
    $SMTP_PASS = $_ENV['SMTP_PASS'];
    $SMTP_PORT = $_ENV['SMTP_PORT'];
    $FROM_EMAIL = $_ENV['FROM_EMAIL'];
    $FROM_NAME = $_ENV['FROM_NAME'];

    try {
        // SMTP設定
        $mail->isSMTP();
        $mail->Host = $SMTP_HOST;
        $mail->SMTPAuth = true;
        $mail->Username = $SMTP_USER;
        $mail->Password = $SMTP_PASS;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = $SMTP_PORT;

        // 送信元と送信先
        $mail->CharSet = 'UTF-8';
        $mail->setFrom($FROM_EMAIL, mb_encode_mimeheader($FROM_NAME, 'UTF-8'));
        $mail->addAddress($to);

        // メール内容
        $mail->Subject = $subject;
        $mail->Body = $body;

        $mail->send();
        return true;
    } catch (Exception $e) {
        error_log("Mailer Error: {$mail->ErrorInfo}");
        return false;
    }
}
