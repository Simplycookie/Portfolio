<?php include("Base.php") ?>
<html>

<head>

	<meta charset="UTF-8">

	<title>DICE Admin - List of Boardgames</title>

	<link rel="stylesheet" href="admin.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Texturina:ital,opsz,wght@0,12..72,100..900;1,12..72,100..900&display=swap"
		rel="stylesheet">

</head>

<script type="text/javascript"></script>

<body>
	<a class="returning" href="admin-dashboard.php"><- Return</a>

			<section class="admin-decore">
				<h1>List of Boardgamess</h1>
				<div class="admin-container">
					<table class="table-color table-deco" style="width:850px;">
						<tr class="backBase_colour_2">
							<th>Boardgame ID</th>
							<th colspan="2">Name</th>
							<th colspan="2">Image</th>
							<th colspan="2">Action</th>
						</tr>

						<?php

						$result = mysqli_query($connect, "select * from boardgames where isdeleted=0");
						while ($row = mysqli_fetch_assoc($result)) {

							?>

							<tr class="backAccent_colour_2 Accent_colour_1">
								<td><?php echo $row["BG_ID"]; ?></td>
								<td colspan="2"><?php echo $row["BG_Name"]; ?></td>
								<td colspan="2"><img src="assets/<?php echo $row["BG_Image"]; ?>" height="50px"></td>
								<td><a href="admin-edit-boardgames.php?boardcode=<?php echo $row['BG_ID']; ?>">Edit</a></td>
								<td><a href="admin-manage-boardgames.php?del&boardcode=<?php echo $row['BG_ID']; ?>"
										onclick="return confirmation();">Delete</a></td>
							</tr>
							<?php

						}

						?>
						<tr>
							<td colspan="7"><a href=admin-add-boardgames.php>Add</a></td>
						</tr>
					</table>
				</div>
			</section>

</body>

</html>
<?php

if (isset($_GET["del"])) {
	$pcode = $_GET["boardcode"];
	mysqli_query($connect, "update boardgames set isdeleted=1 where BG_ID='$pcode'");

	header("Location:admin-manage-boardgames.php");
} ?>