<?php include("......"); ?>

<html>
<head>

</head>
<body>


		<h1>List of Product Orders</h1>

		<table border="1" width="650px">
			<tr>
				<th>Purchase Id</th>
				<th>Customer Name</th>							
				<th>Product</th>
				<th>Quantity</th>
				<th>Payment (RM)</th>
			</tr>
			
			<?php
			
			$result = mysqli_query($..., "SELECT * from product,purchase where .......");	//select attributes from 2 tables
			$count = mysqli_num_rows($result);
			
			if ($count < 1)
			{
			?>
				<tr>
					<td colspan="6">No Records Found</td>
				</tr>
			
			<?php
			}
			else
			{
				while($row = mysqli_fetch_assoc($result))
				{
					$pay = $row["....."] * $row["......."]; //calculate payment for each purchase
				?>			

				<tr>
					<td>........</td>
					<td>........</td>							
					<td>........</td>
					<td>........</td>
					<td>.........</td>
				</tr>
				
				<?php
				
				}
			}
			
			?>

		</table>


	
</body>
</html>
