<?php

$rating_dbname= "babbysitter";


$servername="localhost";

$username="dilip12";

$passwd="dannyLUCK";

$connect=mysqli_connect($servername,$username,$passwd);

if(!$connect)
	 die ("connect error".mysqli_error());

   $conn= mysqli_select_db($connect,$rating_dbname);
	


?>