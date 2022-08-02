<?php
session_start();
include_once './dbconfig.php';
if(!isset($_SESSION['fusr'])){
	header('location: forgot.php');
}

if (isset($_POST['submit'])) {
	echo $_SESSION['fusr'];
	mysqli_query($con,"UPDATE login set password='" . $_POST["newPassword"] . "' WHERE username='" . $_SESSION["fusr"] . "'");
	header('location: success.php');
}
?>
<html>
<?php include_once './link.php'?>
<body>
<div class="w3-center">
<?php echo  $_SESSION['fusr'];?>
<h1>Enter Details to Reset Password !</h1>
<p>This Page will redirect to Home in 10 Minutes.</p>
<p id="countdown">10:00</p>
<div class="container"> 
  <div class="progress">
    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width:90%">
      90%
    </div>
  </div>
</div>
</div>

<div class="container">
<h2>Change Your Password</h2>
<form name="frmChange" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
		<label>New Password</label><br>
        <input class="form-control" type="password" name="newPassword" required />
		<br>
		
		<label>Confirm Password</label><br>
        <input class="form-control" type="password" name="cpwd" required />
		<br>
		
		<button class="w3-button w3-blue w3-round" name="submit" value="submit">Change</button>
</form>

</body>	
</html>