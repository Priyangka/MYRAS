<?php

session_start();

include 'connection/config.php';

if(isset($_POST["username"], $_POST["password"])) 
    {  

		$username=$_POST['username']; 
		$password=$_POST['password'];


		$username = stripslashes($username);
		$password = stripslashes($password);

		$sql="SELECT * FROM login WHERE username='$username' and password='$password'";

		$result=mysqli_query($db,$sql);
		$row=mysqli_fetch_array($result);
		$_SESSION['no'] = $row['no'];
		
			$_SESSION['username'] = $_POST['username'];
				if(mysqli_num_rows($result) > 0 )
				{
							if ($row['level']=='admin'){
									$_SESSION['no'] = $row['no'];
								header("location: admin/user_list.php"); 
								}
							elseif($row['level']=='Employer'){
								header("location: manager/course_offer.php"); }
							elseif($row['level']=='manager'){
								header("location: manager/course_offer.php"); }
							else{
								header("location: main.php"); }
				}
				else
				{
					//echo 'Log masuk tidak sah!';
					header("location: redirect.php");  
				}
				exit();
		
	}



?>