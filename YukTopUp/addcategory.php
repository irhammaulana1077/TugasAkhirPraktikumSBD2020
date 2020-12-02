<?php
	include('config.php');

	$cname=$_POST['cname'];

	$sql="insert into category (catname) values ('$cname')";
	$conn->query($sql);

	header('location:category.php');

?>