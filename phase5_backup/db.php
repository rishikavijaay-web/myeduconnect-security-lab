<?php
$conn = new mysqli("localhost", "myedu", "myedu123", "myeduconnect");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
