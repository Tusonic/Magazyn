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

$sql = "SELECT id, nazwa, szerokosc, dlugosc FROM tasma";
$result = mysql_query($sql) or die ("ERROR: " . mysql_error() . " (query was $sql)");

	
if (mysql_num_rows($result) > 0) {
 echo "<table id='table_id' class='display'><thead><tr>
					<td>Numer</td>
		  			<td>Nazwa</td>
					<td>Szerokość</td>
					<td>Długość</td>
					<td>Operacje</td>
					
					
					</tr></thead><tbody>";
     
	 while($row = mysql_fetch_row($result)) {
          echo "<tr class='odd gradeA'><td>$row[0]</td>
		  			<td>$row[1]</td>
					<td>$row[2]</td>
					<td>$row[3]</td>
					
					<td><a href='warsztat.php?warsztat=$row[0]'><img src='png/przyciskwarsztat.png' alt='Warsztat' /></a></td>									
					</tr>";
     }
	 echo "</tbody></table>";
} else {
      echo "No records found!";
}

?>

<?php
include('skrypt.php');
?>

</strona>

</body>




</html>
	