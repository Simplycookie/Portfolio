<?php
session_start();
include 'Base.php';

if(!isset($_SESSION['admin'])){
    header("Location: admin-login.php");
    exit();
}

if(isset($_POST['add'])){
    $name = $_POST['name'];
    mysqli_query($connect, "INSERT INTO categories (name)
                         VALUES ('$name')");
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($connect, "DELETE FROM categories WHERE ECat_ID=$id");
}
?>

<h2>Manage Categories</h2>

<form method="POST">
    Category Name: <input type="text" name="name" required>
    <button name="add">Add</button>
</form>

<table border="1">
<tr><th>ID</th><th>Name</th><th>Action</th></tr>

<?php
$result = mysqli_query($connect, "SELECT * FROM categories");
while($row = mysqli_fetch_assoc($result)){
?>
<tr>
<td><?php echo $row['ECat_ID']; ?></td>
<td><?php echo $row['ECat_Name']; ?></td>
<td><a href="?delete=<?php echo $row['ECat_ID']; ?>">Delete</a></td>
</tr>
<?php } ?>
</table>

<br>
<a href="Admin_dashboard.php">Back</a>
