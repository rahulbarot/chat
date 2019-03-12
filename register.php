<?php 
	require('dbconnect.php');
	
	if(isset($_POST['create']))
	{
		$name = $_POST['username'];
		$email = $_POST['email'];
		$pass = $_POST['password'];

		$hash_pass = md5($pass);
		
		// Prepare an insert statement
		$sql = "INSERT INTO user( username, password, email) VALUES (? , ? , ?)";
		 
		if($stmt = $mysqli->prepare($sql)){
		    // Bind variables to the prepared statement as parameters
		    $stmt->bind_param("sss", $name , $hash_pass , $email);
		    
		    $stmt->execute();
		    
		    header('location:index.php');
		} else{
		    echo "ERROR: Could not prepare query: $sql. " . $mysqli->error;
		}
		 
		// Close statement
		$stmt->close();
		 
		// Close connection
		$mysqli->close();
	}
?>