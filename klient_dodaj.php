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
 
$pytam =" SELECT max(id) as max FROM klient";
 $wynik = mysql_query($pytam);
 while($wiersz = mysql_fetch_array($wynik))
{
$procentmax = $wiersz['max'];
 
// echo " maksymalna:  $procentmax";
}

mysql_close($connection);
?>




<strona>
<div id='klient_dodaj'>
Dodaj nowego klienta </br>
Nowo dodany klient będzie posiadała numer: <?php echo $procentmax + 1 ; ?>
</div>

<div id='klient_dodaj'>
<form action='klient_dodaj.php' method='post'>
<table id='tabela_klient_dodaj'>

<tr><td>Podaj imię:</td> <td><input type='text' class="wpisywanie_dodaj_tasma" name='imie' /></td></tr>
<tr><td>Podaj nazwisko::</td> <td><input type='text' class="wpisywanie_dodaj_tasma" name='nazwisko' /></td></tr>
<tr><td>Podaj firmę:</td> <td><input type='text' class="wpisywanie_dodaj_tasma" name='firma' /></td></tr>
<tr><td>Podaj ulicę:</td> <td><input type='text' class="wpisywanie_dodaj_tasma" name='ulica' /></td></tr>
<tr><td>Podaj miasto:</td> <td><input type='text' class="wpisywanie_dodaj_tasma" name='miasto' /></td></tr>
<tr><td>Podaj kod:</td> <td><input type='text' class="wpisywanie_dodaj_tasma" name='kod' /></td></tr>
<tr><td>Podaj telefon:</td> <td><input type='text' class="wpisywanie_dodaj_tasma" name='telefon' /></td></tr>
<tr><td>Podaj mail:</td> <td><input type='text' class="wpisywanie_dodaj_tasma" name='mail' /></td></tr>
</table>
</br>

<input type="submit" id="przycisk_tak" value="DODAJ"></form>

<?php
$imie = (isset($_POST['imie'])); 
$nazwisko = (isset($_POST['nazwisko'])); 
$firma = (isset($_POST['firma'])); 
$ulica = (isset($_POST['ulica'])); 
$miasto = (isset($_POST['miasto'])); 
$kod = (isset($_POST['kod'])); 
$telefon = (isset($_POST['telefon'])); 
$mail = (isset($_POST['mail'])); 

if($imie and $nazwisko and $ulica) {
   
   include ("config.php");
	
	// dodajemy rekord do bazy
    $ins = @mysql_query ("INSERT INTO klient(imie, nazwisko, firma, ulica, miasto, kod, telefon, mail) VALUES ('$_POST[imie]','$_POST[nazwisko]','$_POST[firma]','$_POST[ulica]','$_POST[miasto]','$_POST[kod]','$_POST[telefon]','$_POST[mail]')");
 
    if($ins) 
	{
	header('Location: rekord_dodaj_1.php');
	}
    else 
	{
	header('Location: rekord_dodaj_0.php');
	}
;
	
	
    
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
	