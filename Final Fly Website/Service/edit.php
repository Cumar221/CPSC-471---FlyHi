<?php
require('../db.php');
include("../auth.php");
$id=$_REQUEST['id'];
$query = "SELECT * from Service where ServiceNumber='".$id."'";
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Service</title>
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
		<a href="insert.php">Insert New Service</a><br>
		<a href="../logout.php">Logout</a><br>
	</div>
	<div class="form">
		<h1>Update Service</h1>
		<?php
		$status = "";
		if(isset($_POST['new']) && $_POST['new']==1)
		{
		$id=$_REQUEST['id'];
		$workPreformed =$_REQUEST['WorkPreformed'];
		$goodUntil =$_REQUEST['GoodUntil'];

		$query = "UPDATE Service set WorkPreformed = '$workPreformed',
		GoodUntil = $goodUntil WHERE ServiceNumber = $id";

		mysqli_query($con, $query) or die(mysqli_error());
		$status = "Record Updated Successfully. </br></br>
		<a href='view.php'>View Updated Record</a>";
		echo '<p style="color:#FF0000;">'.$status.'</p>';
		}else {
		?>
		<div>
			<form name="form" method="post" action="">
				<input type="hidden" name="new" value="1" />
				<input name="id" type="hidden" value="<?php echo $row['ServiceNumber'];?>" />

				<p><input type="text" name="WorkPreformed" placeholder="Enter Work Preformed"
				required value="<?php echo $row['WorkPreformed'];?>" /></p>

				<p><input type="text" name="GoodUntil" placeholder="Enter Good Until"
				required value="<?php echo $row['GoodUntil'];?>" /></p>

				<p><input name="submit" type="submit" value="Update" /></p>
			</form>
		<?php } ?>
		</div>
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
