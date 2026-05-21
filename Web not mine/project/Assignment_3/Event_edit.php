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
        $Name  = $_POST["Event_Name"];
        $Des  = $_POST["Event_Des"];
        $Actdes = $_POST["Event_Actdes"];
        $ETime = $_POST["Event_Time"];
        $EDate = $_POST["Event_Date"];
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
        header("Location: Admin_manage_event.php");
        exit;
    }
?>

<!DOCTYPE html> 

<html> 
    <head> 
        <title>Add Event</title> 
    </head> 
    <body> 

        <a href="Admin_manage_event.php">back</a>
    
        <form method="POST" enctype="multipart/form-data"> 
            <h3>Add Event</h3> 
            <input type="hidden" name="Event_ID" value="<?php echo $row['Event_ID']?>";>
        
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
            <textarea cols="100" name="Event_Actdes"><?php echo $row['Event_Actdes']?></textarea><br>

            <input type="submit" name="savebtn" value="Update"> 
        </form> 
        
    
    </body> 
</html> 