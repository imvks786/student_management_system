<?php
session_start();
include_once 'dbconfig.php';
if(!isset($_SESSION['username'])){
	header('location: index.php');
}
if (isset($_POST['submit'])){
	
	$name=$_POST['name'];
	$dob=$_POST['dob'];
	$gender=$_POST['gender'];
	$fname=$_POST['fname'];
	$mname=$_POST['mname'];
	$address=$_POST['address'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$pin=$_POST['pin'];
	
	$sql = "INSERT INTO student (name,fname,mname,dob,gender,address,phone,email,pin) values('$name','$fname','$mname','$dob','$gender','$address','$phone','$email','$pin')";

if(mysqli_query($con,$sql))
 {
  ?>
  <script type="text/javascript">
  setTimeout(function(){
  $('#added').remove();
}, 5000);
  </script>
    <div class="alert alert-success alert-dismissible" id="added">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>SUCCESS!</strong> This Record added successfully !
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
    <strong>FAILED!</strong> Unable to add this record.
  </div>
  <?php
 }
}
?>
<html>
<title>Add Record</title>
<?php include_once './link.php' ?>

<body>

<!--HEADER NAV BAR --->
<div class="w3-card-4">
<ul class="topnav">
	<li><a href="#"  class='w3-indigo'>HB|TEAM</a></li>
  <li><a href="./home.php" class="w3-bar-item w3-button"><i class="fa fa-home"></i> Home</a></li>
  <li><a href="./See.php" class="w3-bar-item"><i class="fa fa-id-card-o"></i> See Records</a></li>
  <li><a href="./Add.php" class="w3-bar-item w3-button w3-blue"><i class="fa fa-plus-circle"></i> Add Records</a></li>
  <li><a href="./logout.php" class="w3-bar-item w3-button"><i class="fa fa-sign-in"></i> Logout</a></li>
  <li class="right" ><a href="./profile.php" class="w3-bar-item w3-button w3-orange"><i class="fa fa-user-circle-o"></i> <?php echo $_SESSION['username']; ?></a></li>
</ul>
</div>
<!--- FORM STARTS HERE --->
<div class="w3-white w3-card-4 w3-container w3-round center Swidth" style="height:auto;margin-top:30px;margin-left:auto;">
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" autocomplete="on">
<div class="form-group">
    <legend>Add Record:</legend>
	<p>Please fill all required details.</p>
	
    <label>Name:</label><br>
    <input type="text" name="name" class="form-control" required  autofocus><br>
	
	<label>Date of Birth:</label><br>
    <input type="date" name="dob" class="form-control" required><br>
	
	<label>Gender:</label><br>
		<input type="radio" id="male" name="gender" required value="M">
		<label for="male">Male</label><br>
		<input type="radio" id="female" name="gender" value="F">
		<label for="female">Female</label><br>
		<input type="radio" id="other" name="gender" value="O">
		<label for="other">Other</label><br><br>
	
	<label>Father Name:</label><br>
    <input type="text" name="fname" class="form-control"><br>
	
	<label>Mother Name:</label><br>
    <input type="text" name="mname" class="form-control"><br>
	
	<label>Address:</label><br>
	<textarea type="text" name="address" class="form-control"  rows="3"></textarea>
	
	<label>PIN code:</label><br>
    <input type="number" name="pin" class="form-control"><br>
	
	<label>Phone Number:</label><br>
    <input type="text" name="phone" class="form-control" title="Input Valid Phone Number" pattern="[1-9]{1}[0-9]{9}" required><br>
	
	<label>Email ID:</label><br>
    <input type="email" name="email" class="form-control" autocomplete="off"><br>
	
	
	<button class="w3-button w3-blue w3-round" name="submit" value="submit">Add Record</button>
</div>
</form>
</div>



<style> 
textarea {
  width: 100%;
  height: 150px;
  padding: 12px 20px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  background-color: #f8f8f8;
  font-size: 16px;
  resize: none;
}
Swidth {
	width=1000px;
}
@media screen and (max-width: 600px) {
  Swidth {
    width=auto;
  }
}
A {text-decoration: none;}
.center {
  margin: auto;
  border: 1px solid black;
  width: 60%;
  padding: 10px;
}
body {
  background-image: url("https://images.wallpaperscraft.com/image/gradient_color_blue_155118_2560x1440.jpg");
}
</style>
<br>

<?php include_once './footer.php' ?>

</body>
</html>