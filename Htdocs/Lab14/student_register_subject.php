<?php 

// database connection
// identify the user session
include("....."); 
$stud_id = $_SESSION['....'] ;//get the value from the session and save inside a variable

if(!isset(.....))//if there is no value inside $stud_id
{
	header("....");//redirect to login page
}
else
{
	$result=mysqli_query($conn,"......");
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
	
		<h2>Register Subject</h2>

			<form name="regfrm" method="post" action="">

				<p>Select a subject	: 
					<select name="subject_id">
						<?php
							$sql = "......";
							$result = mysqli_query($conn,...);
							while($row = mysqli_fetch_assoc($result))
							{
							// SQL to display all subjects in the dropdown
						?>
							<option value="<?php  echo $row['....']; ?>">
							<?php echo $row['......']; echo "---" . $row['......']; ?></option>
						<?php
							}
						?>
					
					</select>
					
				<p><input type="submit" name="regbtn" value="REGISTER SUBJECT">
			
	</div>
	
</div>


</form>
</body>
</html>

<?php
// Write the codes to register the subject for the current student
if(isset($_POST["...."])) 	
{
	$sub_id = $_POST['.....'];
	$currdate = date("Y-m-d");
	
	mysqli_query($conn, "......");
}
?>