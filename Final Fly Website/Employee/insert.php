<?php
require('../db.php');
include("../auth.php");
$status = "";
if(isset($_POST['new']) && $_POST['new']==1){
    $ssn =$_REQUEST['SSN'];
    $location =$_REQUEST['Location'];
    $tenure = 0;
    $hsr =$_REQUEST['HoursSinceRest'];
    $id =$_REQUEST['ID'];


    $query = "INSERT into Employee" .
    "(SSN, Location, Tenure, HoursSinceRest, ID)".
    "VALUES ('$ssn', '$location', '$tenure', '$hsr', '$id')";

    $result = mysqli_query($con, $query);
    if (!$result){
      echo "Error: " . mysqli_error($con);
      die ( mysqli_error());
    }

    $status = "Employee Successfully Added.
    </br></br><a href='view.php'>View Employee Database</a>";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Add Employees</title>
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
		<a href="view.php">View Employees</a><br>
		<a href="../logout.php">Logout</a><br>
	</div>
	<div class="form">
			<h1>Buy New Ticket</h1>
			<form name="form" method="post" action="">
			<input type="hidden" name="new" value="1" />
			<p><input type="text" name="SSN" placeholder="Enter Social Security Number" required /></p>
			<p><input type="text" name="Location" placeholder="Enter Office Location" required /></p>

      <p><input type="text" name="HoursSinceRest" placeholder="Enter Hours Since Rest" required /></p>
      <p><input type="text" name="ID" placeholder="Enter Registration ID" required /></p>


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
