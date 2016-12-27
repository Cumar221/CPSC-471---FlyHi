<?php
require('../db.php');
$aid=$_REQUEST['aid'];
$sno=$_REQUEST['sno'];
$query = "DELETE FROM Repair WHERE AirplaneID=$aid AND ServiceNumber=$sno";
$result = mysqli_query($con,$query);
if (!$result){
  echo "Error: " . mysqli_error($con);

  die(mysql_error());
}header("Location: view.php");
?>
