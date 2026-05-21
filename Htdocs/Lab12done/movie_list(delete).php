<?php include("dataconnection.php"); ?>

<html>
<head><title>Movie List</title>
<link href="design.css" type="text/css" rel="stylesheet" />

<script type="text/javascript">
//create a javascript function named confirmation()
function confirmation()
{
	return confirm("Do you want to delete this movie?");
}
</script>

</head>
<body>

<div id="wrapper">

	<div id="left">
		<?php include("menu.php"); ?>
	</div>
	
	<div id="right">

		<h1>List of Movies</h1>

		<table border="1">
			<tr>
				<th>Movie ID</th>
				<th>Movie Title</th>
				<th>Movie Ticket Price</th>
				<th colspan="3">Action</th>
			</tr>
			
			<?php
			$result = mysqli_query($connect, "SELECT * FROM movie");	
			$count = mysqli_num_rows($result);

			while($row = mysqli_fetch_assoc($result))
			{
			?>
			<tr>
				<td><?php echo $row["movie_id"]; ?></td>
				<td><?php echo $row["movie_title"]; ?></td>
				<td><?php echo $row["movie_ticket_price"]; ?></td>
				<td>
					<a href="movie_detail.php?movid=<?php echo $row["movie_id"]; ?>">More Details</a>
				</td>
				<td>
					<a href="movie_edit.php?movid=<?php echo $row["movie_id"]; ?>">Edit</a>
				</td>
				<td>
					<a href="movie_list(delete).php?delid=<?php echo $row["movie_id"]; ?>" onclick="return confirmation();">Delete</a>
				</td>
			</tr>
			<?php
			}
			?>
		</table>

		<p> Number of records : <?php echo $count; ?></p>

	</div>
	
</div>

</body>
</html>

<?php

// Delete function can be done in the same page
if (isset($_GET["delid"])) 
{
	$delid = (int)$_GET["delid"];
	mysqli_query($connect, "DELETE FROM movie WHERE movie_id=$delid");
	
	header("Location: movie_list(delete).php"); //refresh the page
}

?>
