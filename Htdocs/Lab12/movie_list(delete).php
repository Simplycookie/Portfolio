<?php include("............."); ?>

<html>
<head><title>Movie List</title>
<link href="design.css" type="text/css" rel="stylesheet" />

<script type="text/javascript">

//create a javascript function named confirmation()

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
			
			<!--copy the code from movie_list(edit) and add on the delete hyperlink-->
		</table>


		<p> Number of records : <?php echo $count; ?></p>

	</div>
	
</div>


</body>
</html>
<?php

if (.....) 
{
	.....
	
	header("Location: ......php"); //refresh the page
}

?>
