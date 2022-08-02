<?php
session_start();
include_once './dbconfig.php';
if(!isset($_SESSION['fusr'])){
	header('location: forgot.php');
}
session_destroy();
?>
<html>
<title>Success!</title>
<?php include_once './link.php'?>
<body>
<div class="w3-center">
<h2>Your Password Changed Successfully !</h2>
<img src='https://i.pinimg.com/originals/7b/dd/1b/7bdd1bc7db7fd48025d4e39a0e2f0fd8.jpg' style="width:70px;height:70px;"></img>
</div>
      <script>
         setTimeout(function(){
			window.close();
         }, 5000);
      </script>
</body>
</html>