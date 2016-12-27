<?php
require('../db.php');
$SSN=$_REQUEST['SSN'];
$query = "DELETE FROM Employee WHERE SSN=$SSN";

$result = mysqli_query($con,$query);
if(!$result){
  echo "Error: " . mysqli_error($con);
 
}
header("Location: view.php");
?>
