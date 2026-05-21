<?php 

// database connection
// identify the user session

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
	
		<h2>Student Edit Profile</h2>

			<form name="regfrm" method="post" action="">

				<p>Student No.	: <input type="text" name="stud_no" value="<?php  ?>"></p>
				<p>Student Name	: <input type="text" name="stud_name" value="<?php  ?>"></p>
				<p>Student Email: <input type="email" name="stud_email" value="<?php  ?>"></p>
				<p>Student Programme :
					<select name="stud_prog">
						<option value="DIT" <?php ?> >Diploma In Information Technology</option>
						<option value="DIM" <?php ?>>Diploma In Management</option>
						<option value="DET" <?php ?>>Diploma In Engineering</option>
					</select>
				<p><input type="submit" name="savebtn" value="UPDATE">

			</form>
			
	</div>
	
</div>

		
</body>
</html>

<?php

// Write the PHP update codes

?>