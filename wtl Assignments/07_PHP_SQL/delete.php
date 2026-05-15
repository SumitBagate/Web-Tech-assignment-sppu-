<?php
include "db.php";

// Check if ID is provided
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = intval($_GET['id']);

// Use prepared statement to prevent SQL injection
$sql = "DELETE FROM students WHERE id = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

// Bind parameter
$stmt->bind_param("i", $id);

// Execute statement
if ($stmt->execute()) {
    $stmt->close();
    header("Location: index.php");
    exit();
} else {
    die("Error: " . $stmt->error);
}
?>
