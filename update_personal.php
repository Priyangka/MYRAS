<?php

session_start();
include('connection/config.php');

$no=$_POST['no']; 
$id=$_POST['id']; 
$name = $_POST['name'];
$nric=$_POST['nric']; 
$race=$_POST['race'];
$nationality=$_POST['nationality'];
$gender=$_POST['gender'];
$address=$_POST['address'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$preference=$_POST['preference'];
$category=$_POST['category'];
$actual_image_name= $_FILES['image']['name'];
$path = "uploads/";

$valid_formats = array("jpg","jpeg", "png", "gif", "bmp");

if(isset($_POST['submit'])){
 
 $names = $_FILES['image']['name'];
 $target_dir = "uploads/";
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
  $query = "UPDATE personal_info SET image='$actual_image_name',no='$no',name='$name', nric='$nric', gender='$gender', race='$race', address='$address',  phone='$phone', email='$email', category='$category' WHERE no = $no";
  mysqli_query($db,$query);
     $tmp = $_FILES['image']['tmp_name'];
  // Upload file
  move_uploaded_file( $tmp ,$target_dir.$names);
     header('location:profile_details.php');
 }
 
}
 $sql = "UPDATE personal_info SET id='$id', no='$no',name='$name', gender='$gender', nric='$nric', race='$race', nationality='$nationality', address='$address',  phone='$phone', email='$email', preference = '$preference', category='$category' WHERE no = $no";

 if (mysqli_query($db, $sql)) {
	   $sql1 = "UPDATE login SET email='$email' WHERE no = $no";
	   mysqli_query($db, $sql1);
    header('location:profile_details.php?id='.$id);
}  else {
   echo "Error: " . $sql . "<br>" . mysqli_error($db);
}


mysqli_close($db);


?>