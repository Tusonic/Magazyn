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



<?php

	$_SESSION["s1klient"] = $_GET['s1'];
 
  echo "Wydanie taśmy </br>Wybrałeś klienta o numerze ID: ".$_SESSION["s1klient"]."";
  
	
?>
</div>

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
					<td>Wybierz</td>
					
					
					</tr></thead><tbody>";
     
	 while($row = mysql_fetch_row($result)) {
          echo "<tr class='odd gradeA'><td>$row[0]</td>
		  			<td>$row[1]</td>
					<td>$row[2]</td>
					<td>$row[3]</td>
					<td><a href='s2.php?s2=$row[0]'><img src='png/wybierz.png' alt='Wybierz' /></a></td>
					
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