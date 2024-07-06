<?php

require("dbcon.php");

$adminId = $_POST['adminId'];
$username = $_POST['username'];
$birthdate = $_POST['birthdate'];
$email = $_POST['email'];
$password = $_POST['password'];

$errorMessages = array();

// Validation checks
if (empty($username)) {
    $errorMessages[] = 'First name is required';
}

if (strlen($username) > 255) {
    $errorMessages[] = 'First name should not exceed 255 characters';
}

if (!empty($birthdate) && strlen($birthdate) > 2) {
    $errorMessages[] = 'birthdate should not exceed 255 characters';
}

if (empty($email)) {
    $errorMessages[] = 'email is required';
}

if (strlen($email) > 255) {
    $errorMessages[] = 'email should not exceed 255 characters';
}

if (empty($password)) {
    $errorMessages[] = 'enter your password';
}

if (!empty($errorMessages)) {
    $response = array(
        'status' => 'error',
        'message' => $errorMessages
    );

    echo json_encode($response);
    exit;
}

// Prepare and execute the INSERT statement
$statement = $conn -> prepare(
    "UPDATE admin
     SET username = ?, birthdate = ?, email = ?, password = ?
     WHERE id = ?;"
);

$statement -> bind_param("ssssiisi", $username, $birthdate, $email, $password);

if ($statement->execute()) {
    $response = array(
        'status' => 'success',
        'message' => 'College record inserted successfully'
    );
} else {
    $response = array(
        'status' => 'error',
        'message' => 'Failed to insert college record'
    );
}

echo json_encode($response);
