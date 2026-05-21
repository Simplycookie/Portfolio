<?php include("Base.php") ?>
<html>

<head>
	<meta charset="UTF-8">

	<title>DICE Admin - List of Events</title>

	<link rel="stylesheet" href="admin.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Texturina:ital,opsz,wght@0,12..72,100..900;1,12..72,100..900&display=swap"
		rel="stylesheet">

</head>


<body>
	<a class="returning" href="admin-dashboard.php"><- Return</a>

			<section class="admin-decore">
				<h1>List of Events</h1>

				<div class="admin-container">

					<table border="1" style="width:850px;" class="White_colour table-deco">
						<tr class="backBase_colour_2">
							<th>Event ID</th>
							<th>Event Name</th>
							<th>Event Time</th>
							<th>Event Date</th>
							<th colspan="3">Action</th>
						</tr>

						<?php

						$result = mysqli_query($connect, "select * from dice_event where isPassed=0");
						while ($row = mysqli_fetch_assoc($result)) {

							?>

							<tr class="backAccent_colour_2 Accent_colour_1">
								<td><?php echo $row["Event_ID"]; ?></td>
								<td><?php echo $row["Event_Name"]; ?></td>
								<td><?php echo $row["Event_Time"]; ?></td>
								<td><?php echo $row["Event_Date"]; ?></td>
								<td><a href="admin-edit-event.php?eventcode=<?php echo $row['Event_ID']; ?>">Edit</a></td>
								<td><a href="admin-manage-booking.php?eventcode=<?php echo $row['Event_ID']; ?>">View
										bookings</a>
								</td>
								<td><a href="admin-manage-event.php?del&eventcode=<?php echo $row['Event_ID']; ?>"
										onclick="return confirmation();">Delete</a></td>
							</tr>
							<?php

						}

						?>
						<tr>
							<td colspan="7"><a href=admin-add-event.php>Add</a></td>
						</tr>
					</table>
				</div>
				<br>
				</div>
			</section>


</body>

</html>
<?php

if (isset($_GET["del"])) {
	$pcode = $_GET["eventcode"];
	mysqli_query($connect, "update dice_event set isPassed=1 where Event_ID='$pcode'");

	echo "<script>eindow.location.href='admin-manage-event.php'</script>";
}
?>
