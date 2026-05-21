<?php include("Base.php");
    // 1) Get Event code from URL (edit1.php?ecode=P001)
    $ecode = $_GET["eventcode"] ?? "";

    // If no code provided, stop with message
    if ($ecode == "") {
        die("Missing Event code. Example: edit1.php?eventcode=1");
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

	<title>DICE Admin - List of bookings</title>

	<link rel="stylesheet" href="admin.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Texturina:ital,opsz,wght@0,12..72,100..900;1,12..72,100..900&display=swap"
		rel="stylesheet">

</head>
    <body>
            <a href="admin-manage-event.php">Back</a>


                <section>
                    <?php
                    $event = mysqli_query($connect, "select * from dice_event where Event_ID = '$ecode'");	
                    while($row = mysqli_fetch_assoc($event))
                        {
                        ?>
                            <h1>List of bookings for <?php echo $row["Event_Name"];?></h1>
                        <?php 
                        }
                        ?>

                        <div class="admin-container">

                            <table border="1" width="850px" class = "admin-decore">
                        <tr>
                            <th>Booking ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>PhoneNumber</th>			
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
                                    <td><?php echo $row["BK_ID"]?></td>
                                    <td><?php echo $Urow["User_Name"]?></td>
                                    <td><?php echo $Urow["User_Email"]?></td>
                                    <td><?php echo $Urow["User_PhNum"]?></td>
                                    <td><?php echo $row["BK_Quantity"]?></td>
                                    <td><?php echo $row["BK_Date"]?></td>
                                    <td><a href="admin-booking.php?bookingcode=<?php echo $row['BK_ID']; ?>">Edit</a></td>
                                    <td><a href="?delete=<?php echo $row['BK_ID'];?>&eventcode=<?php echo $row['Event_ID']; ?>">Delete</a></td>
                                </tr>
                            <?php
                            
                            }		
                        
                        ?>
                            <tr>
                                <td colspan="8"><a href="admin-add-booking.php?eventcode=<?php echo $ecode?>">Add</a></td>
                            </tr>
                    </table>
                        </div>
                    
                </section>
			
	</body>
</html>
<?php

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($connect, "update booking set isDeleted=1 where BK_ID='$id'");
    
    header("Location: admin-manage-event.php?");
}?>