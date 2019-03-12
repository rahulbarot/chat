<?php 
    session_start();

    if(isset($_SESSION['user']))
    {
        header('location:home.php');
    }
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

<body>
  <h1 style="text-align: center;margin-top: 50px;color: #fff;">Talk !t</h1>
<div class="login-page">
  <div class="form">
    <form class="register-form" action="register.php" method="POST">
      <input type="text" placeholder="username" name="username" />
      <input type="password" placeholder="password" name="password" />
      <input type="text" placeholder="email address" name="email"/>
      <button type="submit" name="create">create</button>
      <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form>
    <form class="login-form" action="login.php" method="POST">
      <input type="text" placeholder="username" name="username" />
      <input type="password" placeholder="password" name="password"/>
      <button type="submit" name="login">login</button>
      <p class="message">Not registered? <a href="#">Create an account</a></p>
    </form>
  </div>
</div>
<!-- Footer Start -->
    <footer id="footer1" class="container-fluid">
      
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
