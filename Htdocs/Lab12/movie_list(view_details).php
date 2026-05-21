<?php include("........"); ?>

<html>
<head><title>Movie List</title>
<link href="design.css" type="text/css" rel="stylesheet" />


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
			
			$result = mysqli_query($connect, ".......");	
			$count = mysqli_num_rows(.........);//used to count number of rows
			
			while($row = mysqli_fetch_assoc(........))
			{
			
			?>			

			<tr>
				<td>........</td>
				<td>..............</td>
				<td>.............</td>
				<td>..........</td>
				
			</tr>
			<?php
			
			}
			
			?>
		</table>


		<p> Number of records : <?php echo $........; ?></p>

	</div>
	
</div>


</body>
</html>

