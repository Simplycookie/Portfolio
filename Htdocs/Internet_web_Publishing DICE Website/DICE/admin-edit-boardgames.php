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
                    $Image = $row['BG_Image'];
                }
            


        $updateSql = "UPDATE boardgames SET 
                        BG_Name = '$Name',
                        BG_image = '$Image',
                        BG_Des = '$EDes',
                        BG_Des2 = '$EsecDes'
                    WHERE BG_ID = '$bcode_post'";

        $updateResult = mysqli_query($connect, $updateSql);

        if (!$updateResult) {
            die("Update failed: " . mysqli_error($connect));
        }

        // redirect back to list
        header("Location: admin-manage-boardgames.php");
        exit;
    }
?>

<!DOCTYPE html> 

<html>
    <head>

        <meta charset="UTF-8">

        <title>DICE Admin - Edit Boardgames</title>

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
                <input type="hidden" name="boardgame_ID" value="<?php echo $row['BG_ID']?>";>
        
                <h1>Edit Boardgame</h1> 

                <div class="admin-container">
                    <label>Boardgame Name</label><br> 
                    <input type="text" name="boardgame_Name" value="<?php echo $row['BG_Name']?>"><br><br> 
                    <label>Boardgame Image</label><br> 
                    <input type="file" style="background-color:  #272727; color: #E4E9EC; border: none;" name="boardgame_Image" value="<?php echo $row['BG_Image']?>" ><br><br> 
                    <img src="assets/<?php echo $row['BG_Image'];?>" width = 100px><br>

                    <label>Description</label><br>
                    <textarea cols="100" name="boardgame_Des" value="<?php echo $row['BG_Des']?>"></textarea><br><br>
                    <label>2nd Description</label><br>
                    <textarea cols="100" name="boardgame_secDex" value="<?php echo $row['BG_Des2']?>"></textarea><br><br>

                    <input type="submit" class="submitbtn" name="savebtn" value="Update"> 
                </div>
            </form> 
        </section>    
    </body> 
</html> 