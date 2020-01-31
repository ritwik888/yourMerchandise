<?php
session_start();
include('money.php');
if(isset($_SESSION['user_id']))
{
	if($_SESSION['type']!='seller')
		header('location:index.php');
	include('connection.php');

}
else
	header('location:index.php');
?>
<html>
<style>
input[type=submit]
{
	padding: 5px;
	margin: 5px;
	border-radius: 5px;
	font-size: 15px;
}
button
{
	padding: 5px;
	margin: 0 0 15px;
	border-radius: 5px;
	font-size: 15px;
}
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
.hid
{
	display: none;
}
.welcome
{
	font-family: "Times New Roman", Times, serif;
	font-size: 30px;

}
.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 25%;
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
			<td rowspan="2">
				<img src="images/logo.png" class="center">
			</td>
			<td>
				<p style="text-align: right;">
				<a href="#">
				<?php echo "Welcome, ".$_SESSION['user_id'];?>
				</a>
				</p>
			</td>
		</tr>
		<tr>
			<td width="7%">
				<p style="text-align: right;"><a href="logout.php">Logout </a><span class="glyphicon glyphicon-log-in">
				</p>
			</td>
		</tr>
	</table>
	<!-- item table -->
	<table class="table table-striped">
		<tr>
			<td>Sr. NO.</td>
			<td>Item name</td>
			<td>Image</td>
			<td>Item Id</td>
			<td>Price</td>
		</tr>
		<?php
			$seller=$_SESSION['user_id'];
			$qry= "select * from product where sellerId='$seller'";
			$run=mysqli_query($con,$qry);
			$i=1;
			while($row=mysqli_fetch_array($run))
			{
				$itemName=$row['name'];
				$itemImage=$row['image'];
				$itemId=$row['id'];
				$itemPrice=$row['price'];
		?>
		<tr>
			<td><?php echo $i++; ?></td>
			<td><?php echo $itemName; ?></td>
			<td><img src="product/<?php echo $itemImage; ?>" height="100px;" weidth="100px"</td>
			<td><?php echo $itemId; ?></td>
			<td>&#x20a8; <?php echo moneyFormatIndia($itemPrice); ?></td>
		</tr>
		<?php
			}
		?>
	</table>

	<!--Delete item form -->
	<form method="post" action="deleteItem.php" class='delForm hid' id='delForm' autocomplete="off">
		<br>
		<lable>Enter Item Id </lable><input type="number" name="delId"/><br>
		<input type="submit" value="submit" name="submit"/>
		<button onclick="del()">Cancel</button><br><br>
	</form>

	<!--Add item form -->

	<form method="post" action="add.php" enctype="multipart/form-data" class="addForm hid" id="addForm" autocomplete="off">
		<table>
		<tr>
		<td>Item name</td>
		<td>Image</td>
		<td>Item Id</td>
		<td>Price</td>
		<td></td>
		</tr>
		<tr>
		<td><input type="text" name="name"/></td>
		<td><input type="file" name="image"/></td>
		<td><input type="number" name="id"/></td>
		<td><input type="number" name="price"/></td>
		<td><input type="submit" value="ADD" name="submit"/></td>
		<td><button onclick="add()">Cancle</button></td>
		</tr>
		</table>
		</form>

	<!--Add and Delete buttons -->
	<button onclick="add()" id="addBtn">Add Items</button>
	<button onclick="del()" id="delBtn">Delete Item</button>
	<br>
	<br>
</body>
<script type="text/javascript">
	function add()
	{
		document.getElementById('addForm').classList.toggle("hid");
		document.getElementById('addBtn').classList.toggle("hid");
	}
	function del()
	{
		document.getElementById('delForm').classList.toggle("hid");
		document.getElementById('delBtn').classList.toggle("hid");
	}
</script>
</html>
