<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "../PHPMailer/src/Exception.php";
require "../PHPMailer/src/PHPMailer.php";
require "../PHPMailer/src/SMTP.php";

if (!isset($_POST['email'])) {
    die('All fields are required');
} else {
    $from_email = addslashes($_POST['email']);

    function sendEmail($from_email)
    {
        $subject = "New Subscription Alert";
        $message = "A new user has subscribed to Power Protection Services Limited.";
        $receiver = "nafiumohammed370@gmail.com";

        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->SMTPDebug = 0;
            $mail->Mailer = "smtp";
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 465;
            $mail->SMTPAuth = true;
            $mail->Username = "mssnproject2022@gmail.com";
            $mail->Password = "ynryljbwhmdawnnm";
            $mail->SMTPSecure = 'ssl';

            $mail->setFrom("powerprotectionservicelimited@gmail.com", "Power Protection Services");
            $mail->addAddress($receiver);

            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = "
                <html>
                <body style='font-family: Arial, sans-serif; color: #333;'>
                    <div style='max-width: 600px; margin: auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; background-color: #f9f9f9;'>
                        <h2 style='text-align: center; color: #0056b3;'>New Subscription</h2>
                        <p style='font-size: 16px; line-height: 1.6;'>
                            $message
                        </p>
                        <p style='font-size: 14px; color: #555;'>
                            <strong>Subscriber Email:</strong><br>
                            Email: <a href='mailto:$from_email'>$from_email</a>
                        </p>
                        <footer style='text-align: center; margin-top: 20px; font-size: 12px; color: #999;'>
                            <p>Developed by <a href='mailto:nafiumohammed370@gmail.com' style='color: #0056b3;'>nafiumohammed370@gmail.com</a></p>
                        </footer>
                    </div>
                </body>
                </html>";

            $mail->send();
            return true;
        } catch (Exception $exception) {
            return false;
        }
    }

    function sendThankYouEmail($from_email)
    {
        $subject = "Thank You for Subscribing!";
        $message = "Thank you for subscribing to Power Protection Services Limited. We’re excited to keep you updated!";

        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->SMTPDebug = 0;
            $mail->Mailer = "smtp";
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 465;
            $mail->SMTPAuth = true;
            $mail->Username = "mssnproject2022@gmail.com";
            $mail->Password = "ynryljbwhmdawnnm";
            $mail->SMTPSecure = 'ssl';

            $mail->setFrom("powerprotectionservicelimited@gmail.com", "Power Protection Services");
            $mail->addAddress($from_email);

            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = "
                <html>
                <body style='font-family: Arial, sans-serif; color: #333;'>
                    <div style='max-width: 600px; margin: auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; background-color: #f9f9f9;'>
                        <h2 style='text-align: center; color: #0056b3;'>Thank You for Subscribing!</h2>
                        <p style='font-size: 16px; line-height: 1.6;'>
                            $message
                        </p>
                        <p style='font-size: 14px; color: #555; text-align: center;'>
                            We appreciate your interest in our services and look forward to sharing our latest news and updates with you.
                        </p>
                        <p style='font-size: 14px; color: #555;'>
                            <strong>Our Contact</strong><br>
                            Email: <a href='mailto:powerprotectionservicelimited@gmail.com'>powerprotectionservicelimited@gmail.com</a><br>
                            Phone: <a href='tel:+23412345678'>+23412345678</a>
                        </p>
                        <footer style='text-align: center; margin-top: 20px; font-size: 12px; color: #999;'>
                            <p>Developed by <a href='mailto:nafiumohammed370@gmail.com' style='color: #0056b3;'>nafiumohammed370@gmail.com (+2348024426159)</a></p>
                        </footer>
                    </div>
                </body>
                </html>";

            $mail->send();
            return true;
        } catch (Exception $exception) {
            return false;
        }
    }

    if (sendEmail($from_email)) {
        sendThankYouEmail($from_email); 
        echo "OK";
    } else {
        die("Unable to send email");
    }
}
