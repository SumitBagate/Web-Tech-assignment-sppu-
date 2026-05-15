<?php
// Database Connection Configuration
$servername = "localhost";
$username = "root";
$password = "";
$database = "student_db";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

// Set charset to utf8
mysqli_set_charset($conn, "utf8");

// Function to retrieve all students
function getStudents($conn) {
    $sql = "SELECT * FROM students ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);
    return $result;
}

// Function to retrieve a single student by ID
function getStudentById($conn, $id) {
    $sql = "SELECT * FROM students WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

// Function to add a new student
function addStudent($conn, $name, $email, $course) {
    $sql = "INSERT INTO students (name, email, course) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    
    if (!$stmt) {
        return array('success' => false, 'message' => 'Prepare failed: ' . $conn->error);
    }
    
    $stmt->bind_param("sss", $name, $email, $course);
    
    if ($stmt->execute()) {
        return array('success' => true, 'message' => 'Student added successfully!');
    } else {
        return array('success' => false, 'message' => 'Error: ' . $stmt->error);
    }
    
    $stmt->close();
}

// Function to update student
function updateStudent($conn, $id, $name, $email, $course) {
    $sql = "UPDATE students SET name = ?, email = ?, course = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    
    if (!$stmt) {
        return array('success' => false, 'message' => 'Prepare failed: ' . $conn->error);
    }
    
    $stmt->bind_param("sssi", $name, $email, $course, $id);
    
    if ($stmt->execute()) {
        return array('success' => true, 'message' => 'Student updated successfully!');
    } else {
        return array('success' => false, 'message' => 'Error: ' . $stmt->error);
    }
    
    $stmt->close();
}

// Function to delete student
function deleteStudent($conn, $id) {
    $sql = "DELETE FROM students WHERE id = ?";
    $stmt = $conn->prepare($sql);
    
    if (!$stmt) {
        return array('success' => false, 'message' => 'Prepare failed: ' . $conn->error);
    }
    
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        return array('success' => true, 'message' => 'Student deleted successfully!');
    } else {
        return array('success' => false, 'message' => 'Error: ' . $stmt->error);
    }
    
    $stmt->close();
}
?>

