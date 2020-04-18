<?php
/*
// mysql_connect("database-host", "username", "password")
$conn = mysql_connect("localhost","root","root") 
			or die("cannot connected");

// mysql_select_db("database-name", "connection-link-identifier")
@mysql_select_db("test",$conn);
*/

/**
 * mysql_connect is deprecated
 * using mysqli_connect instead
 */


//$databaseHost = getenv('DB_SERVER');
/$databasePort = getenv('DB_PORT');
//$databaseName = getenv('DB_NAME');
//$databaseUsername = getenv('DB_USERNAME');
//$databasePassword = getenv('DB_PASSWORD');

$databaseHost = '192.168.99.101';
$databasePort = '33308';
$databaseName = 'crudwebdb';
$databaseUsername = 'pawank';
$databasePassword = '@pawan';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName, $databasePort); 
 
?>
