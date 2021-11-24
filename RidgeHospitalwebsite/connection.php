<?php
// Database credentials
$db_server = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'facility';

// Attempt database connection
$connect = mysqli_connect($db_server, $db_username, $db_password, $db_name);

//Check connection
if ($connect === false) {
    die('ERROR: Could not connect. '.mysqli_connect_error());
}
