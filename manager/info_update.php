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
	$id=$_POST['id'];
	
	$actual_image_name= $_FILES['image']['name'];
	$path = "banner/";

$valid_formats = array("jpg","jpeg", "png", "gif", "bmp");

if(isset($_POST['submit'])){
 
 $names = $_FILES['image']['name'];
 $target_dir = "banner/";
 $target_file = $target_dir . basename($_FILES["image"]["name"]);

 // Select file type
 $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

 // Valid file extensions
 $extensions_arr = array("jpg","jpeg","png","gif");

 // Check extension
 if( in_array($imageFileType,$extensions_arr) ){
 
  // Convert to base64 
  $image_base64 = base64_encode(file_get_contents($_FILES['image']['tmp_name']) );
  $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
  // Insert record
  
	$filename = $names;
	$file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
	$file_ext = substr($filename, strripos($filename, '.')); // get file name
 
      $newfilename = md5($file_basename) . $file_ext;

      //echo "File uploaded successfully.";
         $file_name=$newfilename;
  	 $query = "UPDATE latest_information SET image_banner='$file_name' WHERE id='$id'";		
	 mysqli_query($db,$query);
		 move_uploaded_file($_FILES["image"]["tmp_name"], "banner/" . $newfilename);

     header('location:info_details.php');
 }
 
}
 $sql = "UPDATE latest_information SET date='$date', title = '$title', description='$description', chk='$chk', time_from='$time_from', time_to='$time_to',
	venue='$venue' WHERE id='$id'";
	
 if (mysqli_query($db, $sql)) {
   // header('location:profile_details.php?id='.$id);
   
    header('location:info_details.php?info_id='.$id);
}  else {
   echo "Error: " . $sql . "<br>" . mysqli_error($db);
}


mysqli_close($db);


?>