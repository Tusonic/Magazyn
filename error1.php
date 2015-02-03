<?php 
if $_SESSION["uprawnienia"] != "Administrator" and $_SESSION["uprawnienia"] != "U¿ytkownik" )
{
	Header ('Location: error.php');
}

?> 

