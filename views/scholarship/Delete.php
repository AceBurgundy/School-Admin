<?php

require("dbcon.php");

$student_id = $_POST['student_id'];

$errorMessages = array();

// Validation checks
if (empty($student_id)) {
    $errorMessages[] = 'Student ID is required';
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
    "DELETE FROM student
     WHERE id = ?"
);

$statement -> bind_param("i", $student_id);

if ($statement->execute()) {
    $response = array(
        'status' => 'success',
        'message' => 'Student record has been deleted successfully'
    );
} else {
    $response = array(
        'status' => 'error',
        'message' => 'Failed to delete student record'
    );
}

echo json_encode($response);
