<?php
include "db.php";
header("Content-Type: application/json");

$result = $conn->query("SELECT * FROM products ORDER BY id DESC");

$products = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $row['available'] = intval($row['available']); // force int
        $products[] = $row;
    }
}

echo json_encode($products);
$conn->close();
?>
