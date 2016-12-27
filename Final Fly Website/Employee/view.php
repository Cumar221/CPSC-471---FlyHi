<?php
require('../db.php');
include("../auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Employees</title>
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
		<a href="insert.php">Add Employees</a><br>
		<a href="../logout.php">Logout</a><br>
	</div>
	<div class="form">
		<h2>View Airport</h2>
			<table class="table table-hover table-inverse">
				<thead>
					<tr>
            <th><strong>Employee ID</strong></th>
  					<th><strong>First Name</strong></th>
  					<th><strong>Last Name</strong></th>
            <th><strong>SSN</strong></th>
            <th><strong>Hours Since Rest</strong></th>
            <th><strong>Tenure</strong></th>
  					<th><strong>Is Minor?</strong></th>
            <th><strong>Location</strong></th>
					<th><strong>Edit</strong></th>
					<th><strong>Delete</strong></th>
					</tr>
				</thead>
				<tbody>
					<?php
						$count=1;
						$sel_query="Select * from Employee, Person WHERE Employee.ID = Person.ID  ORDER BY Employee.ID desc;";

						$result = mysqli_query($con,$sel_query);
						while($row = mysqli_fetch_assoc($result)) { ?>
						<td align="center"><?php echo $row["ID"]; ?></td>
						<td align="center"><?php echo $row["FirstName"]; ?></td>
						<td align="center"><?php echo $row["LastName"]; ?></td>
						<td align="center"><?php echo $row["SSN"]; ?></td>
            <td align="center"><?php echo $row["HoursSinceRest"]; ?></td>
            <td align="center"><?php echo $row["Tenure"]; ?></td>
            <td align="center"><?php echo $row["IsMinor"]; ?></td>
            <td align="center"><?php echo $row["Location"]; ?></td>



						<td align="center">

            <a href="edit.php?SSN=<?php echo $row["SSN"]; ?>">Edit</a>
						</td>
						<td align="center">
              <a href="delete.php?SSN=<?php echo $row["SSN"]; ?>">Delete</a>
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
