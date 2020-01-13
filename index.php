<?php
	//hi ritwik
	session_start();
	if(isset($_SESSION['id']))
	{
		if($_SESSION['type']=="customer")
		header('location:homeCustomer.php');
		else if($_SESSION['type']=="seller")
		header('location:homeSeller.php');
	}

?>
<html>
<head>
<title>YourMerchandise</title>
<!--Google font -->
<link href="https://fonts.googleapis.com/css?family=Montserrat|Poppins:400,700" rel="stylesheet">
<!-- Bootsrap-->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
input:focus {
  outline: none;

}
body{
	background: url('images/bg-01.jpg');
	background-size: cover;
	overflow: hidden;
}
.logInBox
{
	margin-top: 5%;
	height: 80%;
	background-color: white;
	border-radius: 25px;
	opacity: 0.9;
}
.loginTitle
{
	font-family: Poppins;
    font-size: 34px;
    color: #333333;
    text-align: center;
    width: 100%;
    display: block;
    padding-bottom: 60px;
    padding-top: 30px;
    font-weight: bold;
}
.logInImg
{
	padding-top: 30px;
	vertical-align: middle;
	width: 100%;
}
.inputBox
{
	border-radius: 25px;
	height: 50px;
	background: #e6e6e6;
	width: 100%;
	margin-bottom: 15px;
	font-family: Poppins;
    font-size: 25px;
    line-height: 1.5;
    color: #666666;
    display: block;
    padding: 0 30px 0 68px;
    border: none;
}
.logInBtn
{
	width: 100%;
	border-radius: 25px;
	height: 50px;
    font-size: 25px;
    line-height: 1.5;
    display: block;
    border: none;
	font-family: Montserrat;
    color: #fff;
    background: #57b846;
    justify-content: center;
    align-items: center;
    padding: 0 25px;

}
.logInBtn:hover
{
	background: #333333;
	cursor: pointer;
}
</style>
<script>

function validate()
{
	if(document.f1.email.value==0)
	{
		alert("Enter Email");
		return false;
	}
	if(document.f1.password.value==0)
	{
		alert("Enter Password");
		return false;
	}
	return true;
}

</script>
</head>
<body>
	<div class="row">
		<div class="col-xs-3">

		</div>
		<div class="col-xs-6 logInBox">
			<center><img src="images/logo.png" width="60%" style="margin-top:20px;"></center>
			<div style="float: left;" class="col-xs-6">
				<img class="logInImg" src="images/img-01.png">
			</div>
			<div class="col-xs-6">
				<form method="post" action="login.php" onsubmit="return validate();" name="f1" autocomplete="off">
					<span class="loginTitle">Member Login</span>
					<input class="inputBox" type="email" name="email" placeholder="Email"/><br>
					<input class="inputBox" type="password" name="password" placeholder="Password"/>
					<input type="submit" class="logInBtn" value="login" name="login"/>
				</form>
				<center><a class="txt2" href="signup.php">Create new Account</a></center>
			</div>
		</div>
		<div class="col-xs-3">

		</div>
	</div>
</body>
</html>
<?php
	if (isset($_SESSION['message']))
	{
		$message=$_SESSION['message'];
	    echo "<script type='text/javascript'>alert('$message');</script>";
	    unset($_SESSION['message']);
	}
?>
