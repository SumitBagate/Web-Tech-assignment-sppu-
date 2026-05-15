-- Create Database
CREATE DATABASE IF NOT EXISTS student_db;

-- Use the database
USE student_db;

-- Create Students Table
CREATE TABLE IF NOT EXISTS students (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    course VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample data (optional)
INSERT INTO students (name, email, course) VALUES
('John Doe', 'john@example.com', 'Computer Science'),
('Jane Smith', 'jane@example.com', 'Information Technology'),
('Bob Johnson', 'bob@example.com', 'Web Development');
