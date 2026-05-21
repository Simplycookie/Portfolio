<?php include("Base.php")?>
<!DOCTYPE html> 
<html> 

    <head>

        <meta charset="UTF-8">

        <title>DICE Admin - Add Boardgames</title>

        <link rel="stylesheet" href="admin.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Texturina:ital,opsz,wght@0,12..72,100..900;1,12..72,100..900&display=swap"
            rel="stylesheet">

    </head>

    <body>
        <a class="returning" href="admin-manage-boardgames.php"><- Return</a>

        <section class="admin-decore">
            <form method="POST" enctype="multipart/form-data">
                <h1>Add Boardgame</h1> 
                <div class="admin-container">
                    <label>Boardgame Name</label><br>
                    <input type="text" placeholder="Name" name="boardgame_Name"><br><br> 
                
                    <label>Boardgame Image</label><br> 
                    <input type="file" style="background-color:  #272727; color: #E4E9EC; border: none;" name="boardgame_Image" value=""><br><br> 

                    <label>Description</label><br>
                    <textarea cols="100" placeholder="Write description here" name="boardgame_Des"></textarea><br><br>

                    <label>2nd Description</label><br>
                    <textarea cols="100" name="boardgame_secDex"></textarea><br><br>

                    <input class="submitbtn" type="submit" name="btn_submit" value="Submit"> 
                </div>
            </form>
        </section>

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

                        header("Location: admin-manage-boardgames.php");
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