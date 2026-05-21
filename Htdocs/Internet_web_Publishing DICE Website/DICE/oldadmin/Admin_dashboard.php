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
    <title>Admin Dashboard</title>
</head>
<body>

<h1>WELCOME ADMIN</h1>

<ul>
    <li><a href="Admin_staff.php">Manage Staff</a></li>
    <li><a href="Admin_members.php">Manage Members</a></li>
    <li><a href="Admin_categories.php">Manage Categories</a></li>
    <li><a href="Admin_manage_event.php">Manage Service Events</a></li>
    <li><a href="Admin_manage_boardgames.php">Manage boardgames</a></li>
    <li><a href="Admin_sales_report.php">Sales Report</a></li>
    <li><a href="Admin_logout.php">Logout</a></li>

</ul>

</body>
</html>

