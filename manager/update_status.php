<?php
session_start();
include("../connection/config.php");

	
$name=$_POST['name']; 
$position=$_POST['position']; 
$email=$_POST['email']; 
$no=$_POST['no'];
$vacancy_id=$_POST['vacancy_id'];
$phone=$_POST['phone'];
$status=$_POST['status'];

  if (isset($_POST['status']))
  {
 $sql = "UPDATE vacancy_participant SET status="$status" WHERE id='$id'";


 
  if (mysqli_query($db, $sql)) {
	  header('location:vacancy_list.php');
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($db);
	}
  
}
mysqli_close($db);


?>