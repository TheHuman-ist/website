<?php
require("/home/dalip/public_html/phpmailer/PHPMailer_5.2.0/class.phpmailer.php");

$mail = new PHPMailer();

$mail->IsSMTP();                                      // set mailer to use SMTP
$mail->Host = "localhost";  // specify main and backup server
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->Username = "info@shopinfo.co.in";  // SMTP username
$mail->Password = "danny!@#$%"; // SMTP password

$mail->From = "info@shopinfo.co.in";
$mail->FromName = "Mailer";
$mail->AddAddress("dalipkumar703@gmail.com", "dalip Adams");
$mail->AddAddress("dalippublic@gmail.com");                  // name is optional


$mail->WordWrap = 50;                                 // set word wrap to 50 characters
 // optional name
$mail->IsHTML(true);                                  // set email format to HTML

$mail->Subject = "Here is the subject";
$mail->Body    = "This is the HTML message body <b>in bold!</b>";
$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

if(!$mail->Send())
{
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}

echo "Message has been sent";
?>