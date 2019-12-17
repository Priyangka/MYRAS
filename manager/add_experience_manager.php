<?php

include("../connection/config.php");

$venue=$_POST['venue'];
$act_name=$_POST['act_name'];  
$start_date=$_POST['start_date'];
$no=$_POST['no']; 
$deletes=$_POST['deletes']; 
$description=$_POST['description']; 

$sql = "INSERT INTO experience (act_name, venue, start_date,no,description) VALUES ('$act_name', '$venue', '$start_date','$no','$description')";

if (mysqli_query($db, $sql)) {
    header('location:edit_personal_manager_job.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
}

mysqli_close($db);

?>