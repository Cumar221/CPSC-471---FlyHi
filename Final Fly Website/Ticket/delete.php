<?php
require('../db.php');
$orderNo=$_REQUEST['orderno'];
$ticketNumber=$_REQUEST['ticketnumber'];
$query = "DELETE FROM Ticket WHERE TicketNumber=$ticketNumber";
$result = mysqli_query($con,$query) or die ( mysqli_error());
$query = "DELETE FROM Buys WHERE OrderNo=$orderNo";
header("Location: view.php");
?>
