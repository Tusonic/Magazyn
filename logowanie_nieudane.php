<?php
ob_start();
?>
<!DOCTYPE html>
<html>
	<head>
	<link rel='Stylesheet' type='text/css' href='style.css' />
	<link rel="stylesheet" type="text/css" href="js/jquery.dataTables.css">
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' /> 
	<title>MAGAZYN</title>
	</head>
<body>



<naglowek>
	M A G A Z Y N
</naglowek>

<logowanie>
	
<form action='index.php' method='post'>Logowanie nieudane 
<input type="submit" id="przycisk_tak" value="WRÓĆ">
</form>
</logowanie>


</body>




</html>
<?php
  ob_end_flush();
?>