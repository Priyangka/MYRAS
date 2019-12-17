<?php
session_start();
include("../connection/config.php");

	$title=$_POST['title']; 
	$industry=$_POST['industry']; 
	$days=$_POST['days']; 
	$description=$_POST['description'];
	$time_from=$_POST['time_from'];
	$time_to=$_POST['time_to'];
	$ssm_no=$_POST['ssm_no'];
	$size1=$_POST['size1'];
	$comp_address=$_POST['comp_address'];
	$benefits=$_POST['benefits'];
	$no=$_POST['no'];
	$manager=$_POST['manager'];

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
    if (file_exists("company/" . $newfilename))
    {
      // file already exists error
      echo "You have already uploaded this file.";
    }
    else
    {
      move_uploaded_file($_FILES["file"]["tmp_name"], "company/" . $newfilename);
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
  $sql = "INSERT INTO company (title,industry,description,size,benefits,no,manager,company_banner,ssm_no, time_from, time_to, comp_address, days) VALUES ('$title','$industry','$description','$size1','$benefits','$no','$manager', '$file_name', '$ssm_no', '$time_from', '$time_to','$comp_address','$days')";
  if (mysqli_query($db, $sql)) {
	  header('location:company_details.php');
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($db);
	}
  
}
mysqli_close($db);


?>