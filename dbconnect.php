<?php 

	//Connection variables
	
	$dbname = "talk_it";
	$dbuser = "test";
	$dbpass = "test";
	$dbhost = "localhost";

	//Make connection
	$mysqli = new mysqli( $dbhost, $dbuser , $dbpass, $dbname );
 
	// Check connection
	if($mysqli === false){
	    die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	// Print host information
	// echo "Connect Successfully. Host info: " . mysqli_get_host_info($conn);
 ?>	
