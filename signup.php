<?php
session_start();
if (isset($_SESSION['message']))
	{
		$message=$_SESSION['message'];
	    echo "<script type='text/javascript'>alert('$message');</script>";
	    unset($_SESSION['message']);
	}
?>
<html>
<head>
<title>YourMerchandise-Signup</title>
<!--Google font -->
<link href="https://fonts.googleapis.com/css?family=Montserrat|Poppins:400,700" rel="stylesheet">
<!-- Bootsrap-->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">

<style>
*
{
	overflow-x: hidden;
}
input:focus { 
  outline: none;
}
.leftImg
{
	height: 100%;
	background-image: url('images/signup-01.jpg');
	background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    position: relative;
}
.back
{
	background-color: #1fc8db;
    background-image: linear-gradient(141deg, #9fb8ad 0%, #1fc8db 51%, #2cb5e8 75%);
    color: white;
    opacity: 0.95;
    height: 100%;
}
.signUpTitle
{
	font-family: Poppins;
    font-size: 45px;
    color: #333333;
    text-align: left;
    width: 100%;
    display: block;
    padding-bottom: 20px;
    padding-top: 70px;
    font-weight: bolder;
}
.lable
{
	font-family: Poppins;
    font-size: 28px;
    color: white;
    line-height: 1.2;
    display: block;
    padding-top: 15px;
    overflow: hidden;
}
.inputBox
{
	display: block;
    width: 80%;
    height: 50px;
    background: transparent;
    font-family: Poppins;
    font-size: 22px;
    color: #555555;
    line-height: 1.2;
    outline: none;
    padding-left: 5px;
    border: none;
	border-bottom: 2px solid #555555;;
}
.tt
{
	font-family: Poppins;
    font-size: 20px;
    color: white;
    line-height: 1.9;
}
.btn
{
	display: flex;
    justify-content: center;
    align-items: center;
    padding: 0 20px;
    margin-top: 10px;
    height: 40px;
    font-family: Poppins;
    font-size: 26px;
    color: #fff;
    line-height: 1.2;
    background-color: #BB539C;
}
.btn:hover
{
	background: #57b846;
	cursor: pointer;
	color: #fff;
}
</style>
<script>
/*
function validate()
{
	if(document.f1.name.value==0)
	{
		alert("Enter Name");
		return false;
	}
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
	if(document.f1.repassword.value==0)
	{
		alert("Re-enter Password");
		return false;
	}
	if(document.f1.terms.checked==false)
	{
		alert("Please accept Terms & Conditions");
		return false;
	}
	if(document.f1.type.value==0)
	{
		alert("Please select type");
		return false;
	}
	return true;
}
*/
</script>
</head>
<body>
	<div class="row">
		<div class="col-xs-8 leftImg">
			
		</div>
		<div class="col-xs-4 back" style="padding-left: 40px;">
		<span class="signUpTitle">Sign up</span>
			<form method="post" action="save.php" onsubmit="return validate();" name="f1" autocomplete="off">
				<span class="lable">Full Name</span>
				<input class="inputBox" type="text" placeholder="Name.." name="name"/>
				<span class="lable">Email</span>
				<input class="inputBox" type="email" placeholder="Email Address.." name="email"/>
				<span class="lable">Password</span>
				<input class="inputBox" type="password" placeholder="**********" name="password"/>
				<span class="lable">Repeat Password</span>
				<input class="inputBox" type="password" placeholder="**********" name="repassword"/>
				<br>
				<input type="checkbox" name="terms" value="terms"/><span class="tt"> I agree to the Terms of User<br>
				I am a <input type="radio" name="type" value="seller"/> Seller <input type="radio" name="type" value="customer"/> Customer<br></span>
				<input type="submit" class="btn" value="Submit" name="submit"/><br>
				Already a member? <a href="index.php">Sign In</a>
			</form>
		</div>
	</div>
</body>
<?php
/*
function add()
{
	
	
}
if(isset($_POST['submit']))
{
	unset($_POST['submit']);
	add();
}
*/
?>
</html>