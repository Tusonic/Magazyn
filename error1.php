<?php 
if $_SESSION["uprawnienia"] != "Administrator" and $_SESSION["uprawnienia"] != "Użytkownik" )
{
	Header ('Location: error.php');
}

?> 

