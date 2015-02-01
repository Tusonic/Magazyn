
<!DOCTYPE html>
<html>
	<head>
	<link rel='Stylesheet' type='text/css' href='style.css' />
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' /> 
	<title>MAGAZYN</title>
	</head>
<body>
<naglowek>
	M A G A Z Y N
</naglowek>

<logowanie>
	<input type="text"class="wpisywanie" placeholder="Login" /> 
	<input type="password" class="wpisywanie"placeholder="Password" /> 
	<input type="submit" class="submit" id="przycisk_login" name="potwierdz" value="Zaloguj">
</logowanie>

<panel>
<?php
include('panel.php');
?>	
</panel>
</body>



</html>
