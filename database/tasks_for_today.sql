CREATE DATABASE IF NOT EXISTS tasks_for_today
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_general_ci;

USE tasks_for_today;

DROP TABLE IF EXISTS tasks;
DROP TABLE IF EXISTS users;

CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    status VARCHAR(20) NOT NULL DEFAULT 'pending',
    task_date DATE NOT NULL,
    created_at DATETIME NOT NULL
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    avatar VARCHAR(255) NULL,
    created_at DATETIME NOT NULL
);

CREATE TABLE customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    created_at DATETIME NOT NULL
);

INSERT INTO tasks (title, status, task_date, created_at) VALUES
    ('Finish project documentation', 'pending', '2026-09-29', '2026-09-28 09:00:00'),
    ('Review database schema', 'completed', '2026-09-29', '2026-09-28 09:15:00'),
    ('Attend team meeting', 'pending', '2026-09-29', '2026-09-28 09:30:00'),
    ('Submit weekly report', 'completed', '2026-09-28', '2026-09-27 10:00:00'),
    ('Update project repository', 'pending', '2026-09-28', '2026-09-27 10:30:00'),
    ('Prepare presentation slides', 'pending', '2026-09-30', '2026-09-29 11:00:00'),
    ('Check application routes', 'completed', '2026-09-30', '2026-09-29 11:15:00'),
    ('Test the profile page', 'pending', '2026-09-30', '2026-09-29 11:30:00');

INSERT INTO users (username, full_name, email, password, created_at) VALUES
    ('student01', 'Demo Student', 'student01@example.com', '$2y$12$ZJMf19x61KhI8ZRCaxBLwuMlzFfZFuiVoj90ojuEAQy5YnJ0OiY0a', '2026-09-28 08:00:00');
