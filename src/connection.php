<?php

//Definindo constantes do banco de dados
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'irroba');
define('DB_PASSWORD', 'abc123456*');
define('DB_NAME', 'aula_irroba');

$conn = new mysqli("database",DB_USERNAME,DB_PASSWORD, DB_NAME);

if($conn === false) {
    die("error: não foi possivel conectar no banco de dados. ".mysqli_connect_error());
}