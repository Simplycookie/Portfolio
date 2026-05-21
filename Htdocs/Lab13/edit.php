<?php include("dataconnection.php"); ?>
<?php

	$pcode = $_GET["procode"] ?? "";

	if ($pcode == ""){
		die("Missing product code.");
	}


	$result = mysqli_query($connect, "SELECT * FROM product WHERE product_code = '$pcode'");
	if (!$result){
		die("SQL error: " . mysqli_error($connect));
	}

	$row = mysqli_fetch_assoc($result);

	if (isset($_POST["savebtn"]))
	{
		$pcode_post = $_POST["prod_code"];
		$pname = $_POST["prod_name"];  	
		$pprice = $_POST["prod_price"];
		$psize = $_POST["prod_size"];
		$pstock = $_POST["prod_stock"];
			
		
		$updatedResult = mysqli_query($connect,
		"UPDATE product SET
			product_name = '$pname',
			product_price = '$pprice',
			product_size = '$psize',
			product_stock = '$pstock'
		WHERE product_code = '$pcode_post'
		");
		
		header("location: productlist.php"); //redirect user back to productlist.php
		exit;
	}
?>
<html>
	<head>
	</head>
	<body>


		
		<h1>Update Product Detail</h1>

		<form name="updatefrm" method="post" action="">

			<p>Code:<input type="text" name="prod_code"  value="<?php  ?>"  disabled>
			<p>Name:<input type="text" name="prod_name"  value="<?php   ?>">
			
			<p>Chocolate Size:<select name="prod_size">
								<option value="small" <?php if($row['product_size']=="small")
														echo "selected";
  									                   ?> >small </option>
								<option value="big" <?php
														if($row['product_size']=="big")
														echo "selected";
								                     ?> >big </option>
			                  </select>
			<p>Price:<input type="text" name="prod_price" value="<?php echo $row['product_price']?>"></p>
			<p>Stock:<input type="text" name="prod_stock"  value="<?php echo $row['product_stock']?>"></p>
	
					
			<p><input type="submit" name="savebtn" value="Update Product">

		</form>
	

	</body>
</html>

