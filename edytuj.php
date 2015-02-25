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

<div id='wyswietl_tabela'>




<?php
include ("config.php");

	
	if( isset($_GET['edytuj']) )
	{
	$id = $_GET['edytuj'];
	$sql = "SELECT * FROM tasma where id=$id";
	$result = mysql_query($sql) or die ("ERROR: " . mysql_error() . " (query was $sql)");
	$row = mysql_fetch_array($result);
	}
  
  	
?>

<form action="edytuj.php" method="POST">
<table id='tabela_tasma_dodaj'>
<tr><td>Id:</td><td> <input  type="text" class="wpisywanie_dodaj_tasma" name="new_id" value="<?php echo $row[0]; ?>"></td></tr>
<tr><td>Nazwa:</td><td><input  type="text" class="wpisywanie_dodaj_tasma" name="new_nazwa" value="<?php echo $row[1]; ?>"></td></tr>
<tr><td>Szerkosć:</td><td><input  type="text" class="wpisywanie_dodaj_tasma" name="new_szerokosc" value="<?php echo $row[2]; ?>"></td></tr>
<tr><td>Długość:</td><td><input  type="text" class="wpisywanie_dodaj_tasma" name="new_dlugosc" value="<?php echo $row[3]; ?>"></td></tr>
</table>
</br>

<input  type="submit" name="submit" id="przycisk_login" value=" Aktualizuj ">
</form>

<?php

			$new_id   = $_POST['new_id'];  
     		$new_nazwa = $_POST['new_nazwa'];
     		$new_szerokosc = $_POST['new_szerokosc'];
     		$new_dlugosc = $_POST['new_dlugosc'];   
			
		
		
		if(!empty($_POST['submit']))
			
		{
			if (!$new_szerokosc || !$new_dlugosc || !$new_nazwa|| !$new_id ||
					preg_match('/[A-Za-z]/', $new_szerokosc) || 
					preg_match('/[A-Za-z]/', $new_dlugosc) ||
					preg_match('/[A-Za-z]/', $new_id) )
					
					{
						header('Location: rekord_edytuj_0.php');
					}			
		
		else
			
			
			{
  			 
				$sql	  = "UPDATE tasma SET nazwa='$new_nazwa', szerokosc='$new_szerokosc',dlugosc='$new_dlugosc'WHERE id='$new_id'";
				$result  = mysql_query($sql) or die("Nie mozna zaktualizowac danych".mysql_error()); 
			 
				if($sql) 
				{
				header('Location: rekord_edytuj_1.php');
				}
			
				else 
				
				{
				header('Location: rekord_edytuj_0.php');
				};
     		   	
			}
			
		}	
			
			
	mysql_close($connection);
	
	?>



</div>

<?php
include('skrypt.php');
?>

</strona>

</body>




</html>
<?php
  ob_end_flush();
?>	