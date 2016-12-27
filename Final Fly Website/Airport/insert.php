<?php
require('../db.php');
include("../auth.php");
$status = "";
if(isset($_POST['new']) && $_POST['new']==1){

    $ACODE =$_REQUEST['ACODE'];
    $ANAME =$_REQUEST['ANAME'];
    $city = $_REQUEST['City'];
    $country = $_REQUEST['Country'];


    $query = "INSERT into Airport" .
    "(ACODE, ANAME, City, Country)".
    "VALUES ('$ACODE', '$ANAME', '$city', '$country')";
    mysqli_query($con,$query)
    or die(mysql_error());
    $status = "New Airport Inserted Successfully.
    </br></br><a href='view.php'>View Inserted Record</a>";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert New Airport</title>
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
		<a href="view.php">View Records</a><br>
		<a href="../logout.php">Logout</a><br>
	</div>
	<div class="form">
			<h1>Insert New Airport</h1>
			<form name="form" method="post" action="">
			<input type="hidden" name="new" value="1" />
			<p><input type="text" name="ACODE" placeholder="Enter Airplane Code" required /></p>
			<p><input type="text" name="ANAME" placeholder="Enter Airplane Name" required /></p>
			<p><input type="text" name="City" placeholder="Enter City" required /></p>
			<p><input type="text" name="Country" placeholder="Enter Country" required /></p>

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
