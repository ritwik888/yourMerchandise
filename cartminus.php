<?php
session_start();
$id = $_POST['itemID'];
while (list ($key, $val) = each ($_SESSION['cart']))
{ 
	//echo "$key -> $val <br>";
	if($_SESSION['cart'][$key] == $id)
	{
		unset($_SESSION['cart'][$key]);
		header('location:homeCustomer.php');
	}
}
header('location:homeCustomer.php');
?>