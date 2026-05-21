<!DOCTYPE html>
<html>

<head><title>Lab 11</title>
</head>

<body>

<h3><u>ASTRO BILL STATEMENT</u></h3>

	<form name="subscribefrm" method="post" action="" >
	
		<p>Additional Channels : 
			<br><input type="checkbox" name="channel[]" value="Sports">Sports
			<br><input type="checkbox" name="channel[]" value="Movie">Movie
			<br><input type="checkbox" name="channel[]" value="Kids">Kids 
		</p>
		
		<p>
			Bill Type:
			<input type="radio" name="billtype" value="Email" /> Email
			<input type="radio" name="billtype" value="Post" /> Post
		</p>
	
		<p>	<input type="submit" name="billbtn" value="Send" ></p>
	
	</form>

</body>
</html>