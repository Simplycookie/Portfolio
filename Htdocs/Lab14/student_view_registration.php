<?php 

// database connection
// identify the user session
include("....."); 
$stud_id = $_SESSION['......'] ;//get the value from the session and save inside a variable

if(!isset($stud_id))//if there is no value inside $stud_id
{
	header(".......");//redirect to login page
}
else
{
	$result=mysqli_query($conn,".......");
	$row = mysqli_fetch_assoc($result);

switch($row["......."])
{
	case "DIT":$programme = "Diploma in Information Technology"; break;
	case "DIM":$programme = "Diploma in Management"; break;
	case "DET":$programme = "Diploma in Engineering"; break;
}
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
	
		<h2>Student's Registered Subjects</h2>
		
		<h4>Student's Details</h4>
		
		Student No. : <?php echo $row["....."]; ?>
		<br>Name  : <?php echo $row["....."]; ?>
		<br>Email : <?php echo $row["......."]; ?>
		<br>Programme : <?php echo $programme; ?>

		<h4>Your Registered Subjects</h4>

		<table border="1px" width="700px">
		<tr>
			<th>No.</th>
			<th>Subject Code</th>
			<th>Subject Name</th>
			<th>Subject Credit Hour</th>
			<th>Cost Per Credit Hour</th>
		</tr>

	<?php
	
		// find the current students registered subjects
		// if no records found, the following is displayed
		$sql1 = "...................";
	
	$result1 = mysqli_query($conn, $sql1);
	$count = mysqli_num_rows($result1);
	
	if ($count == 0)
	{
		?>
		<tr>
			<td colspan="5">No subject registration found</td>
		</tr>
		</table>
		
		<?php
	}
	else
	{
	
		$x = 1;
		$total = 0;
		while($row1 = mysqli_fetch_assoc($result1))
		{
		?>
			<tr>
				<td><?php echo $x; ?></td>
				<td><?php echo $row1["...."]; ?></td>
				<td><?php echo $row1["....."]; ?></td>
				<td><?php echo $row1["...."]; ?></td>
				<td><?php echo $row1["......"]; ?></td>
			</tr>
		
		<?php
			$x++;
			$total = $total + ($row1["........."] * $row1["..........."]);
		}
		
			?>
		</table>
		
		<p>Total Subjects : <?php echo $count; ?>
		<p>Total Fee : RM <?php echo number_format($total,2); ?>	
	<?php	
	}
?>
	
<br>
<br>

</body>
</html>

