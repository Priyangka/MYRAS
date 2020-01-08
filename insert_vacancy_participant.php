<?php

include("connection/config.php");

$name=$_POST['name']; 
$position=$_POST['position']; 
$email=$_POST['email']; 
$no=$_POST['no'];
$vacancy_id=$_POST['vacancy_id'];
$phone=$_POST['phone'];
$status=$_POST['status'];


$sql1 = 
" INSERT  ignore INTO vacancy_participant (name,position,email,no,vacancy_id,phone,status) 
VALUES ('$name', '$position','$email', '$no','$vacancy_id','$phone','In-Process')";

  $check="SELECT name,no,vacancy_id from vacancy_participant where name='$name' and no='$no' and vacancy_id='$vacancy_id'";

//if (mysqli_query($db, $sql1) && mysqli_query($db, $sql2)) {
if (mysqli_query($db, $check))
{
 
   $count=mysqli_num_rows (mysqli_query($db, $check));
   if($count>0)
   	{      header('location:main.php');

   }
	else 
	{
		if (mysqli_query($db, $sql1))
			{header('location:main.php'); }
		else
		    {echo "Error: " . $sql1 . "<br>" . mysqli_error($db);}
    }
   }

mysqli_close($db);

?>