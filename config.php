<?php
// polacz
$connection = mysql_connect('localhost', 'kazik123_magazyn', 'kazik123_magazyn') or die ("ERROR: Cannot connect");

// wybierz baze
mysql_select_db('kazik123_magazyn') or die ("ERROR: Cannot select database");
?>