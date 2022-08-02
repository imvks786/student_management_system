<?php
include_once("dbconfig.php");


if(!empty($_POST["username"])) {



  $sql = "SELECT * FROM login WHERE username='" . $_POST["username"] . "'";
  $no = mysqli_query($con,$sql);

  $nou=mysqli_num_rows($no);

  if($nou>0) {
      echo "<span class='status-not-available'> Username Not Available.</span>";
  }else{
      echo "<span class='status-available'> Username Available.</span>";
  }
}
?>