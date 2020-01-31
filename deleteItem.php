<?php
session_start();
include('connection.php');
if(isset($_POST['submit']))
{
	$del=$_POST['delId'];
	echo $del;
	$qry ="delete from product where id = '$del'";
	$run=mysqli_query($con,$qry);
	unset($_POST['submit']);
}
header('location:homeSeller.php');
?>
