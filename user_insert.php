<?php

include("connection/config.php");

$name=$_POST['name']; 
$password=$_POST['password']; 
$username=$_POST['username'];
$phone=$_POST['phone'];
$preference=$_POST['preference'];
$level=$_POST['level'];

$sql1 = "INSERT INTO personal_info (name, password,username, phone,level,preference) VALUES ('$name', '$password','$username', '$phone','$level','$preference')";
$sql2 = "INSERT INTO login (password,username,level) VALUES ('$password','$username', '$level')";

if (mysqli_query($db, $sql1)&& mysqli_query($db, $sql2)){
	$sql3 = "SELECT level,username,id, password FROM personal_info WHERE username='$username'";
	$resultView = mysqli_query($db, $sql3);
	$rowView = mysqli_fetch_array($resultView);

	$username = $rowView['username'];
	$password = $rowView['password'];
	$no = $rowView['id'];
	$level = $rowView['level'];
	echo $nric;
	
	$sql4 = "UPDATE login SET no = '$no' WHERE username= '$username'";
	mysqli_query($db, $sql4);
	$sql5 = "UPDATE personal_info SET no = '$no' WHERE username= '$username'";
	mysqli_query($db, $sql5);
	
    header('location:index.php');
}   else {
    echo "Error: " . $sql1 . "<br>" . mysqli_error($db);
}


mysqli_close($db);

?>