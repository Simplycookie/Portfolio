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

        <meta charset="UTF-8">

        <title>DICE Admin - Add Booking</title>

        <link rel="stylesheet" href="admin.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Texturina:ital,opsz,wght@0,12..72,100..900;1,12..72,100..900&display=swap"
            rel="stylesheet">

    </head>
 
    <body> 
        <a class="returning" href="admin-manage-booking.php?eventcode=<?php echo $ecode ?>"><- Return</a>

        <section class="admin-decore">
            <form method="POST" enctype="multipart/form-data"> 

                <div>
                    <label>Add a bookings for</label><br> 
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
                
                    <label>Booking_Quantity</label><br> 
                    <input type="text" name="Booking_Quantity"><br><br> 
                
                    <label>Booking_Date</label><br> 
                    <input type="text" name="Booking_Date"><br><br> 

                    <label>User</label><br>
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
                    <input type="submit" class="submitbtn" name="btn_submit" value="Submit">
                </div>
            </form>
        </section>
    
         
        
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
                        echo "<script> alert('saved'); window.location.href='admin-manage-booking.php?eventcode=$Event'</script>";

                        
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