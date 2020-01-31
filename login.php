<?php
	session_start();
	if(isset($_POST['login']))
	{
		include('connection.php');
		$user_name = $_POST['email'];
		$pass = $_POST['password'];
		$query1 = "SELECT * FROM customer WHERE email='$user_name' AND
	    password='$pass'";

	    $run = mysqli_query($con,$query1);

	    if(mysqli_num_rows($run)>0){
	       $_SESSION['user_id'] = $user_name;

	        $_SESSION['id'] = session_id();

	        $_SESSION['type'] = "customer";

	       	$_SESSION['cart'] = array();
	        header('location:homeCustomer.php');
	    }

	    $query2 = "SELECT * FROM seller WHERE email='$user_name' AND
	    password='$pass'";

	    $run2=mysqli_query($con,$query2);

	    if(mysqli_num_rows($run2)>0){
	       $_SESSION['user_id'] = $user_name;

	        $_SESSION['id'] = session_id();

	        $_SESSION['type'] = "seller";

	        header('location:homeSeller.php');
	    }
	    $_SESSION['message'] = 'Invalid Email or password';
	    header('location:index.php');
	}
?>
