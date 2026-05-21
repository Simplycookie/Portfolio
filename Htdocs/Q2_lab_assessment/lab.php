 
<?php $connect =  mysqli_connect("localhost","libraryadmin","admin123","smartlibrary")
  
?> 
<!DOCTYPE html> 
<html> 
    <head> 
        <title>Insert Book</title> 
    </head> 
    <body> 
    
        <form method="POST"> 
            <h3>Insert Book Record</h3> 
        
            <label>Product Category</label><br>
            <select name="Book_category">
                <?php
                    $result = mysqli_query($connect,"SELECT * FROM category");
                    while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <option value="<?php echo $row['cat_ID']?>"><?php echo $row["cat_Name"]?></option>
                        <?php
                    }
                ?>
            </select>
        
        
            <label>Book Title:</label><br> 
            <input type="text" name="book_title"><br><br> 
        
            <label>Author:</label><br> 
            <input type="text" name="book_author"><br><br> 
        
            <label>Quantity:</label><br> 
            <input type="number" name="book_qty"><br><br> 
        
            <label>Price:</label><br> 
            <input type="text" name="book_price"><br><br> 
        
            <input type="submit" name="btn_submit" value="Submit"> 
        </form> 
        
        <?php
            if(isset($_POST["btn_submit"])){
                $Title = $_POST["book_title"];
                $Author = $_POST["book_author"];
                $Quantity = $_POST["book_qty"];
                $Price = $_POST["book_price"];
                $Category = $_POST["Book_category"];

                if(mysqli_query($connect,
                "INSERT INTO books (book_title, book_author, book_qty, book_price, cat_ID) VALUE('$Title','$Author', $Quantity, $Price, $Category)")){
                    echo "<script>alert('$Title saved')</script>";
                }
            }

        ?>
        
    
    </body> 
</html> 