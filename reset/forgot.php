<?php
session_start();
include_once("dbconfig.php");

if (isset($_POST['submit'])){
	$usr=$_POST['username'];
	$ans=$_POST['ans'];
	$r=mysqli_query($con, "SELECT * FROM login WHERE username='$usr' AND Security_A='$ans' "); 
	$row = mysqli_fetch_assoc($r);
	if(!$row){
	?>
		<script>
			alert("Username or Security Answer Invaild !");
			window.open("./forgot.php","_self")
		</script>
	<?php
		}
	else{
		$_SESSION['fusr']=$usr;
		?>
		<script>
		alert("Answer Matched !");
		window.open("./change.php","_self")
		</script>
	<?php
		} 
}
?>

<html>
<?php include_once './link.php'?>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="w3.css">

<body>
<div class="w3-center">
<h1>Enter Details to Reset Password !</h1>
<p>This Page will redirect to Home in 5 Minutes.</p>

<div class="container"> 
  <div class="progress">
    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width:10%">
      10%
    </div>
  </div>
</div>


<div class="w3-container">
<form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
	<label for="usr">Enter Username:</label>
	<input class="w3-round" name="username" id="username" onBlur="checkusr()" required>
	<span id="check"></span>
	<br>

	<label for="ans">Enter Your Answer:</label>
	<input class='w3-round' name='ans' id='ans' required>
	<span id="chk"></span>
	<br>
	<button class="w3-button w3-blue w3-round" name="submit" value="submit">SUBMIT</button>
</form>
</div>

<script type="text/javascript">
function checkusr() {
  jQuery.ajax({
  url: "./reset.php",
  data:'username='+$("#username").val(),
  type: "POST",
  success:function(data){
    $("#check").html(data);
  },
  error:function (){}
  });
}
</script>

</body>
</html>