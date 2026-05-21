<?php include("dataconnection.php"); ?>

<html>
<head><title>Movie Detail</title>
<link href="design.css" type="text/css" rel="stylesheet" />
</head>
<body>

<div id="wrapper">

	<div id="left">
		<?php include("menu.php"); ?>
	</div>
	
	<div id="right">

		<h1>Details of Movie</h1>

		<?php
		 if(isset($_GET['movid']))
		{
			$movid = (int)$_GET["movid"];
			$result = mysqli_query($connect, "SELECT * FROM movie WHERE movie_id=$movid");
			$row = mysqli_fetch_assoc($result);
		
			echo "<br><b>ID</b><br>";
			echo $row["movie_id"]; 

			echo "<br><br><b>Title</b><br>";
			echo $row["movie_title"]; 

			echo "<br><br><b>Ticket Price</b><br>";
			echo "RM" . $row["movie_ticket_price"]; 

			echo "<br><br><b>Summary</b><br>";
			echo $row["movie_summary"]; 

			echo "<br><br><b>Release Date</b><br>";
			echo $row["movie_release_date"]; 
		 }
		?>
			
	
	</div>
	
</div>

</body>
</html>
