<?php 
	session_start();

	require('dbconnect.php');

	if(isset($_POST['update']))
	{
		$id = $_SESSION['user_id'];
		$gender = $_POST['gender'];
		$image = $_SESSION['user_id'].$_FILES['profile']['name'];
		$timage = $_FILES['profile']['tmp_name'];
		var_dump(move_uploaded_file($timage, "images/".$image)) ;

		$sql = "UPDATE user SET gender = '".$gender."' ,image_path = '".$image."' WHERE id = ".$id;

		if($result = $mysqli->query($sql))
		{
    		?>
    		<script>
    			alert('Gender Updated Successfully.');
    		</script>
    		<?php	
    		header('location:home.php');
    	}
    	else
    	{
    		echo "Error:".$mysqli->error;
    	}
		 
		// Close connection
		$mysqli->close();
	}
?>