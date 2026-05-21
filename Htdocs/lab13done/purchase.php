<?php
include("dataconnection.php");

// Get product code from URL: purchase.php?procode=P001
$pcode = $_GET["procode"] ?? "";

if ($pcode == "") {
    die("Missing product code. Example: purchase.php?procode=P001");
}

// Fetch product info
$result = mysqli_query($connect, "SELECT * FROM product WHERE product_code = '$pcode'");
if (!$result) {
    die("SQL error: " . mysqli_error($connect));
}

$row = mysqli_fetch_assoc($result);
if (!$row) {
    die("No product found for code: " . htmlspecialchars($pcode));
}

// Handle order submit
if (isset($_POST["orderbtn"])) {

    $cname = $_POST["cust_name"];
    $cqty  = (int) $_POST["cust_qty"];

    $pprice  = (float) $row["product_price"];
    $stock   = (int) $row["product_stock"];
    $balance = $stock - $cqty;

    if ($cqty <= 0) {
        echo '<script>alert("Quantity must be at least 1.");</script>';
    } elseif ($balance >= 0) {

        // Insert purchase
        $ins = "INSERT INTO purchase (purchase_name, purchase_quantity, purchase_product_price, purchase_product_code)
                VALUES ('$cname', $cqty, $pprice, '$pcode')";
        if (!mysqli_query($connect, $ins)) {
            die("Insert failed: " . mysqli_error($connect));
        }

        // Update stock
        $upd = "UPDATE product SET product_stock = $balance WHERE product_code = '$pcode'";
        if (!mysqli_query($connect, $upd)) {
            die("Update failed: " . mysqli_error($connect));
        }

        header("Location: productlist.php");
        exit;

    } else {
        echo '<script>alert("Your quantity is more than the stock that we have. Please change.");</script>';
    }
}
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Purchase</title>
</head>
<body>

<h1>Product Detail</h1>

<p>
    <br>Product Code : <?php echo $row['product_code']; ?>
    <br>Product Name : <?php echo $row['product_name']; ?>
    <br>Product Price : <?php echo $row['product_price']; ?>
    <br>Product Stock : <?php echo $row['product_stock']; ?>
</p>

<h1>Your Order Detail</h1>

<form name="purchasefrm" method="post" action="">
    <p>
        Customer Name:
        <input type="text" name="cust_name"
               value="<?php echo isset($_POST['cust_name']) ? htmlspecialchars($_POST['cust_name']) : ''; ?>"
               required>
    </p>

    <p>
        Quantity:
        <input type="number" name="cust_qty" min="1" required>
    </p>

    <p><input type="submit" name="orderbtn" value="Send Order"></p>
</form>

<p>
    <input type="button" value="Back to List" onclick="location='productlist.php'">
</p>

</body>
</html>
