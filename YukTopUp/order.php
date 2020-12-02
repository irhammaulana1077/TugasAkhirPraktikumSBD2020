<?php include('config.php');

session_start();
 

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Order | YukTopUp</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

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
      <li><a href="#"><span class="glyphicon glyphicon-user"></span>     <strong><?php echo $_SESSION['username'];?></strong>  </a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>     Sign Out</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
	<h1 class="page-header text-center">ORDER</h1>
	<div class="row">
		<div class="col-sm">
				<form role="form" action="order.php" method="get">
					<table class="pull-right">
						<tr>
							<td><label>Cari :</label></td>
							<td><input type="text" name="cari" class="form-control"> </td>
							<td><button type="submit" class="btn btn-info btn-block">Search</button></td>
						</tr>
					</table>
				</form> 
		</div>
	</div>	

	<form method="POST" action="purchase.php">
		<table class="table table-striped table-bordered">
			<thead>
				<th class="text-center"><input type="checkbox" id="checkAll"></th>
				<th>Category</th>
				<th>Product Name</th>
				<th>Price</th>
				<th>Quantity</th>
			</thead>
			<tbody>
				<?php 
					if(isset($_GET['cari'])){
					$cari = $_GET['cari'];
					$sql = "select * from product left join category on category.categoryid=product.categoryid where productname like '%".$cari."%'";    
					}else{
					$sql = "select * from product left join category on category.categoryid=product.categoryid order by product.categoryid asc, productname asc";  
					}
					$query=$conn->query($sql);
					$iterate=0;
					while($row=$query->fetch_array()){
						?>
						<tr>
							<td class="text-center"><input type="checkbox" value="<?php echo $row['productid']; ?>||<?php echo $iterate; ?>" name="productid[]" style=""></td>
							<td><?php echo $row['catname']; ?></td>
							<td><?php echo $row['productname']; ?></td>
							<td class="text-right">&#82;&#112; <?php echo number_format($row['price'], 2,',','.'); ?></td>
							<td><input type="text" class="form-control" name="quantity_<?php echo $iterate; ?>"></td>
						</tr>
						<?php
						$iterate++;
					}
				?>

			</tbody>
		</table>
		
		<div class="row">
			<div class="col-md-2" style="margin-left:-20px;">
				<button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-floppy-disk"></span>  Order</button>

			</div>
		</div>
	</form>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#checkAll").click(function(){
	    	$('input:checkbox').not(this).prop('checked', this.checked);
		});
	});
</script>
</body>
<footer class="footer">Muhamad Irham Maulana | Tugas Akhir Praktikum SBD</footer>
</html>