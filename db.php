<?php
$host = "localhost:3307";
$username = "root";
$password = ""; // Leave it blank for XAMPP
$database = "pet_adoption";

$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>