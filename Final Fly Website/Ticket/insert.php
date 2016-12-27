<?php
require('../db.php');
include("../auth.php");
$status = "";
if(isset($_POST['new']) && $_POST['new']==1){
    $customerID = $_SESSION["id"];
    $seat =$_REQUEST['Seat'];
    $flight = $_REQUEST['FlightNumber'];

    $s = "SELECT MAX(TicketNumber) AS maxTicket FROM Ticket";
    $r = mysqli_query($con, $s);
    $row = mysqli_fetch_assoc($r);
    $ticketNumber = $row["maxTicket"] + 1;

    $s = "SELECT MAX(OrderNo) AS maxOrder FROM Buys";
    $r = mysqli_query($con, $s);
    $row = mysqli_fetch_assoc($r);
    $orderNo = $row["maxOrder"] + 1;

    $query = "INSERT into Ticket" .
    "(TicketNumber, Seat, FlightNumber)".
    "VALUES ('$ticketNumber', '$seat', '$flight')";

    $result = mysqli_query($con, $query);
    if (!$result){
      echo "Error: " . mysqli_error($con);
      die ( mysqli_error());
    }


    $query = "INSERT into Buys" .
    "(OrderNo, ID, TicketNumber)".
    "VALUES ('$orderNo', '$customerID', '$ticketNumber')";
    $result = mysqli_query($con, $query);
    if (!$result){
      echo "Error: " . mysqli_error($con);
      die ( mysqli_error());
    }

    $status = "Ticket Purchased Successfully.
    </br></br><a href='view.php'>View Ticket Database</a>";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Buy Ticket Form    </title>
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
			<h1>Buy New Ticket</h1>
			<form name="form" method="post" action="">
			<input type="hidden" name="new" value="1" />
			<p><input type="text" name="Seat" placeholder="Enter Seat Number" required /></p>
			<p><input type="text" name="FlightNumber" placeholder="Enter Flight Number" required /></p>


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
