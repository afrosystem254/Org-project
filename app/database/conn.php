<?php
$host = 'localhost';
$dbName = 'blog';
$username = 'root';
$pass = '';

$conn = new mysqli($host, $username, $pass, $dbName);

if ($conn->connect_error) {
    die("Error: " . $conn->connect_error);
}
?> 
