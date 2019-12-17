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

  if (isset($_POST['submit']))
  {
 $sql = "UPDATE vacancy_participant SET status='$status' WHERE vacancy_id='$vacancy_id'";


 
  if (mysqli_query($db, $sql)) {
  	  echo 'vacancy_id';
	 //header('location:vacancy_details.php?vacancy_id='.$vacancy_id);

	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($db);
	}
  
}
mysqli_close($db);


?>