<?php
		include("../connection/config.php");
		if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		$ids=$_GET['part_id']; 
		$id=$_GET['info_id']; 
		//echo $ids;
		$sql_info = "DELETE  FROM latest_information_participant  WHERE  no='".$ids."'";
		
		
		if (mysqli_query($db, $sql_info)) {
			//echo "Record deleted successfully";
			header("Location: info_details.php?info_id=$id");
		} else {
			echo "Error deleting record: " . mysqli_error($db);
		}
	

?>