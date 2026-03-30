<?php

$host     = 'localhost';
$dbname   = 'onlinegrocerystore';
$username = 'root';
$password = '';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected Successfully";
?>