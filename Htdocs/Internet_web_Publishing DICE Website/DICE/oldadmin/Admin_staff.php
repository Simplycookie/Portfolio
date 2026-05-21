<?php
session_start();
include 'Base.php';

if(!isset($_SESSION['admin'])){
    header("Location: admin-login.php");
    exit();
}

if(isset($_POST['add'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $position = $_POST['position'];

    mysqli_query($connect, "INSERT INTO staff (name,email,position)
                         VALUES ('$name','$email','$position')");
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($connect, "DELETE FROM staff WHERE id=$id");
}
?>

<h2>Manage Staff</h2>

<form method="POST">
    Name: <input type="text" name="name" required>
    Email: <input type="email" name="email" required>
    Position: <input type="text" name="position" required>
    <button name="add">Add Staff</button>
</form>

<br><br>

<table border="1">
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Position</th>
<th>Action</th>
</tr>

<?php
$result = mysqli_query($connect, "SELECT * FROM staff");
while($row = mysqli_fetch_assoc($result)){
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

<br>
<a href="Admin_dashboard.php">Back to Dashboard</a>
