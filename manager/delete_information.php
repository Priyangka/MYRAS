<?php
		include("../connection/config.php");
		if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		$id=$_GET['info_id']; 
		
		$sql_info = "DELETE  FROM latest_information  WHERE  id='".$id."'";
		
		
		if (mysqli_query($db, $sql_info)) {
			//echo "Record deleted successfully";
			header("Location: monthly_report.php");
		} else {
			echo "Error deleting record: " . mysqli_error($db);
		}
	

?>