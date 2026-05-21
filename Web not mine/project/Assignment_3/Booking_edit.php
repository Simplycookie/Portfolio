<?php include("Base.php");
    // 1) Get Event code from URL (edit1.php?bcode=P001)
    $bcode = $_GET["bookingcode"] ?? "";

    // If no code provided, stop with message
    if ($bcode == "") {
        die("Missing Booking code. Example: edit1.php?eventcode=P001");
    }

    // 2) Fetch Event record
    $sql = "SELECT * FROM booking WHERE BK_ID = '$bcode'";
    $bookings = mysqli_query($connect, $sql);

    if (!$bookings) {
        die("SQL error: " . mysqli_error($connect));
    }

    $row = mysqli_fetch_assoc($bookings);

    if (!$row) {
        die("No Event found for ID: " . htmlspecialchars($bcode));
    }

    // 3) If user clicks Update Event, run UPDATE
     if(isset($_POST["savebtn"])){


                $error = "";
                $bcode_post = $_POST["Booking_ID"];   // from hidden field
                $Event_ID = $_POST["Event_ID"];
                $Quantity = $_POST["Booking_Quantity"];
                $Date = $_POST["Booking_Date"];
                $User_ID = $_POST["User_ID"];
                if($User_ID==""){
                    echo "Unfilled elements";
                    $error = "Please fix issues";
                }
                if($error == ""){
                    $updateSql = "UPDATE booking SET 
                        Event_ID = '$Event_ID',
                        BK_Quantity = '$Quantity',
                        BK_Date = '$Date'
                        User_ID = 
                        WHERE BK_ID = '$bcode_post'";

                    $updatebookings = mysqli_query($connect, $updateSql);

                    if (!$updatebookings) {
                        die("Update failed: " . mysqli_error($connect));
                    }

                    // redirect back to list
                    header("Location: Admin_manage_event.php");
                    exit;
                }
                else{
                    echo $error;
                }
            }


        
?>

<!DOCTYPE html> 
<html> 
    <head> 
        <title>Add Booking</title> 
    </head> 
    <body> 

        <a href="Booking_manage.php?eventcode=<?php echo $row['Event_ID'] ?>">back</a>
    
        <form method="POST" enctype="multipart/form-data"> 

			<h1>Edit Bookings</h1>
            <input name="Booking_ID" type="hidden" value="<?php echo $bcode?>">

            <label>Event_ID:</label><br> 
            <select name="Event_ID" value="<?php echo $row["Event_ID"] ?>">
                <?php
                    $event = mysqli_query($connect, "select * from dice_event");	
                    while($erow = mysqli_fetch_assoc($event))
                        {
                        ?>
                            <option value="<?php echo $erow["Event_ID"] ?>" <?php if ($row['Event_ID'] == $erow["Event_ID"]) echo "selected"; ?>><?php echo $erow["Event_Name"];?></option>
                        <?php 
                        }
                ?> 
            </select><br><br>
        
            <label>Booking_Quantity:</label><br> 
            <input type="text" name="Booking_Quantity" value="<?php echo $row['BK_Quantity'] ?>"><br><br> 
        
            <label>Booking_Date:</label><br> 
            <input type="text" name="Booking_Date" value="<?php echo $row['BK_Date'] ?>"><br><br> 

            <select name="User_ID" value="<?php echo $row["User_ID"] ?>">
                <?php
                    $User = mysqli_query($connect, "select * from website_user");	
                    while($Urow = mysqli_fetch_assoc($User))
                        {
                        ?>
                            <option value="<?php echo $Urow["User_ID"] ?>" <?php if ($row['User_ID'] == $Urow["User_ID"]) echo "selected"; ?>><?php echo $Urow["User_Name"];?></option>
                        <?php 
                        }
                ?> 
            </select><br>

            <input type="submit" name="savebtn" value="Submit"> 
        </form> 
        
        <?php
           

        ?>
        
    
    </body> 
</html> 
