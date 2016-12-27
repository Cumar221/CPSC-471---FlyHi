<?php
require('db.php');

session_start();
if (isset($_SESSION["id"])){
  $sel_query="Select * from Person, Employee where Employee.ID = Person.ID AND Person.ID =". $_SESSION["id"] ;
  $result = mysqli_query($con,$sel_query);
  if (!$result){
    echo "Error: " . mysqli_error($con);
    die ( mysqli_error());
  }
  $rows = mysqli_num_rows($result);

  if($rows==1){
       $_SESSION['isEmployee'] = 1;

   }else{
     $_SESSION['isEmployee'] = 0;
   }

}
else{
  header("Location: login.php");
  exit();
}
?>
