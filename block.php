<?php 
	session_start();

	require('dbconnect.php');

	$id = $_REQUEST['id'];
	$sql = "UPDATE user SET status = 0 WHERE id = ".$id;

	if($result = $mysqli->query($sql))
	{
		echo "<script>
				alert('User Blocked successfully');
				window.location.href='Admin_panel.php';
			</script>";
	}
	else
	{
		echo "Error:".$mysqli->error;
	}
	 
	// Close connection
	$mysqli->close();
?>