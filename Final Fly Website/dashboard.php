<?php
require('db.php');
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Dashboard - Secured Page</title>
<link rel="stylesheet" href="css/style.css" />
<!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div id="header">
			<h1>FlyHi</h1>
	</div>
	<div id ="nav">
		<p><a href="index.php">Home</a><p>
		<p><a href="logout.php">Logout</a></p>
	</div>
	<div class="form">
		<p>Welcome to Dashboard.</p>

    <p>Links:</p>
    <?php
    if($_SESSION['isEmployee'] == 1){
      echo '<p><a href="Airplane/view.php">Airplane</a></p>
          <p><a href="Airport/view.php">Airport</a></p>
          <p><a href="Customer/view.php">Customer</a></p>
          <p><a href="Employee/view.php">Employee</a></p>
          <p><a href="Problem/view.php">Problem</a></p>
          <p><a href="Repair/view.php">Repair</a></p>
          <p><a href="Service/view.php">Service</a></p>
          <p><a href="Ticket/view.php">Ticket</a></p>';
    }else{
          echo '<p><a href="Ticket/view.php">Ticket</a></p>';
    } ?>
	</div>
	 <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
<footer>
	<div id="footer">
		Copyright © FlyHi
	</div>
</footer>
</html>
