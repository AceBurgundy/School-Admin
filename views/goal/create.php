<?php

require("../dbcon.php");

$text= $_POST['text'];
$college_id = $_POST['college_id'];
$department_id = $_POST['department_id'];


$errorMessages = array();

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
    "INSERT INTO goal (text, college_id, department_id)
     VALUES (?, ?, ?)"
);

$statement -> bind_param("sss", $text, $college_id, $department_id);

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