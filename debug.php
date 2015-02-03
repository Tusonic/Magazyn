<?php
ob_start();
session_start();

echo"Jestes zalogowany jako </br> ";
echo $_SESSION["login"];

echo"Twoje haslo to: </br> ";
echo $_SESSION["haslo"];

echo "  oraz masz uprawnienia: </br> ";
echo $_SESSION["upr"];


if ($_SESSION["acc"] == 1)
{
echo "TOMEK UPRAWNIENAI 1";
}

else

{
echo "Error";
}


  ob_end_flush();
?>