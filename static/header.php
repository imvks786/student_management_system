<?php include_once 'link.php'?>
<body>


<!--HEADER NAV BAR --->
<div class="w3-card-4">
<ul class="topnav">
	<li><a href="#" class='w3-indigo'>HB|TEAM</a></li>
  <li><a href="./home.php" class="w3-bar-item w3-button "><i class="fa fa-home"></i> Home</a></li>
  <li><a href="./See.php" class="w3-bar-item "><i class="fa fa-id-card-o"></i> See Records</a></li>
  <li><a href="./Add.php" class="w3-bar-item w3-button"><i class="fa fa-plus-circle"></i> Add Records</a></li>
  <li><a href="./logout.php" class="w3-bar-item w3-button"><i class="fa fa-sign-in"></i> Logout</a></li>
  <li class="right" ><a href="./profile.php" class="w3-bar-item w3-button w3-blue"><i class="fa fa-user-circle-o"></i> <?php echo $_SESSION['username']; ?></a></li>
</ul>
</div>