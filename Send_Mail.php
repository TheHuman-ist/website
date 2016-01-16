<?php
function Send_Mail($to,$msg,$body)
{
	require 'class.phpmailer.php';
	$from = "info@shopinfo.co.in";
	$mail =new PHPMailer();
	$mail->IsSMTP(true);
	$mail=>SMTPAuth =true;
	$mail->Host = "tls://smtp.shopinfo.co.in";
	$mail->Port =465;
	$mail->Username = "info@shopinfo.co.in";
	$mail->Password ="danny!@#$%";
	$mail->SetFrom($from,'shopinfo');
	$mail->AddReplyTo($from,'shopinfo');
	$mail->Subject =$subject;
	$mail->MsgHTML($body);
	$address=$to;
	$mail->AddAddress($address,$to);
	$mail->Send();
	if($mail->Send())
		echo "i sended one mail";
	else
		echo "unable to send";
	
}
?>