<?php
/*
// mysql_connect("database-host", "username", "password")
//$conn = mysql_connect("localhost","root","root") 
			or die("cannot connected");

// mysql_select_db("database-name", "connection-link-identifier")
//@mysql_select_db("test",$conn);
*/

/**
 * mysql_connect is deprecated
 * using mysqli_connect instead
 */


$databaseHost = getenv('DB_SERVER');
$databaseName = getenv('DB_NAME');
$databaseUsername = getenv('DB_USERNAME');
$databasePassword = getenv('DB_PASSWORD');


$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
 
?>
