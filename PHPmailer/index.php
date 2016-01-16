<?php
include 'db-connect.php';
if(!empty($_POST['name']) && isset($_POST['name']) && !empty($_POST['email']) && isset($_POST['email']) && !empty($_POST['password']) && isset($_POST['password']) )
{
	$name = $_POST['name'];
	
	$email =$_POST['email'];
	
	$password =$_POST['password'];
	
}

$password=md5($password);
$activation =md5($email.time());

$query = mysqli_query($conn,"SELECT user-id FROM user WHERE email='$email'");

if(mysqli_num_rows($query)< 1)
{
	mysqli_query($conn,"INSERT INTO user(name,email,password,activation) VALUES('$name','$email','$password','$activation')");
    
	$to=$email;
	$subject ="Email Verification";
	$body ='hi,<br>we need to make sure you are human.<br><a href="'.$base_url.'activation/'.$activation.'">'.$base_url.'activation/'.$activation.'</a>';
	$from ="info@shopinfo.co.in";
	$msg ='Registration succesful,please activate email.';
	
 
	 require 'PHPMailer_5.2.0/class.phpmailer.php';
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
	$mail->AddAddress("dalipkumar703@gmail.com");
	$mail->Send();
if(!$mail->Send())
		echo "no mail sent";
	else
		echo "one  send";
	
	
	
	}
else
{
	$msg="this email is already taken ,please try new .";
}


?>