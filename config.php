<?php

$databaseHost = 'localhost';
$databaseName = 'poke_db';
$databaseUsername = 'root';
$databasePassword = '';

//connect
$link = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

//if connection fail
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>