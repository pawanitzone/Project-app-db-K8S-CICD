<?php

$databaseHost = getenv('DB_SERVER');
$databaseName = getenv('DB_NAME');
$databaseUsername = getenv('DB_USERNAME');
$databasePassword = getenv('DB_PASSWORD');


$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
 
?>
