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
 
$pytam =" SELECT max(id) as max FROM konto";
 $wynik = mysql_query($pytam);
 while($wiersz = mysql_fetch_array($wynik))
{
$procentmax = $wiersz['max'];
 
// echo " maksymalna:  $procentmax";
}

mysql_close($connection);
?>

<strona>
<div id='konto_dodaj'>
Dodaj nowe konto </br>
Nowo dodane konto będzie posiadała numer: <?php echo $procentmax + 1 ; ?>
</div>

<div id='konto_dodaj'>
<form action='konto_dodaj.php' method='post'>
<table id='tabela_konto_dodaj'>

<tr><td>Podaj login:</td> <td><input type='text' class="wpisywanie_dodaj_tasma" name='login' /></td></tr>
<tr><td>Podaj haslo::</td> <td><input type='text' class="wpisywanie_dodaj_tasma" name='haslo' /></td></tr>
<tr><td>Wybierz uprawnienia:</td> <td> <select name='acc' class="wpisywanie_select">
		<option value='Administrator'>Administrator</option>
		<option value='Użytkownik'>Użytkownik</option>
</select></td></tr>
</table>
</br>

<input type="submit" id="przycisk_tak" value="DODAJ"></form>

<?php
$login = (isset($_POST['login'])); 
$haslo = (isset($_POST['haslo'])); 
$acc = (isset($_POST['acc'])); 

if($login and $haslo and $acc) {
   
   include ("config.php");
	
	// dodajemy rekord do bazy
    $ins = @mysql_query ("INSERT INTO konto(login, haslo, acc) VALUES ('$_POST[login]','$_POST[haslo]','$_POST[acc]')");
 
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