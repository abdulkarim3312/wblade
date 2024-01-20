<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '/home/integras/public_html/public/new/PHPMailerTest/src/Exception.php';
require '/home/integras/public_html/public/new/PHPMailerTest/src/PHPMailer.php';
require '/home/integras/public_html/public/new/PHPMailerTest/src/SMTP.php';

// Instantiation and passing [ICODE]true[/ICODE] enables exceptions
$mail = new PHPMailer(true);

try {
 //Server settings
 $mail->SMTPDebug = 2; // Enable verbose debug output
 $mail->isSMTP(); // Set mailer to use SMTP
 $mail->Host = 'mail.integrashion.com'; // Specify main and backup SMTP servers
 $mail->SMTPAuth = true; // Enable SMTP authentication
 $mail->Username = 'test@integrashion.com'; // SMTP username
 $mail->Password = 'Testono@123'; // SMTP password
 $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, [ICODE]ssl[/ICODE] also accepted
 $mail->Port = 465; // TCP port to connect to

//Recipients
 $mail->setFrom('test@integrashion.com', 'Mailer');
 $mail->addAddress('onohosting24x7@gmail.com', 'Joe User'); // Add a recipient
 $mail->addAddress('onohosting24x7@gmail.com'); // Name is optional
 $mail->addReplyTo('test@integrashion.com', 'Information');
 $mail->addCC('test@integrashion.com');
 $mail->addBCC('test@integrashion.com');


// Content
 $mail->isHTML(true); // Set email format to HTML
 $mail->Subject = 'Here is the subject';
 $mail->Body = 'This is the HTML message body <b>in bold!</b>';
 $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

$mail->send();
 echo 'Message has been sent';

} catch (Exception $e) {
 echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}