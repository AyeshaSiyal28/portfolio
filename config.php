<?php
$host = "localhost";
$user = "root";   // apne MySQL ka username likho
$pass = "";       // agar password hai to yahan likho
$db   = "form";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
