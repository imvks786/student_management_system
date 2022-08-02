<?php
session_start();
include_once 'G:/server/htdocs/project/dbconfig.php';
if(!isset($_SESSION['username'])){
	header('location: /project/index.php');
}
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<head>
<title>Records</title>
</head>
<body>
<div class="w3-container w3-blue w3-center">
	<h1>Search Using Phone Number</h1>
	<p>Enter Phone number to continue.</p>
</div>
<div class="w3-container alert alert-danger w3-center">
	<p>This site is in development, sorry for inconvience.</p>
</div>
<!--FORM-->
<div class="w3-container w3-center">
<h2><a href="Search_by_phone.php">Search For Another Number.</a></h2>
</div>
<hr>
<div class="w3-center">
<a href="/project/home.php"> <-- Go Back To Homepage </a>
</div>

<div class="w3-container">
	<?php
	$phone=$_GET['phone'];
	$sql ="SELECT * FROM student WHERE phone='$phone'";
	$no=mysqli_query($con,$sql);
		if(mysqli_num_rows($no)>0){
			while($row=mysqli_fetch_array($no)){
			echo "<br>
					<table class='w3-table-all'>
						<tr>
							<th><i class='fas fa-id-card' style='font-size:auto;color:blue'></i> ID</th>
							<td>".$row["ID"]."</td>
						</tr>
						<tr>
							<th><i class='fas fa-user-alt' style='font-size:auto;color:blue'></i> NAME</th>
							<td>".$row["name"]."</td>
						</tr>
						<tr>
							<th><i class='fas fa-birthday-cake' style='font-size:auto;color:blue'></i> Date of Birth</th>
							<td>".$row["dob"]."</td>
						</tr>
						<tr>
							<th> Father Name</th>
							<td>".$row["fname"]."</td>
						</tr>
						<tr>
							<th><i class='fas fa-female' style='font-size:auto;color:blue'></i> Mother Name</th>
							<td>".$row["mname"]."</td>
						</tr>
						<tr>
							<th> Gender</th>
							<td>".$row["gender"]."</td>
						</tr>
						<tr>
							<th><i class='fas fa-phone-square-alt' style='font-size:auto;color:blue'></i> Phone</th>
							<td>".$row["phone"]."</td>
						</tr>
						<tr>
							<th><i class='fas fa-at' style='font-size:auto;color:blue'></i> Email</th>
							<td><a href='mailto:".$row["email"]."' target='_top'>".$row["email"]."</a></td>
						</tr>
						<tr>	
							<th><i class='fas fa-home' style='font-size:auto;color:blue'></i> Address</th>
							<td>".$row["address"]."</td>
						</tr>
						<tr>
							<th> PIN CODE:</th>
							<td>".$row["pin"]."</td>
						</tr>
					</table>
						<br>";
		}
	}
	else{
	?>
	<script>
	alert("No Data Found! Redirecting to TRUECALLER");
	//window.open("./Search_by_phone.php","_self")
	window.open("https://www.truecaller.com/search/in/<?php echo $phone;?>","_self")
	
	</script>
	<?php
	}
	?>
</div>
	
<style>
a{
	text-decoration: none;
}
.icon {
  padding: 10px;
  background: dodgerblue;
  color: white;
  min-width: 50px;
  text-align: center;
}
.input-field {
  width: 100%;
  padding: 10px;
  outline: none;
}
.input-field:focus {
  border: 2px solid dodgerblue;
}
.input-container {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  width: 100%;
  margin-bottom: 15px;
}

</style>

<noscript>
	<meta http-equiv="refresh" content="0; URL=/project/error_code/nojs.html">
</noscript>
</body>
</html>
