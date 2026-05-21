<?php include("Base.php");

    error_reporting();
    ini_set('display_errors', 1);

    $name = $_POST['fullName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pass = $_POST['password'];
    $regdate = $_POST['registrationDate'];
    $ageofcon = $_POST['ageConsent'];
    $gaurdperm = $_POST['hasGuardianConsent'];
    $discorj = $_POST['discordJoined'];
    if(isset($name)){
        if(mysqli_query($connect,"
        INSERT INTO website_user (User_Name, User_Email, User_PhNum, User_Password, Reg_Date, AgeConsent, Gaurd_Perm, Discord_Joined) VALUES ('$name','$email','$phone','$pass','$regdate','$ageofcon','$gaurdperm','$discorj')
        ")){ 
        }
        echo "<script>window.close();</script>";
        exit(1);
    }    
    echo "Failed";
    exit(1);
    ?>
