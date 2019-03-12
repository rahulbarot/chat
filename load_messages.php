<?php
	require('dbconnect.php');
	
	session_start();
	
	$sql = "SELECT user.username , chat.user_id , chat.chat_text , chat.add_time as cat FROM user , chat WHERE chat.user_id = user.id ORDER BY chat.add_time ASC";
		    
	if($result = $mysqli->query($sql))
	{	
		if($result->num_rows > 0)
		{
			while( $row = $result->fetch_array() )
		    {	
          		$string = $row['chat_text'];
		    	if (preg_match('/^.*.(jpg|jpeg|png|gif)$/i', $string , $regs))
		    	{
				    $image = $regs[0];
?>
					<div class="chat_box_img light">
	        	            <p class="user_name"><?php echo $row['username']; ?></p>
	            	        <p class="msg_time"><?php echo date("h:i a",strtotime($row['cat'])); ?></p>
	            	        <span class="time-left">
	            	        	<div class="imgbox img_light">
									<a href="images/<?php echo $image; ?>" target="1">
									<img src="images/<?php echo $image; ?>" alt="cat">
									</a>
								</div>
	            	        </span>
					</div>
<?php
				}
				else if(preg_match('/^.*.(pdf|doc|docx|txt|pptx|html)$/i', $string , $regs))
				{
					$file = $regs[0];
?>
					<div class="chat_box light">
	        	            <p class="user_name"><?php echo $row['username']; ?></p>
	            	        <p class="msg_time"><?php echo date("h:i a",strtotime($row['cat'])); ?></p>
	            	        <span class="time-left">
									<a href="images/<?php echo $file; ?>" target="1"><?php echo $file; ?>
									</a>
	            	        </span>
	                </div>
<?php
				}
				else
				{
				    
		    	
			    	// ---------- Regular expression for check message is contains url or not -----------
					$url = '~(?:(https?)://([^\s<]+)|(www\.[^\s<]+?\.[^\s<]+))(?<![\.,:])~i';

					//---------- If message contains url then it will converted to link -----------
					$chat_text = preg_replace($url, '<a href="$0" target="_blank" title="$0">$0</a>', $string);

					//---------- If user sends message then show light box else show message in dark box---------
		          	if($_SESSION['user'] == $row['username'])
			        {
?>
	                    <div class="chat_box light">
	        	            <p class="user_name"><?php echo $row['username']; ?></p>
	            	        <p class="msg_time"><?php echo date("h:i a",strtotime($row['cat'])); ?></p>
	                	    <span class="time-left"><?php echo $chat_text ?></span>
	                    </div>
<?php 			
					}
					else
					{
?>						
						<div class="chat_box darker">
	                    	<p class="user_name"><?php echo $row['username']; ?></p>
	                    	<p class="msg_time"><?php echo date("h:i a",strtotime($row['cat'])); ?></p>
	                    	<span class="time-left"><?php echo $chat_text; ?></span>
	                    </div>
<?php
					}
				}
		    }
		}
	}
?>