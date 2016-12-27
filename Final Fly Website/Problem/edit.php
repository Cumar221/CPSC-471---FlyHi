<?php
require('../db.php');
include("../auth.php");
$id=$_REQUEST['id'];
$query = "SELECT * from Problem where ID='".$id."'";
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Problem</title>
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
		<a href="insert.php">Insert New Problem</a><br>
		<a href="../logout.php">Logout</a><br>
	</div>
	<div class="form">
		<h1>Update Problem</h1>
		<?php
		$status = "";
		if(isset($_POST['new']) && $_POST['new']==1)
		{
		$pTime=$_REQUEST['PTIME'];
		$ID =$_REQUEST['ID'];
		$pType =$_REQUEST['PTYPE'];

		$query ="UPDATE Problem set PTIME = " . $pTime .
		", ID = " . $ID . ", PTYPE = " . $pType . " WHERE ID = " . $id;

		mysqli_query($con, $query) or die(mysqli_error());
		$status = "Problem Updated Successfully. </br></br>
		<a href='view.php'>View Updated Problem</a>";
		echo '<p style="color:#FF0000;">'.$status.'</p>';
		}else {
		?>
		<div>
			<form name="form" method="post" action="">
				<input type="hidden" name="new" value="1" />

				<input name="id" type="hidden" value="<?php echo $row['ID'];?>" />

				<p><input type="text" name="PTIME" placeholder="Enter Problem Time"
				required value="<?php echo $row['PTIME'];?>" /></p>

				<p><input type="text" name="ID" placeholder="Enter ID"
				required value="<?php echo $row['ID'];?>" /></p>

				<p><input type="text" name="PTYPE" placeholder="Enter Problem Type"
				required value="<?php echo $row['PTYPE'];?>" /></p>


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
