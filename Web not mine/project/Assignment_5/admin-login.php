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
       header("Location: admin-dashboard.php");
exit();


    } else {
        $error = "Invalid email or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">

    <title>DICE Admin - Log In</title>

    <link rel="stylesheet" href="admin.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Texturina:ital,opsz,wght@0,12..72,100..900;1,12..72,100..900&display=swap"
        rel="stylesheet">

    <style>
        h1
        {
            text-align: center;
        }
        .admin-decore
        {
            text-align: center;
            width: 500px;
            margin: 0 auto;

            input , textarea , button
            {
                margin: 0 auto;
                margin-top: 15px;
                display: block;
                width: 80%;
            }
        }

        .submitbtn2
        {
            margin: 0 auto;
            display: block;
            width: 60% !important;
            background-color: #B4B6B9 !important;
            color: #1C1C1C !important;
            font-weight: 600 !important;
            font-size: 16px !important;
            padding: 8px 18px !important;
        }

    </style>

</head>
<body>
    <section class="admin-decore">
        <h1>Admin Log In</h1>

        <div class="admin-container">
            <form method="POST" style="background-color: #272727;">
                <label>Email</label><br>
                <input type="email" name="email" required><br><br>

                <label>Password</label><br>
                <input type="password" name="password" required><br><br>

                <button type="submit" class="submitbtn2" name="login">Login</button>
            </form>
        </div>
    </section>
</body>

<?php
if(isset($error)){
    echo "<p style='color:red;'>$error</p>";
}
?>
</html>
