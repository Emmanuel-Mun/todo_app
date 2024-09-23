<?php
// api/update.php
header('Content-Type: application/json');
include 'config.php';

$data = json_decode(file_get_contents("php://input"), true);

if (!empty($data['id']) && !empty($data['title'])) {
    $id = $data['id'];
    $title = $data['title'];
    $description = $data['description'] ?? '';
    $status = $data['status'] ?? 'pending';

    $query = "UPDATE tasks SET title = :title, description = :description, status = :status WHERE id = :id";
    $stmt = $conn->prepare($query);
    
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        echo json_encode(["message" => "Task updated successfully"]);
    } else {
        echo json_encode(["message" => "Failed to update task"]);
    }
} else {
    echo json_encode(["message" => "ID and Title are required"]);
}
?>
