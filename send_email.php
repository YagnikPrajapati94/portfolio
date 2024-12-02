<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './phpmailer/src/Exception.php';
require './phpmailer/src/PHPMailer.php';
require './phpmailer/src/SMTP.php';

if(isset($_POST["email"])) {
    $email = $_POST["email"];
    $subject = "Payment Successful";
    $message = "Your payment   has been successfully processed.";

    $mail = new PHPMailer(true);
    
    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'prajapatiyagnik821@gmail.com'; // Enter your Gmail email address
        $mail->Password = 'fstovkslzlxahysu'; // Enter your Gmail password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        //Recipients
        $mail->setFrom('prajapatiyagnik821@gmail.com', 'Digital Hub');
        $mail->addAddress($email); // Add recipient email

        //Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;

        $mail->send();
        echo "<script>alert('Email sent successfully.');</script>";
    } catch (Exception $e) {
        echo "<script>alert('Error sending email: " . $mail->ErrorInfo . "');</script>";
    }
}
?>
