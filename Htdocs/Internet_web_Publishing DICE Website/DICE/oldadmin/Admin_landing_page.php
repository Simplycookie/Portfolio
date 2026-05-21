<?php include("base.php")?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin landing page</title>
</head>
<body>
    <h1>Landing page</h1>
    <button name="loginbtn" onclick="login()">
        Login
    </button>
    <button name="signinbtn" onclick="signin()">
        signin
    </button>

    <script>
        function login(){
            window.open("admin-login.php","_self");
        }
        function signin(){
            window.open("admin-signin.php","_self");
        }
    </script>
</body>
</html>