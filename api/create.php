<?php
// api/create.php
header('Content-Type: application/json');
include 'config.php';

$data = json_decode(file_get_contents("php://input"), true);

if (!empty($data['title'])) {
    $title = $data['title'];
    $description = $data['description'] ?? '';

    $query = "INSERT INTO tasks (title, description) VALUES (:title, :description)";
    $stmt = $conn->prepare($query);
    
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);

    if ($stmt->execute()) {
        echo json_encode(["message" => "Task created successfully"]);
    } else {
        echo json_encode(["message" => "Failed to create task"]);
    }
} else {
    echo json_encode(["message" => "Title is required"]);
}
?>
