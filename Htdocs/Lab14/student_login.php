<?php 

// database connection

?>

<!DOCTYPE html>
<html>
<head><title>Subject Registration System</title>
</head>
<body>

<h3>Keyin your Student No and Student Password.</h3>

<form name="loginfrm" method="post" action="">

	<p>Student No: <input type="text" name="stud_no">
	<p>Student Password : <input type="password" name="stud_pword">
	<p><input type="submit" name="loginbtn" value="LOGIN">

</form>
</body>
</html>

<?php

// Write the PHP compare the student number and password.
if(isset($_POST["..."])) 	
{
	$stuno = $_POST['........'];
	$stupwd = $_POST['.........'];
	
	$result = mysqli_query($conn, "............");
	$row = mysqli_fetch_assoc($result);
	if(mysqli_num_rows($result) != 1)//if wrong combination, the data not exist
	{
	?>
	<script>
		alert(".......");
	</script>
	<?php
	}
	else //if the data is correct
	{
		$_SESSION['.......'] = $row['........'];//create a session
		header(".............");//redirect to student_profile.php page
	}
}

?>