<?php
$host = 'localhost'; // Replace 'localhost' with your actual host name
$dbname = 'waternetic'; // Replace 'waternetic' with your actual database name
$username = 'root'; // Replace 'root' with your database username
$password = ''; // Replace '' with your database password if you have one

$conn = new mysqli($host, $username, $password, $dbname);

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set PDO to throw exceptions
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    // Handle connection errors
    die("Connection failed: " . $e->getMessage());
}
?>
