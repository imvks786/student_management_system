<?php
session_start();
include_once 'dbconfig.php';
include_once 'ajax/check_availability.php';

$con=mysqli_connect("localhost","root","","std");

if(!empty($_POST["usr"])) {
  $query = "SELECT * FROM login WHERE username='" . $_POST["usr"] . "'";
  $user_count ="";
  if($user_count>0) {
      echo "<span class='status-not-available'> Username Not Available.</span>";
  }else{
      echo "<span class='status-available'> Username Available.</span>";
  }
}

if (count($_POST) > 0){
	$name=$_POST['name'];	
	$usr=$_POST['usr'];
	$pwd=$_POST['pwd'];
	$sq=$_POST['sque'];
	$sa=$_POST['sans'];
	
	$sql = "INSERT INTO login (name,username,password,Security_Q,Security_A) VALUES ('".$name."','".$usr."','".$pwd."','".$sq."','".$sa."')";
	$s = "INSERT INTO logs (username) values ('".$usr."')";
	mysqli_query($con,$s);
	
if(mysqli_query($con,$sql))
 {
  ?>
  <script type="text/javascript">
  alert('Added Successfully ');
  window.location.href='index.php';
  </script>
  <?php
 }
 else
 {
  ?>
  <script type="text/javascript">
  alert('error occured while inserting your data');
  </script>
  <?php
 }
}
?>

<html>
<title>Register</title>
<?php include_once './link.php'?>

<body>
<!--HEADER NAV BAR --->
<div class="w3-card-4">
<ul class="topnav">
  <li><a href="./index.php" class="w3-bar-item w3-button"><i class="fa fa-home"></i> Login</a></li>
  <li><a href="./reg.php" class="w3-bar-item w3-blue"><i class="fa fa-id-card-o"></i> Register</a></li>
</ul>
</div>

<!--Register FORM-->
<div class="w3-white w3-card-4 w3-container w3-round center" style="height: 750px;width: 500px;margin-top: 79px;margin-left:auto;">
<h3>Create an Account</h3>
<p><span class="error">* required field</span></p>

<form name="frmChange" class="w3-container" method="POST" onSubmit="return validatePassword()" action="">
  <label>Name:<span class="error">*</span></label><br>
  <input class="w3-input w3-round" type="text" name="name" id="name" required> 
  <br>
  
  <label>Username:<span class="error">*</span></label><br>
  <input class="w3-input w3-round" type="text" name="usr" id="username" onBlur="checkAvailability()" required> 
  <p><img src="./ajax/LoaderIcon.gif" id="loaderIcon" style="display:none" /></p>
  <p><span id="user-availability-status"></span></p>
  <br>
 

  <label for="pwd">Enter Password:<span class="error">*</span></label><br>
  <input class="w3-input w3-round" type="password" name="pwd" autocomplete="on" pattern=".{8,}" title="8 characters minimum" required><br><br>
  
  <label for="pwd">Confirm Password:<span class="error">*</span></label><br>
  <input class="w3-input w3-round" type="password" name="cpwd" autocomplete="on" required><span id="cpwd" style="color:red"></span><br>
  
  <label for="secuq">Security Question:<span class="error">*</span></label><br>
	<select class="w3-input w3-round" name="sque" id="que">
		<option value="nick name">Your Nick Name ?</option>
		<option value="childhero">Your Favorite Childhood Hero ?</option>
		<option value="birthplace">Your Birth Place ?</option>
		<option value="food">Your Best Food ?</option>
	</select>	<br>

   <label>Your Answer</label><br>
   <input class="w3-input w3-round" name="sans" required>	<br>
  
  <button class="w3-button w3-blue w3-round" name="submit" value="submit">CREATE</button>
  <br></br>
</form> 
</div>
<br>

</body>
<style>
A {text-decoration: none;}
.center {
  margin: auto;
  border: 1px solid black;
  width: 60%;
  padding: 10px;
}
body {
  background-image: url("https://images.unsplash.com/photo-1540270776932-e72e7c2d11cd?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=1000&q=80");
	background-repeat: no-repeat;
	background-size: cover;
}
.error {color: #FF0000;}
.status-available{color:#2FC332;}
.status-not-available{color:#D60202;}
</style>

<script>
function checkAvailability() {
  $("#loaderIcon").show();
  jQuery.ajax({
  url: "./ajax/check_availability.php",
  data:'username='+$("#username").val(),
  type: "POST",
  success:function(data){
    $("#user-availability-status").html(data);
    $("#loaderIcon").hide();
  },
  error:function (){}
  });
}
</script>

<noscript>
	<meta http-equiv="refresh" content="0; URL=error_code/nojs.html">
</noscript>
</html>