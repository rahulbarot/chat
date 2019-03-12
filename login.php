<?php 
	require('dbconnect.php');
	
    session_start();

	//------------User Ipaddress-----------
    $ip_address = $_SERVER["REMOTE_ADDR"];

    if(isset($_POST['login']))
    {
    	$name = mysqli_real_escape_string( $mysqli , $_POST['username'] ) ;
		$pass = mysqli_real_escape_string( $mysqli , $_POST['password'] );

		$hash_pass = md5($pass);

		$sql = "SELECT id,username,image_path ,gender FROM user WHERE BINARY username = '".$name."' AND password = '".$hash_pass."'";

        if($result = $mysqli->query($sql))
		{
    		if($result->num_rows > 0)
    		{
                $row = $result->fetch_array();
                
                //----------Set Ip Address and Username and id in Session--------
                $user = $row['id']; 
                // if(!strcmp($name,$user))
                // {
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['user'] = $row['username'] ;
                    $_SESSION['user_ip'] = $ip_address;
                    $_SESSION['user_img'] = $row['image_path'];
                    $_SESSION['user_gender'] = $row['gender'];
                    
                    header('location:home.php');    
                // }
                // else
                // {
                //     echo "Error:".$mysqli->error;
                //     header('location:index.php');       
                // }
                			
    		}
            else
            {
                echo "Error:".$mysqli->error;
                header('location:index.php');       
            }
    	}
        else
            {
                echo "Error:".$mysqli->error;
                // header('location:index.php');       
            }
    	
    }
?>