<?php include("Base.php") ?>
<html>

<head>
	<meta charset="UTF-8">

	<title>DICE Admin - Sales Report</title>

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
				<h1>Sales Report</h1>

				<div class="admin-container">

					<table border="1" width="850px" class="White_colour table-deco">
						<tr class="backBase_colour_2">
							<th>ID</th>
							<th>Booking_ID</th>
							<th>ProofofPayment</th>
							<th>Sale</th>
						</tr>

						<?php

						$result = mysqli_query($connect, "select * from sales");
						while ($row = mysqli_fetch_assoc($result)) {

							?>

							<tr class="backAccent_colour_2 Accent_colour_1">
								<td><?php echo $row["sale_ID"]; ?></td>
								<td><?php echo $row["BK_ID"]; ?></td>
								<td><img src="images/<?php echo $row['sale_Image']; ?>" height="50px"></td>
								<td>RM<?php echo $row["sale_Cost"]; ?></td>

								<?php

						}

						?>
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

	header("Location:admin-manage-event.php");
}
