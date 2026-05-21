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
    $position = $_POST['position'];

    mysqli_query($connect, "INSERT INTO staff (name,email,position)
                         VALUES ('$name','$email','$position')");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($connect, "DELETE FROM staff WHERE id=$id");
}
?>
<html>

<head>

    <meta charset="UTF-8">

    <title>DICE Admin - Manage Staff</title>

    <link rel="stylesheet" href="admin.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Texturina:ital,opsz,wght@0,12..72,100..900;1,12..72,100..900&display=swap"
        rel="stylesheet">

</head>

<body>
    <a class="returning" href="admin-dashboard.php"><- Return</a>

            <section class="admin-decore">
                <h1>Manage Staff</h1>

                <div class="admin-container side-by-side">

                    <form method="POST" class="form-deco">
                        <p>Name</p>
                        <input type="text" name="name" required>
                        <p>Email</p>
                        <input type="email" name="email" required>
                        <p>Position </p>
                        <input type="text" name="position" required>
                        <button name="add" style="cursor:pointer;">Add Staff</button>
                    </form>

                    <br><br>

                    <table border="1" class="table-color table-deco" style="display:block;">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Position</th>
                            <th>Action</th>
                        </tr>

                        <?php
                        $result = mysqli_query($connect, "SELECT * FROM staff");
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['position']; ?></td>
                                <td><a href="?delete=<?php echo $row['id']; ?>">Delete</a></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <br>

            </section>
</body>

</html>