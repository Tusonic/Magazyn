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


<div id='wyswietl_usun'>
Czy aby napewno chcesz usunąć ?



<?php

if (isset($_POST['usunk']))

{


$id = (isset($_GET['usunk'])); 
 include ("config.php");
 $id = $_GET['usunk'];
 $ins = @mysql_query ("DELETE FROM klient WHERE id='$_GET[usunk]'");
 if($ins) {
	header('Location: rekord_usun_1.php');
	}
    else 
	{
	header('Location: rekord_usun_0.php');
	};
	
	mysql_close($connection);
	}

?>
</br></br>


<form action="#" method="POST">
<input  type="submit" id="przycisk_tak" name="usunk" value="TAK">
</form>

</br>

<form action="index.php" method="POST">
<input  type="submit" id="przycisk_tak" name="usunk" value="NIE">
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