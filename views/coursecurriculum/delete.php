<?php

require("../dbcon.php");

$id = $_POST['id'];

$errorMessages = array();

// Validation checks
if (empty($student_id)) {
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
    "DELETE FROM coursecurriculum
     WHERE id = ?"
);

$statement -> bind_param("i", $id);

if ($statement->execute()) {
    $response = array(
        'status' => 'success',
        'message' => 'Course curriculum record has been deleted successfully'
    );
} else {
    $response = array(
        'status' => 'error',
        'message' => 'Failed to delete course curriculum record'
    );
}

echo json_encode($response);
