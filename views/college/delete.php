<?php

require("dbcon.php");

$collegeId = $_POST['collegeId'];

$errorMessages = array();

// Validation checks
if (empty($collegeId)) {
    $errorMessages[] = 'College ID is required';
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
    "DELETE FROM college
     WHERE id = ?"
);

$statement -> bind_param("i", $collegeId);

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
