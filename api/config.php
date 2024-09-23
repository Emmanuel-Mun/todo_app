<?php
// api/config.php
$host = 'localhost';
$db_name = 'tasklist_db';
$username = 'root'; // Change this according to your setup
$password = '';     // Change this according to your setup

try {
    $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $exception) {
    echo "Connection error: " . $exception->getMessage();
    exit();
}
?>
