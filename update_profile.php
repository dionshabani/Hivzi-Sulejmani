<?php
session_start();
include "connect.php"; // Include your database connection

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}

$email = $_SESSION['email'];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $password = $_POST['password'];

    // Prepare to update user details
    $sql = "UPDATE users SET name = ?, surname = ?";
    $params = [$name, $surname];

    // If a new password is provided, hash it and update it
    if (!empty($password)) {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $sql .= ", password = ?";
        $params[] = $hashed_password; // Add the hashed password to the parameters
    }

    $sql .= " WHERE email = ?"; // Append the email condition
    $params[] = $email; // Add the email to the parameters

    // Determine the bind types based on parameters
    $types = str_repeat('s', count($params)); // Create a string of 's' for each parameter

    // Use prepared statements for safety
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        // Bind parameters based on their types
        $stmt->bind_param($types, ...$params); // Use unpacking to bind all parameters

        if ($stmt->execute()) {
            echo "Profile updated successfully!";
            header("Location: index.php");  
        } else {
            echo "Error updating profile.";
        }
        $stmt->close();
    } else {
        echo "Error preparing statement.";
    }
}

// Close the database connection
$conn->close();
?>
