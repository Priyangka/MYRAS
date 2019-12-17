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
"INSERT INTO vacancy_participant (name,position,email,no,vacancy_id,phone,status) 
VALUES ('$name', '$position','$email', '$no','$vacancy_id','$phone','In-Process')";


//if (mysqli_query($db, $sql1) && mysqli_query($db, $sql2)) {
if (mysqli_query($db, $sql1)){

   // header('location:https://www.billplz.com/b_m88mvx7');
    header('location:main.php');
    //echo "New record created successfully";
} else {
    echo "Error: " . $sql1 . "<br>" . mysqli_error($db);
}

mysqli_close($db);

?>