<?php
$host = "localhost";     // usually localhost
$user = "spclinfotech_user";          // default in XAMPP
$pass = "spclinfotech_user";              // leave empty if no password
$dbname = "PramanikSonar";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Database Connection failed: " . $conn->connect_error);
}
?>
