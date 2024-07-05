<?php

require("dbcon.php");

$adminId = $_POST['adminId'];

$errorMessages = array();

// Validation checks
if (empty($adminId)) {
    $errorMessages[] = 'Admin ID is required';
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
    "DELETE FROM admin
     WHERE id = ?"
);

$statement -> bind_param("i", $adminId);

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
