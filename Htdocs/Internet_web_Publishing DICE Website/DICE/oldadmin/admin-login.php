<?php
session_start();
include 'Base.php';

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admins 
            WHERE email='$email' 
            AND admin_password='$password'";

    $result = mysqli_query($connect, $sql);

    if(mysqli_num_rows($result) == 1){

        $_SESSION['admin'] = $email;
       header("Location: Admin_dashboard.php");
exit();


    } else {
        $error = "Invalid email or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
</head>
<body>

<h2>Admin Login</h2>

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

    <button type="submit" name="login">Login</button>
</form>

</body>
</html>
