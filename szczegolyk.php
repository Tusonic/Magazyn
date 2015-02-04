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

	
	if( isset($_GET['szczegolyk']) )
	{
	$id = $_GET['szczegolyk'];
	$sql = "SELECT * FROM klient where id=$id";
	$result = mysql_query($sql) or die ("ERROR: " . mysql_error() . " (query was $sql)");
	$row = mysql_fetch_array($result);
	}
  
  	
  	
	mysql_close($connection);
?>

<form action="index.php" method="POST">
<table id='tabela_klient_szczegoly'>
		<tr><td>Id:</td><td> <?php echo $row[0]; ?> </td></tr>
		<tr><td>Imie:</td><td> <?php echo $row[1]; ?> </td></tr>
		<tr><td>Nazwisko:</td><td> <?php echo $row[2]; ?> </td></tr>
		<tr><td>Firma:</td><td> <?php echo $row[3]; ?></td></tr>
		<tr><td>Ulica:</td><td> <?php echo $row[4]; ?> </td></tr>
		<tr><td>Miasto:</td><td> <?php echo $row[5]; ?> </td></tr>
		<tr><td>Kod:</td><td> <?php echo $row[6]; ?> </td></tr>
		<tr><td>Telefon:</td><td> <?php echo $row[7]; ?></td></tr>
		<tr><td>Mail:</td><td> <?php echo $row[8]; ?> </td></tr>

			
</table>
</br>

<input  type="submit" id="przycisk_login" value=" OK ">
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