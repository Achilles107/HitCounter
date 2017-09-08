<?php
$host_name='localhost';
$user_name='root';
$pass_word='achilles';
$db_name='mysql';
$connection=mysql_connect($host_name,$user_name,$pass_word);
mysql_select_db($db_name,$connection);
?>