<?php
require('../db.php');
include("../auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Tickets</title>
<link rel="stylesheet" href="../css/style.css" />
<!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
	<div id="header">
			<h1>FlyHi</h1>
	</div>
	<div id ="nav">
		<a href="../index.php">Home</a><br>
		<a href="insert.php">Buy Ticket</a><br>
		<a href="../logout.php">Logout</a><br>
	</div>
	<div class="form">
		<h2>View Tickets</h2>
			<table class="table table-hover table-inverse">
				<thead>
					<tr>
					<th><strong>Ticket</strong></th>
					<th><strong>Seat</strong></th>
					<th><strong>FlightNumber</strong></th>
					<th><strong>OrderNo</strong></th>
          <th><strong>Customer ID</strong></th>
					<th><strong>Edit</strong></th>
					<th><strong>Delete</strong></th>
					</tr>
				</thead>
				<tbody>
					<?php
						$count=1;
            if ($_SESSION['isEmployee'] == 1){
                $sel_query="Select * from Ticket, Buys WHERE Ticket.TicketNumber = Buys.TicketNumber ORDER BY Ticket.TicketNumber;";
            }else{
                $sel_query="Select * from Ticket, Buys WHERE Ticket.TicketNumber = Buys.TicketNumber AND Buys.ID = '". $_SESSION['id'] . "' ORDER BY Ticket.TicketNumber ;";
            }


						$result = mysqli_query($con,$sel_query);
						while($row = mysqli_fetch_assoc($result)) { ?>
						<td align="center"><?php echo $row["TicketNumber"]; ?></td>
						<td align="center"><?php echo $row["Seat"]; ?></td>
						<td align="center"><?php echo $row["FlightNumber"]; ?></td>
						<td align="center"><?php echo $row["OrderNo"]; ?></td>
            <td align="center"><?php echo $row["ID"]; ?></td>


						<td align="center">

						<a href="edit.php?ticketnumber=<?php echo $row["TicketNumber"]; ?>&orderno=<?php echo $row["OrderNo"]; ?>">Edit</a>
						</td>
						<td align="center">
              <a href="delete.php?ticketnumber=<?php echo $row["TicketNumber"]; ?>&orderno=<?php echo $row["OrderNo"]; ?>">Delete</a>
						</td>
						</tr>
					<?php $count++; } ?>
				</tbody>
			</table>

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
