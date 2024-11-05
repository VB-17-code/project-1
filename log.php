<?php
// Include the database connection file
include 'db.php';

// Get input from POST request
$Id = $_POST['ID'];
$Password = $_POST['Password'];

// Hash the password before storing it (important for security)
$hashedPassword = password_hash($Password, PASSWORD_DEFAULT);

// Prepare the SQL statement to prevent SQL injection
$stmt = $conn->prepare("INSERT INTO login (Id, Password) VALUES (?, ?)");
$stmt->bind_param("ss", $Id, $hashedPassword);

// Execute the statement and check if it was successful
if ($stmt->execute()) {
    echo "Login Successful...";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection


