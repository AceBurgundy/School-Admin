<?php

require("dbcon.php");

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$birthdate = $_POST['birthdate'];

$mainErrorMessages = array();

// Start of main validation
$statement = $conn -> prepare(
   "SELECT COUNT(*) 
    FROM users 
    WHERE email = ?");
$statement -> bind_param("s", $email);
$statement -> execute();
$result = $statement -> get_result();
$emailCount = $result -> fetch_row()[0];

if ($emailCount > 0) {
    $mainErrorMessages[] = 'Email is already in use';
}

$statement = $conn -> prepare(
   "SELECT COUNT(*)
    FROM users 
    WHERE username = ?");
$statement -> bind_param("s", $username);
$statement -> execute();
$result = $statement -> get_result();
$usernameCount = $result -> fetch_row()[0];

if ($usernameCount > 0) {
    $mainErrorMessages[] = 'Username is already taken';
}

if (!empty($mainErrorMessages)) {
    $response = array(
        'status' => 'error',
        'message' => $mainErrorMessages
    );

    echo json_encode($response);
    exit;
}

$errorMessages = array();

// Start of auxiliary validation
if (empty($email)) {
    $errorMessages[] = 'Email is required';
}

if (empty($username)) {
    $errorMessages[] = 'Username is required';
}

if (strlen($username) > 255) {
    $errorMessages[] = 'Username should not exceed 255 characters';
}

if (strlen($username) < 3) {
    $errorMessages[] = 'Username should be at least 3 characters long';
}

if (empty($password)) {
    $errorMessages[] = 'Password is required';
}

if (strlen($password) < 8) {
    $errorMessages[] = 'Password should be at least 8 characters long';
}

if (strlen($password) > 255) {
    $errorMessages[] = 'Password should not exceed 255 characters';
}

if (empty($birthdate)) {
    $errorMessages[] = 'Birthdate is required';
}

if (!empty($errorMessages)) {
    $response = array(
        'status' => 'error',
        'message' => $errorMessages
    );

    echo json_encode($response);
    exit;
}

$hashedUserEmail = hash('sha256', $email);

$statement = $conn -> prepare(
   "INSERT 
    INTO users (email, password, username, birthdate, hash) 
    VALUES (?, ?, ?, ?, ?)");
$statement -> bind_param("sssss", $email, $password, $username, $birthdate, $hashedUserEmail);

if ($statement -> execute()) {
    $response = array(
        'status' => 'success',
        'message' => 'Registration successful'
    );
} else {
    $response = array(
        'status' => 'error',
        'message' => 'Failed to register user'
    );
}

echo json_encode($response);
