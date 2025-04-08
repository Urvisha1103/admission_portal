<?php
$servername = "localhost";
$username = "root"; // Default XAMPP/WAMP username
$password = ""; // Default XAMPP/WAMP password
$dbname = "admission_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>