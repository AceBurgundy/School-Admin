<?php

require("dbcon.php");
$id = $_POST['id'];
$date_taken = $_POST['date_taken'];


$errorMessages = array();

// Validation checks
if (empty($date_taken)) {
    $errorMessages[] = 'First date is required';
}

// if (strlen($logo_file_path) > 255) {
//     $errorMessages[] = 'First name should not exceed 255 characters';
// }

// if (!empty($banner_file_path) && strlen($banner_file_path) > 2) {
//     $errorMessages[] = 'Middle initial should not exceed 2 characters';
// }

// if (empty($mission)) {
//     $errorMessages[] = 'Last name is required';
// }

// if (strlen($mission) > 255) {
//     $errorMessages[] = 'Middle initial should not exceed 2 characters';
// }

// if (!empty($visson) && strlen($visson) > 255) {
//     $errorMessages[] = 'Last name should not exceed 255 characters';
// }

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
    "UPDATE Student
     SET date_taken = ?, 
     WHERE id = ?;"
);

$statement -> bind_param("ssssiisi",  $date_taken);

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
