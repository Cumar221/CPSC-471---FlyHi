<?php
require('../db.php');
include("../auth.php");
$ticketNumber=$_REQUEST['ticketnumber'];
$queryT = "SELECT * from Ticket where TicketNumber='".$ticketNumber."'";
$resultT = mysqli_query($con, $queryT) or die ( mysqli_error());
$row = mysqli_fetch_assoc($resultT);

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Ticket</title>
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
		<h1>Update Ticket</h1>
		<?php
		$status = "";
		if(isset($_POST['new']) && $_POST['new']==1)
		{
		$id=$_REQUEST['id'];
		$seat =$_REQUEST['Seat'];
		$query ="UPDATE Ticket SET Seat = '". $seat .
    "' WHERE TicketNumber = '". $id ."'";

		$result = mysqli_query($con, $query);
    if (!$result){
      echo "Error: " . mysqli_error($con);
    }else{
      $status = "Seat Updated Successfully. </br></br>
      <a href='view.php'>View Updated Ticket</a>";
      echo '<p style="color:#FF0000;">'.$status.'</p>';
    }

		}else {
		?>
		<div>
			<form name="form" method="post" action="">
				<input type="hidden" name="new" value="1" />
				<input name="id" type="hidden" value="<?php echo $row['TicketNumber'];?>" />
        <p><input type="text" name="Seat" placeholder="Enter Seat Number"
        required value="<?php echo $row['Seat'];?>" /></p>




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
