<?php
session_start();
include_once 'G:/server/htdocs/project/dbconfig.php';
if(!isset($_SESSION['admin'])){
	header('location: ./admin_login.php');
}

?>
<html>
<title>All Users</title>
<head>
<?php include_once 'G:/server/htdocs/project/link.php'?>
</head>

<body>
<!--HEADER NAV BAR --->
<div class="w3-card-4">
<ul class="topnav">
  <li><a href="#">HB|TEAM</a></li>
  <li><a href="./welcome.php" class="w3-bar-item w3-button"><i class="fa fa-home"></i> Home</a></li>
  <li><a href="./See_User.php" class="w3-bar-item w3-red"><i class="fa fa-id-card-o"></i> See Users</a></li>
  <li><a href="./user_permission.php" class="w3-bar-item w3-button"><i class="fa fa-shield"></i> Users Access</a></li>
  <li><a href="./acc/accounts.php" class="w3-bar-item w3-button"><i class="w3-green fa fa-money"></i> Finance</a></li>
  <li><a href="./admin_logout.php" class="w3-bar-item w3-button"><i class="fa fa-sign-in"></i> Logout</a></li>
  <li class="right" ><a href="./welcome.php" class="w3-bar-item w3-button w3-blue"><i class="fa fa-user-circle-o"></i> <?php echo $_SESSION['admin']; ?></a></li>
</ul>
</div>

<h1 class="w3-container">Welcome Back <?php echo $_SESSION['admin'];?></h1>
<!--USERS DATA-->
<?php
$sql ="SELECT Name,username FROM login";
$no=mysqli_query($con,"SELECT * FROM login");
$nod=mysqli_num_rows($no);

if($result=mysqli_query($con,$sql)){
	if(mysqli_num_rows($result)>0){
		echo "<div class='w3-center w3-container w3-green'>";
		echo "<h3>Total: ".$nod." Users(s) Founds</h3>";
		echo "</div>";
		echo "<br>";
		echo "<div class='w3-container'>";
		echo "<table  class='w3-card w3-table-all w3-striped'>";
		   echo "<tr>";
				echo "<th>Name</th>";
				echo "<th>Username</th>";
			echo "</tr>";
			
			while($row=mysqli_fetch_array($result)){
			
			echo "<tr class='w3-center w3-hover-blue'>";
				echo "<td>".$row["Name"]."</td>";
				echo "<td>".$row["username"]."</td>";
			}
		echo "</table>";
		 mysqli_free_result($result);
		echo "</div>";
	}
	else{
		echo "ERROR NO RECORDS FOUND";
	}
}
mysqli_close($con)

?>

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