<?php

// Connection variables 
$host = "10.86.47.238"; // MySQL host name eg. localhost
$user = "root"; // MySQL user. eg. root ( if your on localserver)
$password = "Passw0rd"; // MySQL user password  (if password is not set for your root user then keep it empty )
$database = "pontos_desafio"; // MySQL Database name

// Connect to MySQL Database teste fe
$con = new mysqli($host, $user, $password, $database);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

?>