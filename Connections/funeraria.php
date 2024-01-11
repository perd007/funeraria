<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_funeraria = "localhost";
$database_funeraria = "funeraria";
$username_funeraria = "root";
$password_funeraria = "root";
$funeraria = mysql_pconnect($hostname_funeraria, $username_funeraria, $password_funeraria) or trigger_error(mysql_error(),E_USER_ERROR); 
?>