<?php

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'rmmcdatabase';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['id'];

$errorMessages = array();

// Validation checks
if (empty($id)) {
    $errorMessages[] = 'ID is required';
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
    "DELETE FROM coursereview
     WHERE id = ?"
);

$statement -> bind_param("i", $id);

if ($statement->execute()) {
    $response = array(
        'status' => 'success',
        'message' => 'Course review record has been deleted successfully'
    );
} else {
    $response = array(
        'status' => 'error',
        'message' => 'Failed to delete course review record'
    );
}

echo json_encode($response);
