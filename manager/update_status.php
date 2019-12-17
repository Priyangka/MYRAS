<?php
session_start();
include("../connection/config.php");

	
//$name=$_POST['name']; 
//$position=$_POST['position']; 
//$email=$_POST['email']; 
//$no=$_POST['no'];
//$vacancy_id=$_POST['vacancy_id'];
//$phone=$_POST['phone'];
$status=$_POST['status'];
$no = $_GET['no'];





  if (isset($_POST['submit']))
  {
  
 $sql = "UPDATE vacancy_participant SET status='$status' WHERE no='$no'";


 
  if (mysqli_query($db, $sql)) {
  	 // echo 'vacancy_id';
	 header('location:'. $_SERVER['HTTP_REFERER']);

	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($db);
	}
  
}
mysqli_close($db);


?>