<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'irroba');
define('DB_PASSWORD', 'abc123456*');
define('DB_NAME', 'aula_irroba');

/* Attempt to connect to MySQL database */
$conn = new mysqli("database", "root", ".123456*", "aula_irroba");

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>