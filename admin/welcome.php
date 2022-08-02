<?php
session_start();
include_once 'G:/server/htdocs/project/dbconfig.php';
if(!isset($_SESSION['admin'])){
	header('location: ./admin_login.php');
}

?>
<html>
<head>
<?php include_once 'G:/server/htdocs/project/link.php'?>
</head>
<body>
<!--HEADER NAV BAR --->
<div class="w3-card-4">
<ul class="topnav">
  <li><a href="#">HB|TEAM</a></li>
  <li><a href="./welcome.php" class="w3-bar-item w3-button w3-red"><i class="fa fa-home"></i> Home</a></li>
  <li><a href="./See_User.php" class="w3-bar-item "><i class="fa fa-id-card-o"></i> See Users</a></li>
  <li><a href="./user_permission.php" class="w3-bar-item w3-button"><i class="fa fa-shield"></i> Users Access</a></li>
  <li><a href="./acc/accounts.php" class="w3-bar-item w3-button"><i class="w3-green fa fa-money"></i> Finance</a></li>
  <li><a href="./admin_logout.php" class="w3-bar-item w3-button"><i class="fa fa-sign-in"></i> Logout</a></li>
  
  <li class="right" ><a href="./welcome.php" class="w3-bar-item w3-button w3-blue"><i class="fa fa-user-circle-o"></i> <?php echo $_SESSION['admin']; ?></a></li>
</ul>
</div>
<div class="w3-container">
<h1>Welcome Back <?php echo $_SESSION['admin'];?></h1>





</div>
<style>
ul.topnav {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

ul.topnav li {float: left;}

ul.topnav li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

ul.topnav li a:hover:not(.active) {background-color: #111;}

ul.topnav li a.active {background-color: #4CAF50;}

ul.topnav li.right {float: right;}

@media screen and (max-width: 600px) {
  ul.topnav li.right, 
  ul.topnav li {float: none;}
}
</style>
</body>
</html>