<?php
require('../db.php');
include("../auth.php");
$status = "";
if(isset($_POST['new']) && $_POST['new']==1){

    $airplaneID =$_REQUEST['AirplaneID'];
    $serviceNumber =$_REQUEST['ServiceNumber'];


    $query = "INSERT into Repair" .
    "(AirplaneID, ServiceNumber)".
    "VALUES ('$airplaneID', '$serviceNumber')";
    $result = mysqli_query($con,$query);
    if (!$result){
      echo "Error: " . mysqli_error($con);

      die(mysql_error());
    }

    $status = "New Repair Inserted Successfully.
    </br></br><a href='view.php'>View Inserted Repair</a>";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert New Repair</title>
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
		<a href="view.php">View Repairs</a><br>
		<a href="../logout.php">Logout</a><br>
	</div>
	<div class="form">
			<h1>Insert New Repair</h1>
			<form name="form" method="post" action="">
			<input type="hidden" name="new" value="1" />
			<p><input type="text" name="AirplaneID" placeholder="Enter Plane ID" required /></p>
			<p><input type="text" name="ServiceNumber" placeholder="Enter Service Number" required /></p>
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
