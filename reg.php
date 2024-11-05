<?php
// Include the database connection
include 'try.php'; // Ensure this file is in the same directory or provide the correct path

// Check if the form was submitted
if (isset($_POST['Register'])){
    // Retrieve form data sent via POST
    $FirstName = $_POST['FirstName'] ?? null;
    $LastName = $_POST['LastName'] ?? null;
    $User_id = $_POST['User_id'] ?? null;
    $Gender = $_POST['Gender'] ?? null;
    $Gmail = $_POST['Gmail'] ?? null;
    $Contact = $_POST['Contact'] ?? null;
    $Password = $_POST['Password'] ?? null;

    // Prepare an SQL statement with placeholders to avoid SQL injection
    $stmt = $conn->prepare("INSERT INTO registration (FirstName,LastName,User_id,Gender,Gmail,Contact,Pass) VALUES (?, ?, ?, ?, ?, ?, ?)");

    // Check if the statement preparation was successful
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }

    // Bind the variables to the placeholders ('s' indicates strings)
    $stmt->bind_param("sssssss", $FirstName, $LastName, $User_id, $Gender, $Gmail, $Contact, $Pass);

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    // Optional: You can handle the case where the form is not submitted
    echo " successfully registered";
}

