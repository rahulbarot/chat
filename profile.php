<?php 
  session_start();

  require('dbconnect.php');

  if(!isset($_SESSION['user']))
  {
    header('location:index.php');
  }

  $id = $_SESSION['user_id'];   
  $sql = "SELECT username FROM user";
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
    
    <title>Home</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles-->
    <link href="assets/css/docs.css" rel="stylesheet">
  	<link href="assets/css/css3.css" rel="stylesheet">
  	<link href="assets/css/font-icon.css" rel="stylesheet">
  	
  	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet"> 
	
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

<body onload= "ajax();">
	  <div id="wrapper">
		<!-- Header Start -->
		<header id="header">
		</header>
		
		<!-- Content Start -->
		<section id="content">
        <div class="container-fluid" style="background-color: #141a32;">
            <nav class="navbar">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <h1 style="color: #fff;margin: 0px;padding-top: 5px;">Talk !t</h1>
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                          <span class="sr-only">Toggle navigation</span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
<?php 
  if(!$_SESSION['user_img'] == NULL)
  {
    $image = "images/".$_SESSION['user_img'];
  }
  else
  {
    $image = "assets/images/boy.png"; 
  }
?>
                            <img src="<?php echo $image; ?>" class="img-circle">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['user']; ?> <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="logout.php?id=<?php echo $id; ?>"><span class="pe-7s-power"> </span> Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
			  </div>
        <div class="row">
         		<div class="col-md-6 col-md-offset-3">
    						<form style="color: #fff;" method="POST" action="update.php" enctype="multipart/form-data">
    					<!-- <div class="form-group">
    							      <label for="exampleInputEmail1"><h3>Username</h3></label>
    							      <input type="text" class="form-control" id="exampleInputEmail1" name="username" value="username" disabled>
    							  </div>
    							  <div class="form-group">
    							      <label for="exampleInputEmail1"><h3>Email address</h3></label>
    							      <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="email" disabled>
    							  </div> -->
    							  <div class="radio">
    							  	  <label><h3><input type="radio" name="gender" value="Male" checked="checked">Male</h3></label>
    							  	  <label><h3><input type="radio" name="gender" value="Female">Female</h3></label>
    							  </div>
    							  <div class="form-group">
                        <label>Upload Photo</label>
                        <input type="file" name="profile" class="form-control"/>
    							  </div>
    							  <button type="submit" name="update" class="btn btn-default">Update</button>
    							</form>
              </div>
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