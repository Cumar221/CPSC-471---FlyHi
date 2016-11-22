<?php

$host = "localhost";
$username = "localhost";
$password = "";
$database = "test";
$table = "mytable";



$conn = mysqli_connect ("$host" , "$username" , "$password" , "$database");

if (!$conn) {
    die("Connection failed: " . $mysqli_connect_error());
}else{
	echo "Connected..";
} 

if(isset($_POST['submit'])){
	print("Submit in");
	$t = $_POST['name'];
	$sql = "INSERT INTO mytable (name) VALUES ('$t')";
	$result = mysqli_query($conn, $sql);
	
if ($result) {
	echo "Successfully added";
}else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
	
	
}
else if(isset($_POST['submit2'])){
	print("Submit2 in ");
	$sql = "SELECT * FROM mytable";
	$result = mysqli_query($conn, $sql);
	
	if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "name: " . $row["name"]. "<br>";
    }
}else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
	
}
else{
	print("Submit not in");
}






mysqli_close($conn);

?>