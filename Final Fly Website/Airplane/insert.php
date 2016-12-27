<?php
require('../db.php');
include("../auth.php");
$status = "";
if(isset($_POST['new']) && $_POST['new']==1){

    $airplaneID =$_REQUEST['AirplaneID'];
    $airplanePosition =$_REQUEST['AirplanePosition'];
    $baggage = $_REQUEST['Baggage'];
    $nextFlight = $_REQUEST['NextFlight'];
    $fuel = $_REQUEST['Fuel'];
    $airplaneType = $_REQUEST['AirplaneType'];

    $query = "INSERT into Airplane" .
    "(AirplaneID, AirplanePosition, Baggage, NextFlight, Fuel, AirplaneType)".
    "VALUES ('$airplaneID', '$airplanePosition', '$baggage', '$nextFlight', '$fuel', '$airplaneType')";
    mysqli_query($con,$query)
    or die(mysql_error());
    $status = "New Airplane Inserted Successfully.
    </br></br><a href='view.php'>View Airplanes</a>";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert New Airplane</title>
<link rel="stylesheet" href="../css/style.css" />
<!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div id="header">
			<h1>FlyHi</h1>
	</div>
	<div id ="nav">
		<a href="../dashboard.php">Dashboard</a><br>
		<a href="view.php">View Airplanes</a><br>
		<a href="../logout.php">Logout</a><br>
	</div>
	<div class="form">
			<h1>Insert New Airplane</h1>
			<form name="form" method="post" action="">
			<input type="hidden" name="new" value="1" />
			<p><input type="text" name="AirplaneID" placeholder="Enter Plane ID" required /></p>
			<p><input type="text" name="AirplanePosition" placeholder="Enter Position" required /></p>
			<p><input type="text" name="Baggage" placeholder="Enter Baggage" required /></p>
			<p><input type="text" name="NextFlight" placeholder="Enter Next Flight" required /></p>
			<p><input type="text" name="Fuel" placeholder="Enter Fuel" required /></p>
			<p><input type="text" name="AirplaneType" placeholder="Enter Type" required /></p>
			<p><input name="submit" type="submit" value="Submit" /></p>
			</form>
			<p style="color:#FF0000;"><?php echo $status; ?></p>
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
