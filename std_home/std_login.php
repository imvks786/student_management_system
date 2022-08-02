<?php
session_start();
include_once 'G:/server/htdocs/project/dbconfig.php';

if(isset($_SESSION['ID'])){
	header('location: std_profile.php');
}

if (isset($_POST['submit'])){
	$id=$_POST['id'];
	$dob=$_POST['dob'];
	
	$ret=mysqli_query($con, "SELECT * FROM student WHERE ID='$id' AND dob='$dob' "); 
	$row = mysqli_fetch_assoc($ret);
	if(!$row) { 
		?>
			<script>
			//alert("Username or Password Invaild !");
			window.open("./std_login.php","_self")
			</script>
		<?php
			}
		else {
			$_SESSION['ID']=$id;
			
			$r=mysqli_query($con,"SELECT name FROM student WHERE ID='$id'");
			$ro=mysqli_fetch_assoc($r);
			$_SESSION['std_name']=$ro['name'];
			?>
			<script>
			//alert("Login Successful!");
			window.open("./std_profile.php","_self")
			</script>
		<?php
			} 
}
?>

<html>
<title>Login</title>

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
<div class="w3-white w3-card-4 w3-container w3-round center" style="height: 340px;width: 320px;margin-top: 82px;margin-left:auto;">

<form class="w3-container w3-center" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
	<h3>Student Login</h3>
	<label>Enter Your ID</label>
	<input class="w3-input w3-round" name="id" type="text" required><br>
	<label >Enter Your DOB</label>
	<input class="w3-input w3-round" name="dob" type="date" required><br>
	
	<button class="w3-button w3-blue w3-round" name="submit" value="submit">Login</button><br>
	
	<b>For Admin login<a href="/project/index.php"> click Here</a></b>
</form>
</div>

<STYLE>
A {text-decoration: none;}
.center {
  margin: auto;
  border: 1px solid black;
  width: 60%;
  padding: 10px;
}
body {
  background-image: url("https://img.freepik.com/free-vector/hexagonal-technology-pattern-mesh-background-with-text-space_1017-26293.jpg?size=626&ext=jpg");
	background-repeat: no-repeat;
	background-size: cover;
}
</STYLE>
<noscript>
	<meta http-equiv="refresh" content="0; URL=error_code/nojs.html">
</noscript>
</body>
</html>