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

$sql = "SELECT * FROM sprzedaz";
$result = mysql_query($sql) or die ("ERROR: " . mysql_error() . " (query was $sql)");

	
if (mysql_num_rows($result) > 0) {
 echo "<table id='table_id' class='display'><thead><tr>
					<td>ID S.</td>
		  			<td>ID T.</td>
					<td>ID K.</td>
					
					<td>Nazwa Tasmy</td>
					<td>Wymiary</td>
					
					<td>Imie</td>
					<td>Nazwisko</td>
					<td>Konto</td>
					<td>Data</td>
					
					</tr></thead><tbody>";
     
	 while($row = mysql_fetch_row($result)) {
          echo "<tr class='odd gradeA'>
		  
					<td>$row[0]</td>
		  			<td>$row[1]</td>
					<td>$row[8]</td>
					
					<td>$row[8]</td>
					<td>$row[3] X $row[4]</td>
					
					<td>$row[6]</td>
					<td>$row[7]</td>
					<td>$row[9]</td>
					<td>$row[10]</td>
				
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
<?php
ob_end_flush();
?>	