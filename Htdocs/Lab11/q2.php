<!DOCTYPE html>
<html>

<head><title>Lab 11</title></head>

<body>

<form name="convertfrm" method="get" action="">

<p>Enter the measurement in kilometer : <input type="text" name="kilometer"></p>
<p>Choose a unit to convert : 
	<input type="radio" name="unit" value="Miles"> Miles 
	<input type="radio" name="unit" value="Yards"> Yards
	<input type="radio" name="unit" value="Inch"> Inch
</p>
<p><input type="submit" name="convertbtn" value="Convert Value"></p>

</form>

<?php
	define ("MILE_RATE",0.621371);
	define ("YARD_RATE",1093.61);
	define ("INCH_RATE",39370.1);
	$choice = (isset($_GET["unit"]));
	$num = (isset($_GET["kilometer"]));
	$result = 0;
	$unitlabel = "";
	switch ($choice) {
		case 'Miles':
			$result = $num*MILE_RATE;
			$unitlabel = "Miles";
			break;
		case 'Yards':
			$result = $num*YARD_RATE;
			$unitlabel = "Yards";
			break;
		case 'Inch':
			$result = $num*INCH_RATE;
			$unitlabel = "Itch";
			break;	
		default:
			echo "<script> alert('Please select a unit to convert');</script>";
			break;
	}
	$msg = "Process: Kilometer to $unitlabel\n" . $num  . " km " . number_format($result,2) . " " . $unitlabel;
	echo "<script> alert(" . Json_encode($msg) . "); </script>";
	

?>



</body>
</html>