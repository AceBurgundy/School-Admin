<?php

require("dbcon.php");

$first_name= $_POST['first_name'];
$middle_initial= $_POST['middle_initial'];
$last_name= $_POST['last_name'];
$extension= $_POST['extension'];
$facebook_link_id= $_POST['facebook_link_id'];
$twitter_link_id= $_POST['twitter_link_id'];
$linkedin_link_id= $_POST['linkedin_link_id'];
$instagran_link_id= $_POST['instagran_link_id'];

$errorMessages = array();

// Validation checks
if (empty($first_name)) {
    $errorMessages[] = 'First name is required';
}

if (strlen($first_name) > 255) {
    $errorMessages[] = 'First name should not exceed 255 characters';
}

if (!empty($middle_initial) && strlen($middle_initial) > 2) {
    $errorMessages[] = 'Middle initial should not exceed 2 characters';
}

if (empty($last_name)) {
    $errorMessages[] = 'Last name is required';
}

if (strlen($last_name) > 255) {
    $errorMessages[] = 'Middle initial should not exceed 2 characters';
}

if (!empty($extension) && strlen($extension) > 255) {
    $errorMessages[] = 'Last name should not exceed 255 characters';
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
    "UPDATE Student
     SET first_name = ?, middle_initial = ?, last_name = ?, extension = ?, facebook_link_id = ?, twitter_link_id = ?, linkedin_link_id = ?, instagran_link_id = ? 
     WHERE id = ?;"
);

$statement -> bind_param("ssssiisi", $first_name, $middle_initial, $last_name, $extension, $facebook_link_id, $twitter_link_id, $linkedin_link_id, $instagran_link_id);

if ($statement->execute()) {
    $response = array(
        'status' => 'success',
        'message' => 'Instructor record inserted successfully'
    );
} else {
    $response = array(
        'status' => 'error',
        'message' => 'Failed to insert instructor record'
    );
}

echo json_encode($response);
