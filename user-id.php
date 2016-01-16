
<html>
<head>
</head>
<body>

<div id="fb-root"></div>
<script>

   
	
	
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.5&appId=1476157992692733";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php

require_once 'config.php';
require 'index.html';

$userId =$facebook->getUser();

$me =null;
if($userId)
{
$me =$facebook->api('/me');	
}
if($me['id'])
{
	echo 'user id is '."$me['id']".'<br>';
}
else
{
	echo 'user has not logged in yet.';
}

?>
<div class="fb-login-button" data-max-rows="1" data-scope="email" data-size="large" onlogin="Login();" data-show-faces="true" data-auto-logout-link="true"></div>
</body>
</html>