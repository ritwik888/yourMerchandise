<?php
	session_start();
	$name=$_POST['name'];
	$email=$_POST['email'];
	$pass=$_POST['password'];
	$repass=$_POST['repassword'];
	$terms=$_POST['terms'];
	$type=$_POST['type'];
	if($name==NUll)
	{
		$_SESSION['message']="Enter name";
		header('location:signup.php');
	}
	elseif($email==NULL)
	{
		$_SESSION['message']="Enter email";
		header('location:signup.php');
	}
	elseif($pass==NULL)
	{
		$_SESSION['message']="Enter password";
		header('location:signup.php');
	}
	elseif($repass==NULL)
	{
		$_SESSION['message']="Re-enter password";
		header('location:signup.php');
	}
	elseif($terms==NULL)
	{
		$_SESSION['message']="Please accept Terms & Conditions";
		header('location:signup.php');
	}
	elseif($type==NULL)
	{
		$_SESSION['message']="Please Select type";
		header('location:signup.php');
	}
	else
	{
		include('connection.php');
		if($pass === $repass)
		{
			
		
			if($_POST['type']=='seller')
			{
				$query="SELECT email FROM seller WHERE email='$email'";
				$run=mysql_query($query);
				if(mysql_num_rows($run)>0)
				{
					$_SESSION['message']="Email already exist";
					header('location:signup.php');
				}
				$query="insert into seller set
						email = '$email',
						password = '$pass',
						name = '$name'
						";
				$run=mysql_query($query);
				$_SESSION['user_id'] = $email;
		     
		        $_SESSION['id'] = session_id();
		        
		        $_SESSION['type'] = "seller";
				header('location:homeSeller.php');
			}
			elseif($_POST['type']=='customer')
			{
				$query="SELECT email FROM customer WHERE email='$email'";
				$run=mysql_query($query);
				if(mysql_num_rows($run)>0)
				{
					$_SESSION['message']="Email already exist";
					header('location:signup.php');
				}
				if(mysql_num_rows($run)>0)
				{
					$_SESSION['message']="Email already exist";
					header('location:signup.php');
				}
				$query="insert into customer set
						email = '$email',
						password = '$pass',
						name = '$name'
						";
				$run=mysql_query($query);
						$_SESSION['user_id'] = $email;
		     
				        $_SESSION['id'] = session_id();
				        
				        $_SESSION['type'] = "customer";
				header('location:homeCustomer.php');
				
			}	
		}
		else
		{
			$_SESSION['message']="Password does not match";
			header('location:signup.php');
		}
	}
?>