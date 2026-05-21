<?php 

// database connection
// identify the user session
include("...."); 
$stud_id = $_SESSION['...'] ;//get the value from the session and save inside a variable

if(!isset(...))//if there is no value inside $stud_id
{
	header("...");//redirect to login page
}
else
{
	$result=mysqli_query($conn,"");
	$row = mysqli_fetch_assoc($result);
	
}
?>

<!DOCTYPE html>
<html>
<head><title>Subject Registration System</title>
<link href="design.css" type="text/css" rel="stylesheet" />
</head>
<body>

<div id="wrapper">

	<div id="left">
		<?php include("menu.php"); ?>
	</div>
	
	<div id="right">
	
		<h2>Student Profile</h2>
	
		<?php
		
			// SQL to identify the student
			// switch statement to identify the Programme name
				
			switch($row['..'])
			{
				case "DIT":$prog = "Diploma in Information Technology";break;
				case "DIM":$prog = "Diploma in Management";break;
				case "DET":$prog = "Diploma in Engineering";break;
			}
		
		?>

			<p>Student No.  : <?php echo $row['....']; ?></p>
			<p>Name  : <?php echo $row['....']; ?></p>
			<p>Email : <?php echo $row['.....'];?></p>
			<p>Programme : <?php echo $prog; ?></p>
		
	</div>
	
</div>

</body>
</html>
