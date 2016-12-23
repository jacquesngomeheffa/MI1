<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_connexion = "bucmotorultest.mysql.db";
$database_connexion = "bucmotorultest";
$username_connexion = "bucmotorultest";
$password_connexion = "Pirate0022";
$connexion = @mysql_pconnect($hostname_connexion, $username_connexion, $password_connexion) or trigger_error(mysql_error(),E_USER_ERROR); 
?>