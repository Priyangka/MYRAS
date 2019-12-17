<?php
		include("../connection/config.php");
		session_start();
		$no = $_SESSION['no'];
		if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		$id=$_GET['user_id']; 
		
		
		$sql_info = "DELETE  FROM personal_info  WHERE  id='".$id."'";
		
		$sql_comp = "SELECT no FROM personal_info WHERE  id='".$id."'";
		$result_comp = mysqli_query($db, $sql_comp);
		$row_comp = mysqli_fetch_array($result_comp);	
		$no = $row_comp['no'];		
		
		$sql_info2 = "DELETE  FROM login  WHERE  no='".$no."'";
		if (mysqli_query($db, $sql_info) && mysqli_query($db, $sql_info2)) {
			//echo $no;
			header("Location: user_list.php");
		} else {
			echo "Error deleting record: " . mysqli_error($db);
		}
	

?>