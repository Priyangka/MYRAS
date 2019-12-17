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
	$id=$_POST['id'];

  if (isset($_POST['submit']))
  {
 $sql = "UPDATE vacancy SET position='$position', salary = '$salary', date='$date', chk='$chk', experience='$experience', category='$category',
 company='$company',manager='$manager',no='$no',skills='$skills',description='$description' WHERE id='$id'";
 
  if (mysqli_query($db, $sql)) {
	  header('location:vacancy_list.php');
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($db);
	}
  
}
mysqli_close($db);


?>