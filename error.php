<?php ob_start();
session_start();
?>
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
	<?php
include('logowanie.php');
?>	
</logowanie>

<panel>
</br></br>
<img src="png/error.png" alt="ERROR" />
</br></br>
<form action='index.php' method='post'><input type='submit' class='submit' id='przycisk_tak' name='potwierdz' value='WRÓĆ'></form>
</panel>
</body>



</html>

<?php 

echo $_SESSION["slogin"];
echo $_SESSION["shaslo"];
echo $_SESSION["uprawnienia"];

if ($_POST['uprawnienia']==1)
{
echo "TOMEK1";
}

?>

Login: 123 Pass: 123 = ADMIN Login: 321 Pass: 321 = USER


<?php
ob_end_flush();
?>