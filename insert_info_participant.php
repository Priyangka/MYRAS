<?php

include("connection/config.php");

$name=$_POST['name']; 
$title=$_POST['title']; 
$email=$_POST['email']; 
$no=$_POST['no'];
$info_id=$_POST['info_id'];
$phone=$_POST['phone'];


$sql1 = "INSERT IGNORE INTO latest_information_participant (name,title,email,no,info_id,phone) VALUES ('$name', '$title','$email', '$no','$info_id', '$phone')";

  $check="SELECT no,info_id from latest_information_participant where info_id='$info_id' and no='$no'";
if (mysqli_query($db, $check))
{
 
   $count=mysqli_num_rows (mysqli_query($db, $check));
   if($count>0)
   	{       header('location:course_main.php');

   }
	else 
	{
		if (mysqli_query($db, $sql1))
			{  header('location:course_main.php'); }
		else
		    {echo "Error: " . $sql1 . "<br>" . mysqli_error($db);}
    }
   }


mysqli_close($db);

?>