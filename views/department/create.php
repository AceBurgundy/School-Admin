<?php

require("dbcon.php");

$name = $_POST['name'];
$logo_file_path = $_POST['logo_file_path'];
$banner_file_path = $_POST['banner_file_path'];
$mission = $_POST['mission'];
$vission = $_POST['visson'];
$program_educational_objectives = $_POST['program_educational_objectives'];
$college_id = $_POST['college_id'];


$errorMessages = array();

// Validation checks
if (empty($name)) {
    $errorMessages[] = 'Department name is required';
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
    "INSERT INTO department (name, logo_file_path, banner_file_path, mission, vission, program_educational_objectives, college_id)
     VALUES (?, ?, ?, ?, ?, ?, ?)"
);

$statement->bind_param("ssssssi", $name, $logo_file_path, $last_name, $banner_file_path, $vission, $program_educational_objectives, $college_id);

if ($statement->execute()) {
    $response = array(
        'status' => 'success',
        'message' => 'Department record inserted successfully'
    );
} else {
    $response = array(
        'status' => 'error',
        'message' => 'Failed to insert Department record'
    );
}

echo json_encode($response);
