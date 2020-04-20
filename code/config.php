<?php

$databaseHost = getenv('DB_SERVER');
$databaseName = getenv('DB_NAME');
$databaseUsername = getenv('DB_USERNAME');
$databasePassword = getenv('DB_PASSWORD');

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    //you need to exit the script, if there is an error
    exit();
}

?>
