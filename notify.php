<?php 
	require('dbconnect.php');
	
    session_start();

    //---------- Count no. of records in a databse and return it

    $sql = "SELECT COUNT(*) AS count FROM chat WHERE user_id !=".$_SESSION['user_id'];
	$result = $mysqli->query($sql);
	$row = $result->fetch_assoc();
	echo $row['count'];
?>