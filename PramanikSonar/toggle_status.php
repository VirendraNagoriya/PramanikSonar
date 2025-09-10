<?php
include "db.php";
header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = intval($_POST['id']);
    $available = intval($_POST['available']); // 👈 changed here

    $sql = "UPDATE products SET available = $available WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["success" => true, "message" => "Status updated"]);
    } else {
        echo json_encode(["success" => false, "message" => $conn->error]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Invalid request"]);
}
?>
