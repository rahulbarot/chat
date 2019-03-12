<?php 
	session_start();

	if(isset($_REQUEST['id']))
	{
		session_unset();
		header('location:index.php');
	}
?>