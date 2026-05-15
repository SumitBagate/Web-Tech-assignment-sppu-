<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $course = trim($_POST['course'] ?? '');
    
    // Validate input
    if (empty($name) || empty($email) || empty($course)) {
        die("All fields are required!");
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format!");
    }
    
    // Use prepared statement to prevent SQL injection
    $sql = "INSERT INTO students (name, email, course) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }
    
    // Bind parameters (s = string, i = integer)
    $stmt->bind_param("sss", $name, $email, $course);
    
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
