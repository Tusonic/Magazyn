<?php ob_start();
session_start();
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
	<?php
include('logowanie.php');
?>
</logowanie>

<panel>
<?php
include('panel.php');
?>	
</br>
</panel>
<?php
 
 include ("config.php");
 
$pytam =" SELECT max(id) as max FROM tasma";
 $wynik = mysql_query($pytam);
 while($wiersz = mysql_fetch_array($wynik))
{
$procentmax = $wiersz['max'];
 
// echo " maksymalna:  $procentmax";
}

mysql_close($connection);
?>

<strona>


<div id='tasma_dodaj'>
<form action='index.php' method='post'>
Błąd w dodaniu sprzedazy !!!</br>
</br>

<input type="submit" id="przycisk_tak" value="WRÓĆ"></form>


</div>
</strona> 



</body>




</html>
<?php
ob_end_flush();
?>	