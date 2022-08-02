<?php
session_start();
include_once 'G:/server/htdocs/project/dbconfig.php';
if(!isset($_SESSION['admin'])){
	header('location: ./admin_login.php');
}
if (isset($_GET['submit'])){
		$usr=$_GET['username'];
		$per=$_GET['per'];
		$ret=mysqli_query($con,"UPDATE login SET Permission = '$per' WHERE username='$usr'");
	}
?>
<html>
<head>
<?php include_once 'G:/server/htdocs/project/link.php'?>
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>

<!--HEADER NAV BAR --->
<div class="w3-card-4">
<ul class="topnav">
  <li><a href="#">HB|TEAM</a></li>
  <li><a href="./welcome.php" class="w3-bar-item w3-button "><i class="fa fa-home"></i> Home</a></li>
  <li><a href="./See_User.php" class="w3-bar-item"><i class="fa fa-id-card-o"></i> See Users</a></li>
  <li><a href="./user_permission.php" class="w3-bar-item w3-button w3-red"><i class="fa fa-shield"></i> Users Access</a></li>
  <li><a href="./acc/accounts.php" class="w3-bar-item w3-button"><i class="w3-green fa fa-money"></i> Finance</a></li>
  <li><a href="./admin_logout.php" class="w3-bar-item w3-button"><i class="fa fa-sign-in"></i> Logout</a></li>
  
  <li class="right" ><a href="./welcome.php" class="w3-bar-item w3-button w3-blue"><i class="fa fa-user-circle-o"></i> <?php echo $_SESSION['admin']; ?></a></li>
</ul>
</div>
<!--USERS PERMISSIONS-->
<div class="w3-center" style="height:auto;width: 400px;margin-top: 20px;margin-left:auto;margin-right:auto;">
<form class="w3-container" method="GET" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
<label>Username</label>
<input class="w3-input w3-round" name="username" type="text" required><br>

<label for="Permission">Permissions</label><br>
  <select id="permission" name="per">
	<option value="VIEW">VIEW</option>
    <option value="EDIT">EDIT</option>
    <option value="DELETE">DELETE</option>
    <option value="E D">EDIT & DELETE</option>
  </select>
<br>
<br>
<button class="w3-button w3-blue w3-round" name="submit" value="submit">SUBMIT</button>
</form>
</div>
<!--USERS DATA-->
<?php
$sql ="SELECT Name,username,Permission FROM login";
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
				echo "<th>Permissions</th>";
			echo "</tr>";
			
			while($row=mysqli_fetch_array($result)){
			
			echo "<tr class='w3-center w3-hover-blue'>";
				echo "<td>".$row["Name"]."</td>";
				echo "<td>".$row["username"]."</td>";
				if($row["Permission"]== 'EDIT'){
				echo "<td><p class='badge w3-green'>".$row["Permission"]."</p></td>";
				}
				if($row["Permission"]== 'NULL'){
				echo "<td><p class='badge'>".$row["Permission"]."</p></td>";
				}
				if($row["Permission"]== 'VIEW'){
				echo "<td><p class='badge w3-indigo'>".$row["Permission"]."</p></td>";
				}
				if($row["Permission"]== 'DELETE'){
				echo "<td><p class='badge w3-red'>".$row["Permission"]."</p></td>";
				}
				if($row["Permission"]== 'E D'){
				echo "<td><p class='badge w3-Orange'>".$row["Permission"]."</p></td>";
				}
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
.foot{
			padding: 10px 10px;
			background-color:#001f60;
			color:White;
			margin-top: 90px;
			margin-left: -10px;
			margin-right: -10px;
			margin-bottom: -10px;
			height:auto;
		}
		.center{
			text-align:center;
		}
</style>
<hr>
<div class="foot center">
		<p>This Website Design and Developed By Vivek Singh.</p>
		<p><a href="mailto:imvks786@gmail.com" style="color:white">Contact Developer</a></p>
		<span>Vivek Singh &copy; 2021</span>
		
	</div>
</body>
</html>