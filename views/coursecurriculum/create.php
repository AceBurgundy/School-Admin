<?php

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'rmmcdatabase';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$text = $_POST['input_text'];
$course_id = $_POST['course_id'];

$errorMessages = array();

// Validation checks
if (empty($text)) {
    $errorMessages[] = 'Text is required';
}

if (empty($course_id)) {
    $errorMessages[] = 'Course ID is required';
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
    "INSERT INTO coursecurriculum (text, course_id)
     VALUES (?, ?)"
);

$statement -> bind_param("si", $text, $course_id);

if ($statement->execute()) {
    $response = array(
        'status' => 'success',
        'message' => 'Course curriculum record inserted successfully'
    );
} else {
    $response = array(
        'status' => 'error',
        'message' => 'Failed to insert course curriculum record'
    );
}

echo json_encode($response);
