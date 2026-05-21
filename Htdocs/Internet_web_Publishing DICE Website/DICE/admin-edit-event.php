<?php include("Base.php");
    // 1) Get Event code from URL (edit1.php?ecode=P001)
    $ecode = $_GET["eventcode"] ?? "";

    // If no code provided, stop with message
    if ($ecode == "") {
        die("Missing Event code. Example: edit1.php?eventcode=P001");
    }

    // 2) Fetch Event record
    $sql = "SELECT * FROM dice_event WHERE Event_ID = '$ecode'";
    $result = mysqli_query($connect, $sql);

    if (!$result) {
        die("SQL error: " . mysqli_error($connect));
    }

    $row = mysqli_fetch_assoc($result);

    if (!$row) {
        die("No Event found for ID: " . htmlspecialchars($ecode));
    }

    // 3) If user clicks Update Event, run UPDATE
    if (isset($_POST["savebtn"])) {

        $ecode_post = $_POST["Event_ID"];   // from hidden field
        $cat  = $_POST["Event_cat"];
        $Name  = $_POST["Event_Name"];
        $Des  = $_POST["Event_Des"];
        $Actdes = $_POST["Event_Actdes"];
        $ETime = $_POST["Event_Time"];
        $EDate = $_POST["Event_Date"];
        $price = $_POST["Event_Price"];
        $Imagedirectory = 'images/';
        $Image = basename($_FILES['Event_Image']['name']);
            if($Image!=""){
                $targetFilePath = $Imagedirectory . $Image;
                $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
                $allowedTypes = array('jpg', 'png', 'jpeg', 'gif');
                if (in_array($fileType, $allowedTypes)) {
                    if (move_uploaded_file($_FILES['Event_Image']['tmp_name'], $targetFilePath)) {
                        echo "The file " . htmlspecialchars($Image) . " has been uploaded.";
                    } else {
                        echo "Error uploading file. <br>";
                        $error = "Please fix issues";
                    }
                } else {
                    echo "Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.";
                    $error = "Please fix issues";
                }
            }
            else{
                $Image = $row['Event_Image'];
            }


        $updateSql = "UPDATE dice_event SET 
                        Event_Category = '$cat',
                        Event_Name = '$Name',
                        Event_Des = '$Des',
                        Event_Actdes = '$Actdes',
                        Event_Image = '$Image',
                        Event_Time = '$ETime',
                        Event_Date= '$EDate'
                    WHERE Event_ID = '$ecode_post'";

        $updateResult = mysqli_query($connect, $updateSql);

        if (!$updateResult) {
            die("Update failed: " . mysqli_error($connect));
        }

        // redirect back to list
        header("Location: admin-manage-event.php");
        exit;
    }
?>

<!DOCTYPE html> 

<html> 
    <head>

        <meta charset="UTF-8">

        <title>DICE Admin - Edit Events</title>

        <link rel="stylesheet" href="admin.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Texturina:ital,opsz,wght@0,12..72,100..900;1,12..72,100..900&display=swap"
            rel="stylesheet">

    </head>
    <body> 

        <a class="returning" href="admin-manage-event.php"><- Return</a>

        <section class="admin-decore">
            <form method="POST" enctype="multipart/form-data"> 
                <h1>Add Event</h1> 

                <div class="admin-container">
                    <input type="hidden" name="Event_ID" value="<?php echo $row['Event_ID']?>";>

                    <label>Event Catagory:</label><br> 
                    <select name="Event_cat" value="<?php echo $row["Event_Category"] ?>">
                        <?php
                            $cat = mysqli_query($connect, "select * from categories");	
                            while($erow = mysqli_fetch_assoc($cat))
                                {
                                ?>
                                    <option value="<?php echo $erow["ECat_ID"] ?>" <?php if ($row['Event_Category'] == $erow["ECat_ID"]) echo "selected"; ?>><?php echo $erow["ECat_Name"];?></option>
                                <?php 
                                }
                        ?> 
                    </select><br><br>
                    <label>Event Name:</label><br> 
                    <input type="text" name="Event_Name" value="<?php echo $row['Event_Name']?>"><br><br> 
                
                    <label>Event Image:</label><br> 
                    <input type="file" name="Event_Image" value="<?php echo $row['Event_Image']?>"><br><br>
                    <img src="images/<?php echo $row['Event_Image'];?>" width = 100px><br>
                
                    <label>Event_time:</label><br> 
                    <input type="text" name="Event_Time" value="<?php echo $row['Event_Time']?>"><br><br> 
                
                    <label>Event_Date:</label><br> 
                    <input type="text" name="Event_Date" value="<?php echo $row['Event_Date']?>"><br><br> 

                    <label>Event Description</label>
                    <textarea cols="100" name="Event_Des" ><?php echo $row['Event_Des']?></textarea><br><br>
        
                    <label>Activity Description</label>
                    <textarea cols="100" name="Event_Actdes"><?php echo $row['Event_Actdes']?></textarea><br><br>

                    <label>Event_Price:</label><br> 
                    <input type="text" name="Event_Price"><br>

                    <input type="submit" name="savebtn" value="Update"> 
                </form>
                </div>
                
        </section>
    
         
        
    
    </body> 
</html> 