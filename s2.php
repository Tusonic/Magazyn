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
 
  echo "Wydanie taśmy </br>Wybrałeś klienta o numerze: ".$_SESSION["s1klient"]."";
  echo "</br>Wybrałeś taśmę o numerze: ".$_SESSION["s2tasma"]."";
  echo "</br>Jesteś zalogowany jako ".$_SESSION["slogin"]."</br>";
 //  echo "</br>ID Uzytkownika: ".$_SESSION["sid"]."";
	
  
	
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




<?php

if(isset($_POST['wykonaj']))
{
$data = $_POST['data'];
$tasmadodaj = (isset($_SESSION['s2tasma'])); 
$klientdodaj = (isset($_SESSION['s1klient'])); 
$id = (isset($_SESSION["slogin"])); 

if($tasmadodaj and $klientdodaj and $id) {
   
   include ("config.php");
	
	// dodajemy rekord do bazy
    $ins = @mysql_query ("INSERT INTO sprzedaz VALUES ('','$_SESSION[s2tasma]','$_SESSION[s1klient]','$_SESSION[sid]','$data')");
 
    if($ins){
	header('Location: rekord_sprzedaj_1.php');
	}
    else 
	{
	header('Location: rekord_sprzedaj_0.php');
	};
	
	
    
    mysql_close($connection);
}
}
?>




</strona>

</body>




</html>
<?php
  ob_end_flush();
?>