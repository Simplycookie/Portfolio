<?php include("......"); ?>

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
		 if(isset($_GET['.......']))
		{
			$movid = $_GET["......."];
			$result = mysqli_query($connect, "..........");
			$row = mysqli_fetch_assoc($......);
		
		echo "<br><b>ID</b><br>";
		echo $row["...."]; 
	    ..
		...
		 }
		?>
			
	
	</div>
	
</div>


</body>
</html>
