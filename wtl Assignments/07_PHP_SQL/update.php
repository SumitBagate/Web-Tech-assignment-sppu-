<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $id = intval($_POST['id'] ?? 0);
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $course = trim($_POST['course'] ?? '');
    
    // Validate input
    if (empty($id) || empty($name) || empty($email) || empty($course)) {
        die("Invalid request!");
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format!");
    }
    
    // Use prepared statement to prevent SQL injection
    $sql = "UPDATE students SET name = ?, email = ?, course = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }
    
    // Bind parameters (s = string, i = integer)
    $stmt->bind_param("sssi", $name, $email, $course, $id);
    
    // Execute statement
    if ($stmt->execute()) {
        $stmt->close();
        header("Location: index.php");
        exit();
    } else {
        die("Error: " . $stmt->error);
    }
} else {
    header("Location: index.php");
    exit();
}
?>
