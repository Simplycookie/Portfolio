<?php
session_start();
include 'Base.php';

if (!isset($_SESSION['admin'])) {
    header("Location: admin-login.php");
    exit();
}

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    mysqli_query($connect, "INSERT INTO categories (name)
                         VALUES ('$name')");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($connect, "DELETE FROM categories WHERE ECat_ID=$id");
}
?>
<html>

<head>

    <meta charset="UTF-8">

    <title>DICE Admin - Manage Categories</title>

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
                <h1>Manage Categories</h1>

                <div class="admin-container side-by-side">

                    <form method="POST" class="form-deco" style="width: 30%; ">
                        Category Name <input type="text" name="name" required>
                        <button name="add">Add</button>
                    </form>

                    <br><br>

                    <table border="1" class="table-color table-deco">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>

                        <?php
                        $result = mysqli_query($connect, "SELECT * FROM categories");
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td><?php echo $row['ECat_ID']; ?></td>
                                <td><?php echo $row['ECat_Name']; ?></td>
                                <td><a href="?delete=<?php echo $row['ECat_ID']; ?>">Delete</a></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <br>
                </div>
            </section>
</body>

</html>