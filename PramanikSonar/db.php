<?php
$host = "localhost";   // Your DB host
$user = "root";        // Your DB username
$pass = "";            // Your DB password
$db   = "gold_products_db";  // Your DB name

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "DB Connection failed: " . $conn->connect_error]));
}

$conn->set_charset("utf8");
?>
