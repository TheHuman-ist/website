<?php
include 'db-connect.php';
/*
function random_password()
 {
	 $alphabet ="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&()";
	 $key =array();
	 $alphalength = strlen($alphabet)-1;
	 for($i=0;$i<8;$i++)
     {
		 $n =rand(0,$alphalength);
		 $key[] =$alphabet[$n];
	 }		 
	 return implode($key);
 }
 */
if(!empty($_POST['name']) && isset($_POST['name']) && !empty($_POST['email']) && isset($_POST['email']) && !empty($_POST['password']) && isset($_POST['password']) )
{
	$name = $_POST['name'];
   echo $name;
	
	$email =$_POST['email'];
	echo $email;
	$password =$_POST['password'];
	echo $password;
}
 
 
$password=md5($password);
$activation =md5($email.time());

$query = mysqli_query($conn,"SELECT user-id FROM user WHERE email='$email'");

if(mysqli_num_rows($query)< 1)
{
	mysqli_query($conn,"INSERT INTO user(name,email,password,activation) VALUES('$name','$email','$password','$activation')");
    echo "ok";
	$to=$email;
	$subject ="Email Verification";
	/*
	$body ='hi,<br>we need to make sure you are human.<br><a href="'.$base_url.'activation/'.$activation.'">'.$base_url.'activation/'.$activation.'</a>';
	*/
	$from ="info@shopinfo.co.in";
	$msg ='Registration succesful,please activate email.';
	
 
require("/home/dalip/public_html/phpmailer/PHPMailer_5.2.0/class.phpmailer.php");

$mail = new PHPMailer();

$mail->IsSMTP();                                      // set mailer to use SMTP
$mail->Host = "localhost";  // specify main and backup server
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->Username = "info@shopinfo.co.in";  // SMTP username
$mail->Password = "danny!@#$%"; // SMTP password

$mail->From = "info@shopinfo.co.in";
$mail->FromName = "shopinfo";
$mail->AddAddress($email, "dalip ");
                 


$mail->WordWrap = 50;                                 // set word wrap to 50 characters
 // optional name
$mail->IsHTML(true);                                  // set email format to HTML

$mail->Subject = "Here is the subject";
$mail->Body    = "click me";
$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

if(!$mail->Send())
{
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}

echo "Message has been sent";

	
	
	}
else
{
	$msg="this email is already taken ,please try new .";
}


?>