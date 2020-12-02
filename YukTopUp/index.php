<?php include('config.php');


// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home | YukTopUp</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
.footer {
  padding-top: 50px;
	padding-bottom: 20px;
   width: 100%;
   text-align: center;
}
</style>
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"><b>YukTopUp</b></a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="order.php">Order</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span>     <strong><?php echo $_SESSION['username'];?></strong></a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>     Sign Out</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
	<h1 class="page-header text-center">WELCOME TO YUKTOPUP</h1>

	<div class="tab-content">
		<div class="text-center">
			<a href="order.php" class="btn btn-info" role="button">Order Now</a>
		</div>
	</div>
	
</div>
</body>
<footer class="footer">Muhamad Irham Maulana | Tugas Akhir Praktikum SBD</footer>
</html>