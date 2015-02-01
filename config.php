<?php
// open connection
$connection = mysql_connect('localhost', 'kazik123_inz', 'kazik123_inz') or die ("ERROR: Cannot connect");

// select database 
mysql_select_db('kazik123_inz') or die ("ERROR: Cannot select database");
?>