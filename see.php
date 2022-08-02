<?php
session_start();
include_once 'dbconfig.php';
if(!isset($_SESSION['username'])){
	header('location: index.php');
}
if (isset($_GET['submit'])){
	if(mysqli_query($con,"DELETE FROM student WHERE ID =".$_GET['del']."")){
		?>
			<script type="text/javascript">
					alert('RECORD DELETED !');
					window.location.href='see.php';
			</script>
		<?php
		}
}
$usr=$_SESSION['username'];
$r=mysqli_query($con,"SELECT Permission from login WHERE username='$usr'");
$ro=mysqli_fetch_assoc($r);
$uper=$ro['Permission'];

?>
<html>
<title>Home</title>
<?php include_once './link.php'?>
<body>
<!--HEADER NAV BAR --->
<div class="w3-card-4">
<ul class="topnav">
  <li><a href="#" class='w3-indigo'>HB|TEAM</a></li>
  <li><a href="./home.php" class="w3-bar-item w3-button"><i class="fa fa-home"></i> Home</a></li>
  <li><a href="./See.php" class="w3-bar-item w3-blue"><i class="fa fa-id-card-o"></i> See Records</a></li>
  <li><a href="./Add.php" class="w3-bar-item w3-button"><i class="fa fa-plus-circle"></i> Add Records</a></li>
  <li><a href="./logout.php" class="w3-bar-item w3-button"><i class="fa fa-sign-in"></i> Logout</a></li>

  <li class="right" ><a href="./profile.php" class="w3-bar-item w3-button w3-orange"><i class="fa fa-user-circle-o"></i> <?php echo $_SESSION['username']; ?></a></li>
</ul>
</div>
<br>
<div class="w3-container">
	<h4> SEE FULL DETAILS</h4>
		<form method="POST" action="./seeall.php">
		<label for="ID">Enter ID:</label><br>
		<input class="w3-input w3-round" name="ID" required><br>
	
		<button class='w3-button w3-indigo w3-round' name="submit" value="submit">SEE MORE</button>
		</form>
	<h4>Search Using Phone Number</h4>
	<a href="./phone/Search_by_phone.php">BY PHONE NUMBER</a>
</div>

<?php
$sql ="SELECT ID,name,fname,mname,dob,gender,address,phone,email,pin FROM student";

$no=mysqli_query($con,"SELECT * FROM student");
$nod=mysqli_num_rows($no);

if($result=mysqli_query($con,$sql)){
	if(mysqli_num_rows($result)>0){
		echo "<div class='w3-center w3-container w3-green'>";
		echo "<h3>Total: ".$nod." Record(s) Founds</h3>";
		echo "<h4>You Have Only ".$_SESSION['per']." Permission.</h4>";
		echo "</div>";
		echo "<br>";
		echo "<div class='w3-container'>";
		echo "<table  class='w3-card w3-table-all w3-striped'>";
		   echo "<tr>";
				echo "<th>ID</th>";
				echo "<th>Name</th>";
				echo "<th>Father Name</th>";
				echo "<th>Gender</th>";
				echo "<th>Phone</th>";
				
				if($uper=='VIEW'){}
				if($uper=='DELETE'){echo "<th>DELETE</th>";}
				if($uper=='EDIT'){echo "<th>EDIT</th>";}
				if($uper=='E D'){echo "<th>EDIT</th>";
				echo "<th>DELETE</th>";}
				
				
			echo "</tr>";
			
			while($row=mysqli_fetch_array($result)){
			
			echo "<tr class='w3-center w3-hover-blue'>";
				echo "<td>".$row["ID"]."</td>";
				echo "<td>".$row["name"]."</td>";
				echo "<td>".$row["fname"]."</td>";
				echo "<td>".$row["gender"]."</td>";
				echo "<td>".$row["phone"]."</td>";
				
				if($uper=='VIEW'){}
				if($uper=='EDIT'){
				echo "<td><button class='w3-button w3-green w3-round' name='edit'>EDIT</button></td>";}
				
				if($uper=='DELETE'){
				echo "<td><form method='GET' action='/project/see.php'><input type='hidden' name='del' value=".$row["ID"]."></input><button class='w3-button w3-red w3-round' name='submit' value='submit' >DELETE</button></form></td>";
				
				}
				
				if($uper=='E D'){
					echo "<td><button class='w3-button w3-green w3-round' name='edit'>EDIT</button></td>";
					
					echo "<td><form method='GET' action='/project/see.php'><input type='hidden' name='del' value=".$row["ID"]."></input><button class='w3-button w3-red w3-round' name='submit' value='submit' >DELETE</button></form></td>";
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

<br>

<?php include_once './footer.php' ?>

</body>

</html>