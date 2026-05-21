<?php // database connection ?>

<!DOCTYPE html>
<html>
<head><title>Subject Registration System</title>
</head>
<body>


<h3>Key in your details for registration</h3>

<form name="regfrm" method="post" action="">

	<p>Student No.	: <input type="text" name="stud_no">
	<p>Student Name	: <input type="text" name="stud_name">
	<p>Student Email: <input type="email" name="stud_email">
	<p>Student Programme: 
		<select name="stud_prog">
			<option value="DIT">Diploma In Information Technology</option>
			<option value="DIM">Diploma In Management</option>
			<option value="DET">Diploma In Engineering</option>
		</select>
	<p>Student Password : <input type="password" name="stud_pword">
	<p><input type="submit" name="registerbtn" value="REGISTER">

</form>
	

</body>
</html>

<?php
// Write the PHP codes to register a new student.
// must check email address and student number to be unique.
if(isset($_POST[""])) 	
{
	$stuno = $_POST['stud_no'];
	$stuname = $_POST[''];
	$stuemail = $_POST[''];
	$stuprog = $_POST[''];
	$stupwd = $_POST[''];
	// must check email address and student number to be unique.
	$sql = "";
	$result = mysqli_query($conn, $sql);
	
	if(mysqli_num_rows($result) != 0)//meaning the student no or email aready exist
	{
	?>
	<script>
		alert("");
	</script>
	<?php
	}
	else//meaning the student no or email not yet exist in the database
	{
		mysqli_query($conn, "");
	?>
	<script>
		alert("");
	</script>
	<?php
	header("refresh:0.5; url=index.php");
	}
}


?>