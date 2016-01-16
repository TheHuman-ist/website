<?php


require 'db-connect.php';

if(isset($_GET['user-id']) && !empty($_GET['user-id']))
{
	
	$query =mysqli_query($conn,"SELECT * FROM `user` WHERE `user-id`=".$_GET['user-id']."");	
	
	
  
  $row = mysqli_fetch_array($query);

   if($row["image"] == "000")
   {
	$img ='upload.png';
	$folder ='img';
   }
else
  {
	$img = $row["image"];
	$folder ='uploaded_file';
  }
  
} 

if(isset($_GET['id']) && !empty($_GET['id']))
{
	$img = $_GET['id'];
	$folder ='uploaded_file';
}



?>
<html>
<head>
<meta charset="utf-8"></meta>
<link rel="stylesheet" href="css/style.css">
   <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <!-- Optional Bootstrap theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
</head>
<body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<div class="main">
	<!logo box>
	<div class="col-md-12" id="logo">
	<div class="col-md-10">
	<img id="one" src="#" alt="logo" ></img>
	</div>
	<div class="col-md-2"  id="profile-photo">
	<img src="<?php echo $folder; ?>/<?php echo $img; ?>" class="img-circle" alt="user" width="65" height="40" >
	<a href="logout.php">logout</a>
	
	</div>
	</div>
	
	<!menu button>
	<div class="col-md-12" id ="menu-button">
  <div class="col-md-3">
    <button type="button" class="buttons" id="button-1">HOME&nbsp;<span class="glyphicon glyphicon-home"></span></button>
  </div>
  
  
  <div class="col-md-3">
    <button type="button" class="buttons" id="button-2">POST JOB&nbsp;<span class="glyphicon glyphicon-briefcase"></span></button>
  </div>
  
  
 
  <div class="col-md-3">
    <button type="button" class="buttons" id="button-3">SEARCH&nbsp;<span class="glyphicon glyphicon-search"></span></button>
  </div>
  <div class="col-md-3">
    <button type="button" class="buttons" id="button-4">MESSAGE&nbsp;<span class="glyphicon glyphicon-envelope"></span></button>
  </div>
  
  </div>
  <div class="col-md-12" id="">
  <div class="col-md-4" >
  <div class="panel panel-primary" id="home-box-1" >
  <div class="panel-heading">PROFILE</div>
  <div class="panel-body">
  <div class="col-md-12">
  <div class="col-md-6">
  <img src="<?php echo $folder; ?>/<?php echo $img; ?>" alt="profile" width="60"  height="50">
  <form method="post"  action="upload-image.php" enctype="multipart/form-data">
  <input type="file" name="file" ><br>
  <input type="submit" name="submit" value="upload image" >
  <input type="hidden" name="id" value="<?php echo $_GET['user-id'] ; ?>" >
 
  
  </form>
  </div>
  <div class="col-md-6">
   
  
  </div>
  
  
  </div>
  
  </div>
</div>
</div>
   
  <div class="col-md-4">
  <div class="panel panel-primary" id="home-box-2">
  <div class="panel-heading">HISTORY</div>
  <div class="panel-body">Panel Content</div>
</div>
</div>
   <div class="col-md-4">
  <div class="panel panel-primary" id="home-box-3">
  <div class="panel-heading">BOOKMARKS</div>
  <div class="panel-body">Panel Content</div>
</div>
</div>

	</div>
	<div class="col-md-12" id="footer">
	
	</div>
  </div>
  
  </body>
  
  </html>




