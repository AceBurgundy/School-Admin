<?php

require("../dbcon.php");

$goal_and_objective_id = $_POST['goal'];
$text = $_POST['text'];
$college_id = $_POST['college_id'];
$department_id = $_POST['department_id'];


$errorMessages = array();

// Validation checks
if (empty($text)) {
    $errorMessages[] = 'Text is required';
}

if (strlen($college_id) > 50 && empty($college_id)) {
    $errorMessages[] = 'College id required should not exceed 50 characters ';
}

if (!empty($department_id) && strlen($department_id) > 50) {
    $errorMessages[] = 'Department Id required or should not exceed 50 characters';
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
    "UPDATE goal
     SET text = ?, college_id = ?, department_id = ?
     WHERE id = ?;"
);

$statement -> bind_param("sss", $text,$college_id, $department_id);

if ($statement->execute()) {
    $response = array(
        'status' => 'success',
        'message' => 'Goal and Objective record inserted successfully'
    );
} else {
    $response = array(
        'status' => 'error',
        'message' => 'Failed to insert Goal  record'
    );
}

echo json_encode($response);
