<?php
	session_start();
	include('connection.php');
	$name=$_POST['name'];
	$g_image = $_FILES['image']['name'];
	
	$g_image_tmp = $_FILES['image']['tmp_name'];	
	
	if($g_image!="")
	{
		//$g_image = time();
		move_uploaded_file($g_image_tmp,"product/$g_image");
	}
	$id=$_POST['id'];
	$price=$_POST['price'];
	$seller=$_SESSION['user_id'];
	if($name==NULL)
	{
		//$_SESSION['message']="Fields missing";
		header('location:homeSeller.php');
	}
	elseif($img= NULL)
	{
		//$_SESSION['message']="Fields missing";
		header('location:homeSeller.php');
	}
	elseif($id==NULL)
	{
		//$_SESSION['message']="Fields missing";
		header('location:homeSeller.php');
	}
	elseif($price==NULL)
	{
		//$_SESSION['message']="Fields missing";
		header('location:homeSeller.php');
	}
	else
	{
		$qry="insert into product set
		name='$name',
		id='$id',
		price='$price',
		sellerId='$seller',
		image='$g_image'
		";
		$run=mysql_query($qry);
		if($run)
		header('location:homeSeller.php');
		else
		echo "Error..";
	}
?>