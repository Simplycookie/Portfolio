<?php include("Base.php")?>
<!DOCTYPE html> 
<html> 
    <head> 
        <title>Add boardgame</title> 
    </head> 
    <body> 

        <a href="Admin_manage_boardgames.php">back</a>
    
        <form method="POST" enctype="multipart/form-data"> 
            <h3>Add boardgame</h3> 
        
            <label>boardgame Name:</label><br> 
            <input type="text" name="boardgame_Name"><br><br> 
        
            <label>boardgame Image:</label><br> 
            <input type="file" name="boardgame_Image" value=""><br><br> 

            <label>Description</label>
            <textarea cols="100" name="boardgame_Des"></textarea><br><br>

            <label>2nd Description</label>
            <textarea cols="100" name="boardgame_secDex"></textarea><br><br>

            <input type="submit" name="btn_submit" value="Submit"> 
        </form> 
        
        <?php
            if(isset($_POST["btn_submit"])){
                $error = "";
                $Name = $_POST["boardgame_Name"];
                $EDes = $_POST["boardgame_Des"];
                $EsecDex = $_POST["boardgame_secDex"];
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
                    $Image = "placeholder.png";
                }
                if($Name==""){
                    echo "Unfilled elements";
                    $error = "Please fix issues";
                }
                if($error == ""){
                    if(mysqli_query($connect, 
                    "INSERT INTO boardgames (BG_Name, BG_Image, BG_Des, BG_Des2) VALUE('$Name','$Image','$EDes','$EsecDex')")){
                        echo "<script> alert('$Name saved') </script>";

                        header("Location: Admin_manage_boardgames.php");
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