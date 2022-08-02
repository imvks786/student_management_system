<?php
session_start();
if(!isset($_SESSION['username'])){
	header('location: index.php');
}
unset($_SESSION['username']);
unset($_SESSION['per']);
?>
<html>
<title>Logout</title>
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="my.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>
<div class="w3-center" style="height: 300px;width: 320px;margin-top: 90px;margin-left:auto;margin-right:auto;">
<p><i class="w3-jumbo w3-spin fa fa-refresh"></i></p>
<p>Web page redirects after 5 seconds.</p>
</div>
      <script>
         setTimeout(function(){
            window.location.href = './index.php';
         }, 3000);
      </script>
</body>
</html>