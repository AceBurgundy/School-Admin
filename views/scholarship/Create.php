<?php

require("../dbcon.php");

$name = $_POST['name'];


$errorMessages = array();

// Validation checks
if (empty($name)) {
    $errorMessages[] = 'Name is required';
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
    "INSERT INTO scholarship (name)
     VALUES (?)"
);

$statement->bind_param("s", $name);

if ($statement->execute()) {
    $response = array(
        'status' => 'success',
        'message' => 'Scholarship record inserted successfully'
    );
} else {
    $response = array(
        'status' => 'error',
        'message' => 'Failed to insert scholarship record'
    );
}

echo json_encode($response);

$statement->close();
$conn->close();

