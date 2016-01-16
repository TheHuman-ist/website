<?php

$target_dir ="uploaded_file/";

$target_file = $target_dir.basename($_FILES["file"]["name"]);

$uploadok =1;


$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

if(isset($_POST['submit']))
{
	
	
	$check = getimagesize($_FILES["file"]["tmp_name"]);
	if($check == FALSE)
	{
	
		$uploadok =0;
		echo "<h2>file is not an image .</h2><br>  ";
		
	}

}
  if(file_exists($target_file))
   {
	$uploadok =0;
	echo "<h2>Sorry,image  already exists.</h2><br> ";
    
	}
if($_FILES["file"]["size"] > 500000 )
{
	$uploadok =0;
	echo "<h2>sorry, your file is to large .</h2><br>  ";
     
	}
	
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" )
    {
	$uploadok = 0;
	echo "<h2>sorry ,only jpg ,gif,jpeg  and png are allowed </h2> <br>";
    
	}

	if($uploadok == 0)
	{
		echo "<h2>your image is not uploaded go back <a href=\"home.php\">click me</a></h2></br> ";
	}
	else
	{
		if(move_uploaded_file($_FILES["file"]["tmp_name"],$target_file))
		{
		
			$imge =$_FILES["file"]["name"];
			require 'db-connect.php';
			mysqli_query($conn,"UPDATE  `user` SET `image`='".$_FILES["file"]["name"]."' WHERE `user-id`=".$_POST['id']."");
			
			header("Location: home.php?id=$imge");
			/*
			echo "<h2>the file basename".($_FILES["file"]["name"]). "has been uploaded to user id ".$_POST['id']." go back <a href=\"home.php\">click me</a></h2><br> ";
		   */
		}
		else
		{
			echo "error during uploading go back <a href=\"home.php\">click me</a> ";
		}
	}
	
	
?>