<?php
	require('dbconnect.php');
	
	session_start();
	$current_time = date('Y-m-d H:i:s', strtotime('-5 minutes'));
	$sql = "SELECT username , gender , image_path  ,last_act 	FROM user";
		    
	if($result = $mysqli->query($sql))
	{	
		if($result->num_rows > 0)
		{
			while( $row = $result->fetch_array() )
		    {	
		    	if( $current_time > $row['last_act'])
		    	{
		    		?>
		    		<div class="user_chat_box" id="user_box">
<?php
	// echo "<div class = 'deactive'></div>";
    if( $row['image_path'] !== NULL )
    {
        echo "<img src='images/".$row['image_path']."' style='width: 40px;height:40px;'>";
    }
    else if ( $row['gender'] == "Male" )
    {
        echo "<img src='assets/images/boy.png' style='width: 100%;'>";
    }
    else
    {
        echo "<img src='assets/images/girl.png' style='width: 100%;'>";   
    }
?>
                        <h5><?php echo $row['username']; ?></h5> 
                    </div>
<?php
				}
		    	else
		    	{
?>
		    		<div class="user_chat_box" id="user_box">
<?php
	echo "<div class = 'active'></div>";
    if( $row['image_path'] !== NULL )
    {
        echo "<img src='images/".$row['image_path']."' style='width: 40px;height:40px;'>";
    }
    else if ( $row['gender'] == "Male" )
    {
        echo "<img src='assets/images/boy.png' style='width: 100%;'>";
    }
    else
    {
        echo "<img src='assets/images/girl.png' style='width: 100%;'>";   
    }
?>
                        <h5><?php echo $row['username']; ?></h5> 
                    </div>
<?php 	
		    	}
		    }
		}
	}
?>