<?php ob_start();
session_start();
?>
<!DOCTYPE html>
<html>
	<head>	
		<link href="jquery-ui-1.11.1.custom/jquery-ui.css" rel="stylesheet">		
		<link rel='Stylesheet' type='text/css' href='style.css' />
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

	$_SESSION["s2tasma"] = $_GET['s2'];
	
	$zmiennatasma = $_SESSION["s2tasma"];
	
 
  echo "Wydanie taśmy </br>Wybrałeś klienta o numerze: ".$_SESSION["s1klient"]."";
  echo "</br>Wybrałeś taśmę o numerze: ".$_SESSION["s2tasma"]."";
  echo "</br>Jesteś zalogowany jako ".$_SESSION["slogin"]."</br>";
 //  echo "</br>ID Uzytkownika: ".$_SESSION["sid"]."";
	
  $zmiennatasma = $_SESSION["s2tasma"];
  $zmiennaklient = $_SESSION["s1klient"];
  $zmiennalogin = $_SESSION["slogin"];
	
?>
<form action='#' method='post'>

Wybierz date: <input type="text"  name="data" id="datepicker">
</br></br><input type='submit' class='submit' id='przycisk_tak' name='wykonaj' value='DODAJ'>
</form>

<script src="jquery-ui-1.11.1.custom/jquery.js"></script>
<script src="jquery-ui-1.11.1.custom/jquery-ui.js"></script>
<script>  
//var date = $('#datepicker').datepicker({ dateFormat: 'yy-mm-dd' }).val(); 
$( "#datepicker" ).datepicker({ inline: true,dateFormat:"yy-mm-dd",showOn: 'button',showAnim: 'slideDown',duration: 'fast',});
$( "#accordion" ).accordion();
    $( "#datepicker" ).datepicker();
	
	
</script>

<!-- SYSTEM PRZENOSZENIA DANYCH -->

<?php


include ("config.php");

$sql2 = "SELECT * FROM tasma WHERE id = '$zmiennatasma' ";
$result2 = mysql_query($sql2) or die ("ERROR: " . mysql_error() . " (query was $sql2)");




if (mysql_num_rows($result2) > 0) {
     
	 while($row = mysql_fetch_row($result2)) {
		 $zmiennatasmaid = $row[0];
         $zmiennatasmanazwa = $row[1];
		 $zmiennatasmaszerokosc = $row[2];
		 $zmiennatasmadlugosc = $row[3];
     }
	
} 



$sql3 = "SELECT * FROM klient WHERE id = '$zmiennaklient' ";
$result3 = mysql_query($sql3) or die ("ERROR: " . mysql_error() . " (query was $sql3)");


if (mysql_num_rows($result3) > 0) {
     
	 while($row = mysql_fetch_row($result3)) {
         $zmiennaklientid = $row[0];
		 $zmiennaklientimie = $row[1];
		 $zmiennaklientnazwisko = $row[2];
     }
	
} 

$sql4 = "SELECT * FROM konto WHERE login = '$zmiennalogin' ";
$result4 = mysql_query($sql4) or die ("ERROR: " . mysql_error() . " (query was $sql3)");


if (mysql_num_rows($result4) > 0) {
     
	 while($row = mysql_fetch_row($result4)) {
         $zmiennaloginid = $row[0];
		 $zmiennaloginnazwa = $row[1];
     }
	
} 
/*
echo"debager:</br>";

echo"$zmiennatasmaid";
echo"$zmiennatasmanazwa";
echo"$zmiennatasmaszerokosc";
echo"$zmiennatasmadlugosc";

echo"$zmiennaklientid";
echo"$zmiennaklientimie";
echo"$zmiennaklientnazwisko";

echo"$zmiennalogin";

*/
?>


<?php

$data = $_POST['data'];
if(!empty($_POST['wykonaj']))  {
   
   include ("config.php");
	
	// dodajemy rekord do bazy
    $ins = @mysql_query ("INSERT INTO sprzedaz (`idtasma`, `tasmanazwa`, `tasmaszerokosc`, `tasmadlugosc`, `idklient`, `klientimie`, `klientnazwisko`, `idkonto`, `kontologin`, `data`) VALUES ('$zmiennatasmaid','$zmiennatasmanazwa','$zmiennatasmaszerokosc','$zmiennatasmadlugosc','$zmiennaklientid','$zmiennaklientimie','$zmiennaklientnazwisko','$zmiennaloginid','$zmiennaloginnazwa','$data')");
	//$ins2 = @mysql_query ("DELETE FROM tasma WHERE id='$zmiennatasmaid'");
	$ins2 = @mysql_query ("UPDATE tasma SET dostepna = '1' WHERE id='$zmiennatasmaid'");
    if($ins){
	header('Location: rekord_sprzedaj_1.php');
	}
    else 
	{
	header('Location: rekord_sprzedaj_0.php');
	};
	
	
    
    mysql_close($connection);
}

?>







</strona>

</body>




</html>
<?php
  ob_end_flush();
?>