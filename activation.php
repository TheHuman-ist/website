<?php
include 'db-connect.php';
$msg='';
if(!empty($_GET['code'])&& isset($_GET['code']))
{
	$code=mysqli_real_escape_string($conn,$_GET['code'])
	$c=mysqli_query($conn,"SELECT user-id FROM user WHERE activation='$code'");
	
	if(mysqli_num_rows($c)>0)
	{
		$count = mysqli_query($conn,"SELECT user-id FROM user WHERE activation='$code' AND status='0'");
	
	if(mysqli_num_rows($count)==1)
	{
		mysqli_query($conn,"UPDATE users SET status='1' WHERE activation='$code'");
	$msg ="Your account is activated";
	
	}
	else
	{
		$msg ="Your account is already activated";
	}
		
	}
	else
	{
		$msg="wrong activation code";
	}
}
?>
<?php echo $msg; ?>