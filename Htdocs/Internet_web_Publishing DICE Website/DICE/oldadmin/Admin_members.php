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
    $phone = $_POST['Phone_number'];
    $pass = $_POST['password'];

    mysqli_query($connect, "INSERT INTO website_user (User_Name,User_Email,User_PhNum,User_Password)
                         VALUES ('$name','$email','$phone','$pass')");
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($connect, "update website_user set isDeleted=1 where User_ID='$id'");
    
}
?>

<h2>Manage Members</h2>

<form method="POST">
    <input type="text" name="name" required>:Name<br>
    <input type="email" name="email" required>:Email<br>
    <input type="text" name="Phone_number" required>:Phone Number<br>
    <input type="text" name="password" required>:Password

    <button name="add">Add Member</button>
</form>

<table border="1">
<tr><th>ID</th><th>Name</th><th>Email</th><th>Phone Number</th><th>registration Date</th><th>Age</th><th>Action</th></tr>

<?php
$result = mysqli_query($connect, "SELECT * FROM website_user where isDeleted = 0");
while($row = mysqli_fetch_assoc($result)){
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

<br>
<a href="Admin_dashboard.php">Back</a>