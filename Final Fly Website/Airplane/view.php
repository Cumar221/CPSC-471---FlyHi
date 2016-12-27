<?php
require('../db.php');
include("../auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Records</title>
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
		<a href="insert.php">Insert New Record</a><br>
		<a href="../logout.php">Logout</a><br>
	</div>
	<div class="form">
		<h2>View Records</h2>
			<table class="table table-hover table-inverse">
				<thead>
					<tr>
					<th><strong>Airplane ID</strong></th>
					<th><strong>Airplane Position</strong></th>
					<th><strong>Baggage</strong></th>
					<th><strong>Next Flight</strong></th>
					<th><strong>Fuel</strong></th>
					<th><strong>Airplane Type</strong></th>
					<th><strong>Edit</strong></th>
					<th><strong>Delete</strong></th>
					</tr>
				</thead>
				<tbody>
					<?php
						$count=1;
						$sel_query="Select * from Airplane ORDER BY AirplaneID desc;";
						$result = mysqli_query($con,$sel_query);
						while($row = mysqli_fetch_assoc($result)) { ?>
						<td align="center"><?php echo $row["AirplaneID"]; ?></td>
						<td align="center"><?php echo $row["AirplanePosition"]; ?></td>
						<td align="center"><?php echo $row["Baggage"]; ?></td>
						<td align="center"><?php echo $row["NextFlight"]; ?></td>
						<td align="center"><?php echo $row["Fuel"]; ?></td>
						<td align="center"><?php echo $row["AirplaneType"]; ?></td>
						<td align="center">
						<a href="edit.php?id=<?php echo $row["AirplaneID"]; ?>">Edit</a>
						</td>
						<td align="center">
						<a href="delete.php?id=<?php echo $row["AirplaneID"]; ?>">Delete</a>
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
