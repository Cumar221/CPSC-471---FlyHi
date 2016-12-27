<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="css/style.css" />
<!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div id="header">
			<h1>FlyHi</h1>
	</div>
<?php
require('db.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['FirstName'])){
        // removes backslashes
	$firstName = stripslashes($_REQUEST['FirstName']);
        //escapes special characters in a string
	$firstName = mysqli_real_escape_string($con,$firstName);
	$lastName = stripslashes($_REQUEST['LastName']);
	$lastName = mysqli_real_escape_string($con,$lastName);
  $isMinor  = stripslashes($_REQUEST['isMinor']);
  $isMinor  = mysqli_real_escape_string($con,$isMinor);
  $location  = stripslashes($_REQUEST['Location']);
  $location  = mysqli_real_escape_string($con,$location);
;

  $s = "SELECT MAX(ID) AS maxID FROM Person";
  $r = mysqli_query($con, $s);
  $row = mysqli_fetch_assoc($r);
  $id = $row["maxID"] + 1;

  $query = "INSERT into `Person` (FirstName, LastName, IsMinor, Location, ID)
  VALUES ('$firstName', '$lastName', '$isMinor', '$location', '$id')";
  $result = mysqli_query($con,$query);
  if($result){
    $query = "INSERT into `Customer` (ID)
    VALUES ('$id')";
    $result = mysqli_query($con,$query);
    if ($result){
      echo "<div class='form'>
      <h3>You are registered successfully. Your ID is: ".$id.
      "</h3>
      <br/>Click here to <a href='login.php'>Login</a></div>";
    }else{
      echo "Error: " . mysqli_error($con);
    }
  }else{
    echo "Error: " . mysqli_error($con);
  }
  }else{
?>
<div class="form">
<h1>Registration</h1>
<form name="registration" action="" method="post">
<input type="text" name="FirstName" placeholder="First Name" required />
<input type="text" name="LastName" placeholder="Last Name" required />
<select class="selector" name = "isMinor" >
  <option value="-1" disabled selected="selected">Are you a Minor?</option>
  <option value="0">Yes</option>
  <option value="1">No</option>
</select>
<input type="text" name="Location" placeholder="City" required />
<input type="submit" name="submit" value="Register" />
</form>
</div>
<?php } ?>
  <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
<footer>
	<div id="footer">
		Copyright © FlyHi
	</div>
</footer>
</html>
