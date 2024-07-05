<?php

require("dbcon.php");

$id = $_POST['id'];
$name = $_POST['name'];
$logo_file_path = $_POST['logo_file_path'];
$banner_file_path = $_POST['banner_file_path'];
$mission = $_POST['mission'];
$visson = $_POST['visson'];
$program_educational_objectives = $_POST['program_educational_objectives'];
$college_id = $_POST['college_id'];


$errorMessages = array();

// Validation checks
if (empty($logo_file_path)) {
    $errorMessages[] = 'First name is required';
}

if (strlen($logo_file_path) > 255) {
    $errorMessages[] = 'First name should not exceed 255 characters';
}

if (!empty($banner_file_path) && strlen($banner_file_path) > 2) {
    $errorMessages[] = 'Middle initial should not exceed 2 characters';
}

if (empty($mission)) {
    $errorMessages[] = 'Last name is required';
}

if (strlen($mission) > 255) {
    $errorMessages[] = 'Middle initial should not exceed 2 characters';
}

if (!empty($visson) && strlen($visson) > 255) {
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
     SET logo_file_path = ?, banner_file_path = ?, mission = ?, visson = ?, program_educational_objectives = ?, college_id = ?, scholarship_id = ?
     WHERE id = ?;"
);

$statement -> bind_param("ssssiisi", $logo_file_path, $banner_file_path, $mission, $visson, $program_educational_objectives, $college_id, $scholarship_id, $name);

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
