<?php include("dataconnection.php"); ?>

<html>
<head><title>Edit a Movie</title>
<link href="design.css" type="text/css" rel="stylesheet" />
</head>
<body>

<div id="wrapper">

	<div id="left">
		<?php include("menu.php"); ?>
	</div>
	
	<div id="right">

		<?php
		if(isset($_GET["movid"]))
		{
			$movid = (int)$_GET["movid"];

			$result = mysqli_query($connect, "SELECT * FROM movie WHERE movie_id=$movid");
			$row = mysqli_fetch_assoc($result);
		?>
		
		<h1>Edit a Movie</h1>

		<form name="addfrm" method="post" action="">

			<p>Title:
			   <input type="text" name="mov_title" size="80" value="<?php echo $row['movie_title']; ?>">
		 
			<p>Ticket Price:
			   <input type="text" name="mov_price" size="10" value="<?php echo $row['movie_ticket_price']; ?>">
			
			<p>Summary:
			   <textarea cols="60" rows="4" name="mov_summary"><?php echo $row['movie_summary']; ?></textarea>

			<p>Release Date:
			   <input type="date" name="mov_release" value="<?php echo $row['movie_release_date']; ?>">
			
			<p><input type="submit" name="savebtn" value="UPDATE MOVIE">

		</form>
	    <?php 
		}
		  ?>
	</div>
	
</div>

</body>
</html>

<?php

if(isset($_POST["savebtn"]) && isset($_GET["movid"])) 	
{
    $movid    = (int)$_GET["movid"];
	$mtitle   = mysqli_real_escape_string($connect, $_POST["mov_title"]);
	$mprice   = mysqli_real_escape_string($connect, $_POST["mov_price"]);
	$msummary = mysqli_real_escape_string($connect, $_POST["mov_summary"]);
	$mrelease = mysqli_real_escape_string($connect, $_POST["mov_release"]);

	mysqli_query($connect, "UPDATE movie 
		SET movie_title='$mtitle',
		    movie_ticket_price='$mprice',
		    movie_summary='$msummary',
		    movie_release_date='$mrelease'
		WHERE movie_id=$movid
	");

	echo "<script>alert('Movie Updated');</script>";
	header("refresh:0.5; url=movie_list(edit).php");
}

?>
