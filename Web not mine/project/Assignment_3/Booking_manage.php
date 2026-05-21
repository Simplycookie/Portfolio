<?php include("Base.php");
    // 1) Get Event code from URL (edit1.php?ecode=P001)
    $ecode = $_GET["eventcode"] ?? "";

    // If no code provided, stop with message
    if ($ecode == "") {
        die("Missing Event code. Example: edit1.php?eventcode=P001");
    }

    // 2) Fetch Event record
    $sql = "SELECT * FROM booking WHERE Event_ID = '$ecode'";
    $Bookings = mysqli_query($connect, $sql);

    $sql = "SELECT * FROM website_user";
    $User = mysqli_query($connect, $sql);

    $sql = "SELECT Event_Name FROM dice_event WHERE Event_ID = '$ecode'";
    $event = mysqli_query($connect, $sql);

    if (!$Bookings) {
        die("SQL error: " . mysqli_error($connect));
    }

    if (!$User) {
        die("SQL error: " . mysqli_error($connect));
    }

    if (!$event) {
        die("SQL error: " . mysqli_error($connect));
    }
?>




<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Booking Management</title>
    </head>
    <body>
            <a href="Admin_Manage_event.php">Back</a>
            <?php
            $event = mysqli_query($connect, "select * from dice_event where Event_ID = '$ecode'");	
			while($row = mysqli_fetch_assoc($event))
				{
                ?>
			        <h1>List of bookings for <?php echo $row["Event_Name"];?></h1>
                <?php 
                }
                ?>
			<table border="1" width="850px" class = "White_colour">
				<tr class = "backBase_colour_2">
					<th>Booking ID</th>
					<th>Name</th>
					<th>Email</th>
                    <th>PhoneNumber<th>			
                    <th>Quantity</th>
                    <th>Booking for date</th>	
					<th colspan="2">Action</th>
				</tr>
				
				<?php
				
				$Bookings = mysqli_query($connect, "select * from booking where isDeleted=0 and Event_ID='$ecode'");
                
				while($row = mysqli_fetch_assoc($Bookings))
					{  
                        $userid = $row["User_ID"];
                        $sql = "select * from website_user where User_ID = $userid";
                        $User = mysqli_query($connect, $sql);
                        $Urow = mysqli_fetch_assoc($User);
                        ?>		
                        <tr class = "backAccent_colour_2 Accent_colour_1">
                            <td><?php echo $row["BK_ID"]; ?></td>
                            <td><?php echo $Urow["User_Name"]?></td>
                            <td><?php echo $Urow["User_Email"]?></td>
                            <td><?php echo $Urow["User_PhNum"]?></td>
                            <td><?php echo $row["BK_Quantity"]; ?></td>
                            <td><?php echo $row["BK_Date"]; ?></td>
                            <td><a href="Booking_edit.php?bookingcode=<?php echo $row['BK_ID']; ?>">Edit</a></td>
                            <td><a href="Booking_manage.php?del&eventcode=<?php echo $row['Event_ID']; ?>" onclick="return confirmation();">Delete</a></td>
                        </tr>
					<?php
					
					}		
				
				?>
					<tr>
						<td colspan="7"><a href="Booking_add.php?eventcode=<?php echo $ecode?>">Add</a></td>
					</tr>
			</table>
	</body>
</html>