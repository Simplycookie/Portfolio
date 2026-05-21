<?php include("dataconnection.php"); ?>
<html>
	<body>
			<h1>Add New Product Detail</h1>

			<form name="addnewfrm" method="post" action="">

				<p>Code:<input type="text" name="prod_code" >
				<p>Chocolate Name:<input type="text" name="prod_name">
				<p>Chocolate Size:<select name="prod_size">
									<option value="small">small </option>
									<option value="big">big </option>
								</select>
				<p>Price:<input type="text" name="prod_price">
				<p>Stock:<input type="text" name="prod_stock">
			
							
				<p><input type="submit" name="savebtn" value="Save Product">

			</form>

			<input type="button" value="View" onclick="location='productlist.php'">
			<input type="button" value="View Order" onclick="location='productlist.php'">
	</body>
</html>

<?php

if (isset($_POST["savebtn"])) 	
{
	
	$ncode	= $_POST["prod_code"];
	$nname	= $_POST["prod_name"];
	$nsize	= $_POST["prod_size"];
	$nprice	= $_POST["prod_price"];
	$nstock	= $_POST["prod_stock"];
	
	$count = 0;
	$result = mysqli_query($connect,"SELECT * FROM product WHERE product_code = '$ncode'");
	$count=mysqli_num_rows($result);
	if ($count != 0)
	{
	?>
		<script >
			alert("Cannot input a prodct with the same prodct ID as our previous product");
		</script>
	<?php
	}
	else
	{
	   //else insert into database
		mysqli_query($connect,"INSERT INTO product (product_code, product_name, product_size, product_price, product_stock) VALUE ('$ncode','$nname','$nsize',$nprice,$nstock)");
		
	?>
		<script>
			alert('successfully recorded')
		</script>;
	<?php
	
	}
}

?>

