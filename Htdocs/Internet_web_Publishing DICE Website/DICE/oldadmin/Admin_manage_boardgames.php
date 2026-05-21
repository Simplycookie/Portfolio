<?php include("Base.php")?>
<html>
	<head>
	</head>
    <script type="text/javascript">

    </script>


	<body>
			<a href="Admin_dashboard.php">Back</a>
			<h1>List of boardgamess</h1>

			<table border="1" width="850px" class = "White_colour">
				<tr class = "backBase_colour_2">
					<th>Boardgame ID</th>
					<th colspan="2">Name</th>
					<th colspan="2">Image</th>		
					<th colspan="2">Action</th>
				</tr>
				
				<?php
				
				$result = mysqli_query($connect, "select * from boardgames where isdeleted=0");	
				while($row = mysqli_fetch_assoc($result))
					{
					
					?>			

					<tr class = "backAccent_colour_2 Accent_colour_1">
						<td ><?php echo $row["BG_ID"]; ?></td>
						<td colspan="2"><?php echo $row["BG_Name"]; ?></td>
						<td colspan="2"><img src="assets/<?php echo $row["BG_Image"]; ?>" height="50px"></td>
						<td><a href="Admin_boardgames_edit.php?boardcode=<?php echo $row['BG_ID']; ?>">Edit</a></td>
						<td><a href="Admin_manage_boardgames.php?del&boardcode=<?php echo $row['BG_ID']; ?>" onclick="return confirmation();">Delete</a></td>
					</tr>
					<?php
					
					}		
				
				?>
					<tr>
						<td colspan="7"><a href=Admin_boardgames_add.php>Add</a></td>
					</tr>
			</table>
	</body>
</html>
<?php

if (isset($_GET["del"])) 
{
	$pcode = $_GET["boardcode"]; 
	mysqli_query($connect, "update dice_boardgames set isdeleted=1 where boardgames_ID='$pcode'");
	
	header("Location:Admin_manage_boardgames.php");
}?>
