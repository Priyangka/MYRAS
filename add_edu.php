<?php

include("connection/config.php");

$university=$_POST['university'];
$description=$_POST['description'];
$course=$_POST['course'];  
$grad=$_POST['grad'];
$no=$_POST['no']; 

$sql = "INSERT INTO education (course, university, grad,no,description) VALUES ('$course', '$university', '$grad','$no', '$description')";

if (mysqli_query($db, $sql)) {
    header('location:edit_educationbcg.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
}

mysqli_close($db);

?>