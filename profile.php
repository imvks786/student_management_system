<?php
session_start();
include_once './dbconfig.php';
if(!isset($_SESSION['username'])){
	header('location: index.php');
}

if (isset($_POST['submit'])) {
    $result = mysqli_query($con, "SELECT *from login WHERE username='" . $_SESSION["username"] . "'");
    $row = mysqli_fetch_array($result);
    if ($_POST["currentPassword"] == $row["password"]) {
       mysqli_query($con, "UPDATE login set password='" . $_POST["newPassword"] . "' WHERE username='" . $_SESSION["username"] . "'");
		
?>
		<script type="text/javascript">
		setTimeout(function(){
		$('#added').remove();
		}, 5000);
		</script>
			<div class="alert alert-success alert-dismissible" id="added">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>SUCCESS!</strong>Password Changed successfully !
			</div>
		<?php
		
    } 
	
	else
	{
	  ?>
		<script type="text/javascript">
			setTimeout(function(){
			$('#fail').remove();
			}, 5000);
		</script>
			<div class="alert alert-danger alert-dismissible" id="fail">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>FAILED!</strong> Unable to Change Password.
			</div>
		<?php
	}
}



if (isset($_POST['quesubmit'])) {
	mysqli_query($con,"UPDATE login set Security_Q='".$_POST["sque"]."',Security_A='".$_POST["sans"]."' WHERE username='".$_SESSION["username"]."' ");
	
}
mysqli_close($con)
?>
<html>
<title>My Profile</title>
<?php include_once './header.php'?>

<div class="w3-center w3-white w3-card-4 w3-round " style="margin-left:200px; margin-right:200px;">
<!--USER DETAILS-->
<h1>Welcome Back - <?php echo $_SESSION['uname']; ?></h1>

<h4>Your User ID: <b><?php echo $_SESSION['username']; ?></b></h4>
</div>

<!--CHANGE PASSWORD FORM-->
<div class="w3-container">
<h2 class="w3-center" style="color:white">Change Your Password</h2>
<div class="w3-card-4 w3-white w3-container w3-round center Swidth" style="height:auto;margin-top:30px;margin-left:auto;">
    <form name="frmChange" method="post" action="" onSubmit="return validatePassword()">
		<legend>Change Password:</legend>
        
		<div class="message"><?php if(isset($message)) { echo $message; } ?></div>

		<label>Current Password</label><br>
        <input class="form-control" type="password" name="currentPassword" required /><span id="currentPassword" style="color:red"></span>
			<br>
		<label>New Password</label><br>
        <input class="form-control" type="password" name="newPassword" required /><span id="newPassword" style="color:red"></span>
			<br>
        <label>Confirm Password</label><br>
        <input class="form-control" type="password" name="confirmPassword" required /><span id="confirmPassword" style="color:red"></span><br>
        
        <button class="w3-button w3-blue w3-round" name="submit" value="Submit">Change</button>
    </form>
</div>

<!--CHANGE SECURITY QUESTION FORM-->
<h2 class="w3-center" style="color:white">Change Your SECURITY QUESTION</h2>
<div class=" w3-card-4 w3-white w3-container w3-round center Swidth" style="height:auto;margin-top:30px;margin-left:auto;">
    <form name="" method="post" action="" onSubmit="">
		<legend>Change Question:</legend>

		<label>New Question</label><br>
		  <select class="form-control" name="sque" id="que">
				<option>Your Nick Name ?</option>
				<option>Your Favorite Childhood Hero ?</option>
				<option>Your Birth Place ?</option>
				<option>Your Best Food ?</option>
			</select>
       
			<br>
        <label>New Answer</label><br>
        <input class="form-control"  name="sans" required /><br>
        <button class="w3-button w3-blue w3-round" name="quesubmit" value="quesubmit">Change</button>
    </form>
</div>
</div>
<br>
<style>
.message {
color: #FF0000;
text-align: center;
width: 100%;
}
body {
  background-image: url("");
}
</style>
<style>
body {
  background-image: url("https://wallpaperaccess.com/full/754632.jpg");
	background-repeat: no-repeat;
	background-size: cover;
}
</style>

<?php include_once './footer.php' ?>

</body>

</html>