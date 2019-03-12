<?php
      session_start();
      require('dbconnect.php');

      $id = $_SESSION['user_id'];

      $sql = "SELECT status FROM user WHERE id=".$id;

      $result = $mysqli->query($sql);

      $row = $result->fetch_array();

      $status = $row['status'];

      if($status == 1)
      {

      if(isset($_FILES['file']['name']))
      { 
              $errors= array();

              $file_name_pic = $_FILES['file']['name'];
              $file_size_pic = $_FILES['file']['size'];
              $file_tmp_pic = $_FILES['file']['tmp_name'];
              $file_type_pic= $_FILES['file']['type'];

              $file_ext_pic=strtolower(end(explode('.',$_FILES['file']['name'])));
              
              $expensions_pic= array("jpeg","jpg","png");
                  
              // if(in_array($file_ext_pic,$expensions_pic)=== false)
              // {
              //    $errors[]="extension not allowed, please choose a JPEG or PNG file.";
              // }
              
              if($file_size_pic > 2097152)
              {
                 $errors[]='File size must be excately 2 MB';
              }
                  
              if(empty($errors)==true)
              {
                 move_uploaded_file($file_tmp_pic,"images/".$file_name_pic);
                 // echo "Success";
                 //$path = "upload/".$file_name_pic;
                 $sql = "INSERT INTO chat (user_id, chat_text, user_ip ) VALUES ( ? , ? , ? )";

                if($stmt = $mysqli->prepare($sql))
                {
                  // Bind variables to the prepared statement as parameters
                  $stmt->bind_param("iss", $_SESSION['user_id'] , $file_name_pic , $_SESSION['user_ip']);
                  
                  $stmt->execute();

                  // header('location:home.php');
                
                }
                else
                {
                    echo "ERROR: Could not prepare query: $sql. " . $mysqli->error;
                }
              }
              else
              {
                print_r($errors);
              }
      }
      else
      {
        echo "Error";
      }
      }
      else
      {
        echo "<script>
          alert('You are not authorised to upload image in this group');
          window.location.href='home.php';
        </script>";
      }
?>