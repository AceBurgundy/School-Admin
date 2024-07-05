<?php

require("../dbcon.php");

//naga base sa jscript
$name = $_POST['input_name'];
$review = $_POST['course_review'];
$rating = $_POST['course_rating'];
$course_id = $_POST['course_id'];

$errorMessages = array();

// Validation checks
if (empty($name)) {
    $errorMessages[] = 'name is required';
}

if (empty($review)) {
    $errorMessages[] = 'review is required';
}

if (empty($rating)) {
    $errorMessages[] = 'rating is required';
}

if (empty($course_id)) {
    $errorMessages[] = 'Course ID is required';
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
    "UPDATE coursereview
     SET name = ?, review = ?, rating = ?, course_id = ?
     WHERE id = ?;"
);

$statement -> bind_param("ssssiisi", $name, $review, $rating, $course_id );

if ($statement->execute()) {
    $response = array(
        'status' => 'success',
        'message' => 'Course review record inserted successfully'
    );
} else {
    $response = array(
        'status' => 'error',
        'message' => 'Failed to insert course review record'
    );
}

echo json_encode($response);
