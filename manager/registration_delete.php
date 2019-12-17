<?php
		include("../connection/config.php");
		session_start();
		if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
        $no = $_SESSION['no'];
		$id=$_GET['info_id']; 
		
		$sql_info = "DELETE  FROM latest_information_participant  WHERE  info_id='".$id."' AND no='".$no."'";
		
		
		if (mysqli_query($db, $sql_info)) {
			//echo $no;
			//echo "Record deleted successfully";
			header("Location: course_offer.php");
		} else {
			echo "Error deleting record: " . mysqli_error($db);
		}
	

?>