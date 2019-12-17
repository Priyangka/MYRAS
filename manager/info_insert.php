<?php
session_start();
include("../connection/config.php");

	$title=$_POST['title']; 
	$code_title=$_POST['code_title']; 
	$date=$_POST['date']; 
	$description=$_POST['description'];
	$chk=$_POST['chk'];
	$time_from=$_POST['time_from'];
	$time_to=$_POST['time_to'];
	$venue=$_POST['venue'];
	$preference=$_POST['preference'];

  if (isset($_POST['submit']))
  {
  $filename = $_FILES["file"]["name"];
  $file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
  $file_ext = substr($filename, strripos($filename, '.')); // get file name
  $filesize = $_FILES["file"]["size"];
  $allowed_file_types = array('.jpeg','.jpg','.png');

  if (in_array($file_ext,$allowed_file_types))
  {
    // Rename file
    $newfilename = md5($file_basename) . $file_ext;
    if (file_exists("banner/" . $newfilename))
    {
      // file already exists error
      echo "You have already uploaded this file.";
    }
    else
    {
      move_uploaded_file($_FILES["file"]["tmp_name"], "banner/" . $newfilename);
      //echo "File uploaded successfully.";
         $file_name=$newfilename;
    }
  }
  elseif (empty($file_basename))
  {
    // file selection error
    echo "Please select a file to upload.";
  }
  else
  {
    // file type error
    echo "Only these file typs are allowed for upload: " . implode(', ',$allowed_file_types);
    unlink($_FILES["file"]["tmp_name"]);
  }
 // $sql = "INSERT INTO membership (Area, Reason, FullName, NRIC, Gender, Race, BirthDate, MPhone, Email, Address, Institution01, Program01, YearStud01, Institution02, Program02, YearStud02, Org01, YearOrg01, Position01, Org02, YearOrg02, Position02, Contribution01, Receipt, SubDate,username,password,level) VALUES ('$Area', '$Reason', '$FullName', '$NRIC', '$Gender', '$Race', '$BirthDate', '$MPhone', '$Email', '$Address', '$Institution01', '$Program01', '$YearStud01', '$Institution02', '$Program02', '$YearStud02', '$Org01', '$YearOrg01', '$Position01', '$Org02', '$YearOrg02', '$Position02', '" . $checkBox . "', '$file_name', '$SubDate','$username','$password','$level')";
  $sql = "INSERT INTO latest_information (title,code_title, date,description, chk, time_from, time_to, venue, preference, image_banner) VALUES ('$title','$code_title', '$date','$description', '$chk','$time_from', '$time_to', '$venue', '$preference','$file_name')";

  if (mysqli_query($db, $sql)) {
	  header('location:info_list.php');
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($db);
	}
  
}
mysqli_close($db);


?>