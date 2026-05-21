<?php include("dataconnection.php"); ?>

<html>
<head></head>


<script type="text/javascript">

function confirmation()
{
	answer = confirm("Do you want to delete this product?");
	return answer;
}

</script>


<body>


		<h1>List of Products</h1>

		<table border="1" width="650px">
			<tr>
				<th>Product Code</th>
				<th>Product Name</th>
				<th>Product Quantity</th>				
				<th colspan="3">Action</th>
			</tr>
			
			<?php
			
			$result = mysqli_query($connect, "select * from product where product_isDelete=0");	
	         while($row = mysqli_fetch_assoc($result))
				{
				
				?>			

				<tr>
					<td><?php echo $row["product_code"]; ?></td>
					<td><?php echo $row["product_name"]; ?></td>
					<td><?php echo $row["product_stock"]; ?></td>
					<td><a href="purchase.php?procode=<?php echo $row['product_code']; ?>">Buy Now</a></td>
					<td><a href="edit.php?procode=<?php echo $row['product_code']; ?>">Edit</a></td>
					<td><a href="productlist.php?del&procode=<?php echo $row['product_code']; ?>" onclick="return confirmation();">Delete</a></td>
				</tr>
				<?php
				
				}		
			
			?>
		</table>


</body>
</html>
<?php

if (isset($_GET["del"])) 
{
	$pcode = $_GET["procode"]; 
	mysqli_query($connect, "update product set product_isDelete=1 where product_code='$pcode'");
	
	header("Location:product list.php");
}

?>
