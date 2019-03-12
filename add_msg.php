<?php 

  session_start();

  include('dbconnect.php');
  $id = $_SESSION['user_id'];

  if(isset($_POST))
  {
      $sql = "SELECT status FROM user WHERE id=".$id;

      $result = $mysqli->query($sql);

      $row = $result->fetch_array();

      $status = $row['status'];

      if($status == 1)
      {
          if(!$_POST['msg_form_box'] == NULL)
          {
              $msg = $_POST['msg_form_box'];
              
              $sql = "INSERT INTO chat (user_id, chat_text, user_ip ) VALUES ( ? , ? , ? )";

              if($stmt = $mysqli->prepare($sql))
              {
                // Bind variables to the prepared statement as parameters
                $stmt->bind_param("iss", $_SESSION['user_id'] , $msg , $_SESSION['user_ip']);
                
                $stmt->execute();
              
              }
              else
              {
                  echo "ERROR: Could not prepare query: $sql. " . $mysqli->error;
              }
           
              // Close statement
              $stmt->close();
               
              // Close connection
              $mysqli->close();
          }  
      }
      else
      {
        echo "<script>
          alert('User unblocked successfully');
          window.location.href='Home.php';
        </script>";
      }
      
  }
?>