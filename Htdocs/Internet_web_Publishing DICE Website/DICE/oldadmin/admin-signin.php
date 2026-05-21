<?php
session_start();
include 'Base.php';

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];
    $key = $_POST['key'];
    $inputkey = $_POST['inputkey'];
    if($inputkey == $key){
        $sql = "INSERT INTO admins (email, admin_password) 
                VALUE ('$email','$password');";
        mysqli_query($connect, $sql);
        header("Location: Admin_landing_page.php");
        exit();
    } else {
        echo "<script>alert('incorrect key')</script>";
    }

    
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Signin</title>
</head>
<body>

<h2>Admin Signin</h2>

<?php
if(isset($error)){
    echo "<p style='color:red;'>$error</p>";
}
?>

<form method="POST">
    Email:<br>
    <input type="email" name="email" required><br><br>

    Password:<br>
    <input type="password" name="password" required><br><br>

    Key: (Key is D20)<br>
    <input type="text" name="inputkey" required><br><br>
    <input type="hidden" name="key" value="D20">
    
    <button type="submit" name="login">Login</button>
</form>

</body>
</html>
