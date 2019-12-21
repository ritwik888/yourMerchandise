<?php
session_start();
$id = $_POST['itemID'];
foreach($_SESSION['cart'] as $item)
{
	if($id == $item)
		header('location:homeCustomer.php');
}
array_push($_SESSION['cart'],$id);
header('location:homeCustomer.php');
?>