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
if ($_SESSION["uprawnienia"] != "Administrator")
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

	
	if( isset($_GET['edytujk']) )
	{
	$id = $_GET['edytujk'];
	$sql = "SELECT * FROM klient where id=$id";
	$result = mysql_query($sql) or die ("ERROR: " . mysql_error() . " (query was $sql)");
	$row = mysql_fetch_array($result);
	}
  
  	
  	if( isset($_POST['new_nazwisko']) )
  	{
  			$new_id   = $_POST['new_id'];  
     		$new_imie= $_POST['new_imie'];
     		$new_nazwisko = $_POST['new_nazwisko'];
     		$new_firma = $_POST['new_firma'];  
			$new_ulica = $_POST['new_ulica'];   
			$new_miasto = $_POST['new_miasto'];   
			$new_kod = $_POST['new_kod'];   			
			$new_telefon = $_POST['new_telefon'];  
			$new_mail = $_POST['new_mail'];  
     		
     		$sql	  = "UPDATE klient SET imie='$new_imie', nazwisko='$new_nazwisko', firma='$new_firma', ulica='$new_ulica', miasto='$new_miasto', kod='$new_kod' , telefon='$new_telefon' , mail='$new_mail' WHERE id='$new_id'";
			 
			 if($sql) {
	header('Location: rekord_edytuj_1.php');
	}
    else 
	{
	header('Location: rekord_edytuj_0.php');
	};
	
     		$result	  = mysql_query($sql) or die("Nie mozna zaktualizowac danych".mysql_error());
	//	echo  "<meta http-equiv='refresh' content='0;url=admin_user.php'>";     	
        }
	mysql_close($connection);
?>

<form action="edytujk.php" method="POST">
<table id='tabela_klient_dodaj'>
		<tr><td>Id:</td><td> <input  type="text" class="wpisywanie_dodaj_tasma" name="new_id" value="<?php echo $row[0]; ?>"></td></tr>
		<tr><td>Imie:</td><td><input  type="text" class="wpisywanie_dodaj_tasma" name="new_imie" value="<?php echo $row[1]; ?>"></td></tr>
		<tr><td>Nazwisko:</td><td><input  type="text" class="wpisywanie_dodaj_tasma" name="new_nazwisko" value="<?php echo $row[2]; ?>"></td></tr>
		<tr><td>Firma:</td><td><input  type="text" class="wpisywanie_dodaj_tasma" name="new_firma" value="<?php echo $row[3]; ?>"></td></tr>
		<tr><td>Ulica:</td><td><input  type="text" class="wpisywanie_dodaj_tasma" name="new_ulica" value="<?php echo $row[4]; ?>"></td></tr>
		<tr><td>Miasto:</td><td><input  type="text" class="wpisywanie_dodaj_tasma" name="new_miasto" value="<?php echo $row[5]; ?>"></td></tr>
		<tr><td>Kod:</td><td><input  type="text" class="wpisywanie_dodaj_tasma" name="new_kod" value="<?php echo $row[6]; ?>"></td></tr>
		<tr><td>Telefon:</td><td><input  type="text" class="wpisywanie_dodaj_tasma" name="new_telefon" value="<?php echo $row[7]; ?>"></td></tr>
		<tr><td>Mail:</td><td><input  type="text" class="wpisywanie_dodaj_tasma" name="new_mail" value="<?php echo $row[8]; ?>"></td></tr>

			
</table>
</br>

<input  type="submit" id="przycisk_login" value=" Aktualizuj ">
</form>



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