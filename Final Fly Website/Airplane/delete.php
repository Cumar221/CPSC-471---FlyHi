<?php
require('../db.php');
$id=$_REQUEST['id'];
$query = "DELETE FROM Airplane WHERE AirplaneID=$id";
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: view.php");
?>