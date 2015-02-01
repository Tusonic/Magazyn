<?php
// polacz
$connection = mysql_connect('localhost', 'kazik123_inz', 'kazik123_inz') or die ("ERROR: Cannot connect");

// wybierz baze
mysql_select_db('kazik123_inz') or die ("ERROR: Cannot select database");
?>