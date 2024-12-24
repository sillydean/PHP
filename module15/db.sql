-- Create the database
CREATE DATABASE IF NOT EXISTS product_management;
USE product_management;

-- Product Table
CREATE TABLE IF NOT EXISTS product (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50) NOT NULL UNIQUE,
    description VARCHAR(100) NOT NULL UNIQUE,
    quantity INT NOT NULL,
    price FLOAT NOT NULL);

--Test Product
INSERT INTO product (title, description, quantity, price) VALUES
('Test','This is a test product','5','5.50');
