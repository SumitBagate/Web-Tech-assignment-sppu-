<?php
include "db.php";

// Check if ID is provided
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = intval($_GET['id']);
$student = getStudentById($conn, $id);

if (!$student) {
    echo "Student not found!";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
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
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            padding: 30px;
            width: 100%;
            max-width: 500px;
        }
        
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
            border-bottom: 3px solid #667eea;
            padding-bottom: 15px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
            font-weight: 500;
        }
        
        input[type="text"],
        input[type="email"],
        input[type="hidden"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1em;
            transition: border-color 0.3s;
        }
        
        input[type="text"]:focus,
        input[type="email"]:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 5px rgba(102, 126, 234, 0.1);
        }
        
        .form-actions {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }
        
        button, input[type="submit"] {
            flex: 1;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 12px;
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
        
        .btn-cancel {
            background: linear-gradient(135deg, #999 0%, #666 100%);
        }
    </style>
</head>

<body>
<div class="container">
    <h1>✏️ Edit Student</h1>
    
    <form method="POST" action="update.php" onsubmit="return validateForm()">
        
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($student['id']); ?>">
        
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($student['name']); ?>" required>
        </div>
        
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($student['email']); ?>" required>
        </div>
        
        <div class="form-group">
            <label for="course">Course:</label>
            <input type="text" id="course" name="course" value="<?php echo htmlspecialchars($student['course']); ?>" required>
        </div>
        
        <div class="form-actions">
            <input type="submit" value="Update Student">
            <button type="button" class="btn-cancel" onclick="window.location.href='index.php'">Cancel</button>
        </div>
    </form>
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
