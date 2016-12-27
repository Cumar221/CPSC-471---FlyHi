<?php
require('../db.php');
include("../auth.php");
$status = "";
if(isset($_POST['new']) && $_POST['new']==1){

    $workPreformed =$_REQUEST['WorkPreformed'];
    $serviceNumber =$_REQUEST['ServiceNumber'];
    $goodUntil = $_REQUEST['GoodUntil'];

    $query = "INSERT into Service" .
    "(WorkPreformed, ServiceNumber, GoodUntil)".
    "VALUES ('$workPreformed', '$serviceNumber', '$goodUntil')";
    mysqli_query($con,$query)
    or die(mysql_error());
    $status = "New Record Inserted Successfully.
    </br></br><a href='view.php'>View Inserted Record</a>";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert New Service</title>
<link rel="stylesheet" href="../css/style.css" />
<!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div id="header">
			<h1>FlyHi</h1>
	</div>
	<div id ="nav">
		<a href="../dashboard.php">Dashboard</a><br>
		<a href="view.php">View Records</a><br>
		<a href="../logout.php">Logout</a><br>
	</div>
	<div class="form">
			<h1>Insert New Service</h1>
			<form name="form" method="post" action="">
			<input type="hidden" name="new" value="1" />
			<p><input type="text" name="WorkPreformed" placeholder="Enter Work Preformed" required /></p>
			<p><input type="text" name="ServiceNumber" placeholder="Enter Service Number" required /></p>
			<p><input type="text" name="GoodUntil" placeholder="Enter Good Until" required /></p>
			<p><input name="submit" type="submit" value="Submit" /></p>
			</form>
			<p style="color:#FF0000;"><?php echo $status; ?></p>
	</div>
	 <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
<footer>
	<div id="footer">
		Copyright © FlyHi
	</div>
</footer>
</html>
