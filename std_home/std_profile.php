<?php
session_start();
include_once 'G:/server/htdocs/project/dbconfig.php';
if(!isset($_SESSION['ID'])){
	header('location: std_login.php');
}
$sid=$_SESSION['ID'];
?>

<html>
<title>Profile</title>
<head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
</head>
<body>

<!--HEADER NAV BAR --->
<ul class="topnav">
	<li><a href="./std_profile.php" class="w3-bar-item w3-button"><i class="fa fa-user-circle-o"></i> <?php echo $_SESSION['std_name']; ?></a></li>
	<li class="right"><a href="./std_logout.php" class="w3-bar-item w3-button"><i class="fa fa-sign-in"></i> Logout</a></li>
</ul>

<div class="w3-container w3-center">
<h1>Welcome Back <?php echo $_SESSION['std_name']; ?></h1>
<h3><b>You Login At:</b> <span id='date-time'></span>.</h4>
<?php
	$sql ="SELECT * FROM student WHERE ID='$sid'";
	$no=mysqli_query($con,$sql);
		if(mysqli_num_rows($no)>0){
			while($row=mysqli_fetch_array($no)){
				if($row["fname"] ==NULL|| $row["dob"]==NULL || $row["mname"]==NULL || $row["email"]==NULL || $row["address"]==NULL || $row["pin"]==NULL)
					echo "<div class='w3-container'>
								<h3>Your Details are Incomplete !
								<img src='https://t3.ftcdn.net/jpg/01/45/20/02/360_F_145200273_450ViYipr5uU3WIwqzwjsRDHYTMcUH9P.jpg' style='width:30px;height:30px;'></img></h3>
							</div>";
				
				else
					echo "<h3>Your Detail are Verified !
					<img src='https://i.pinimg.com/originals/7b/dd/1b/7bdd1bc7db7fd48025d4e39a0e2f0fd8.jpg' style='width:30px;height:30px;'>
</h3>";
			echo "<br>
					<table class='w3-table-all' style='width:100%'>
						<tr>
							<th>ID:</th>
							<td>".$row["ID"]."</td>
						</tr>
						<tr>
							<th>NAME:</th>
							<td>".$row["name"]."</td>
						</tr>
						<tr>
							<th>Date of Birth:</th>
							<td>".$row["dob"]."</td>
						</tr>
						<tr>
							<th>Father Name:</th>
							<td>".$row["fname"]."</td>
						</tr>
						<tr>
							<th>Mother Name:</th>
							<td>".$row["mname"]."</td>
						</tr>
						<tr>
							<th>Gender:</th>
							<td>".$row["gender"]."</td>
						</tr>
						<tr>
							<th>Phone:</th>
							<td>".$row["phone"]."</td>
						</tr>
						<tr>
							<th>Email:</th>
							<td>".$row["email"]."</td>
						</tr>
						<tr>
							<th>Address:</th>
							<td>".$row["address"]."</td>
						</tr>
						<tr>
							<th>PIN CODE:</th>
							<td>".$row["pin"]."</td>
						</tr>
					</table>
						<br>";
		}
	}
	else{
	?>
	<script>
	alert("No Data Found For Given ID!");
	window.open("./std_login.php","_self")
	</script>
	<?php
	}
	?>
</div>
<p class="classname">
</p>


<script>
var dt = new Date();
document.getElementById('date-time').innerHTML=dt;
</script>
<style>
.center {
  margin: auto;
  border: 0.1px solid black;
  width: 60%;
  padding: 10px;
}
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
<?php include_once 'footer.php'?>
</html>