<?php
include_once 'dbconfig.php';

$cc="";
if(!empty($_POST["username"])) {
  $sql = "SELECT * FROM login WHERE username='" . $_POST["username"] . "'";
  $no = mysqli_query($con,$sql);
  $nou=mysqli_num_rows($no);

  if($nou>0) {
      echo "<span style='color:green'> Username Found.</span>
			<h4>Your Security Question is:";
			echo "<br>";
		
			
      $check="<span style='color:green'> Username Found.</span>";

      $q = "SELECT Security_Q FROM login WHERE username='" . $_POST["username"] . "'";
      $sq = mysqli_query($con,$q);

      if ($sq->num_rows > 0) {
			while($row = $sq->fetch_assoc()) {
				echo $row['Security_Q'];
  			}
		}
	   else{
  			echo 'No Security Question Selected !';
		}

  }
  else{
      echo "<span style='color:red'> Username Not Found.</span>";
  }
}


