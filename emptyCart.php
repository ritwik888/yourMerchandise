<?php
session_start();
while (list ($key, $val) = each ($_SESSION['cart']))
{
	unset($_SESSION['cart'][$key]);
}
header('location:homeCustomer.php');
?>