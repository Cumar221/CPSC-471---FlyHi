<?php
require('../db.php');
include("../auth.php");
$id=$_REQUEST['id'];
$query = "SELECT * from Airport where ACODE='".$id."'";
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
		<h1>Update Airport</h1>
		<?php
		$status = "";
		if(isset($_POST['new']) && $_POST['new']==1)
		{
		$id=$_REQUEST['id'];
		$aNAME =$_REQUEST['ANAME'];
		$query ="UPDATE Airport SET ANAME = '". $aNAME .
    "' WHERE ACODE = '". $id ."'";

		$result = mysqli_query($con, $query);
    if (!$result){
      echo "Error: " . mysqli_error($con);
    }else{
      $status = "Airport Updated Successfully. </br></br>
      <a href='view.php'>View Updated Record</a>";
      echo '<p style="color:#FF0000;">'.$status.'</p>';
    }

		}else {
		?>
		<div>
			<form name="form" method="post" action="">
				<input type="hidden" name="new" value="1" />
				<input name="id" type="hidden" value="<?php echo $row['ACODE'];?>" />
        <p><input type="text" name="ANAME" placeholder="Enter Airplane Name"
        required value="<?php echo $row['ANAME'];?>" /></p>




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
