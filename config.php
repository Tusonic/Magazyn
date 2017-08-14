<?php
// polacz
$connection = mysql_connect('localhost', 'magazyn', 'magazyn') or die ("ERROR: Cannot connect");

// wybierz baze
mysql_select_db('magazyn') or die ("ERROR: Cannot select database");
?>
