<?php
session_start();
include('money.php');
if(isset($_SESSION['user_id']))
{
	if($_SESSION['type']!='customer')
		header('location:index.php');
	include('connection.php');
	
}
else
	header('location:index.php');
function inCart($item)
{
	/*
	for($i = 0; $i < count($_SESSION['cart']); $i++)
	{
		if(isset($_SESSION['cart'][$i]))
		{
			if($_SESSION['cart'][$i] == $item)
			return(true);
		}
	}
	return(false);
	*/
	
	foreach($_SESSION['cart'] as $result)
	{
		if($result == $item)
			return(true);
	}
	return(false);
	
}
?>
<html>
<style>
a
{
	text-decoration: none;
}
.tab1
{
	padding: 0px;
	background-color: #f1f1f1;
}
.tab2
{
	padding: 0px;
	text-align: center;
}
.check
{
	background: #7aeb14;
	font-weight: bolder;
}
.welcome
{
	font-family: "Times New Roman", Times, serif;
	font-size: 30px;
	
}
.center {
  display: block;
  margin-left: 45%;
  margin-right: auto;
  width: 30%;  
}
</style>
<head>
	<!-- documentation at http://getbootstrap.com/docs/4.1/, alternative themes at https://bootswatch.com/ -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

	<body>
	<!-- intro table -->
	<table width="100%" class="tab1">
		<tr>
			<td rowspan="4" width="80%">
				<img src="images/logo.png" class="center">
			</td>
		</tr>
		<tr>
			<td>
				<p style="text-align: right;">
				<a href="homeCustomer.php ">
				<?php echo "Welcome, ".$_SESSION['user_id'];?>
				</a>
				<span class="glyphicon glyphicon-user">
				</p>
			</td>
		</tr>
		<tr>
			<td>
				<p style="text-align: right;">
				<a href="cart.php"> My cart</a><span class="glyphicon glyphicon-shopping-cart"></p>
			</td>
		</tr>
		<tr>
			<td>
				<p style="text-align: right;"><a href="logout.php">Logout </a><span class="glyphicon glyphicon-log-in">
				</p>
			</td>
		</tr>
	</table>
	<table class="table table-striped">
		<tr>
			<td>Sr. NO.</td>
			<td>Item name</td>
			<td>Image</td>
			<td>Item Id</td>
			<td>Price</td>
			<td>Seller Id</td>
			<td></td>
		</tr>
		<?php
			$qry= "select * from product";
			$run=mysql_query($qry);
			$i=1;
			$total=0;
			while($row=mysql_fetch_array($run))
			{
				$itemName=$row['name'];
				$itemImage=$row['image'];
				$itemId=$row['id'];
				$itemPrice=$row['price'];
				$seller=$row['sellerId'];
				if(inCart($itemId))
				{
					$total = $total + $itemPrice;
			?>
			<tr>
				<td><?php echo $i++; ?></td>
				<td><?php echo $itemName; ?></td>
				<td><img src="product/<?php echo $itemImage; ?>" height="100px;" weidth="100px"</td>
				<td><?php echo $itemId; ?></td>
				<td>&#x20a8; <?php echo moneyFormatIndia($itemPrice); ?></td>
				<td><?php echo $seller; ?></td>
				
			</tr>
			<?php
				}
			}
		?>
			<tr>
				<td colspan="5">
					Total Price
				</td>
				<td>
					&#x20a8; <?php echo moneyFormatIndia($total); ?>
				</td>
			</tr>
			<tr>
				<td colspan="5">
					
				</td>
				<td>
					<form method="get" action="emptyCart.php">
						<button type="submit" class="btn btn-danger">Remove All</button>
					</form>
				</td>
			</tr>
	</table>
	</body>
</html>