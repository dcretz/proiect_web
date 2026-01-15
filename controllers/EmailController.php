<?php
require_once __DIR__ . '/../core/functions.php';

class EmailController
{
    public static function sendNotification()
    {
        requireLogin();

        $to = $_POST['email'] ?? '';
        $subject = $_POST['subject'] ?? '';
        $message = $_POST['message'] ?? '';

        if (!$to || !$subject || !$message) {
            $_SESSION['error'] = "Completați toate câmpurile!";
            header("Location: index.php?page=send_email_form");
            exit;
        }

        $headers = "From: no-reply@concursuri-sportive.ro\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        if (mail($to, $subject, $message, $headers)) {
            $_SESSION['success'] = "Email trimis cu succes!";
        } else {
            $_SESSION['error'] = "Eroare la trimiterea emailului!";
        }

        header("Location: index.php?page=send_email_form");
        exit;
    }
}
