<?php
/*
Author: Javed Ur Rehman
Website: https://htmlcssphptutorial.wordpress.com/
*/
?>
<?php
$hostname = "bucmotorultest.mysql.db";
$user = "bucmotorultest";
$password = "Pirate0022";
$database = "bucmotorultest";
$bd = @mysql_connect($hostname, $user, $password) 
or die("DB Connection Failed!");
mysql_select_db($database, $bd) or die("DB Connection Failed!");
?>