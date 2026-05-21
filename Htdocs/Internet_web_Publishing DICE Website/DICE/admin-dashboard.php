<?php
session_start();

if(!isset($_SESSION['admin'])){
    header("Location: admin-login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>DICE Admin - Dashboard</title>

    <link rel="stylesheet" href="admin.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Texturina:ital,opsz,wght@0,12..72,100..900;1,12..72,100..900&display=swap"
        rel="stylesheet">

</head>
<body>
    <section class="admin-decore">
        <h1>Admin Dashboard</h1>

    <div class="admin-container">
        <ol>
            <li><a href="admin-staff.php">Manage Staff</a></li>
            <li><a href="admin-members.php">Manage Members</a></li>
            <li><a href="admin-categories.php">Manage Categories</a></li>
            <li><a href="admin-manage-event.php">Manage Service Events</a></li>
            <li><a href="admin-manage-boardgames.php">Manage Boardgames</a></li>
            <li><a href="admin-sales-report.php">Sales Report</a></li>
            <li><a href="admin-logout.php">Logout</a></li>

        </ol>
    </div>

    </section>
</body>
</html>

