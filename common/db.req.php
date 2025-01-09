<?php
session_start();

$servername = "localhost";
$username = "teszt";
$password = "teszt";
$dbname = "php_teszt";

define("DB_PREFIX","g83bc");

$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn, 'utf8');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>