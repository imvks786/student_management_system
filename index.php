<?php
session_start();
include_once 'dbconfig.php';
if(isset($_SESSION['username'])){
	header('location: home.php');
}

if (isset($_POST['submit'])){
	$usr=$_POST['usr'];
	$pwd=$_POST['pwd'];
		$ret=mysqli_query( $con, "SELECT * FROM login WHERE username='$usr' AND password='$pwd' "); 
		$row = mysqli_fetch_assoc($ret); 
		
		if(!$row) { 
		?>
			<script>
			alert("Username or Password Invaild !");
			window.open("./index.php","_self")
			</script>
			
		<?php
			}
		else {
			$_SESSION['username']=$usr;
			
			mysqli_query($con,"UPDATE logs SET last = now() WHERE username='$usr'");
			
			$r=mysqli_query($con,"SELECT Name,Permission FROM login WHERE username='$usr'");
			$ro=mysqli_fetch_assoc($r);
			$_SESSION['uname']=$ro['Name'];
			$_SESSION['per']=$ro['Permission'];
			?>
			<script>
			alert("Login Successful!");
			window.open("./home.php","_self")
			</script>
		<?php
			} 
}
?>


<html>
<title>LOGIN</title>
<?php include_once './link.php'?>

<body>
<!--HEADER NAV BAR --->
<div class="w3-card-4">
<ul class="topnav">
  <li><a href="./index.php" class="w3-bar-item w3-button w3-blue"><i class="fa fa-home"></i> Login</a></li>
  <li><a href="./reg.php" class="w3-bar-item w3-button"><i class="fa fa-id-card-o"></i> Register</a></li>
</ul>
</div>

<!--LOGIN FORM-->
<div class="w3-white w3-card-4 w3-container w3-round center" style="height: 400px;width: 320px;margin-top: 82px;margin-left:auto;">
<h3 class="w3-center">Department Login</h3>
<form class="w3-container w3-center" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
  <label>Username:</label>
  <input class="w3-input w3-round" name="usr" type="text" required><br>
  <label>Password:</label>
  <input class="w3-input w3-round" name="pwd" type="password" autocomplete="on" required><br>
  <button class="w3-button w3-blue w3-round" name="submit" value="submit">Login</button><br>
  <br>
  <span id="error"></span>
  <a href="#" onClick="forgot=window.open('./reset/forgot.php','forgot','width=700,height=700'); return false;">Forgotten Password ? --></a>
  
  <p>For Student login<a href="/project/std_home/std_login.php"> click Here</a></p>
  <br></br>
  <div id="snackbar">Invaild Username or Password</div>
</form> 
</div>
</bk>
<STYLE>
A {text-decoration: none;}
.center {
  margin: auto;
  border: 1px solid black;
  width: 60%;
  padding: 10px;
}
body {
  background-image: url("https://cdn.wallpapersafari.com/94/96/kr6p7a.jpg");
	background-repeat: no-repeat;
	background-size: cover;
}
/* SNACK BAR */
#snackbar {
  visibility: hidden;
  min-width: 250px;
  margin-left: -125px;
  background-color: #333;
  color: #fff;
  text-align: center;
  border-radius: 2px;
  padding: 16px;
  position: fixed;
  z-index: 1;
  left: 50%;
  bottom: 30px;
  font-size: 17px;
}

#snackbar.show {
  visibility: visible;
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

@-webkit-keyframes fadein {
  from {bottom: 0; opacity: 0;} 
  to {bottom: 30px; opacity: 1;}
}

@keyframes fadein {
  from {bottom: 0; opacity: 0;}
  to {bottom: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
  from {bottom: 30px; opacity: 1;} 
  to {bottom: 0; opacity: 0;}
}

@keyframes fadeout {
  from {bottom: 30px; opacity: 1;}
  to {bottom: 0; opacity: 0;}
}
</STYLE>


<noscript>
	<meta http-equiv="refresh" content="0; URL=error_code/nojs.html">
</noscript>
</body>



</html>