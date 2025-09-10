<?php
include "db.php";

header("Content-Type: application/json");

$name = $_POST['name'] ?? '';
$type = $_POST['type'] ?? '';
$huid = $_POST['huid'] ?? '';
$jewelleryType = $_POST['jewelleryType'] ?? '';
$weight = $_POST['weight'] ?? '';
$description = $_POST['description'] ?? '';
$image = null;

// Handle image upload
if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
    $targetDir = "uploads/";
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }
    $fileName = time() . "_" . basename($_FILES["image"]["name"]);
    $targetFile = $targetDir . $fileName;

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        $image = $fileName;
    }
}

// Insert into DB
$stmt = $conn->prepare("INSERT INTO products (name, type, huid, jewellery_type, weight, description, image, available) VALUES (?, ?, ?, ?, ?, ?, ?, 1)");
$stmt->bind_param("sssssss", $name, $type, $huid, $jewelleryType, $weight, $description, $image);

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Product added successfully"]);
} else {
    echo json_encode(["status" => "error", "message" => $stmt->error]);
}

$stmt->close();
$conn->close();
?>
