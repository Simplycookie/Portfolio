<?php include(".........."); ?>

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
		if(isset($_GET["......."]))
		{
		 
			

			$result = mysqli_query($connect, ".............");
			$row = mysqli_fetch_assoc($.....);
		?>
		
		<h1>Edit a Movie</h1>

		<form name="addfrm" method="post" action="">

			<p>Title:<input type="text" name="mov_title" size="80" value="<?php echo $row['movie_title']; ?>">
		 
			<p>Ticket Price:<input type="text" name="mov_price" size="10" value="......">
			
			<p>Summary:<textarea cols="60" rows="4" name="mov_summary">..........</textarea>

			<p>Release Date:<input type="date" name="mov_release" value=".........">
			
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

if(......) 	
{
    
	
	
	header( "refresh:0.5; url=......php" );
	
}

?>