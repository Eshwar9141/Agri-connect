<?php
$Email = $_POST['Email'];
$password = $_POST['password'];

// Hash the password for secure storage
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Database connection
$conn = new mysqli('localhost', 'root', '', 'agriconnect');

if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {
    // Prepare and bind statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO registration (Email, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $Email, $hashed_password);

    // Execute statement and check for success
    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: Registration failed. Please try again.";
    }

    $stmt->close();
    $conn->close();
}
?>

