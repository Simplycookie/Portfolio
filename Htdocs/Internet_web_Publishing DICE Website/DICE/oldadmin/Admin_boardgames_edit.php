<?php include("Base.php");
    // 1) Get boardgame code from URL (edit1.php?ecode=P001)
    $ecode = $_GET["boardcode"] ?? "";

    // If no code provided, stop with message
    if ($ecode == "") {
        die("Missing boardgame code. Example: edit1.php?boardcode=1");
    }

    // 2) Fetch boardgame record
    $sql = "SELECT * FROM boardgames WHERE BG_ID = '$ecode'";
    $result = mysqli_query($connect, $sql);

    if (!$result) {
        die("SQL error: " . mysqli_error($connect));
    }

    $row = mysqli_fetch_assoc($result);

    if (!$row) {
        die("No boardgame found for ID: " . htmlspecialchars($ecode));
    }

    // 3) If user clicks Update boardgame, run UPDATE
    if (isset($_POST["savebtn"])) {

            $bcode_post = $_POST["boardgame_ID"];// from hidden field
            $Name = $_POST["boardgame_Name"];
            $EDes = $_POST["boardgame_Des"];
            $EsecDes = $_POST["boardgame_secDex"];
            $preimage = $_POST["boardgame_preImage"];
            $Imagedirectory = 'assets/';
            $Image = basename($_FILES['boardgame_Image']['name']);
            if($Image!=""){
                $targetFilePath = $Imagedirectory . $Image;
                $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
                $allowedTypes = array('jpg', 'png', 'jpeg', 'gif');
                if (in_array($fileType, $allowedTypes)) {
                    if (move_uploaded_file($_FILES['boardgame_Image']['tmp_name'], $targetFilePath)) {
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
                    $Image = $preimage;
                }
            


        $updateSql = "UPDATE boardgames SET 
                        BG_Name = '$Name',
                        BG_Image = '$Image',
                        BG_Des = '$EDes',
                        BG_Des2 = '$EsecDes'
                        WHERE BG_ID = '$bcode_post'";

        $updateResult = mysqli_query($connect, $updateSql);

        if (!$updateResult) {
            die("Update failed: " . mysqli_error($connect));
        }

        // redirect back to list
        header("Location: Admin_manage_boardgames.php");
        exit;
    }
?>

<!DOCTYPE html> 

<html> 
    <head> 
        <title>Edit boardgame</title> 
    </head> 
    <body> 

        <a href="Admin_manage_boardgames.php">back</a>
    
        <form method="POST" enctype="multipart/form-data"> 
            <input type="hidden" name="boardgame_ID" value="<?php echo $row['BG_ID']?>";>
    
            <h3>Edit boardgame</h3> 
        
            <label>boardgame Name:</label><br> 
            <input type="text" name="boardgame_Name" value="<?php echo $row['BG_Name']?>"><br><br> 
        
            <label>boardgame Image:</label><br> 
            <input type="hidden" name="boardgame_preImage" value="<?php echo $row['BG_Image']?>" >
            <input type="file" name="boardgame_Image" value="<?php echo $row['BG_Image']?>" ><br><br> 
            <img src="assets/<?php echo $row['BG_Image'];?>" width = 100px><br>
            <label>Description</label>
            <textarea cols="100" name="boardgame_Des" value="<?php echo $row['BG_Des']?>"><?php echo $row['BG_Des']?></textarea><br><br>

            <label>2nd Description</label>
            <textarea cols="100" name="boardgame_secDex" value="<?php echo $row['BG_Des2']?>"><?php echo $row['BG_Des2']?></textarea><br><br>

            <input type="submit" name="savebtn" value="Update"> 
        </form> 
        
    
    </body> 
</html> 