<?php
session_start();

$message="";


if(count($_POST) > 0)
{
    
	require 'db-connect.php';
	$query = mysqli_query($conn,"SELECT * FROM `user` WHERE `email` = '".$_POST['email']."' AND `password` = '".$_POST['password']."' ");
    $query_f = mysqli_query($conn,"SELECT * FROM `member` WHERE `email` = '".$_POST['email']."' AND `password` = '".$_POST['password']."' ");
    $row_query = mysqli_num_rows($query);
	

	
	$row_query_f = mysqli_num_rows($query_f);
	if($row_query == 0 && $row_query_f == 0)
	{
		
		echo "sorry invalid email or password . go back <a href=\"index.html\">click me</a>";
		
	}
	
	
	 $row = mysqli_fetch_array($query);
	 $row_o =mysqli_fetch_array($query_f);
	 
	 if(is_array($row)||is_array($row_o))
	 {
		 
		 $_SESSION['member-id']=$row_o['user-id'];
		 
		 $_SESSION['user-id']=$row['user-id'];
		 
		 $_SESSION['member-name'] =$row_o['name'];
		 
		 $_SESSION['user-name'] =$row['name'];
		
		 
	 }
	 else
	 {
		 $msg = "invalid email and password";
	 }
  
  
}   

if((isset($_SESSION['user-id']) && ($row_query > 0) )&&(isset($_SESSION['member-id']) && ($row_query_f > 0)  ) )
{
	
	
	header('Location: profile.php');
		
}
else if(isset($_SESSION['member-id']) && ($row_query_f > 0) )
{
	
	
	header('Location: profile.php');
	
}
else  if(isset($_SESSION['user-id']) && ($row_query > 0) )
{
	
	
	
	header("Location: home.php?user-id=".$_SESSION['user-id']."");
	
}




?>