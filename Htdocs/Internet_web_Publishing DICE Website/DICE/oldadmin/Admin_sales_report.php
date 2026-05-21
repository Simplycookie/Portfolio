<?php include("Base.php")?>
<html>
	<head>
	</head>
    <script type="text/javascript">

    </script>


	<body>
			<a href="Admin_dashboard.php">Back</a>
			<h1>List of Events</h1>

			<table border="1" width="850px" class = "White_colour">
				<tr class = "backBase_colour_2">
					<th>ID</th>
					<th>Booking_ID</th>
					<th>ProofofPayment</th>
					<th>Sale</th>				
				</tr>
				
				<?php
				
				$result = mysqli_query($connect, "select * from sales");	
				while($row = mysqli_fetch_assoc($result))
					{
					
					?>			

					<tr class = "backAccent_colour_2 Accent_colour_1">
						<td><?php echo $row["sale_ID"]; ?></td>
						<td><?php echo $row["BK_ID"]; ?></td>
						<td><img src="images/<?php echo $row['sale_Image']; ?>" height="50px"></td>
						<td>RM<?php echo $row["sale_Cost"]; ?></td>
						
					<?php
					
					}		
				
				?>
			</table>
	</body>
</html>
<?php

if (isset($_GET["del"])) 
{
	$pcode = $_GET["eventcode"]; 
	mysqli_query($connect, "update dice_event set isPassed=1 where Event_ID='$pcode'");
	
	header("Location:Admin_manage_event.php");
}
