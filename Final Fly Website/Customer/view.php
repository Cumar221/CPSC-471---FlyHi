<?php
require('../db.php');
include("../auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Customers</title>
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
		<a href="../logout.php">Logout</a><br>
	</div>
	<div class="form">
		<h2>View Customers</h2>
			<table class="table table-hover table-inverse">
				<thead>
					<tr>
					<th><strong>Customer ID</strong></th>
					<th><strong>First Name</strong></th>
					<th><strong>Last Name</strong></th>
					<th><strong>Is Minor?</strong></th>
          <th><strong>Location</strong></th>
					</tr>
				</thead>
				<tbody>
					<?php
						$count=1;
						$sel_query="Select * from Person, Customer WHERE Person.ID = Customer.ID ORDER BY Customer.ID ;";

						$result = mysqli_query($con,$sel_query);
						while($row = mysqli_fetch_assoc($result)) { ?>
						<td align="center"><?php echo $row["ID"]; ?></td>
						<td align="center"><?php echo $row["FirstName"]; ?></td>
						<td align="center"><?php echo $row["LastName"]; ?></td>
						<td align="center"><?php echo $row["IsMinor"]; ?></td>
            <td align="center"><?php echo $row["Location"]; ?></td>

						<td align="center">

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
