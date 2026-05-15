<?php
include "db.php";

// Initialize message
$message = '';
$message_type = '';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $course = trim($_POST['course'] ?? '');
    
    // Validate inputs
    if (empty($name) || empty($email) || empty($course)) {
        $message = "All fields are required!";
        $message_type = "error";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Invalid email format!";
        $message_type = "error";
    } else {
        $result = addStudent($conn, $name, $email, $course);
        $message = $result['message'];
        $message_type = $result['success'] ? "success" : "error";
    }
}

$students = getStudents($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Management System</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }
        
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }
        
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
            border-bottom: 3px solid #667eea;
            padding-bottom: 15px;
        }
        
        h2 {
            color: #667eea;
            margin-top: 30px;
            margin-bottom: 20px;
            font-size: 1.5em;
        }
        
        .message {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            font-weight: bold;
        }
        
        .message.success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .message.error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
            font-weight: 500;
        }
        
        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1em;
            transition: border-color 0.3s;
        }
        
        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus,
        select:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 5px rgba(102, 126, 234, 0.1);
        }
        
        button, input[type="submit"] {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            font-weight: bold;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        
        button:hover, input[type="submit"]:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        
        .form-section {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        table th {
            background: #667eea;
            color: white;
            padding: 15px;
            text-align: left;
            font-weight: bold;
        }
        
        table td {
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
        }
        
        table tr:hover {
            background: #f8f9fa;
        }
        
        .action-btn {
            display: inline-block;
            padding: 8px 15px;
            margin-right: 5px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            font-size: 0.9em;
            transition: all 0.3s;
        }
        
        .edit-btn {
            background-color: #007bff;
            color: white;
        }
        
        .edit-btn:hover {
            background-color: #0056b3;
        }
        
        .delete-btn {
            background-color: #dc3545;
            color: white;
        }
        
        .delete-btn:hover {
            background-color: #c82333;
        }
        
        .empty-message {
            text-align: center;
            padding: 30px;
            color: #999;
            font-style: italic;
        }
    </style>
</head>

<body>
<div class="container">
    <h1>📚 Student Management System</h1>
    
    <?php if (!empty($message)): ?>
        <div class="message <?php echo $message_type; ?>">
            <?php echo htmlspecialchars($message); ?>
        </div>
    <?php endif; ?>
    
    <div class="form-section">
        <h2>➕ Add New Student</h2>
        
        <form method="POST" action="index.php" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter student name" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter student email" required>
            </div>
            
            <div class="form-group">
                <label for="course">Course:</label>
                <input type="text" id="course" name="course" placeholder="Enter course name" required>
            </div>
            
            <input type="submit" value="Add Student">
        </form>
    </div>
    
    <h2>📋 Student Records</h2>
    
    <?php
    if ($students && mysqli_num_rows($students) > 0) {
        echo "<table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Course</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>";
        
        while($row = mysqli_fetch_assoc($students)){
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
            echo "<td>" . htmlspecialchars($row['course']) . "</td>";
            echo "<td>
                    <a href='edit.php?id=" . htmlspecialchars($row['id']) . "' class='action-btn edit-btn'>✏️ Edit</a>
                    <a href='delete.php?id=" . htmlspecialchars($row['id']) . "' class='action-btn delete-btn' onclick='return confirm(\"Are you sure?\")'>🗑️ Delete</a>
                  </td>";
            echo "</tr>";
        }
        
        echo "</tbody>
            </table>";
    } else {
        echo "<div class='empty-message'>No students found. Add one to get started!</div>";
    }
    ?>
    
</div>

<script>
function validateForm() {
    const name = document.getElementById('name').value.trim();
    const email = document.getElementById('email').value.trim();
    const course = document.getElementById('course').value.trim();
    
    if (!name || !email || !course) {
        alert('All fields are required!');
        return false;
    }
    
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert('Please enter a valid email!');
        return false;
    }
    
    return true;
}
</script>

</body>
</html>
