<?php
		include("../connection/config.php");
		if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		$id=$_GET['edu_id']; 

		$sql_experience = "DELETE FROM education  WHERE  id='".$id."'";

		
		if (mysqli_query($db, $sql_experience)) {
			//echo $nric;
			header("Location: edit_personal_manager_edu.php");
		} else {
			echo "Error deleting record: " . mysqli_error($db);
		}
		

	

?>