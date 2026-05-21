<?php include("Base.php")?>
<!DOCTYPE html> 
<html> 
    <head> 
        <title>Add Event</title> 
    </head> 
    <body> 

        <a href="Admin_manage_event.php">back</a>
    
        <form method="POST" enctype="multipart/form-data"> 
            <h3>Add Event</h3> 

            <label>Event Catagory:</label><br> 
            <select name="Event_cat" value="<?php echo $row["Event_Category"] ?>">
                <?php
                    $cat = mysqli_query($connect, "select * from categories");	
                    while($erow = mysqli_fetch_assoc($cat))
                        {
                        ?>
                            <option value="<?php echo $erow["ECat_ID"] ?>"><?php echo $erow["ECat_Name"];?></option>
                        <?php 
                        }
                ?> 
            </select><br><br>
        
            <label>Event Name:</label><br> 
            <input type="text" name="Event_Name"><br><br> 
        
            <label>Event Image:</label><br> 
            <input type="file" name="Event_Image" value=""><br><br> 
        
            <label>Event_time:</label><br> 
            <input type="text" name="Event_Time"><br><br> 
        
            <label>Event_Date:</label><br> 
            <input type="text" name="Event_Date"><br><br> 

            <label>Event Description</label>
            <textarea cols="100" name="Event_Des"></textarea><br><br>

            <label>Activity Description</label>
            <textarea cols="100" name="Event_ActDes"></textarea><br><br>

            <label>Event_Price:</label><br> 
            <input type="text" name="Event_Price"><br>

            <input type="submit" name="btn_submit" value="Submit"> 
        </form> 
        
        <?php
            if(isset($_POST["btn_submit"])){
                $error = "";
                $cat  = $_POST["Event_cat"];
                $Name = $_POST["Event_Name"];
                $ETime = $_POST["Event_Time"];
                $EDate = $_POST["Event_Date"];
                $EDes = $_POST["Event_Des"];
                $EActDes = $_POST["Event_ActDes"];
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
                    $Image = "placeholder.png";
                }
                if($Name=="" || $EDate=="" || $ETime==""){
                    echo "Unfilled elements";
                    $error = "Please fix issues";
                }
                if($error == ""){
                    if(mysqli_query($connect, 
                    "INSERT INTO dice_event (Event_Name, Event_Des, Event_Actdes, Event_Image, Event_Time, Event_Date, Event_Category, Event_Price) VALUE('$Name','$EDes','$EActDes','$Image','$ETime','$EDate',$cat,$price)")){
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