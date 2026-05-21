<!DOCTYPE html>
<html>
<head><title>Add New Movie</title>
<link href="design.css" type="text/css" rel="stylesheet" />
</head>
<body>

<div id="wrapper">

	<div id="left">
		<?php include("menu.php"); ?>
	</div>
	
	<div id="right">

		<h1>Insert New Movie</h1>

		<form name="addfrm" method="post" action="">

			<p><label>Title:</label><input type="text" name="mov_title" size="80">
		 
			<p><label>Ticket Price:</label><input type="text" name="mov_price" size="10">
			
			<p><label>Summary:</label><textarea cols="60" rows="4" name="mov_summary"></textarea>

			<p><label>Release Date:</label><input type="date" name="mov_release">
			
			<p><input type="submit" name="savebtn" value="SAVE MOVIE">

		</form>
	
	</div>
	
</div>


</body>
</html>

<?php
include("");
if(isset($_POST[.......])) 	
{
	$mtitle = $_POST["mov_title"];  	
	$mprice = $_POST["........."];  	
	$msummary = $_POST["......."];  	
	$mrelease = $_POST["........"];  	
	
	mysqli_query($connect,"..........");
	
	?>
	
		<script type="text/javascript">
			alert(".....................");
		</script>
	
	<?php
	
	
}

?>

