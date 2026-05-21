<?php
session_start();
include 'Base.php';

if (!isset($_SESSION['admin'])) {
    header("Location: admin-login.php");
    exit();
}

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['Phone_number'];
    $pass = $_POST['password'];

    mysqli_query($connect, "INSERT INTO website_user (User_Name,User_Email,User_PhNum,User_Password)
                         VALUES ('$name','$email','$phone','$pass')");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($connect, "update website_user set isDeleted=1 where User_ID='$id'");

}
?>
<html>

<head>

    <meta charset="UTF-8">

    <title>DICE Admin - Manage Members</title>

    <link rel="stylesheet" href="admin.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Texturina:ital,opsz,wght@0,12..72,100..900;1,12..72,100..900&display=swap"
        rel="stylesheet">

</head>

<body>
    <a class="returning" href="admin-dashboard.php"><- Return</a>

            <h1>Manage Members</h1>
            <section class="admin-decore">

                <div class="admin-container side-by-side">
                    <form method="POST" class="form-deco">
                        <p>Name</p>
                        <input type="text" name="name" required>
                        <p>Email</p>
                        <input type="email" name="email" required>
                        <p>Phone Number</p>
                        <input type="text" name="Phone_number" required>
                        <p>Password</p>
                        <input type="text" name="password" required>

                        <button name="add">Add Member</button>
                    </form>

                    <table border="1" class="table-color table-deco">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>registration Date</th>
                            <th>Age</th>
                            <th>Action</th>
                        </tr>

                        <?php
                        $result = mysqli_query($connect, "SELECT * FROM website_user where isDeleted = 0");
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td><?php echo $row['User_ID']; ?></td>
                                <td><?php echo $row['User_Name']; ?></td>
                                <td><?php echo $row['User_Email']; ?></td>
                                <td><?php echo $row['User_PhNum']; ?></td>
                                <td><?php echo $row['Reg_Date']; ?></td>
                                <td><?php echo $row['AgeConsent']; ?></td>
                                <td><a href="?delete=<?php echo $row['User_ID']; ?>">Delete</a></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </section>
</body>

</html>