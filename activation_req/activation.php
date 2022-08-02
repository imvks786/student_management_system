<?php
session_start();
include_once 'G:/server/htdocs/project/dbconfig.php';
if (isset($_GET['submit'])){
	unset($_SESSION['username']);
	unset($_SESSION['per']);
	header('location: /project/index.php');
}
if(!isset($_SESSION['username'])){
	header('location: /project/index.php');
}
if(isset($_SESSION['per'])!=='NULL'){
	header('location: /project/index.php');
}

?>
<!DOCTYPE html>
<head>
	<title>Account Activation Required</title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<?php $nam=$_SESSION['username'];?>
</head>
<body>
<div class="w3-center w3-container" style="margin-top: 100px;">
	<i class="material-icons" style="font-size:50px;color:red">warning</i>
	<h1>Account Activation Required</h1>
	<h3>Dear,<b><?php echo $nam;?></b> your account's services not started yet.</h3>
	<h4>This process take a while or contact the web Administartor.</h4>
	<form method="GET">
	<button class="w3-button w3-blue w3-round" name="submit" value="submit">Logout</button><br>
	</form>
	<p style="color:gray; margin-top: 100px;">&copy; HB|Team 2020-2021</p>
</div>
<script>
document.addEventListener('contextmenu', event => event.preventDefault());
</script>
<style>
h1,h2,h3,p,h4,label,li,th,td,tr {font-family: 'Poppins', sans-serif;}
a {text-decoration: none;}
</style>

</body>
</html>
