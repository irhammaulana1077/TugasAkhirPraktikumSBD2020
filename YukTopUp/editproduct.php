<?php
	include('config.php');

	$id=$_GET['product'];

	$pname=$_POST['pname'];
	$category=$_POST['category'];
	$price=$_POST['price'];

	$sql="select * from product where productid='$id'";
	$query=$conn->query($sql);
	$row=$query->fetch_array();

	$sql="update product set productname='$pname', categoryid='$category', price='$price' where productid='$id'";
	$conn->query($sql);

	header('location:product.php');
?>