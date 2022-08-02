<?php
session_start();
include_once 'dbconfig.php';
if(!isset($_SESSION['username'])){
	header('location: index.php');
}

?>
<html>
<title>Home</title>
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-flat.css">
<?php include_once './link.php';
$nam=$_SESSION['username'];
?>
<body>
<!--HEADER NAV BAR --->
<div class="w3-card-4">
<ul class="topnav">
  <li><a href="#" class='w3-indigo'>HB|TEAM</a></li>
  <li><a href="./home.php" class="w3-bar-item w3-button w3-blue"><i class="fa fa-home"></i> Home</a></li>
  <li><a href="./See.php" class="w3-bar-item "><i class="fa fa-id-card-o"></i> See Records</a></li>
  <li><a href="./Add.php" class="w3-bar-item w3-button"><i class="fa fa-plus-circle"></i> Add Records</a></li>
  <li><a href="./logout.php" class="w3-bar-item w3-button"><i class="fa fa-sign-in"></i> Logout</a></li>
  <li class="right" ><a href="./profile.php" class="w3-bar-item w3-button w3-orange"><i class="fa fa-user-circle-o"></i> <?php echo $_SESSION['username']; ?></a></li>
</ul>
</div>
<style>
.center {
  margin: auto;
  border: 0.1px solid black;
  width: 60%;
  padding: 10px;
}
</style>
<!--HOME --->
<div class="w3-white w3-round center"  style="height:400px;width:900px;margin-top:80px;margin-left:auto;" data-rel="popup" class="ui-btn" data-transition="turn">
	<div class="w3-container w3-flat-wet-asphalt">
		<h3>Welcome to The Dashboard</h3>
	</div>
	<br>	<!--YOUR NAME-->
					<div class="w3-third w3-center w3-flat-green-sea">
							<h3>Your Name:</h3>
							<h3><?php echo $_SESSION['uname']; ?></h3>
					</div>
					<!--YOUR login-->
					<div class="w3-third w3-center w3-flat-wisteria"">
							<h3>Last Login at:</h2>
							<h3>
							<?php 
								$last = "SELECT last FROM logs WHERE username='$nam'";
								if($r=mysqli_query($con,$last)){
								if(mysqli_num_rows($r)>0){
								while($row=mysqli_fetch_array($r)){
								echo $row["last"];}}}
								?></h3>	
					</div>
</div>
					
<br>
<style>
body {
  background-image: url("https://www.wallpapertip.com/wmimgs/56-567419_1920x1080-wallpaper-black-blue-gradient-linear-medium-blue.jpg");
}
</style>
<?php include_once 'footer.php'?>
</body>
</html>