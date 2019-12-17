<?php
session_start();
include("../connection/config.php");

	$position=$_POST['position']; 
	$salary=$_POST['salary']; 
	$date=$_POST['date']; 
	$description=$_POST['description'];
	$chk=$_POST['chk'];
	$experience=$_POST['experience'];
	$category=$_POST['category'];
	$company=$_POST['company'];
	$company_id=$_POST['company_id'];
	$manager=$_POST['manager'];
	$skills=$_POST['skills'];
	$no=$_POST['no'];

  if (isset($_POST['submit']))
  {
 $sql = "INSERT INTO vacancy (position,salary, date, chk, experience, category, company, company_id, manager, no, skills, description) VALUES 
 ('$position','$salary', '$date', '$chk','$experience', '$category', '$company', '$company_id','$manager','$no', '$skills', '$description')";

  if (mysqli_query($db, $sql)) {
	  header('location:vacancy_list.php');
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($db);
	}
  
}
mysqli_close($db);


?>