<!DOCTYPE html>
<html>

<head><title>Lab 11</title></head>

<body>

<form name="addfrm" method="post" action="">

<p>Enter a number : <input type="text" name="num"></p>
<p><input type="submit" name="addbtn" value="Add All Number">
   <input type="submit" name="mulbtn" value="Multiply All Number">
</p>

</form>
<?php

if (isset($_POST["addbtn"]))//if user click add all number
{
   $num = (int) $_POST["num"];
   $sum = 0;
	for ($i=1; $i <= $num; $i++) { 
      $sum += $i;
   }
   echo "<p>The total of all numbers is $sum</p>";
	
}

if (isset($_POST["mulbtn"]))//if user click multiply all number
{
   $num = (int) $_POST["num"];
   $product = 1;
   $i = 1;
   while($i <= $num){
      $product *= $i;
      $i++;
   }
   echo "<p>The product of all numbers is $product</p>";
	
	
}
?>


</body>
</html>