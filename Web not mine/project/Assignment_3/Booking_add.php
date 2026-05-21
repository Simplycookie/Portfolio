<?php include("Base.php");
    // 1) Get Event code from URL (edit1.php?ecode=P001)
    $ecode = $_GET["eventcode"] ?? "";

    // If no code provided, stop with message
    if ($ecode == "") {
        die("Missing Event code. Example: edit1.php?eventcode=P001");
    }

    // 2) Fetch Event record


    $sql = "SELECT * FROM dice_event WHERE Event_ID = '$ecode'";
    $event = mysqli_query($connect, $sql);

    if (!$event) {
        die("SQL error: " . mysqli_error($connect));
    }
?>

<!DOCTYPE html> 
<html> 
    <head> 
        <title>Add Booking</title> 
    </head> 
    <body> 

        <a href="Booking_manage.php?eventcode=<?php echo $ecode ?>">back</a>
    
        <form method="POST" enctype="multipart/form-data"> 
        
            <label>ADD a Bookings for: </label><br> 
            <select name="Event_ID" value="<?php echo $row["Event_ID"] ?>">
                <?php
                    $event = mysqli_query($connect, "select * from dice_event");	
                    while($erow = mysqli_fetch_assoc($event))
                        {
                        ?>
                            <option value="<?php echo $erow["Event_ID"] ?>" <?php if ($ecode == $erow["Event_ID"]) echo "selected"; ?>><?php echo $erow["Event_Name"];?></option>
                        <?php 
                        }
                ?> 
            </select><br><br>
        
            <label>Booking_Quantity:</label><br> 
            <input type="text" name="Booking_Quantity"><br><br> 
        
            <label>Booking_Date:</label><br> 
            <input type="text" name="Booking_Date"><br><br> 

            <label>User:</label><br>
            <select name="User_ID">
                <div id="selectuser">
                    <?php
                        $added = "";
                        $fltrSQL = "select * from website_user $added";
                        $User = mysqli_query($connect, $fltrSQL);	
                        while($Urow = mysqli_fetch_assoc($User))
                            {
                            ?>
                                <option value="<?php echo $Urow["User_ID"] ?>"><?php echo $Urow["User_Name"];?></option>
                            <?php 
                            }
                    ?>
                </div>
            </select><br>

            <input type="submit" name="btn_submit" value="Submit"> 
        </form> 
        
        <?php
            if(isset($_POST["btn_submit"])){
                $error = "";
                $Event = $_POST["Event_ID"];
                $Quantity = $_POST["Booking_Quantity"];
                $Date = $_POST["Booking_Date"];
                $User = $_POST["User_ID"];
                if($User==""){
                    echo "Unfilled elements";
                    $error = "Please fix issues";
                }
                if($error == ""){
                    if(mysqli_query($connect, 
                    "INSERT INTO booking (Event_ID, BK_Quantity, BK_Date, User_ID) VALUE($Event,'$Quantity','$Date',$User)")){
                        echo "<script> alert('$Name saved') </script>";

                        header("Location: Admin_manage_event.php");
                    }
                }
                else{
                    echo "";
                    $error = "Please fix issues";
                }
            }
        ?>
        


        
    </body>
</html> 