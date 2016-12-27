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
		<a href="insert.php">Insert New Airport</a><br>
		<a href="../logout.php">Logout</a><br>
	</div>
	<div class="form">
		<h2>View Airport</h2>
			<table class="table table-hover table-inverse">
				<thead>
					<tr>
					<th><strong>Code</strong></th>
					<th><strong>Name</strong></th>
					<th><strong>City</strong></th>
					<th><strong>Country</strong></th>
					<th><strong>Edit</strong></th>
					<th><strong>Delete</strong></th>
					</tr>
				</thead>
				<tbody>
					<?php
						$count=1;
						$sel_query="Select * from Airport ORDER BY ACODE desc;";
						$result = mysqli_query($con,$sel_query);
						while($row = mysqli_fetch_assoc($result)) { ?>
						<td align="center"><?php echo $row["ACODE"]; ?></td>
						<td align="center"><?php echo $row["ANAME"]; ?></td>
						<td align="center"><?php echo $row["City"]; ?></td>
						<td align="center"><?php echo $row["Country"]; ?></td>

						<td align="center">
						<a href="edit.php?id=<?php echo $row["ACODE"]; ?>">Edit</a>
						</td>
						<td align="center">
						<a href="delete.php?id=<?php echo $row["ACODE"]; ?>">Delete</a>
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
