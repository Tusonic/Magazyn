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

<?php 
if ($_SESSION["uprawnienia"] != "Administrator" and $_SESSION["uprawnienia"] != "Użytkownik" )
{
	Header ('Location: error.php');
}

?>



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
Dodaj nową taśmę </br>
Nowo dodana taśmą będzie posiadała numer: <?php echo $procentmax + 1 ; ?>
</div>

<div id='tasma_dodaj'>
<form action='tasma_dodaj.php' method='post'>
<table id='tabela_tasma_dodaj'>

<tr><td>Podaj nazwe taśmy:</td> <td><input type='text' class="wpisywanie_dodaj_tasma" name='nazwa' /></td></tr>
<tr><td>Podaj szerokość:</td> <td><input type='text' class="wpisywanie_dodaj_tasma" name='szerokosc' /></td></tr>
<tr><td>Podaj długość:</td> <td><input type='text' class="wpisywanie_dodaj_tasma" name='dlugosc' /></td></tr>
</table>
</br>

<input type="submit" id="przycisk_tak" value="DODAJ"></form>

<?php
$nazwa = (isset($_POST['nazwa'])); 
$szerokosc = (isset($_POST['szerokosc'])); 
$dlugosc = (isset($_POST['dlugosc'])); 

if($nazwa and $szerokosc and $dlugosc) {
   
   include ("config.php");
	
	// dodajemy rekord do bazy
    $ins = @mysql_query ("INSERT INTO tasma(nazwa, szerokosc, dlugosc) VALUES ('$_POST[nazwa]','$_POST[szerokosc]','$_POST[dlugosc]')");
 
    if($ins) {
	header('Location: rekord_dodaj_1.php');
	}
    else 
	{
	header('Location: rekord_dodaj_0.php');
	};
	
	
    
    mysql_close($connection);
}


?>
</div>
</strona> 



</body>




</html>
<?php
  ob_end_flush();
?>