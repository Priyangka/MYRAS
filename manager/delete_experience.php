<?php
		include("../connection/config.php");
		if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		$id=$_GET['exp_id']; 

		$sql_experience = "DELETE FROM experience  WHERE  id='".$id."'";

		
		if (mysqli_query($db, $sql_experience)) {
			//echo $nric;
			header("Location: edit_personal_manager_job.php");
		} else {
			echo "Error deleting record: " . mysqli_error($db);
		}
		

	

?>