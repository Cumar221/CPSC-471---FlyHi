<?php
require('../db.php');
include("../auth.php");
$id=$_REQUEST['id'];
$query = "SELECT * from Airplane where AirplaneID='".$id."'";
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Airplane</title>
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
		<a href="insert.php">Insert New Record</a><br>
		<a href="../logout.php">Logout</a><br>
	</div>
	<div class="form">
		<h1>Update Airplane</h1>
		<?php
		$status = "";
		if(isset($_POST['new']) && $_POST['new']==1)
		{
		$id=$_REQUEST['id'];
		$airplanePosition =$_REQUEST['AirplanePosition'];
		$baggage =$_REQUEST['Baggage'];
		$nextFlight =$_REQUEST['NextFlight'];
		$fuel =$_REQUEST['Fuel'];
		$airplaneType =$_REQUEST['AirplaneType'];

		$query ="UPDATE Airplane set AirplanePosition = " . $airplanePosition .
		", Baggage = " . $baggage . ", NextFlight = " . $nextFlight . ", Fuel = " .
		$fuel .  " WHERE AirplaneID = " . $id;

		mysqli_query($con, $query) or die(mysqli_error());
		$status = "Record Updated Successfully. </br></br>
		<a href='view.php'>View Updated Record</a>";
		echo '<p style="color:#FF0000;">'.$status.'</p>';
		}else {
		?>
		<div>
			<form name="form" method="post" action="">
				<input type="hidden" name="new" value="1" />
				<input name="id" type="hidden" value="<?php echo $row['AirplaneID'];?>" />
				<p><input type="text" name="AirplanePosition" placeholder="Enter Position"
				required value="<?php echo $row['AirplanePosition'];?>" /></p>

				<p><input type="text" name="Baggage" placeholder="Enter Baggage"
				required value="<?php echo $row['Baggage'];?>" /></p>

				<p><input type="text" name="NextFlight" placeholder="Enter Flight"
				required value="<?php echo $row['NextFlight'];?>" /></p>

				<p><input type="text" name="Fuel" placeholder="Enter Fuel"
				required value="<?php echo $row['Fuel'];?>" /></p>


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
