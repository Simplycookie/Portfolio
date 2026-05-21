<?php include("Base.php");

    error_reporting();
    ini_set('display_errors', 1);

    
    if(isset($_POST['ID'])){
        $ID = $_POST['ID'];
        if(mysqli_query($connect,"
        INSERT INTO booking (User_Name, User_Email, User_PhNum, User_Password, Reg_Date, AgeConsent, Gaurd_Perm, Discord_Joined) VALUES ('$name','$email','$phone','$pass','$regdate','$ageofcon','$gaurdperm','$discorj')
        ")){ 
        }
        echo "<script>window.close();</script>";
        exit(1);
    }    
    echo "Failed";
    exit(1);
    ?>
