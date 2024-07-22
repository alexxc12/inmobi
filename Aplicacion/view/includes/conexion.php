<?php
$conn = new mysqli('localhost', 'root', '', 'BD_INMOBILIARIA');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

