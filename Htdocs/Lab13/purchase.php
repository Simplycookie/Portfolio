<?php include("......."); ?>

<html>
<head>

</head>
<body>


		<?php
		    if(isset($_GET["...."]))
			{
			$pcode = $_GET["..."];

			$result = mysqli_query($..., "........");
			$row = mysqli_fetch_assoc(.......);
			}
		?>

		
		<h1>Product Detail</h1>
		
		<p>
		<br>Product Code : <?php  ?>
		<br>Product Name : <?php ?>
		<br>Product Price : <?php  ?>
		<br>Product Stock : <?php ?>

		</p>
		
		<h1>Your Order Detail</h1>

		<form name="purchasefrm" method="post" action="">

			<p>Customer Name:<input type="text" name="cust_name" ></p>
			<p>Quantity:<input type="text" name="cust_qty" ></p>

			<p><input type="submit" name="orderbtn" value="Send Order">

		</form>
	
</body>
</html>

<?php

if (isset(...)) 	
{
	$cname = $_POST["....."]; //retrive value from purchasefrm	
	$cqty = $_POST["....."];  //retrive value from purchasefrm
	
	$pprice = $row["....."];  //get product_price 
	$balance = $row["product_stock"] - ...;  
	
	
	if($balance>=0)
	{
		mysqli_query($..., "INSERT INTO ...... (purchase_name, .......) values ('$cname','$....',.......)");//insert data into purchase table

		mysqli_query($.....,"UPDATE ...... SET product_stock='....' where product_code='......'");// update product table

		
	}
	else
	{
		//display alert box
		
	}
	
}

?>