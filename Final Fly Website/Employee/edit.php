<?php
require('../db.php');
include("../auth.php");
$id=$_REQUEST['SSN'];
$query = "SELECT * from Employee where SSN='".$id."'";
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Employee</title>
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
		<a href="insert.php">Add Employee</a><br>
		<a href="../logout.php">Logout</a><br>
	</div>
	<div class="form">
		<h1>Update Employee</h1>
		<?php
		$status = "";
		if(isset($_POST['new']) && $_POST['new']==1)
		{
		$SSN=$_REQUEST['SSN'];
		$location =$_REQUEST['Location'];
		$tenure =$_REQUEST['Tenure'];
		$hsr =$_REQUEST['HoursSinceRest'];


		$query ="UPDATE Employee set Location = '" . $location .
		"', Tenure = '" . $tenure . "', HoursSinceRest = '" . $hsr .
		"' WHERE SSN = '" . $SSN . "'";

		mysqli_query($con, $query) or die(mysqli_error());
		$status = "Employee Updated Successfully. </br></br>
		<a href='view.php'>View Employees</a>";
		echo '<p style="color:#FF0000;">'.$status.'</p>';
		}else {
		?>
		<div>
			<form name="form" method="post" action="">
				<input type="hidden" name="new" value="1" />
				<input name="SSN" type="hidden" value="<?php echo $row['SSN'];?>" />
				<p><input type="text" name="Location" placeholder="Enter Position"
				required value="<?php echo $row['Location'];?>" /></p>

				<p><input type="text" name="Tenure" placeholder="Enter Tenure"
				required value="<?php echo $row['Tenure'];?>" /></p>

				<p><input type="text" name="HoursSinceRest" placeholder="Enter HSR"
				required value="<?php echo $row['HoursSinceRest'];?>" /></p>



				<p><input name="submit" type="submit" value="Update" /></p>
			</form>
		<?php } ?>
		</div>
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
