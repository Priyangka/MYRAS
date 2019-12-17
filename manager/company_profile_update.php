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
	$id=$_POST['id'];
	$manager=$_POST['manager'];
	
	$actual_image_name= $_FILES['image']['name'];
	$path = "company/";

$valid_formats = array("jpg","jpeg", "png", "gif", "bmp");

if(isset($_POST['submit'])){
 
 $names = $_FILES['image']['name'];
 $target_dir = "company/";
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
		 $query = "UPDATE company SET company_banner='$newfilename' WHERE id='$id'";
		 mysqli_query($db,$query);
		 move_uploaded_file($_FILES["image"]["tmp_name"], "company/" . $newfilename);

  header('location:company_details.php');
 }
 
}
 	 $sql = "UPDATE company SET title = '$title', description='$description', time_from='$time_from', time_to='$time_to', 
	 industry='$industry',size='$size1', benefits = '$benefits',no='$no', manager='$manager',
     ssm_no='$ssm_no', comp_address='$comp_address',days ='$days' WHERE id='$id'";
	
 if (mysqli_query($db, $sql)) {
   // header('location:profile_details.php?id='.$id);
   
   header('location:company_details.php');
}  else {
   echo "Error: " . $sql . "<br>" . mysqli_error($db);
}


mysqli_close($db);


?>