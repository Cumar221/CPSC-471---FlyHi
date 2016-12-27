<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
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
	session_start();
	// If form submitted, insert values into the database.
	if (isset($_POST['id'])){

			// removes backslashes
		$id = stripslashes($_REQUEST['id']);
			//escapes special characters in a string
		$id = mysqli_real_escape_string($con,$id);
		//Checking is user existing in the database or not
			$query = "SELECT * FROM `Person` WHERE ID='$id'";
		$result = mysqli_query($con,$query) or die(mysql_error());
		$rows = mysqli_num_rows($result);
			if($rows==1){
				   $_SESSION['id'] = $id;
           echo "<div class='form'>
           <h3>You have logged in successfully.  </h3>
           <br/>Click <a href='index.php'>here</a> to go home.</div>";
				// Redirect user to index.php
				   header("Location: index.php");
			 }else{
				echo "<div class='form'>
			  <h3>ID is incorrect.</h3>
			  <br/>Click here to <a href='login.php'>Login</a></div>";
			   }
	}else{
	?>
	<div class="form">
		<h1>Log In</h1>
		<form action="" method="post" name="login">
			<input type="text" name="id" placeholder="ID" required />
			<input name="submit" type="submit" value="Login" />
		</form>
		<p>Not registered yet? <a href='registration.php'>Register Here</a></p>
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
