<?php 
  session_start();

  require('dbconnect.php');

  // $id = $_SESSION['user_id'];   
  $sql = "SELECT id , username , email , gender , image_path , status FROM user";
  if($result = $mysqli->query($sql))
  { 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
    <meta name = "format-detection" content = "telephone=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>Talk !t</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles-->
    <!-- <link href="assets/css/docs.css" rel="stylesheet"> -->
  	<link href="assets/css/css3.css" rel="stylesheet">
  	<link href="assets/css/font-icon.css" rel="stylesheet">
  	
  	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">  
	  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <!--[if lt IE 9]>
      <link href="assets/css/ie8.css" rel="stylesheet">
    <![endif]-->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="assets/js/modernizr-2.8.0.min.js"></script>
</head>

<body style="background-color: #fff;">
	<div id="wrapper">
		<!-- Header Start -->
		<header id="header">
		</header>
		
		<!-- Content Start -->
		<section id="content">
      <div style="background-color: #141a32;">
            <nav class="navbar" style="padding: 10px 0px;">
                <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <h1 style="color: #fff;margin: 0px;padding-top: 5px;">Talk !t</h1>
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                          <span class="sr-only">Toggle navigation</span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span></span>
                        </button>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <img src="assets/images/user.png" class="img-circle" style="height: 50px;width: 50px;">
                            <li class="dropdown">
                                <a href="" style="text-decoration: none;color: #fff;">Admin</a>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>      
      </div>
      <div class="container">
          <h2 style="margin: 0px;">Users</h2>
            <table class="table table-bordered table-hover">
<?php 
            if( $result->num_rows > 0 )
            { 
              echo "<thead><tr>"; 
              echo "<th>#</th>";  
              echo "<th>Username</th>";
              echo "<th>Email</th>";
              echo "<th>Gender</th>";
              echo "<th>Status</th>";
              echo "<th>Action</th>";
              echo "</tr></thead>";
              ?>
              <tbody id="employee_data">
              <?php

              while( $row = $result->fetch_array() )
              {
                echo "<tr>";
                echo "<td>". $row['id'] ."</td>";
                echo "<td>". $row['username'] ."</td>";
                echo "<td>". $row['email'] ."</td>";
                echo "<td>". $row['gender'] ."</td>";
                echo "<td>". $row['status'] ."</td>";
                echo "<td>";
                $status = $row['status'];
                if($status == 1)
                {
?>
                    <a href="block.php?id=<?php echo $row['id']; ?>" style="border-radius: 4px;padding:4px 8px;background-color: red;text-decoration: none;color: #fff;">Block</a>
<?php                
                }
                else
                {
?>
                    <a href="unblock.php?id=<?php echo $row['id']; ?>" style="border-radius: 4px;padding:4px 8px;background-color: green;text-decoration: none;color: #fff;">Unblock</a>
<?php 
                }
                echo "</td>";
                echo "</tr>";
              }
              echo "</tbody>";
            }
            else
            {
              echo "No records matching your query were found.";
            }
          }
          else
          {
            echo "No records were found";
          }
?>
          </table>
      </div>
		</section>
		
		<!-- Footer Start -->
		<footer id="footer" class="container-fluid">
			
		</footer>
	</div>
    
    <!-- JavaScript files -->
    <script src="assets/js/jquery-1.11.3.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Custom JavaScript -->
    <script src="assets/js/custom.js"></script>

</body>
</html>
