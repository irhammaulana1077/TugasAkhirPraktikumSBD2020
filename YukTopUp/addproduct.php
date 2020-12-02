<?php
	include('config.php');

	$pname=$_POST['pname'];
	$price=$_POST['price'];
	$category=$_POST['category'];
	
	$sql="insert into product (productname, categoryid, price) values ('$pname', '$category', '$price')";
	$conn->query($sql);

	header('location:product.php');

?>