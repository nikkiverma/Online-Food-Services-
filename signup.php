<?php

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirm-password'];

// Perform form validation
if (empty($fullname) || empty($email) || empty($password) || empty($confirmPassword)) {
    echo 'Please fill in all fields';
} elseif ($password !== $confirmPassword) {
    echo 'Passwords do not match';
} else {

    $servername = 'localhost';
    $username = 'root';
    $db_password = ''; // Use a different variable name for database connection password
    $dbname = 'foodservice';
    
    // Connect to the database 
    $conn = new mysqli($servername, $username, $db_password, $dbname);

    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // Insert user into the database
    $sql = "INSERT INTO registration (fullname, email, password) VALUES ('$fullname', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "<script> alert('Sign up successful!')</script>";
    } else {
        echo 'Error: ' . $sql . '<br>' . $conn->error;
    }

    $conn->close();
}