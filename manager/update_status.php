<?php
session_start();
include("../connection/config.php");


$status=$_POST['status'];
$no = $_GET['no'];
$vacancy_id = $_GET['vac'];

  if (isset($_POST['submit']))
  {
  
 $sql = "UPDATE vacancy_participant SET status='$status' WHERE no='$no' AND vacancy_id='$vacancy_id' ";


 
  if (mysqli_query($db, $sql)) {
  	 header('location:'. $_SERVER['HTTP_REFERER']);

	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($db);
	}
  
}
mysqli_close($db);


?>