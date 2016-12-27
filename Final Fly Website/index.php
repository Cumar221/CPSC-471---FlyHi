<?php
//include auth.php file on all secure pages
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome Home</title>
<link rel="stylesheet" href="css/style.css" />
<!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div id="header">
			<h1>FlyHi</h1>
	</div>
	<div id ="nav">
			<p><a href="dashboard.php">Dashboard</a></p>
			<a href="logout.php">Logout</a>
	</div>
	<div class="form"">
		<p>Welcome <?php echo $_SESSION['id']; ?>!</p>
		<p>This is secure area.</p>
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
