<?php include 'Base.php';?>

<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">

    <title>DICE Admin - Landing Page</title>

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
        <h1>Admin Landing Page</h1>

        <div class="admin-container">
            <button name="loginbtn" class="submitbtn2" onclick="login()">
                Login
            </button>
            <button name="signinbtn" class="submitbtn2" onclick="signin()">
                Sign in
            </button>
        </div>
    </section>
    

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