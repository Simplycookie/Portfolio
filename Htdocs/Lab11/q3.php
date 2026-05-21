<!DOCTYPE html>
<html>
<head><title>Lab 11</title></head>
<body>

<form name="frm" action="" method="post">

<p>Brand : 
<select name = "tbrand">
	<option value = "Nike">Nike (RM 30.00)</option>
	<option value = "Adidas">Adidas (RM 25.00)</option>
</select>
<p>Size : 	<input type="radio" name="tsize" value = "Small">Small (Extra RM 5.00)
            <input type="radio" name="tsize" value = "Large">Large (Extra RM 10.00)
            <input type="radio" name="tsize" value = "Extra Large">Extra Large (Extra RM 15.00)

<p><input type="submit" name="sendbtn" value="Calculate"></p>


<?php

if (isset($_POST["sendbtn"]))
{
    $brand = $_POST["tbrand"];
    $size = $_POST["tsize"];

    $price = get_price($brand);
    $extra = get_extra($size);

    $total = $price + $extra;
    display($brand,$price,$size,$total);
}

function get_price($brand)
{
    switch ($brand){
        case 'Nike':
            return 30.00;
            break;
        case 'Adidas':
            return 25.00;
            break;
        default:
            return 0.00;
            break;
    }
}

function get_extra($size)
{
    if ($size == "Small"){
        return 5.00;
    }
    elseif ($size == "Large"){
        return 10.00;
    }
    else {
        return 15.00;
    }

}

function display($brand, $price, $size, $total)
{
	echo "<hr>";
    echo "<p> Brand : $brand</p>";
    echo "<p> Price : RM " . number_format($price, 2) . "</p>";
	echo "<p> Size : $size</p>";
    echo "<p> Bill : RM " . number_format($total, 2) . "</p>";
}
?>



</form>
</body>
</html>
