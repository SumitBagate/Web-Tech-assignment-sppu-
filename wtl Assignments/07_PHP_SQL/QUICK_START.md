# 🚀 Quick Start Guide

## ⚡ Setup in 3 Minutes

### 1️⃣ Create Database

Run this in phpMyAdmin or MySQL command line:

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
```

### 2️⃣ Configure Connection

Open `db.php` and ensure your credentials match:

```php
$servername = "localhost";
$username = "root";          // Your MySQL username
$password = "";              // Your MySQL password
$database = "student_db";
```

### 3️⃣ Run Application

**Option A: Using PHP Built-in Server**

```bash
cd 07_PHP_SQL
php -S localhost:8000
```

Visit: `http://localhost:8000`

**Option B: Using XAMPP/WAMP**

- Copy folder to `htdocs`
- Visit: `http://localhost/07_PHP_SQL/`

---

## 📊 What You Get

### ✅ CRUD Functions

```php
// In db.php - Ready to use functions:
getStudents($conn)              // Get all students
getStudentById($conn, $id)      // Get one student
addStudent($conn, $n, $e, $c)   // Add new student
updateStudent($conn, $id...)    // Update student
deleteStudent($conn, $id)       // Delete student
```

### 📁 File Layout

- **db.php** → Database connection & CRUD functions
- **index.php** → Main page (view all & add)
- **insert.php** → Process add request
- **edit.php** → Edit form page
- **update.php** → Process update request
- **delete.php** → Process delete request

### 🎨 Features

✨ Modern UI with gradient design
✨ Input validation (client & server)
✨ SQL injection protection (prepared statements)
✨ Error handling & messages
✨ Responsive design

---

## 🔑 Key Improvements Made

### Security

✅ Prepared statements instead of string concatenation
✅ Input validation and sanitization
✅ XSS prevention with htmlspecialchars()

### Code Quality

✅ Proper error handling
✅ Functions for DRY principle
✅ Clear code structure

### User Experience

✅ Beautiful, modern interface
✅ Real-time validation
✅ Success/error messages
✅ Confirmation dialogs

---

## 💡 Database Schema

```
TABLE: students
├── id (INT, PRIMARY KEY, AUTO_INCREMENT)
├── name (VARCHAR 100, NOT NULL)
├── email (VARCHAR 100, NOT NULL, UNIQUE)
├── course (VARCHAR 100, NOT NULL)
└── created_at (TIMESTAMP, DEFAULT NOW())
```

---

## 🧪 Test the Application

1. **Add Student** → Fill form & click "Add Student"
2. **View** → See it appear in table below
3. **Edit** → Click "Edit", modify, click "Update"
4. **Delete** → Click "Delete" & confirm

---

## ❓ Common Errors & Solutions

| Error               | Solution                          |
| ------------------- | --------------------------------- |
| Access denied       | Check MySQL credentials in db.php |
| Table doesn't exist | Run database_setup.sql            |
| Duplicate email     | Email must be unique              |
| Connection failed   | Ensure MySQL is running           |

---

## 📚 File Purposes

| File           | Purpose                         |
| -------------- | ------------------------------- |
| **db.php**     | Connection + All CRUD functions |
| **index.php**  | Dashboard (view + add)          |
| **insert.php** | Handle add form                 |
| **edit.php**   | Show edit form                  |
| **update.php** | Handle edit form                |
| **delete.php** | Handle delete                   |

---

## 🎯 Next Steps

✅ Database setup completed
✅ All CRUD operations working
✅ Security implemented
✅ UI enhanced

### Ready to use! 🎉

---

For detailed documentation, see **README.md**
