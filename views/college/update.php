<?php

require("dbcon.php");


$name = $_POST['name'];
$banner_file_path = $_POST['banner_file_path'];
$logo_file_path = $_POST['logo_file_path'];
$organizational_chart_file_path = $_POST['organizational_chart_file_path'];
$secretary = $_POST['secretary'];
$email = $_POST['email'];
$mission = $_POST['mission'];
$vission = $_POST['vission'];
$program_educational_objectives = $_POST['program_educational_objectives'];
$date_added = $_POST['date_added'];
$date_updated = $_POST['date_updated'];

$errorMessages = array();

// Validation checks
if (empty($name)) {
    $errorMessages[] = 'Name is required';
}

if (strlen($name) > 255) {
    $errorMessages[] = 'Name should not exceed 255 characters';
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
    "UPDATE college
     SET name = ?, banner_file_path = ?, logo_file_path = ?, organizational_chart_file_path = ?, secretary = ?, email = ?, mission = ?, vission = ?, program_educational_objectives = ?, date_added = ?, date_updated = ? 
     WHERE id = ?;"
);

$statement -> bind_param("ssssiis", $name, $banner_file_path, $logo_file_path, $organizational_chart_file_path,$secretary,$email,
$mission,$vission,$program_educational_objectives,
$date_added,$date_updated);

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
