<?php
session_start();

$host = 'localhost';
$user = 'root';
$password = '';
$database = 'DIAGNOSTIC_CLINIC';
$conn = new mysqli($host, $user, $password);
if ($conn->connect_error) die('Database connection failed: ' . $conn->connect_error);
$query = "CREATE DATABASE IF NOT EXISTS $database";
if (!$conn->query($query)) {
    echo "Error creating database: " . $conn->error; 
}
$conn->close();
$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die('Database connection failed: ' . $conn->connect_error);
}

$queryCreateTable = "CREATE TABLE IF NOT EXISTS accounts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    fullname VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    enable2FA VARCHAR(255) NOT NULL,
    address VARCHAR(500),
    contact VARCHAR(255),
    email VARCHAR(255),
    profile VARCHAR(255),
    role VARCHAR(255),
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

if (!$conn->query($queryCreateTable)) {
    die("Error creating table: " . $conn->error);
}

$queryCreateTable = "CREATE TABLE IF NOT EXISTS booking (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    date DATE NOT NULL,
    services VARCHAR(255) NOT NULL,
    service_type VARCHAR(255) NOT NULL,
    status VARCHAR(50) DEFAULT 'Pending' NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($queryCreateTable)) {
    die("Error creating table: " . $conn->error);
}



$queryCreateTable = "CREATE TABLE IF NOT EXISTS notifications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    description VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($queryCreateTable)) {
    die("Error creating table: " . $conn->error);
}
