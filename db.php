<?php
// Database configuration
$servername = "localhost"; // Server name
$username = "root";        // MySQL username
$password = "";            // MySQL password
$dbname = "logtest";       // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

// Close connection
$conn->close();
