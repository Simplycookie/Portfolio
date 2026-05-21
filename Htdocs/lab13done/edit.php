<?php
    include("dataconnection.php");

    // 1) Get product code from URL (edit1.php?procode=P001)
    $pcode = $_GET["procode"] ?? "";

    // If no code provided, stop with message
    if ($pcode == "") {
        die("Missing product code. Example: edit1.php?procode=P001");
    }

    // 2) Fetch product record
    $sql = "SELECT * FROM product WHERE product_code = '$pcode'";
    $result = mysqli_query($connect, $sql);

    if (!$result) {
        die("SQL error: " . mysqli_error($connect));
    }

    $row = mysqli_fetch_assoc($result);

    if (!$row) {
        die("No product found for code: " . htmlspecialchars($pcode));
    }

    // 3) If user clicks Update Product, run UPDATE
    if (isset($_POST["savebtn"])) {

        $pcode_post = $_POST["prod_code"];   // from hidden field
        $pname  = $_POST["prod_name"];
        $psize  = $_POST["prod_size"];
        $pprice = $_POST["prod_price"];
        $pstock = $_POST["prod_stock"];

        $updateSql = "UPDATE product SET 
                        product_name  = '$pname',
                        product_size  = '$psize',
                        product_price = '$pprice',
                        product_stock = '$pstock'
                    WHERE product_code = '$pcode_post'";

        $updateResult = mysqli_query($connect, $updateSql);

        if (!$updateResult) {
            die("Update failed: " . mysqli_error($connect));
        }

        // redirect back to list
        header("Location: productlist.php");
        exit;
    }
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Update Product</title>
    </head>
    <body>

    <p><b>Connect successfully!</b></p>

    <h1>Update Product Detail</h1>

    <form name="updatefrm" method="post" action="">

        <p>
            Code:
            <input type="text" value="<?php echo $row['product_code']; ?>" disabled>
            <input type="hidden" name="prod_code" value="<?php echo $row['product_code']; ?>">
        </p>

        <p>
            Name:
            <input type="text" name="prod_name" value="<?php echo $row['product_name']; ?>" required>
        </p>

        <p>
            Chocolate Size:
            <select name="prod_size" required>
                <option value="small" <?php if ($row['product_size'] == "small") echo "selected"; ?>>small</option>
                <option value="big"   <?php if ($row['product_size'] == "big")   echo "selected"; ?>>big</option>
            </select>
        </p>

        <p>
            Price:
            <input type="text" name="prod_price" value="<?php echo $row['product_price']; ?>" required>
        </p>

        <p>
            Stock:
            <input type="text" name="prod_stock" value="<?php echo $row['product_stock']; ?>" required>
        </p>

        <p>
            <input type="submit" name="savebtn" value="Update Product">
        </p>

    </form>

    <p>
        <input type="button" value="Back to List" onclick="location='productlist.php'">
    </p>

    </body>
</html>
