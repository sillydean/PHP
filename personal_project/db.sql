--Create database
CREATE DATABASE IF NOT EXISTS music_db;
USE music_db;

CREATE TABLE IF NOT EXISTS users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL);

CREATE TABLE IF NOT EXISTS admin(
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL -- For hashed passwords
    );

CREATE TABLE IF NOT EXISTS product (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50) NOT NULL UNIQUE,
    description VARCHAR(100) NOT NULL UNIQUE,
    quantity INT NOT NULL,
    price FLOAT NOT NULL);

-- Sample Admin User (Username: admin, Password: password123)
INSERT INTO admin (username, email, password) 
VALUES ('admin', 'admin@example.com', MD5('password123'));

-- Sample User Records
INSERT INTO users (username, email, password) VALUES
('john_doe', 'john@example.com', MD5('john123')),
('jane_doe', 'jane@example.com', MD5('jane123'));