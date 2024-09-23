<?php
// api/delete.php
header('Content-Type: application/json');
include 'config.php';

$data = json_decode(file_get_contents("php://input"), true);

if (!empty($data['id'])) {
    $id = $data['id'];

    $query = "DELETE FROM tasks WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        echo json_encode(["message" => "Task deleted successfully"]);
    } else {
        echo json_encode(["message" => "Failed to delete task"]);
    }
} else {
    echo json_encode(["message" => "ID is required"]);
}
?>
