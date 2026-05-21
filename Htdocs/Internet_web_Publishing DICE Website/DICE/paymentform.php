<?php include("Base.php");

    error_reporting();
    ini_set('display_errors', 1);

    
    if(isset($_POST['ID'])){
        $ID = $_POST['ID'];
        $Event_ID = $_POST['Event_ID'];
        $date = $_POST['date'];
        $Pax = $_POST['Pax'];
        $cost = $_POST['cost'];
        $ranid = $_POST['ranid'];
        if($result = mysqli_query($connect,"
        INSERT INTO booking (Event_ID,BK_Quantity,BK_Date,isDeleted,User_ID,BK_ranID) VALUES ($Event_ID,$Pax,'$date',1,$ID,'$ranid')
        ")){
            
        }
    }    
    ?>
<?php
            if(isset($_POST["btn_submit"])){
                $error = "";
                $BK_ranID = $_POST["BK_ranID"];
                $i = mysqli_query($connect,"SELECT * FROM booking where BK_ranID = '$BK_ranID'");
                while($bk = mysqli_fetch_assoc($i)){$BK_ID=$bk["BK_ID"];}
                mysqli_query($connect,"update booking set isDeleted=0 where BK_ranID = '$BK_ranID'");
                $cost = $_POST["cost"];
                $Imagedirectory = 'images/';
                $Image = basename($_FILES['image']['name']);
                if($Image!=""){
                    $targetFilePath = $Imagedirectory . $Image;
                    $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
                    $allowedTypes = array('jpg', 'png', 'jpeg', 'gif');

                    if (in_array($fileType, $allowedTypes)) {
                        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
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
                if($error == ""){
                    if(mysqli_query($connect, 
                    "INSERT INTO sales (sale_Cost,sale_Image,BK_ID) VALUE($cost,'$Image',$BK_ID)")){
                        echo "<script> alert('Proof of payment submitted successfully. Returning to homepage...');\n\n window.location.href = 'index.php';</script>";

                    }
                }
                else{
                    echo "";
                    $error = "Please fix issues";
                }
            }

            ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
    <link rel="stylesheet" href="global.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Texturina:ital,opsz,wght@0,12..72,100..900;1,12..72,100..900&display=swap" rel="stylesheet">
    <style>
        /* ----- 注册卡片：图片比例 ----- */
        
        .registration-container {
            max-width: 550px !important;
            margin: 40px auto;
            padding: 40px 35px;
            background: #E4E9EC;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }
        
        .form-header h1 {
            font-family: 'Texturina', serif;
            font-size: 2.2rem;
            color: #1C1C1C;
            margin-bottom: 10px;
            border-bottom: 3px solid #272727;
            padding-bottom: 15px;
        }
        
        .form-description {
            color: #272727;
            font-size: 1rem;
            margin-bottom: 30px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }*/
        /* 密码小眼睛 */

        .password-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .password-wrapper input {
            width: 100%;
            padding-right: 45px;
        }

        .password-toggle {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: transparent;
            border: none;
            cursor: pointer;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #272727;
            font-size: 1.2rem;
            transition: color 0.2s;
        }

        .password-toggle:hover {
            color: #000;
        }

        .password-toggle i {
            pointer-events: none;
        }

        .password-hint {
            color: #666;
            font-size: 0.8rem;
            margin-top: 5px;
            font-style: italic;
        }

        /* ----- 单选按钮组（年龄二选一）----- */

        .radio-group {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 14px;
        }

        .radio-group input[type="radio"] {
            width: 18px;
            height: 18px;
            margin: 0;
            accent-color: #272727;
            flex-shrink: 0;
            cursor: pointer;
        }

        .radio-group label {
            color: #1C1C1C;
            font-size: 0.95rem;
            line-height: 1.5;
            word-break: break-word;
            flex: 1;
            cursor: pointer;
        }

        /* ----- 复选框（Discord）----- */

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 14px;
        }

        .checkbox-group input[type="checkbox"] {
            width: 18px;
            height: 18px;
            margin: 0;
            accent-color: #272727;
            flex-shrink: 0;
            cursor: pointer;
        }

        .checkbox-group label {
            color: #1C1C1C;
            font-size: 0.95rem;
            line-height: 1.5;
            word-break: break-word;
            flex: 1;
            cursor: pointer;
        }

        .btn-submit {
            width: 100%;
            padding: 14px;
            background-color: #272727;
            color: #FAFDFF;
            border: none;
            border-radius: 6px;
            font-family: 'Texturina', serif;
            font-size: 1.4rem;
            font-weight: 700;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 15px;
            letter-spacing: 1px;
        }

        .btn-submit:hover {
            background: #B4B6B9;
            color: #272727;
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
            color: #1C1C1C;
        }

        .login-link a {
            color: #272727;
            font-weight: 600;
            text-decoration: underline;
        }

        .success-message {
            background: rgba(39, 39, 39, 0.95);
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            color: #FAFDFF;
            margin-top: 30px;
        }

        .btn-success {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 30px;
            background: #B4B6B9;
            color: #272727;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
        }

        .error-message {
            color: #ff6b6b;
            font-size: 0.8rem;
            margin-top: 5px;
        }

        @media (max-width: 600px) {
            .registration-container {
                max-width: 100% !important;
                margin: 20px;
                padding: 30px 20px;
            }

            .form-header h1 {
                font-size: 1.8rem;
            }

            .radio-group,
            .checkbox-group {
                gap: 8px;
                margin-bottom: 16px;
            }
        }
    </style>
</head>

    <body>

        <main class="registration-container">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-header">
                    <h1>Payment Form</h1>
                    <p class="form-description">Please provide a proof of payment</p>
                </div>
                <hr>
                <div class="form-header">
                    <h1>Payment Details</h1>
                    <p class="form-description" id="User_info" style="font-weight: 700; font-size: 18px;">Total Cost : RM <?php echo $cost?></p>
                </div>

                <img style="width: 100%; margin: 10px auto 30px;" src="images/paymentqr.jpg">

                <!-- 邮箱 -->
                <div class="form-group">
                    <label for="image">Proof of payment *</label>
                    <input type="file" id="image" name="image">
                    <div class="error-message" id="imageError"></div>
                </div>

                <input type="hidden" name="BK_ranID" value="<?php echo $ranid?>">
                <input type="hidden" name="cost" value="<?php echo $cost?>">
                <p class="form-description">clicking without choosing an image will still work for testing purposes</p>

                <input type="submit" class="btn-submit" name="btn_submit" id="btn_submit" value="Complete Payment">


            </form>
                <div id="response"></div>

            
        </main>

        <footer class="footer2">
            <p>&copy; 2026 D.I.C.E. MMU | Dive into Imagination for Creative Entertainment</p>
            <div class="social-links">
                <a href="#">Instagram</a> |
                <a href="#">Discord</a> |
                <a href="#">Email</a>
            </div>
        </footer>
    
    </body>
    
</html>

