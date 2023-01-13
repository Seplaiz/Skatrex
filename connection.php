<?php

$db =  mysqli_connect('localhost', '12L', 'Pa$$w0rd', 'skatrex');
if (!$db) die('Failed to connect to database server!<br>'.mysql_error());
mysqli_set_charset($db,'utf8');

/* define o fuso horário */

date_default_timezone_set('Europe/Lisbon');
?>