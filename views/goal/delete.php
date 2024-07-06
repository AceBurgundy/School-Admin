<?php

require("../dbcon.php");

$goal_and_objective_id = $_POST['$goal_and_objective_id'];

$errorMessages = array();

// Validation checks
if (empty($student_id)) {
    $errorMessages[] = 'Goal and Objective ID is required';
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
    "DELETE FROM goal
     WHERE id = ?"
);

$statement -> bind_param("i", $goal_and_objective_id);

if ($statement->execute()) {
    $response = array(
        'status' => 'success',
        'message' => 'Goal and Objective record has been deleted successfully'
    );
} else {
    $response = array(
        'status' => 'error',
        'message' => 'Failed to delete Goal and Objective record'
    );
}

echo json_encode($response);
