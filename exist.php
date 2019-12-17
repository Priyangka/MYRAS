<?php
include("connection/config.php");
if(!empty($_POST["username"])) {
	$sql="SELECT count(*) FROM personal_info WHERE username='" . $_POST["username"] . "'";
	$result=mysqli_query($db,$sql);
	
	$row = mysqli_fetch_row($result);
	
	$user_count = $row[0];
	if($user_count>0) echo "<span class='status-not-available'> Username is already used.</span>";
	else echo "<span class='status-available'> Username is permitted.</span>";
}
?>