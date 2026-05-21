<?php include("Base.php")?>
<html>
	<head>
	</head>
    <script type="text/javascript">

    </script>


	<body>
			<a href="Admin_landing_page.php">Back</a>
			<h1>List of Events</h1>

			<table border="1" width="850px" class = "White_colour">
				<tr class = "backBase_colour_2">
					<th >Event ID</th>
					<th>Event Name</th>
					<th>Event Time</th>
					<th>Event Date</th>				
					<th colspan="3">Action</th>
				</tr>
				
				<?php
				
				$result = mysqli_query($connect, "select * from dice_event where isPassed=0");	
				while($row = mysqli_fetch_assoc($result))
					{
					
					?>			

					<tr class = "backAccent_colour_2 Accent_colour_1">
						<td><?php echo $row["Event_ID"]; ?></td>
						<td><?php echo $row["Event_Name"]; ?></td>
						<td><?php echo $row["Event_Time"]; ?></td>
						<td><?php echo $row["Event_Date"]; ?></td>
						<td><a href="Event_edit.php?eventcode=<?php echo $row['Event_ID']; ?>">Edit</a></td>
						<td><a href="Booking_manage.php?eventcode=<?php echo $row['Event_ID']; ?>">View bookings</a></td>
						<td><a href="Admin_manage_event.php?del&eventcode=<?php echo $row['Event_ID']; ?>" onclick="return confirmation();">Delete</a></td>
					</tr>
					<?php
					
					}		
				
				?>
					<tr>
						<td colspan="1"><a href=Event_add.php>Add</a></td>
						<td colspan="6"><a href=Featured_events.php>Featured events</a></td>
					</tr>
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
