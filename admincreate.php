<?php
session_start();
include "connect.php"; // Ensure you include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username']; // Use the input from the form
    $password = $_POST['password']; // Use the input from the form

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT); 

    // Prepare and execute the SQL query to insert the admin user into the database
    $stmt = $conn->prepare("INSERT INTO admins (username, password) VALUES (?, ?)");
    if ($stmt) { // Check if the statement was prepared successfully
        $stmt->bind_param("ss", $username, $hashed_password); // Bind the parameters

        if ($stmt->execute()) { // Execute the statement
            echo "<script>alert('Admin user created successfully!');</script>";
        } else {
            echo "<script>alert('Error: " . $stmt->error . "');</script>"; // Show error if execution fails
        }

        $stmt->close(); // Close the statement
    } else {
        echo "<script>alert('Error preparing statement: " . $conn->error . "');</script>"; // Show error if statement preparation fails
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Admin</title>
</head>
<body>
    <h1>Create Admin User</h1>
    <form action="" method="POST"> <!-- Add the form tag and set action to the current page -->
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        
        <button type="submit">Create Admin</button>
    </form>
</body>
</html>
