CREATE DATABASE IF NOT EXISTS pos_database
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_general_ci;

USE pos_database;

DROP TABLE IF EXISTS customers;
DROP TABLE IF EXISTS users;

CREATE TABLE customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    created_at DATETIME NOT NULL
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    full_name VARCHAR(100) NOT NULL,
    created_at DATETIME NOT NULL
);

INSERT INTO customers (full_name, email, phone, created_at) VALUES
    ('Juan Dela Cruz', 'juan.delacruz@example.com', '0917 123 4567', '2026-09-01 09:00:00'),
    ('Maria Santos', 'maria.santos@example.com', '0918 234 5678', '2026-09-02 09:15:00'),
    ('Andres Reyes', 'andres.reyes@example.com', '0919 345 6789', '2026-09-03 10:30:00'),
    ('Lea Bautista', 'lea.bautista@example.com', '0920 456 7890', '2026-09-04 11:00:00'),
    ('Sofia Navarro', 'sofia.navarro@example.com', '0921 567 8901', '2026-09-05 13:45:00');

INSERT INTO users (username, full_name, created_at) VALUES
    ('admin01', 'Maria Santos', '2026-09-01 08:00:00'),
    ('cashier01', 'Paolo Garcia', '2026-09-01 08:30:00'),
    ('cashier02', 'Nina Flores', '2026-09-02 08:30:00'),
    ('manager01', 'Carlos Mendoza', '2026-09-03 08:00:00'),
    ('inventory01', 'Ana Villanueva', '2026-09-04 08:15:00');
