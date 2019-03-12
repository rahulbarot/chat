<?php 
	session_start();

	require('dbconnect.php');

	if(isset($_SESSION['user_id']))
	{
		$id = $_SESSION['user_id'];
		echo $date = date('Y-m-d H:i:s');
		echo $sql = "UPDATE user SET last_act = '".$date."' WHERE id = ".$id;

		$mysqli->query($sql);

		$mysqli->close();
	}
	else
	{
		echo "False";
	}
?>