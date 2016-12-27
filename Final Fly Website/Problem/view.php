<?php
require('../db.php');
include("../auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Problems</title>
<link rel="stylesheet" href="../css/style.css" />
<!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
	<div id="header">
			<h1>FlyHi</h1>
	</div>
	<div id ="nav">
		<a href="../index.php">Home</a><br>
		<a href="insert.php">Insert Problem</a><br>
		<a href="../logout.php">Logout</a><br>
	</div>
	<div class="form">
		<h2>View Problem</h2>
			<table class="table table-hover table-inverse">
				<thead>
					<tr>
					<th><strong>Problem Time</strong></th>
					<th><strong>Problem ID</strong></th>
					<th><strong>Problem Time</strong></th>
					</tr>
				</thead>
				<tbody>
					<?php
						$count=1;
						$sel_query="Select * from Problem ORDER BY ID desc;";
						$result = mysqli_query($con,$sel_query);
						while($row = mysqli_fetch_assoc($result)) { ?>
						<td align="center"><?php echo $row["PTIME"]; ?></td>
						<td align="center"><?php echo $row["ID"]; ?></td>
						<td align="center"><?php echo $row["PTYPE"]; ?></td>
						<td align="center">
						<a href="edit.php?id=<?php echo $row["ID"]; ?>">Edit</a>
						</td>
						<td align="center">
						<a href="delete.php?id=<?php echo $row["ID"]; ?>">Delete</a>
						</td>
						</tr>
					<?php $count++; } ?>
				</tbody>
			</table>

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
