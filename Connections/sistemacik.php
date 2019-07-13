<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_sistemacik = "localhost";
$database_sistemacik = "sistemacik";
$username_sistemacik = "root";
$password_sistemacik = "";
$sistemacik = mysql_pconnect($hostname_sistemacik, $username_sistemacik, $password_sistemacik) or trigger_error(mysql_error(),E_USER_ERROR); 
?>