<?php

include("../connection/config.php");

$name=$_POST['name']; 
$title=$_POST['title']; 
$email=$_POST['email']; 
$no=$_POST['no'];
$info_id=$_POST['info_id'];
$phone=$_POST['phone'];
//$child_name=$_POST['child_name'];


$sql1 = "INSERT INTO latest_information_participant (name,title,email,no,info_id,phone) VALUES ('$name', '$title','$email', '$no','$info_id', '$phone')";

//if (mysqli_query($db, $sql1) && mysqli_query($db, $sql2)) {
if( isset( $_POST['enter'] ) ) {
if (mysqli_query($db, $sql1)){
  // header('location:https://www.billplz.com/b_m88mvx7');
header('location:course_offer.php');}
    //echo "New record created successfully";
    else {
    echo "Error: " . $sql1 . "<br>" . mysqli_error($db);
}
}
mysqli_close($db);

?>