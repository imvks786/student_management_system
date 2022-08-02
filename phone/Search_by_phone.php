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
<head>
<title>Mobile Search</title>
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
<form  style="max-width:500px;margin:auto" class="w3-container" method="GET" action="./record.php">
<label>Mobile Number:</label>

<div class="input-container">
	<i class="fa fa-phone icon" style="font-size:20px"></i>
	<input class="input-field" name="phone" type="number" title="Error Message" pattern="[1-9]{1}[0-9]{9}" >
</div>

<button class="w3-button w3-blue w3-round" name="submit" value="submit">Get Details</button>
</form>
</div>
<hr>
<div class="w3-center">
<a href="/project/home.php"> <--Go Back To Homepage </a>
</div>





<style>
.container {
  position: relative;
  font-family: Arial;
}
.text-block {
  position: absolute;
  bottom: 20px;
  right: 20px;
  background-color: black;
  color: white;
  padding-left: 20px;
  padding-right: 20px;
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
