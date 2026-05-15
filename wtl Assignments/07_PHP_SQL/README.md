# Student Management System - PHP & MySQL Web Application

## 📋 Project Overview

A complete Student Management System built with PHP and MySQL that demonstrates CRUD operations (Create, Read, Update, Delete) with modern UI and security best practices.

## ✨ Features

- ✅ **Add Students** - Create new student records with name, email, and course
- ✅ **View Students** - Display all student records in an organized table
- ✅ **Edit Students** - Update existing student information
- ✅ **Delete Students** - Remove student records with confirmation
- ✅ **Input Validation** - Client and server-side validation
- ✅ **Security** - Prepared statements to prevent SQL injection
- ✅ **Error Handling** - Comprehensive error messages
- ✅ **Responsive Design** - Modern, user-friendly interface
- ✅ **Data Persistence** - All data stored in MySQL database

## 🗄️ Database Setup

### Prerequisites

- PHP 7.0 or higher
- MySQL/MariaDB Server
- Web Server (Apache, Nginx, or Built-in PHP Server)

### Step 1: Create Database and Tables

**Option A: Using phpMyAdmin**

1. Open phpMyAdmin (usually at `http://localhost/phpmyadmin`)
2. Click on "SQL" tab
3. Copy and paste the contents of `database_setup.sql`
4. Click "Go" to execute

**Option B: Using MySQL Command Line**

```bash
mysql -u root -p < database_setup.sql
```

**Option C: Manual SQL Execution**

```sql
CREATE DATABASE IF NOT EXISTS student_db;

USE student_db;

CREATE TABLE IF NOT EXISTS students (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    course VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Optional: Insert sample data
INSERT INTO students (name, email, course) VALUES
('John Doe', 'john@example.com', 'Computer Science'),
('Jane Smith', 'jane@example.com', 'Information Technology'),
('Bob Johnson', 'bob@example.com', 'Web Development');
```

### Step 2: Configure Database Connection

Edit `db.php` if your database credentials are different:

```php
$servername = "localhost";  // Your server
$username = "root";         // Your MySQL username
$password = "";             // Your MySQL password
$database = "student_db";   // Database name
```

## 📁 File Structure

```
07_PHP_SQL/
├── db.php                 # Database connection & CRUD functions
├── index.php              # Main page - Display & Add students
├── insert.php             # Process add student form
├── edit.php               # Edit student form
├── update.php             # Process update student form
├── delete.php             # Delete student record
└── database_setup.sql     # SQL script for database creation
```

## 🔧 File Descriptions

### **db.php** - Database Connection & Functions

- Establishes MySQL connection
- Contains all CRUD functions:
  - `getStudents()` - Retrieve all students
  - `getStudentById()` - Get single student by ID
  - `addStudent()` - Insert new student
  - `updateStudent()` - Update student record
  - `deleteStudent()` - Delete student record
- Uses prepared statements for security

### **index.php** - Main Dashboard

- Displays all student records in a table
- Form to add new students
- Links to edit and delete students
- Real-time success/error messages
- Responsive design with CSS

### **insert.php** - Add Student Handler

- Processes form submission from index.php
- Validates input data
- Uses prepared statements
- Redirects to index.php on success

### **edit.php** - Edit Form Page

- Retrieves student data by ID
- Displays form with pre-filled values
- Submits data to update.php

### **update.php** - Update Handler

- Processes form submission from edit.php
- Validates input data
- Updates database using prepared statements
- Redirects to index.php on success

### **delete.php** - Delete Handler

- Accepts ID from index.php
- Deletes student from database
- Uses prepared statements
- Redirects to index.php

## 🚀 Running the Application

### Using Apache/XAMPP/WAMP

1. Place the `07_PHP_SQL` folder in your web root (`htdocs` for XAMPP)
2. Open `http://localhost/07_PHP_SQL/index.php` in browser

### Using Built-in PHP Server

```bash
cd 07_PHP_SQL
php -S localhost:8000
```

Then open `http://localhost:8000` in browser

## 📝 Usage Example

1. **Add a Student:**
   - Enter Name, Email, Course
   - Click "Add Student"
   - Student appears in the table below

2. **View Students:**
   - All students are listed in the table
   - Shows ID, Name, Email, Course
   - Created timestamp available in database

3. **Edit a Student:**
   - Click the "Edit" button next to a student
   - Modify the information
   - Click "Update Student"
   - Returns to main page with updated data

4. **Delete a Student:**
   - Click the "Delete" button
   - Confirm deletion when prompted
   - Student removed from database

## 🔒 Security Features

✅ **SQL Injection Prevention**

- All queries use prepared statements
- Parameter binding with `bind_param()`
- No direct string interpolation in SQL

✅ **Input Validation**

- Client-side validation (JavaScript)
- Server-side validation (PHP)
- Email format validation
- Required field checks
- XSS Prevention (htmlspecialchars)

✅ **Error Handling**

- Prepared statement error checks
- Graceful error messages
- Connection error handling

## 🎨 UI/UX Features

- **Modern Gradient Design** - Professional purple gradient theme
- **Responsive Layout** - Works on desktop and mobile
- **Form Validation** - Real-time client-side validation
- **Confirmation Dialogs** - Delete confirmation to prevent accidents
- **Status Messages** - Success and error messages with styling
- **Hover Effects** - Interactive buttons with smooth transitions
- **Organized Table** - Clear display of all records

## 🐛 Troubleshooting

### Issue: "Connection failed: Access denied"

- Check MySQL username/password in db.php
- Verify MySQL service is running
- Check database user has proper permissions

### Issue: "Table 'student_db.students' doesn't exist"

- Run the database_setup.sql script
- Verify you selected the correct database
- Check for typos in table name

### Issue: "Duplicate entry for key 'email'"

- Email must be unique for each student
- Verify email doesn't already exist
- Check database for duplicate entries

### Issue: Files won't load

- Ensure PHP is installed and enabled
- Check file permissions (readable by web server)
- Verify correct file path in browser URL

## 📚 Database Schema

```sql
CREATE TABLE students (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    course VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

## 🔄 CRUD Operations Implemented

| Operation  | File       | Method | Description          |
| ---------- | ---------- | ------ | -------------------- |
| **C**reate | insert.php | POST   | Add new student      |
| **R**ead   | index.php  | GET    | Display all students |
| **U**pdate | update.php | POST   | Modify student info  |
| **D**elete | delete.php | GET    | Remove student       |

## 🎓 Learning Concepts

This project demonstrates:

- PHP database connection (MySQLi procedural)
- Prepared statements and parameterized queries
- Form handling and validation
- HTML5 semantics and CSS3 styling
- JavaScript form validation
- Error handling and debugging
- Security best practices
- Responsive web design

## 📖 Additional Notes

- All user input is sanitized and validated
- Database timestamps automatically track record creation
- CSS is embedded for simplicity (can be extracted to separate file)
- JavaScript validation provides immediate feedback
- Easy to extend with additional fields or features

## 🤝 Future Enhancements

- Add search/filter functionality
- Implement pagination
- Add user authentication
- Create API endpoints (REST)
- Add database backup functionality
- Implement role-based access control
- Add data export (CSV/PDF)

---

**Created:** 2024
**Version:** 1.0
**Status:** Complete & Production Ready
