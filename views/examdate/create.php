<?php

require("dbcon.php");

$date_taken = $_POST['date_taken'];



$errorMessages = array();

// Validation checks
if (empty($date_taken)) {
    $errorMessages[] = 'First date is required';
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
$statement = $conn->prepare(
    "INSERT INTO examdate (date_taken)
     VALUES (?)"
);

$statement->bind_param("ssssiis", $date_taken);

if ($statement->execute()) {
    $response = array(
        'status' => 'success',
        'message' => 'Student record inserted successfully'
    );
} else {
    $response = array(
        'status' => 'error',
        'message' => 'Failed to insert student record'
    );
}

echo json_encode($response);
