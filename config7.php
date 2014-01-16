<?php
session_start();
?>
<?php
define("BASE_URL","",false);

function open_database_connection()
{

$db = "ron178";
$host = "localhost";
$user = "ron178";
$pass = "5qMXuMiy";


$connect = mysql_connect($host, $user, $pass);  

mysql_select_db($db); 

//mysql_query('SET NAMES UTF8');
//mysql_query("SET NAMES 'utf8'");
//mysql_query("SET CHARACTER SET 'utf8'");

return $connect;
}
?>