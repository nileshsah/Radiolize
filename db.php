<?php
$username = "root";
$password = "root";
$hostname = "localhost";
$database = "radiolize";

$dbhandle = mysql_connect($hostname, $username, $password);
@mysql_select_db($database) or die( "Unable to select database");
?>
