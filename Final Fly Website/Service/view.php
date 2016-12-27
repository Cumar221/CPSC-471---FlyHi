<?php
require('../db.php');
include("../auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Service</title>
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
		<a href="insert.php">Insert New Service</a><br>
		<a href="../logout.php">Logout</a><br>
	</div>
	<div class="form">
		<h2>View Service</h2>
			<table class="table table-hover table-inverse">
				<thead>
					<tr>
					<th><strong>Work Preformed</strong></th>
					<th><strong>Service Number</strong></th>
					<th><strong>Good Until</strong></th>
					</tr>
				</thead>
				<tbody>
					<?php
						$count=1;
						$sel_query="Select * from Service ORDER BY ServiceNumber desc;";
						$result = mysqli_query($con,$sel_query);
						while($row = mysqli_fetch_assoc($result)) { ?>
						<td align="center"><?php echo $row["WorkPreformed"]; ?></td>
						<td align="center"><?php echo $row["ServiceNumber"]; ?></td>
						<td align="center"><?php echo $row["GoodUntil"]; ?></td>
						<td align="center">
						<a href="edit.php?id=<?php echo $row["ServiceNumber"]; ?>">Edit</a>
						</td>
						<td align="center">
						<a href="delete.php?id=<?php echo $row["ServiceNumber"]; ?>">Delete</a>
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
