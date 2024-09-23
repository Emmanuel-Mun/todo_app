<?php
// api/read.php
header('Content-Type: application/json');
include 'config.php';

$query = "SELECT * FROM tasks ORDER BY created_at DESC";
$stmt = $conn->prepare($query);
$stmt->execute();

$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($tasks);
?>
