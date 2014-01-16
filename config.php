<?php
session_start();
?>
<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
?>
<?php

define("BASE_URL","/guestbook!7",false);

function open_database_connection()
{

$db = "database!";
$host = "localhost";
$user = "root";
$pass = "";


$connect = mysql_connect($host, $user, $pass);  

mysql_select_db($db); 

//mysql_query('SET NAMES UTF8');
mysql_query("SET NAMES 'utf8'");
mysql_query("SET CHARACTER SET 'utf8'");

return $connect;
}

?>