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


<strona>

<div id='tasma_warsztat'>
<form action='warsztat.php' method='post'>



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

<?php
include ("config.php");

	
	if( isset($_GET['warsztat']) )
	{
	$id = $_GET['warsztat'];
	$sql = "SELECT * FROM tasma where id=$id";
	$result = mysql_query($sql) or die ("ERROR: " . mysql_error() . " (query was $sql)");
	$row = mysql_fetch_array($result);
	}
	
	mysql_close($connection);
	
	?>




Wymiary aktualnej taśmy:</br>
Szerokość: <?php echo $row[2]; ?></br>
Długość: <?php echo $row[3]; ?></br></br></br>


STARA TAŚMA</br>
Podaj wymiary aktualnej taśmy po przecięciu:</br>
<table id='tabela_tasma_dodaj'>
<tr><td>Numer taśmy:</td><td> <input  type="text" class="wpisywanie_dodaj_tasma" name="new_id" value="<?php echo $row[0]; ?>"></td></tr>
<tr><td>Nazwa:</td><td><input  type="text" class="wpisywanie_dodaj_tasma" name="new_nazwa" value="<?php echo $row[1]; ?>"></td></tr>
<tr><td>Szerkosć:</td><td><input placeholder="w milimetrach"  type="text" class="wpisywanie_dodaj_tasma" name="new_szerokosc" pattern="[0-9]*" required  ></td></tr>
<tr><td>Długość:</td><td><input  placeholder="w milimetrach" type="text" class="wpisywanie_dodaj_tasma" name="new_dlugosc"  pattern="[0-9]*" required></td></tr>
</table>
</br>





NOWA TAŚMA </br>
Podaj wymiary dla nowej taśmy:</br></br>
Numer jaki będzie posiadać: <?php echo $procentmax + 1 ; ?>
<table id='tabela_tasma_dodaj'>
<tr><td>Nazwa taśmy:</td><td> <input  type="text" class="wpisywanie_dodaj_tasma" name="nazwa" value="<?php echo $row[1]; ?>" /></td></tr>
<tr><td>Szerokość</td><td><input placeholder="w milimetrach"  type='text' class="wpisywanie_dodaj_tasma" name="szerokosc" pattern="[0-9]*" required/></td></tr>
<tr><td>Długość:</td><td><input placeholder="w milimetrach"  type='text' class="wpisywanie_dodaj_tasma" name="dlugosc"  pattern="[0-9]*"required /></td></tr>
</table>
</br></br>



<input type="submit" id="przycisk_tak" value="PRZYTNIJ">
<?php
			$new_id   = (isset($_POST['new_id']));  
			$new_nazwa = (isset($_POST['new_nazwa']));
     		$new_szerokosc = (isset($_POST['new_szerokosc']));
     		$new_dlugosc = (isset($_POST['new_dlugosc']));  

			$nazwa = (isset($_POST['nazwa'])); 
			$szerokosc = (isset($_POST['szerokosc'])); 
			$dlugosc = (isset($_POST['dlugosc']));		
			
			if ($new_szerokosc and $new_dlugosc and $szerokosc and $dlugosc )
			{
		 		 
			include ("config.php");
			 
     		$sql	  = "UPDATE tasma SET nazwa='$new_nazwa', szerokosc='$new_szerokosc',dlugosc='$new_dlugosc'WHERE id='$new_id'";
     		$result	  = mysql_query($sql) or die("Nie mozna zaktualizowac danych".mysql_error());
			
			$ins = @mysql_query ("INSERT INTO tasma(nazwa, szerokosc, dlugosc) VALUES ('$_POST[nazwa]','$_POST[szerokosc]','$_POST[dlugosc]')");
			if($ins)
				{ 
					header('Location: rekord_warsztat_1.php');
				}
			else 
				{
					header('Location: rekord_warsztat_0.php');
				};
        
	mysql_close($connection);
	
	}
		
	
	?>

</form>








	
	





</div>


</strona>

</body>




</html>
<?php
 ob_end_flush();
?>