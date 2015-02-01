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


<strona>

<div id='wyswietl_tabela'>




<?php
include ("config.php");

	
	if( isset($_GET['edytujp']) )
	{
	$id = $_GET['edytujp'];
	$sql = "SELECT * FROM konto where id=$id";
	$result = mysql_query($sql) or die ("ERROR: " . mysql_error() . " (query was $sql)");
	$row = mysql_fetch_array($result);
	}
  
  	
  	if( isset($_POST['new_id']) )
  	{
  			$new_id   = $_POST['new_id'];  
     		$new_login = $_POST['new_login'];
     		$new_haslo = $_POST['new_haslo'];
     		$new_acc = $_POST['new_acc'];    
     		
     		$sql	  = "UPDATE konto SET login='$new_login', haslo='$new_haslo',acc='$new_acc' WHERE id='$new_id'";
			 
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

<form action="edytujp.php" method="POST">
<table id='tabela_tasma_dodaj'>
<tr><td>Id:</td><td> <input  type="text" class="wpisywanie_dodaj_tasma" name="new_id" value="<?php echo $row[0]; ?>"></td></tr>
<tr><td>Login:</td><td><input  type="text" class="wpisywanie_dodaj_tasma" name="new_login" value="<?php echo $row[1]; ?>"></td></tr>
<tr><td>Hasło:</td><td><input  type="text" class="wpisywanie_dodaj_tasma" name="new_haslo" value="<?php echo $row[2]; ?>"></td></tr>
<tr><td>Uprawnienia:</td><td><select name='new_acc' class="wpisywanie_select">
		<option selected value='<?php echo $row[3]; ?>'>Bez zmian</option>
		
		<option value='Użytkownik'>Użytkownik</option>
		<option value='Administrator'>Administrator</option>
</select></td></tr>
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