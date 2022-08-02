<?php
session_start();
include_once 'dbconfig.php';
if(!isset($_SESSION['username'])){
	header('location: index.php');
}
$id = isset($_POST['ID']) ? $_POST['ID'] : "";
?>
<html>
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="my.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 90px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 80%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}
* {
  box-sizing: border-box;
}

table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
  text-align: left;
}
</style>
<style>
body {
  background-image: url("https://wallpaperaccess.com/full/754632.jpg");
	background-repeat: no-repeat;
	background-size: cover;
}
</style>
</head>
<body>
<!-- Trigger/Open The Modal -->
<button id="myBtn" style="display:none;">SEE DETAILS</button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Full Details</h2>
    </div>
	
	
    <div class="modal-body">
	<?php
	$sql ="SELECT * FROM student WHERE ID='$id'";
	$no=mysqli_query($con,$sql);
		if(mysqli_num_rows($no)>0){
			while($row=mysqli_fetch_array($no)){
			echo "<br>
					<table style='width:100%'>
						<tr>
							<th>ID:</th>
							<td>".$row["ID"]."</td>
						</tr>
						<tr>
							<th>NAME:</th>
							<td>".$row["name"]."</td>
						</tr>
						<tr>
							<th>Date of Birth:</th>
							<td>".$row["dob"]."</td>
						</tr>
						<tr>
							<th>Father Name:</th>
							<td>".$row["fname"]."</td>
						</tr>
						<tr>
							<th>Mother Name:</th>
							<td>".$row["mname"]."</td>
						</tr>
						<tr>
							<th>Gender:</th>
							<td>".$row["gender"]."</td>
						</tr>
						<tr>
							<th>Phone:</th>
							<td>".$row["phone"]."</td>
						</tr>
						<tr>
							<th>Email:</th>
							<td><a href='mailto:".$row["email"]."' target='_top'>".$row["email"]."</a></td>
						</tr>
						<tr>
							<th>Address:</th>
							<td>".$row["address"]."</td>
						</tr>
						<tr>
							<th>PIN CODE:</th>
							<td>".$row["pin"]."</td>
						</tr>
					</table>
						<br>";
		}
	}
	else{
	?>
	<script>
	alert("No Data Found For Given ID!");
	window.open("./see.php","_self")
	</script>
	<?php
	}
	?>
    </div>
  </div>
</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}
modal.style.display = "block";
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
  window.location.assign("./See.php")
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</body>
</html>
